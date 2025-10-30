<?php

namespace App\Http\Controllers\Calculators;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MatrixPowerController extends Controller
{
    public function index(){
        return view('matrix-power');
    }

    public function calculate(Request $request){
        // Validate: n is integer (can be negative), u is a 2D array of integers
        $data = $request->validate([
            'n' => ['required', 'integer'],
            'u' => ['required', 'array', 'min:1'],
            'u.*' => ['required', 'array', 'min:1'],
        ]);

        $n = (int) $data['n'];
        $A = $this->toIntegerMatrix($data['u']); // matrix of string ints

        $rows = count($A);
        $cols = count($A[0]);
        if ($rows !== $cols) {
            throw ValidationException::withMessages([
                'u' => 'Matrix must be square.',
            ]);
        }

        // Convert to fraction matrix (each entry as ['n' => num, 'd' => den])
        $Af = $this->intMatrixToFrac($A);

        // Compute A^n with exact fractions
        if ($n >= 0) {
            $Rf = $this->matrixPowerFrac($Af, $n);
        } else {
            $inv = $this->inverseFrac($Af); // throws if singular
            $Rf = $this->matrixPowerFrac($inv, -$n);
        }

        // Present as strings: "p/q" or integer "p"
        $pretty = $this->prettyMatrix($Rf);

        return response()->json([
            'n' => $n,
            'size' => $rows,
            'result' => $pretty,
        ]);
    }

     // Ensure rectangular and integer-only; return array of string integers
    private function toIntegerMatrix(array $u): array
    {
        $cols = count($u[0]);
        $out = [];
        foreach ($u as $i => $row) {
            if (count($row) !== $cols) {
                throw ValidationException::withMessages([
                    'u' => "All rows must have the same number of columns (row {$i} mismatch)."
                ]);
            }
            $outRow = [];
            foreach ($row as $x) {
                // allow strings like "-12" or "0"
                if (!is_numeric($x) || (string)(int)$x !== trim((string)$x)) {
                    // reject non-integers (e.g., "3.5")
                    if (!preg_match('/^\s*-?\d+\s*$/', (string)$x)) {
                        throw ValidationException::withMessages([
                            'u' => 'All entries must be integers.'
                        ]);
                    }
                }
                $outRow[] = (string) ((int) $x);
            }
            $out[] = $outRow;
        }
        return $out;
    }

    private function intMatrixToFrac(array $A): array
    {
        $out = [];
        foreach ($A as $row) {
            $r = [];
            foreach ($row as $x) {
                $r[] = $this->frac((string)$x, '1');
            }
            $out[] = $r;
        }
        return $out;
    }

    private function identityFrac(int $n): array
    {
        $I = [];
        for ($i = 0; $i < $n; $i++) {
            $row = [];
            for ($j = 0; $j < $n; $j++) {
                $row[] = $this->frac($i === $j ? '1' : '0', '1');
            }
            $I[] = $row;
        }
        return $I;
    }

    /* ---------------- Fraction helpers (exact, with BCMath) ---------------- */

    // Normalised reduced fraction as ['n' => num, 'd' => den] with den>0, gcd=1
    private function frac(string $num, string $den = '1'): array
    {
        if ($den === '0') {
            throw new \RuntimeException('Division by zero in fraction.');
        }
        // normalise sign to denominator
        if ($den[0] === '-') {
            $num = $this->bcNeg($num);
            $den = $this->bcNeg($den);
        }
        // reduce by gcd
        $g = $this->bcGcd($this->bcAbs($num), $this->bcAbs($den));
        if ($g !== '0' && $g !== '1') {
            $num = $this->bcDivInt($num, $g);
            $den = $this->bcDivInt($den, $g);
        }
        // zero normalisation: 0/k => 0/1
        if ($num === '0') {
            $den = '1';
        }
        return ['n' => $num, 'd' => $den];
    }

    private function isZero(array $f): bool { return $f['n'] === '0'; }

    private function fAdd(array $a, array $b): array
    {
        $num = $this->bcAdd($this->bcMul($a['n'], $b['d']), $this->bcMul($b['n'], $a['d']));
        $den = $this->bcMul($a['d'], $b['d']);
        return $this->frac($num, $den);
    }

    private function fSub(array $a, array $b): array
    {
        $num = $this->bcSub($this->bcMul($a['n'], $b['d']), $this->bcMul($b['n'], $a['d']));
        $den = $this->bcMul($a['d'], $b['d']);
        return $this->frac($num, $den);
    }

    private function fMul(array $a, array $b): array
    {
        return $this->frac($this->bcMul($a['n'], $b['n']), $this->bcMul($a['d'], $b['d']));
    }

    private function fDiv(array $a, array $b): array
    {
        // if ($this->isZero(b: $b)) throw new \RuntimeException('Division by zero fraction.');
        return $this->frac($this->bcMul($a['n'], $b['d']), $this->bcMul($a['d'], $b['n']));
    }

    private function pretty(array $f): string
    {
        return ($f['d'] === '1') ? $f['n'] : ($f['n'] . '/' . $f['d']);
    }

    private function prettyMatrix(array $M): array
    {
        $out = [];
        foreach ($M as $row) {
            $r = [];
            foreach ($row as $f) $r[] = $this->pretty($f);
            $out[] = $r;
        }
        return $out;
    }

    /* ---------------- Big-int (BCMath) helpers ---------------- */

    private function bcAbs(string $x): string { return ltrim($x, '+') === '-' ? substr($x, 1) : ltrim($x, '+'); }
    private function bcNeg(string $x): string { return ($x[0] === '-') ? substr($x, 1) : ('-' . $x); }

    private function bcAdd(string $a, string $b): string { return bcadd($a, $b, 0); }
    private function bcSub(string $a, string $b): string { return bcsub($a, $b, 0); }
    private function bcMul(string $a, string $b): string { return bcmul($a, $b, 0); }
    private function bcDivInt(string $a, string $b): string { return bcdiv($a, $b, 0); } // exact integer division expected
    private function bcMod(string $a, string $b): string { return bcmod($a, $b); }
    private function bcCmp(string $a, string $b): int { return bccomp($a, $b, 0); }

    private function bcGcd(string $a, string $b): string
    {
        if ($a === '0') return $b === '' ? '0' : $this->bcAbs($b);
        if ($b === '0') return $this->bcAbs($a);
        $a = $this->bcAbs($a);
        $b = $this->bcAbs($b);
        while ($b !== '0') {
            $t = $this->bcMod($a, $b);
            $a = $b;
            $b = $t;
        }
        return $a;
    }

    /* ---------------- Matrix ops over Fractions ---------------- */

    private function matrixMultiplyFrac(array $A, array $B): array
    {
        $m = count($A);
        $p = count($A[0]); // also rows of B
        $n = count($B[0]);

        if ($p !== count($B)) {
            throw new \RuntimeException('Invalid dimensions for multiplication.');
        }

        $C = array_fill(0, $m, array_fill(0, $n, $this->frac('0', '1')));

        for ($i = 0; $i < $m; $i++) {
            for ($k = 0; $k < $p; $k++) {
                if ($this->isZero($A[$i][$k])) continue;
                for ($j = 0; $j < $n; $j++) {
                    if ($this->isZero($B[$k][$j])) continue;
                    $C[$i][$j] = $this->fAdd($C[$i][$j], $this->fMul($A[$i][$k], $B[$k][$j]));
                }
            }
        }
        return $C;
    }

    private function matrixPowerFrac(array $A, int $n): array
    {
        $size = count($A);
        $R = $this->identityFrac($size);
        $B = $A;

        while ($n > 0) {
            if ($n & 1) {
                $R = $this->matrixMultiplyFrac($R, $B);
            }
            $B = $this->matrixMultiplyFrac($B, $B);
            $n >>= 1;
        }
        return $R;
    }

    // Gauss–Jordan inverse over rationals (exact). Throws if singular.
    private function inverseFrac(array $A): array
    {
        $n = count($A);
        // Augment [A | I]
        $aug = [];
        for ($i = 0; $i < $n; $i++) {
            $row = [];
            // left: A
            foreach ($A[$i] as $f) $row[] = $f;
            // right: I
            for ($j = 0; $j < $n; $j++) $row[] = $this->frac($i === $j ? '1' : '0', '1');
            $aug[] = $row;
        }

        $colsTotal = 2 * $n;

        // Forward elimination + normalisation
        for ($col = 0; $col < $n; $col++) {
            // Find pivot row with non-zero in this column
            $pivot = $col;
            while ($pivot < $n && $this->isZero($aug[$pivot][$col])) $pivot++;
            if ($pivot === $n) {
                throw ValidationException::withMessages([
                    'u' => 'Matrix is singular (non-invertible), cannot raise to a negative power.'
                ]);
            }
            // Swap rows if needed
            if ($pivot !== $col) {
                $tmp = $aug[$col]; $aug[$col] = $aug[$pivot]; $aug[$pivot] = $tmp;
            }

            // Scale pivot row to make pivot = 1
            $pivVal = $aug[$col][$col];
            $invPiv = $this->fDiv($this->frac('1', '1'), $pivVal);
            for ($j = 0; $j < $colsTotal; $j++) {
                $aug[$col][$j] = $this->fMul($aug[$col][$j], $invPiv);
            }

            // Eliminate other rows in this column
            for ($r = 0; $r < $n; $r++) {
                if ($r === $col) continue;
                $factor = $aug[$r][$col]; // currently something, want 0
                if ($this->isZero($factor)) continue;
                for ($j = 0; $j < $colsTotal; $j++) {
                    $aug[$r][$j] = $this->fSub($aug[$r][$j], $this->fMul($factor, $aug[$col][$j]));
                }
            }
        }

        // Extract right half as inverse
        $inv = [];
        for ($i = 0; $i < $n; $i++) {
            $row = [];
            for ($j = 0; $j < $n; $j++) {
                $row[] = $aug[$i][$n + $j];
            }
            $inv[] = $row;
        }
        return $inv;
    }
}

<?php

namespace App\Http\Controllers\Calculators;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LinearIndependanceController extends Controller
{
    const EPS = 1e-10;

    public function index(){
        return view('linearDependance');
    }

    public function calculate(Request $request){
        $u = $request->u ?? [];
        $v = $request->v ?? [];
        $w = $request->w ?? [];
        $t = $request->t ?? [];
        if(!empty($u)){
            $combinedArr[] = $u;
        }
        if(!empty($v)){
            $combinedArr[] = $v;
        }
        if(!empty($w)){
            $combinedArr[] = $w;
        }
        if(!empty($t)){
            $combinedArr[] = $t;
        }
        $responseMessage = '';
        $independent2 = $this->isLinearlyIndependent($combinedArr);
        $responseMessage = $responseMessage. "The vectors are " . ($independent2 ? "<b>Independent</b>" : "<b>Dependent</b>").'<br>';

        // If dependent, show a dependency vector (nullspace basis)
        if (!$independent2) {
            $basis = $this->nullspaceBasis($combinedArr);
            $responseMessage = $responseMessage."A non-trivial solution to A*c=0 (dependencies among columns):<br>";
            foreach ($basis as $k => $cvec) {
                $responseMessage = $responseMessage."  c".($k+1)." = [" . implode(", ", array_map(fn($x)=>sprintf("%.6g",$x), $cvec)) . "]<br>";
            }
        }
        return response()->json(['response' => $responseMessage]);
    }

    public function validateVectors(array $vectors): array {
    if (empty($vectors)) {
        throw new InvalidArgumentException("No vectors provided.");
    }
    $m = count($vectors[0]);
    foreach ($vectors as $i => $v) {
        if (!is_array($v) || count($v) !== $m) {
            throw new InvalidArgumentException("All vectors must be arrays of the same length. Problem at index $i.");
        }
        foreach ($v as $j => $x) {
            if (!is_numeric($x)) {
                throw new InvalidArgumentException("Non-numeric entry at vector $i, position $j.");
            }
        }
    }
    return [$m, count($vectors)];
}

/** Build matrix A with vectors as columns: A is m x n. */
public function buildMatrix(array $vectors): array {
    [$m, $n] = $this->validateVectors($vectors);
    $A = array_fill(0, $m, array_fill(0, $n, 0.0));
    for ($j = 0; $j < $n; $j++) {
        for ($i = 0; $i < $m; $i++) {
            $A[$i][$j] = (float)$vectors[$j][$i];
        }
    }
    return $A;
}

/**
 * Compute rank(A) via Gaussian elimination with partial pivoting.
 * Returns integer rank.
 */
public function matrixRank(array $A): int {
    $m = count($A);
    $n = count($A[0]);
    $rank = 0;
    $row = 0;
    for ($col = 0; $col < $n && $row < $m; $col++) {
        // Find pivot (max abs value) at or below current row
        $pivotRow = $row;
        $maxAbs = abs($A[$pivotRow][$col]);
        for ($r = $row + 1; $r < $m; $r++) {
            $val = abs($A[$r][$col]);
            if ($val > $maxAbs) {
                $maxAbs = $val;
                $pivotRow = $r;
            }
        }
        // If column is (numerically) zero, move to next column
        if ($maxAbs < self::EPS) {
            continue;
        }
        // Swap current row with pivotRow
        if ($pivotRow !== $row) {
            $tmp = $A[$row];
            $A[$row] = $A[$pivotRow];
            $A[$pivotRow] = $tmp;
        }
        // Normalize pivot row (optional for rank; helps stability)
        $pivot = $A[$row][$col];
        for ($c = $col; $c < $n; $c++) {
            $A[$row][$c] /= $pivot;
        }
        // Eliminate below
        for ($r = $row + 1; $r < $m; $r++) {
            $factor = $A[$r][$col];
            if (abs($factor) < self::EPS) continue;
            for ($c = $col; $c < $n; $c++) {
                $A[$r][$c] -= $factor * $A[$row][$c];
            }
        }
        $row++;
        $rank++;
    }
    return $rank;
}

/**
 * RREF of A (for nullspace extraction).
 * Returns [R, pivots] where R is the RREF and pivots is a list of pivot column indices.
 */
    public function rref(array $A): array {
    $m = count($A);
    $n = count($A[0]);
    $row = 0;
    $pivots = [];
    for ($col = 0; $col < $n && $row < $m; $col++) {
        // Pivot search
        $pivotRow = $row;
        $maxAbs = abs($A[$pivotRow][$col]);
        for ($r = $row + 1; $r < $m; $r++) {
            $val = abs($A[$r][$col]);
            if ($val > $maxAbs) { $maxAbs = $val; $pivotRow = $r; }
        }
        if ($maxAbs < self::EPS) continue; // no pivot in this column

        // Swap to current row
        if ($pivotRow !== $row) {
            $tmp = $A[$row]; $A[$row] = $A[$pivotRow]; $A[$pivotRow] = $tmp;
        }
        // Normalize pivot row
        $pivot = $A[$row][$col];
        for ($c = 0; $c < $n; $c++) $A[$row][$c] /= $pivot;

        // Eliminate above and below
        for ($r = 0; $r < $m; $r++) {
            if ($r === $row) continue;
            $factor = $A[$r][$col];
            if (abs($factor) < self::EPS) continue;
            for ($c = 0; $c < $n; $c++) {
                $A[$r][$c] -= $factor * $A[$row][$c];
            }
        }
        $pivots[] = $col;
        $row++;
    }
    // Clean small noise
    for ($i = 0; $i < $m; $i++) {
        for ($j = 0; $j < $n; $j++) {
            if (abs($A[$i][$j]) < 1e-12) $A[$i][$j] = 0.0;
        }
    }
    return [$A, $pivots];
}

/**
 * Nullspace basis of A’s columns (i.e., solutions to A*c = 0).
 * Returns an array of vectors c (each is a dependency vector). Empty if independent.
 */
    public function nullspaceBasis(array $vectors): array {
        $A = $this->buildMatrix($vectors);              // m x n
        [$R, $pivots] = $this->rref($A);                // RREF of A
        $m = count($R);
        $n = count($R[0]);
        $pivotSet = array_flip($pivots);
        $freeCols = [];
        for ($j = 0; $j < $n; $j++) {
            if (!array_key_exists($j, $pivotSet)) $freeCols[] = $j;
        }
        $basis = [];
        foreach ($freeCols as $f) {
            // Build one nullspace vector for free variable c_f = 1
            $c = array_fill(0, $n, 0.0);
            $c[$f] = 1.0;
            // For each pivot row i with pivot at column p, set c_p = -R[i][f]
            foreach ($pivots as $i => $p) {
                // Row i corresponds to pivot at column p
                $c[$p] = -$R[$i][$f];
            }
            $basis[] = $c;
        }
        return $basis;
    }

/** Public API: true if independent, false if dependent. */
    public function isLinearlyIndependent(array $vectors): bool {
        [$m, $n] = $this->validateVectors($vectors);
        $A = $this->buildMatrix($vectors);
        $rank = $this->matrixRank($A);
        return $rank === $n;
    }
}

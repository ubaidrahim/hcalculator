<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
/* use App\Rules\Prime;
use App\Rules\Integer; */

class HasnainController extends Controller
{
       public function testonefunc(){
      return view('test1');
    }
    public function calculate_multiply(Request $request){
      $validateData = $request->validate([
        'i1' => ['required'],
        'i2' => ['required']
      ]);
      $num1 = $request->input('i1');
      $num2 = $request->input('i2');
      $result = $num1 * $num2;
      return response()->json(['response' => 'Result: '.$result]);
    }



    public function evenoddfun(){
      //return view('evenoroddfunction');
      return view('evenoroddfunction', [
            'result' => null,
            'error' => null,
            'expression' => old('expression', 'pow(x, 2) + 3'), // default example
        ]);
    }
    public function calculate_evenodd(Request $request)
{
    $request->validate([
        'expression' => ['required', 'string', 'max:500'],
    ]);

    $expr = trim($request->input('expression'));

    // Run the even/odd check
    [$result, $error] = $this->checkFunctionParity($expr);

    // Build message for the frontend
    if ($error) {
        $message = "Error: " . $error;
    } elseif ($result) {
        $message = "Result: " . $result;
    } else {
        $message = "Could not determine parity.";
    }

    // ✅ Return JSON response
    return response()->json([
        'response'    => $message,
        'result'      => $result,
        'error'       => $error,
        'expression'  => $expr,
    ]);
}
    private function checkFunctionParity(string $expression): array
    {
        // Allowed functions (whitelist)
        $allowed = ['sin','cos','tan','abs','exp','log','sqrt','pow','floor','ceil'];

        // 1) Basic character whitelist
        if (!preg_match('/^[0-9x\s\+\-\*\/\(\),\.a-zA-Z]+$/', $expression)) {
            return [null, 'Invalid characters in expression.'];
        }

        // 2) Only allow whitelisted function names
        if (preg_match_all('/([a-zA-Z_][a-zA-Z0-9_]*)\s*\(/', $expression, $matches)) {
            foreach ($matches[1] as $fn) {
                if (!in_array(strtolower($fn), $allowed, true)) {
                    return [null, "Invalid function name: {$fn}"];
                }
            }
        }

        // 3) Replace variable x with PHP variable $x (word boundary to avoid touching fn names)
        $expr = preg_replace('/\bx\b/', '$x', $expression);

        $points = [0.5, 1, 2, 3, 4, 5];
        $tol = 1e-6;
        $even = true;
        $odd = true;
        $evaluatedAny = false;

        foreach ($points as $x) {
            $fx    = $this->evalSafe($expr, $x);
            $fnegx = $this->evalSafe($expr, -$x);

            if ($fx === null || $fnegx === null) {
                continue;
            }
            $evaluatedAny = true;

            if (abs($fnegx - $fx) > $tol) $even = false;
            if (abs($fnegx + $fx) > $tol) $odd  = false;
        }

        if (!$evaluatedAny) return [null, 'Could not evaluate expression at sample points.'];

        if ($even && !$odd) return ['Even (f(-x) = f(x))', null];
        if ($odd && !$even) return ['Odd (f(-x) = -f(x))', null];
        if ($even && $odd)  return ['Zero function (both even & odd)', null];
        return ['Neither', null];
    }
        private function evalSafe(string $expr, float $x): ?float
    {
        // Allowed PHP math functions in local scope
        $sin='sin'; $cos='cos'; $tan='tan'; $abs='abs'; $exp='exp'; $log='log';
        $sqrt='sqrt'; $pow='pow'; $floor='floor'; $ceil='ceil';

        // Map $x used in expression to local $xVar
        $xVar = $x;
        $evalExpr = str_replace('$x', '$xVar', $expr);

        try {
            $val = @eval("return {$evalExpr};");
        } catch (\Throwable $e) {
            return null;
        }

        if (!is_numeric($val)) return null;
        $val = (float)$val;
        if (!is_finite($val)) return null;
        return $val;
        
    }
}
   /*  public function calculate_evenodd(Request $request){
      $validateData = $request->validate([
        'expression' => ['required'],
        'i2' => ['required']
      ]);
      $num1 = $request->input('i1');
      $num2 = $request->input('i2');
      $result = $num1 * $num2;
      return response()->json(['response' => 'Result: '.$result]);
    } */

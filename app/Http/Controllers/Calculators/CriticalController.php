<?php

namespace App\Http\Controllers\Calculators;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CriticalController extends Controller
{
    public function index()
    {
        return view('critical-speed-calculator');
    }

    public function calculate(Request $request)
    {
        $request->validate([
            'unit' => 'required',
            'diameter' => 'required|numeric|min:0.0001',
            'length' => 'required|numeric|min:0.0001',
            'condition' => 'required'
        ]);

        // --- Material constants ---
        $E = 2.0e11;   // Young’s modulus (Pa)
        $rho = 7800;   // Density (kg/m³)
        $K = 60 / (2 * M_PI); // Conversion to RPM

        // --- Inputs ---
        $unit = strtolower(trim($request->unit));
        $d = (float) $request->diameter;
        $L = (float) $request->length;
        $condition = trim($request->condition);

        // --- End Fixity (F) mapping ---
$fixityMap = [
    'A' => 0.9,
    'B' => 2.5,
    'C' => 3.6755,  
    'D' => 5.5756
];



        // Determine numeric F
        if (is_numeric($condition)) {
            $F = (float)$condition;
        } else {
            $key = strtoupper(substr($condition, 0, 1));
            $F = $fixityMap[$key] ?? null;
        }

        if ($F === null) {
            return response()->json(['error' => 'Invalid end fixity selection.'], 422);
        }

        // --- Unit conversion to meters ---
        if ($unit === 'in') {
            $d *= 0.0254;
            $L *= 0.0254;
        } elseif ($unit === 'mm') {
            $d /= 1000;
            $L /= 1000;
        }

        // --- Main formula ---
        // Nc = K × F × (d / L²) × √(E / ρ)
        $Nc = $K * $F * ($d / ($L ** 2)) * sqrt($E / $rho);
        $maxRpm = $Nc * 0.8;

        // --- Round & return ---
      return response()->json([
  'rpm' => ceil($Nc),
'max_rpm' => ceil($maxRpm)

]);

    }
}

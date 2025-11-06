<?php

namespace App\Http\Controllers\Calculators;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GradeCurveController extends Controller
{
    public function index()
    {
        return view('grade-curve-calculator');
    }

    public function calculate(Request $request)
    {
        $request->validate([
            'total_students' => 'required|numeric|min:1',
            'highest_score' => 'required|numeric',
            'lowest_score' => 'required|numeric',
        ]);

        $total = $request->total_students;
        $high  = $request->highest_score;
        $low   = $request->lowest_score;

        $dist = [
            'A' => 0.02,
            'B' => 0.14,
            'C' => 0.68,
            'D' => 0.14,
            'F' => 0.02,
        ];

        $rangeStep = ($high - $low) / 5;

        $ranges = [
            'A' => [$high - $rangeStep, $high],
            'B' => [$high - 2*$rangeStep, $high - $rangeStep],
            'C' => [$high - 3*$rangeStep, $high - 2*$rangeStep],
            'D' => [$high - 4*$rangeStep, $high - 3*$rangeStep],
            'F' => [$low, $high - 4*$rangeStep],
        ];

        $results = [];
        foreach ($dist as $grade => $percent) {
            $results[$grade] = [
                'students' => round($total * $percent),
                'range' => [
                    round($ranges[$grade][0], 2),
                    round($ranges[$grade][1], 2)
                ]
            ];
        }

        if ($request->ajax()) {
            return response()->json([
                'total' => $total,
                'high' => $high,
                'low' => $low,
                'results' => $results
            ]);
        }

        return view('grade-curve-calculator', compact('total', 'high', 'low', 'results'));
    }
}

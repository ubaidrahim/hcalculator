<?php

namespace App\Http\Controllers\Calculators;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CcHpController extends Controller
{
    public function index()
    {
        return view('cc-to-hp-calculator');
    }
    public function calculate(Request $request)
    {
        $request->validate([
            'inputValue' => 'required|numeric|min:0.1',
            'unit'       => 'required|in:hp_to_cc,cc_to_hp',
        ]);
        $input = $request->inputValue;
        $unit  = $request->unit;
        $engineConfigs = [
            'High-performance gasoline' => ['factor' => 16,   'min' => 15,  'max' => 17,  'desc' => 'Kart / race builds'],
            'Small 4-stroke (Tuned)'    => ['factor' => 23.5, 'min' => 22,  'max' => 25,  'desc' => 'Modern, efficient small engines'],
            'Small 4-stroke (Utility)'  => ['factor' => 33.5, 'min' => 32,  'max' => 35,  'desc' => 'Lawn equipment / Generators'],
            '2-stroke (Rule-of-thumb)'  => ['factor' => 12.5, 'min' => 10,  'max' => 15,  'desc' => 'Broad estimate for 2-stroke design'],
            'Sport/High-rev Engine'     => ['factor' => 5.5,  'min' => 4.5, 'max' => 7,   'desc' => 'High-rev sport engines'],
        ];
        $results = [];
        foreach ($engineConfigs as $type => $config) {
            if ($unit === 'hp_to_cc') {
                $calculatedValue = $input * $config['factor'];
                $rangeMin = $input * $config['min'];
                $rangeMax = $input * $config['max'];
                $displayUnit = 'cc';
            } else {
                $calculatedValue = $input / $config['factor'];
                $rangeMin = $input / $config['max']; 
                $rangeMax = $input / $config['min'];
                $displayUnit = 'HP';
            }
            $results[] = [
                'engine_type' => $type,
                'description' => $config['desc'],
                'value'       => round($calculatedValue, 2),
                'range'       => round($rangeMin, 2) . ' to ' . round($rangeMax, 2),
                'factor'      => $config['factor'],
                'unit'        => $displayUnit
            ];
        }
        if ($request->ajax()) {
            return response()->json([
                'input'   => $input,
                'mode'    => $unit,
                'results' => $results
            ]);
        }
        return view('cc-to-hp-calculator', compact('results', 'input', 'unit'));
    }
}
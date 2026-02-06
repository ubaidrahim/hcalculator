<?php

namespace App\Http\Controllers\Calculators;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HydraulicHpController extends Controller
{
    //For hydraulichpcalculator
    public function index(){
      return view('hydraulichpcalculator');
    }
    public function calculate_hp(Request $request){
      $validateData = $request->validate([
        'i1' => ['required'],
        'i2' => ['required']
      ]);
      $num1 = $request->input('i1');
      $num2 = $request->input('i2');
      $result = $num1 * $num2 / 1714;
      return response()->json(['response' => 'Result: '.$result]);
    }
}
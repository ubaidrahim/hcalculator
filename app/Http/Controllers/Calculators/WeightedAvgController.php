<?php

namespace App\Http\Controllers\Calculators;

use Illuminate\Http\Request;
use App\Rules\Prime;
use App\Rules\Integer;
use App\Http\Controllers\Controller;

class WeightedAvgController extends Controller
{
  public function index(){
    return view('weighted-avg');
  }

  public function calculate(Request $request){
  //  echo 'check';
    // $validateData = $request->validate([
    //   'a' => ['required',new Prime],
    //   'p' => ['required',new Integer]
    // ]);
    $i = 0;
    $sum = 0;
    $product = 0;
    foreach($request->get('xn') as $x){
          if($x!=''){
            $w = ($request->input('wn')[$i] == '') ? 1 :  $request->input('wn')[$i];
            $product = $product + ($x * $w);
            $sum = $sum + $w;
            $i++;
          }
    }
    $result = $product / $sum;
    $msg = 'Weighted Product (Σ x<sub>n</sub>w<sub>n</sub>): '.$product.'<br>Sum of Weights (Σ w<sub>n</sub>): '.$sum.'<br>Weighted Mean (Σ x<sub>n</sub>w<sub>n</sub> / (Σ w<sub>n</sub>)): '.$result;
    return response()->json(['response' => $msg]);
  }
}

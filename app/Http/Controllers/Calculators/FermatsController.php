<?php

namespace App\Http\Controllers\Calculators;

use Illuminate\Http\Request;
use App\Rules\Prime;
use App\Rules\Integer;
use App\Http\Controllers\Controller;

class FermatsController extends Controller
{
  public function fermats(){
    return view('fermats');
  }

  public function calculate_fermats(Request $request){
  //  echo 'check';
    $validateData = $request->validate([
      'a' => ['required',new Prime],
      'p' => ['required',new Integer]
    ]);
    $integer = round($request->input('a'));
    $prime = $request->input('p');
    $lhs = pow($integer,$request->input('p'))-$integer;
    $rhs = $lhs / $prime;
    $msg = $integer.'<sup>'.$prime.'</sup> - '.$integer.' = '.$lhs.' = '.$prime.' X '.$rhs.' which is an integer multiple of '.$prime;
    return response()->json(['response' => $msg]);
  }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\Prime;
use App\Rules\Integer;

class CalculatorController extends Controller
{

    public function hptowhp(){
      return view('hptowhp');
    }
    public function calculate_hptowhp(Request $request){
      $validateData = $request->validate([
        'i1' => ['required'],
        'i2' => ['required']
      ]);
      $whp = $request->input('i1');
      $dl = $request->input('i2');
      $hp = $whp * (1/(1-$dl));
      return response()->json(['response' => 'Engine Horse Power: '.$hp]);
    }

    public function whptohp(){
      return view('whptohp');
    }
    public function calculate_whptohp(Request $request){
      $validateData = $request->validate([
        'i1' => ['required'],
        'i2' => ['required']
      ]);
      $ehp = $request->input('i1');
      $dtlf = $request->input('i2');
      $whp = $ehp / $dtlf;
      return response()->json(['response' => 'Wheel Horse Power: '.$whp]);
    }

    public function pascaltopsi(){
      return view('pastopsi');
    }

    public function calculate_pascaltopsi(Request $request){
      // $validateData = $request->validate([
      //   'i1' => ['required'],
      //   'i2' => ['required']
      // ]);
      if($request->has('i1')){
        $result = 0.000145038 * $request->input('i1');
      }
      if($request->has('i2')){
        $result = $request->input('i2') / 0.000145038;
      }
      return response()->json(['response' => $result]);
    }

    public function bayes(){
      return view('bayestheorem');
    }
    public function calculate_bayes(Request $request){

    }

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

    public function lineardependance(){
      return view('linearDependance');
    }

    public function calculate_lineardependance(Request $request){

    }

    public function demoivres(){
      return view('demoivres');
    }

    public function calculate_demoivres(Request $request){
      $validateData = $request->validate([
        'x1' => ['required'],
        'x2' => ['required'],
        'n' => ['required']
      ]);
      $x1 = $request->input('x1');
      $x2 = $request->input('x2');
      $n = $request->input('n');
      $r = sqrt($x1*$x1 + $x2*$x2);
      $theta = atan2($x2,$x1);
      $rhs1 = pow($r,$n)*sin($n*$theta);
      $rhs2 = pow($r,$n)*cos($n*$theta);
      $lhs = '( '.$x1.' + '.$x2.'i )<sup>'.$n.'</sup>';
      $rhs = $rhs1.' + '.$rhs2.'i';
      $result = 'Given the equation for De Moivre\'s Theorem:<br>';
      $result .= '<i>z<sup>n</sup> = ( x<sub>1</sub> + x<sub>2</sub>i )<sup>n</sup> = r<sup>n</sup>( sin(nθ) + i cos(nθ) )</i><br>';
      $result .= 'where <i> r = √(x<sub>1</sub><sup>2</sup> + x<sub>2</sub><sup>2</sup>) = √('.$x1.'<sup>2</sup> + '.$x2.'<sup>2</sup>) = '.$r.'</i><br>';
      $result .= 'and <i>θ = tan<sup>-1</sup> (x<sub>2</sub> / x<sub>1</sub>) = tan<sup>-1</sup> ('.$x2.' / '.$x1.') = '.$theta.'</i><br>';
      $result .= 'Putting values into equation , we get<br>';
      $result .= $lhs.' = '.$r.'<sup>'.$n.'</sup>( sin( '.$n.'*'.$theta.' ) + i cos( '.$n.'*'.$theta.' ) )<br>';
      $result .= '<br><span class="lead"><b>'.$lhs.' = '.$rhs.'</b></span>';
      return response()->json(['response' => $result]);
    }
}

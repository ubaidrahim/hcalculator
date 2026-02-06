<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Calculators\GradeCurveController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('about-us', [App\Http\Controllers\HomeController::class, 'about'])->name('about');
Route::get('our-team', [App\Http\Controllers\HomeController::class, 'team'])->name('team');
Route::get('terms-of-use', [App\Http\Controllers\HomeController::class, 'termsOfUse'])->name('termsOfUse');
Route::get('privacy-policy', [App\Http\Controllers\HomeController::class, 'privacyPolicy'])->name('privacyPolicy');
Route::get('contact-us', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact');
Route::post('contact-us-handler', [App\Http\Controllers\HomeController::class, 'contactHandler'])->name('contactHandler');


Route::get('/whp-to-hp-calculator', [App\Http\Controllers\CalculatorController::class, 'hptowhp']);
Route::post('/whp-to-hp-calculator', [App\Http\Controllers\CalculatorController::class, 'calculate_hptowhp']);
Route::get('/wheel-horse-power-calculator', [App\Http\Controllers\CalculatorController::class, 'whptohp']);
Route::post('/wheel-horse-power-calculator', [App\Http\Controllers\CalculatorController::class, 'calculate_whptohp']);
Route::get('/pascal-to-psi-converter', [App\Http\Controllers\CalculatorController::class, 'pascaltopsi']);
Route::post('/pascal-to-psi-converter', [App\Http\Controllers\CalculatorController::class, 'calculate_pascaltopsi']);
Route::get('/bayes-theorem', [App\Http\Controllers\CalculatorController::class, 'bayes']);
Route::post('/bayes-theorem', [App\Http\Controllers\CalculatorController::class, 'calculate_bayes']);
Route::get('/fermats-little-theorem-calculator', [App\Http\Controllers\Calculators\FermatsController::class, 'fermats']);
Route::post('/fermats-little-theorem-calculator', [App\Http\Controllers\Calculators\FermatsController::class, 'calculate_fermats']);
Route::get('/linear-independance-calculator', [App\Http\Controllers\Calculators\LinearIndependanceController::class, 'index']);
Route::post('/linear-dependance', [App\Http\Controllers\Calculators\LinearIndependanceController::class, 'calculate']);
Route::get('/demoivres-theorem-calculator', [App\Http\Controllers\CalculatorController::class, 'demoivres']);
Route::post('/demoivres-theorem-calculator', [App\Http\Controllers\CalculatorController::class, 'calculate_demoivres']);
Route::get('/weighted-average-calculator', [App\Http\Controllers\Calculators\WeightedAvgController::class, 'index']);
Route::post('/weighted-average-calculator', [App\Http\Controllers\Calculators\WeightedAvgController::class, 'calculate']);


// /kanwal/ 
Route::get('/critical-speed-calculator', [App\Http\Controllers\Calculators\CriticalController::class, 'index']);
Route::post('/critical-speed-calculator', [App\Http\Controllers\Calculators\CriticalController::class, 'calculate']);

Route::get('/grade-curve-calculator', [GradeCurveController::class, 'index'])
    ->name('grade-curve-calculator');

Route::post('/grade-curve-calculator', [GradeCurveController::class, 'calculate'])
    ->name('grade-curve-calculator');

// /ubaid/
Route::get('/matrix-power-calculator', [App\Http\Controllers\Calculators\MatrixPowerController::class, 'index']);
Route::post('/matrix-power-calculator', [App\Http\Controllers\Calculators\MatrixPowerController::class, 'calculate']);

// arslan
Route::get('/even-odd-function', [App\Http\Controllers\Calculators\EvenOddCalculatorController::class, 'index']);
Route::post('/even-odd-function', [\App\Http\Controllers\Calculators\EvenOddCalculatorController::class, 'calculate']);

Route::get('/hydraulic-hp-calculator', [App\Http\Controllers\Calculators\HydraulicHpController::class, 'index']);
Route::post('/hydraulic-hp-calculator', [\App\Http\Controllers\Calculators\HydraulicHpController::class, 'calculate_hp']);

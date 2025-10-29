<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/linear-dependance', [App\Http\Controllers\CalculatorController::class, 'lineardependance']);
Route::post('/linear-dependance', [App\Http\Controllers\CalculatorController::class, 'calculate_lineardependance']);
Route::get('/demoivres-theorem-calculator', [App\Http\Controllers\CalculatorController::class, 'demoivres']);
Route::post('/demoivres-theorem-calculator', [App\Http\Controllers\CalculatorController::class, 'calculate_demoivres']);
Route::get('/weighted-average-calculator', [App\Http\Controllers\Calculators\WeightedAvgController::class, 'index']);
Route::post('/weighted-average-calculator', [App\Http\Controllers\Calculators\WeightedAvgController::class, 'calculate']);
Route::get('/test-one', [App\Http\Controllers\HasnainController::class, 'testonefunc']);
Route::post('/test-one', [App\Http\Controllers\HasnainController::class, 'calculate_multiply']);

Route::get('/even-or-odd-fun', [App\Http\Controllers\HasnainController::class, 'evenoddfun']);
Route::post('/even-or-odd-fun', [\App\Http\Controllers\HasnainController::class, 'calculate_evenodd']);
<?php

use App\Http\Controllers\OptionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SurveyController;
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

Route::get('/', function () {
    return view('welcome');
});


Route::resource('/surveys', SurveyController::class)
    ->except(['show']) ;

Route::get('/surveys/{id}/options', [OptionController::class, 'show'])->name('options.show');
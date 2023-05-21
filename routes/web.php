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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/predict', function () {
    return view('predict');
});

Route::get('/predict-v2', function () {
    return view('predictV2');
});

Route::get('/docs', function () {
    return view('docs'); 
});

Route::get('/abstract', function () {
    return view('abstract');
}); 

Route::get('/seed-data', function () {
    return view('abstract');
})->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/predict-run', [App\Http\Controllers\Controller::class, 'predict'])->name('predictRun');                   // process ile yaptığımız
Route::post('/predict-run-new', [App\Http\Controllers\Controller::class, 'predictNew'])->name('predictRunNew');         // cache ile yaptığımız ama modelV1
Route::post('/predict-run-new-v2', [App\Http\Controllers\Controller::class, 'predictNewV2'])->name('predictRunNewV2');  // cache ile yaptığımız ama modelV2
Route::post('/save-expert', [App\Http\Controllers\HomeController::class, 'saveExpert'])->name('saveExpert');

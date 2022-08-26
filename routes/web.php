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

Route::get('/solution/1', [App\Http\Controllers\SolutionController::class, 'solutionOne'])->name('solution.one');
Route::get('/solution/2', [App\Http\Controllers\SolutionController::class, 'solutionTwo'])->name('solution.two');
Route::get('/solution/3', [App\Http\Controllers\SolutionController::class, 'solutionThree'])->name('solution.three');

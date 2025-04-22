<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('landing');
});
//todo : welcome -> will take u to Laravel welcome page, fix it

Route::get('/check_min/{min?}', 'App\Http\Controllers\DashboardController@check_min')->where('min', '[0-9]+')->name('check_min');

Route::get('/search', 'App\Http\Controllers\DashboardController@search_min')->name('search_min');
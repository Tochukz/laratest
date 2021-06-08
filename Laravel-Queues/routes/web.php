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

Route::get('/', 'App\Http\Controllers\RegistrationController@registration');
Route::get('/welcome', 'App\Http\Controllers\RegistrationController@welcome');
Route::post('/register', 'App\Http\Controllers\RegistrationController@register');
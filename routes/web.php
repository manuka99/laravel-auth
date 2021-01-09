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

Route::get('/home', function () {
    return view('home');
});

Route::get('/user', function () {
    return 'You are accessing a email protected route';
})->middleware(['auth', 'verified']);

Route::get('/roles', function () {
    return 'You are accessing a password protected route';
})->middleware(['auth', 'password.confirm']);

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
    return view('main');
});
/*
Route::get('projects', function () {
    // Only authenticated users may enter...
})->middleware('auth');
*/
Route::resource('projects', 'ProjectController')->only(['index', 'show']);
Route::resource('projects', 'ProjectController')->except(['index', 'show'])->middleware('auth');

Route::resource('logs', 'LogController')->only(['index', 'show']);
Route::resource('logs', 'LogController')->except(['index', 'show'])->middleware('auth');
//Route::resource('projects', 'ProjectController');

//Route::resource('logs', 'LogController');

Auth::routes([
    'confirm' => false,
    'forgot' => false,
    'login' => true,
    'register' => false,
    'reset' => false,
    'verification' => false,
]);

<?php

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

Route::resource('/Post','PostController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
use \Illuminate\Support\Facades\Auth;
Route::middleware('isAdmin:writer')->prefix('Administrator')->group(function (){
   Route::get('/Slider',function (){
       $user=Auth::user();
   })->name('Admin.Slider');
    Route::resource('/Post','PostController');
    Route::get('/Contact',function(){
       return 'contact';
    });
});

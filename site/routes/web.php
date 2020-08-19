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

Route::get('/', 'HomeController@HomeIndex');
Route::post('/ContactSend', 'HomeController@ContactSend');

Route::get('/Courses', 'CourseController@CourseIndex');
Route::get('/Projects', 'ProjectController@ProjectIndex');

Route::get('/Contact', 'ContactController@ContactPage');
Route::get('/Privecy', 'PrivecyController@PrivecyPage');
Route::get('/Terms', 'TermsController@TermsPage');



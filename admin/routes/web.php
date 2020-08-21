<?php

use Illuminate\Support\Facades\Route;



Route::get('/', 'HomeController@homeIndex')->middleware('loginCheck');

Route::get('/Visitor', 'VisitorController@VisitorIndex')->middleware('loginCheck');

//adminpanel service management
Route::get('/Services', 'ServiceController@ServiceIndex')->middleware('loginCheck');
Route::get('/getServicesData', 'ServiceController@getServicesData')->middleware('loginCheck');
Route::post('/ServiceDetails', 'ServiceController@getServiceDetails')->middleware('loginCheck');
Route::post('/ServiceDelete', 'ServiceController@ServiceDelete')->middleware('loginCheck');
Route::post('/ServiceUpdate', 'ServiceController@ServiceUpdate')->middleware('loginCheck');
Route::post('/ServiceAdd', 'ServiceController@ServiceAdd')->middleware('loginCheck');



//admin panel Course management
Route::get('/Courses', 'CoursesController@CoursesIndex')->middleware('loginCheck');
Route::get('/getCoursesData', 'CoursesController@getCoursesData')->middleware('loginCheck');
Route::post('/CourseDetails', 'CoursesController@getCourseDetails')->middleware('loginCheck');
Route::post('/CourseDelete', 'CoursesController@CourseDelete')->middleware('loginCheck');
Route::post('/CourseUpdate', 'CoursesController@CourseUpdate');
Route::post('/CourseAdd', 'CoursesController@CourseAdd')->middleware('loginCheck');

//Admin panel Project management
Route::get('/Projects', 'ProjectController@ProjectIndex')->middleware('loginCheck');
Route::get('/getProjectsData', 'ProjectController@getProjectsData')->middleware('loginCheck');
Route::post('/ProjectDetails', 'ProjectController@getProjectDetails')->middleware('loginCheck');
Route::post('/ProjectDelete', 'ProjectController@ProjectDelete')->middleware('loginCheck');
Route::post('/ProjectUpdate', 'ProjectController@ProjectUpdate')->middleware('loginCheck');
Route::post('/ProjectAdd', 'ProjectController@ProjectAdd')->middleware('loginCheck');


//Admin panel Contact management
Route::get('/Contacts', 'ContactController@ContactIndex')->middleware('loginCheck');
Route::get('/getContactsData', 'ContactController@getContactsData')->middleware('loginCheck');
Route::post('/ContactDetails', 'ContactController@getContactDetails')->middleware('loginCheck');
Route::post('/ContactDelete', 'ContactController@ContactDelete')->middleware('loginCheck');
Route::post('/ContactUpdate', 'ContactController@ContactUpdate')->middleware('loginCheck');
Route::post('/ContactAdd', 'ContactController@PCotactAdd')->middleware('loginCheck');


//Admin panel Review management
Route::get('/Reviews', 'ReviewController@ReviewIndex')->middleware('loginCheck');
Route::get('/getReviewsData', 'ReviewController@getReviewsData')->middleware('loginCheck');
Route::post('/ReviewDetails', 'ReviewController@getReciewDetails')->middleware('loginCheck');
Route::post('/ReviewDelete', 'ReviewController@ReciewDelete')->middleware('loginCheck');
Route::post('/ReviewUpdate', 'ReviewController@ReciewUpdate')->middleware('loginCheck');
Route::post('/ReviewAdd', 'ReviewController@ReciewAdd')->middleware('loginCheck');

//Admin panel Photo gallery management
Route::get('/Photo', 'PhotoController@PhotoIndex')->middleware('loginCheck');
Route::post('/PhotoUpload', 'PhotoController@PhotoUpload')->middleware('loginCheck');
Route::get('/PhotoJSON', 'PhotoController@PhotoJSON')->middleware('loginCheck');


//AdminPanel Login Management
Route::get('/Login', 'LoginController@Login');
Route::post('/onLogin', 'LoginController@onLogin');
Route::get('/Logout', 'LoginController@onLogout');


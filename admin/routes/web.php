<?php

use Illuminate\Support\Facades\Route;



Route::get('/', 'HomeController@homeIndex');

Route::get('/Visitor', 'VisitorController@VisitorIndex');

//adminpanel service management
Route::get('/Services', 'ServiceController@ServiceIndex');
Route::get('/getServicesData', 'ServiceController@getServicesData');
Route::post('/ServiceDetails', 'ServiceController@getServiceDetails');
Route::post('/ServiceDelete', 'ServiceController@ServiceDelete');
Route::post('/ServiceUpdate', 'ServiceController@ServiceUpdate');
Route::post('/ServiceAdd', 'ServiceController@ServiceAdd');



//admin panel Course management 
Route::get('/Courses', 'CoursesController@CoursesIndex');
Route::get('/getCoursesData', 'CoursesController@getCoursesData');
Route::post('/CourseDetails', 'CoursesController@getCourseDetails');
Route::post('/CourseDelete', 'CoursesController@CourseDelete');
Route::post('/CourseUpdate', 'CoursesController@CourseUpdate');
Route::post('/CourseAdd', 'CoursesController@CourseAdd');

//Admin panel Project management 
Route::get('/Projects', 'ProjectController@ProjectIndex');
Route::get('/getProjectsData', 'ProjectController@getProjectsData');
Route::post('/ProjectDetails', 'ProjectController@getProjectDetails');
Route::post('/ProjectDelete', 'ProjectController@ProjectDelete');
Route::post('/ProjectUpdate', 'ProjectController@ProjectUpdate');
Route::post('/ProjectAdd', 'ProjectController@ProjectAdd');


//Admin panel Contact management 
Route::get('/Contacts', 'ContactController@ContactIndex');
Route::get('/getContactsData', 'ContactController@getContactsData');
Route::post('/ContactDetails', 'ContactController@getContactDetails');
Route::post('/ContactDelete', 'ContactController@ContactDelete');
Route::post('/ContactUpdate', 'ContactController@ContactUpdate');
Route::post('/ContactAdd', 'ContactController@PCotactAdd');


//Admin panel Reciew management 
Route::get('/Reviews', 'ReviewController@ReviewIndex');
Route::get('/getReviewsData', 'ReviewController@getReviewsData');
Route::post('/ContactDetails', 'ReviewController@getReciewDetails');
Route::post('/ContactDelete', 'ReviewController@ReciewDelete');
Route::post('/ContactUpdate', 'ReviewController@ReciewUpdate');
Route::post('/ContactAdd', 'ReviewController@ReciewAdd');

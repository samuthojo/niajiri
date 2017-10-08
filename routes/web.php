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

Auth::routes();

Route::get('/', 'HomeController@index')->name("home");
Route::get('/dashboard', 'HomeController@index')->name("reports.dashboard");
Route::get('/my_applications', 'HomeController@applications')->name("my_applications");
Route::get('/open_positions', 'HomeController@positions')->name("open_positions");
Route::get('/minor', 'HomeController@minor')->name("minor");

//development only routes, should be commented on production
//Route::get('/artisan', 'SiteController@artisan')->name('artisan');

Route::resource('roles', 'RoleController');

Route::resource('users', 'UserController');
Route::get('/profile', 'UserController@profile')->name('profile');
Route::get('/users/{user}/change', 'UserController@showChangePassword')->name('users.change_password');
Route::patch('/users/{user}/change', 'UserController@changePassword')->name('users.change_password');


Route::resource('organizations', 'OrganizationController');

Route::resource('projects', 'ProjectController');

Route::resource('positions', 'PositionController');

Route::resource('sectors', 'SectorController');

Route::resource('organizations', 'OrganizationController');

Route::resource('positions', 'PositionController');

Route::resource('educations', 'EducationController');

//cv routes
Route::get('/basic', 'CVController@get_basic')->name("cvs.basic");
Route::post('/basic', 'CVController@post_basic')->name("cvs.basic");
Route::get('/education', 'CVController@get_education')->name("cvs.education");
Route::get('/certificates', 'CVController@get_certificates')->name("cvs.certificates");
Route::get('/experiences', 'CVController@get_experiences')->name("cvs.experiences");
Route::get('/languages', 'CVController@get_languages')->name("cvs.languages");
Route::get('/referees', 'CVController@get_referees')->name("cvs.referees");
Route::get('/achievements', 'CVController@get_achievements')->name("cvs.achievements");
Route::get('/assignments', 'CVController@get_assignments')->name("cvs.projects");
Route::get('/publications', 'CVController@get_publications')->name("cvs.publications");


//social auth routes
Route::get('/auth/social/provider/{name}', 'Auth\SocialAuthController@signIn')
	->name('auth.social.provider');
Route::get('/auth/social/callback/{name}', 'Auth\SocialAuthController@signInCallback')
	->name('auth.social.callback');
Route::get('/auth/social/existing-user', 'Auth\SocialAuthController@getCurrentUserSignIn')->name('auth.social.existing.user');
Route::post('/auth/social/existing-user', 'Auth\SocialAuthController@postCurrentUserSignin');

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

//Route::get('/', 'HomeController@index')->name("home");
Route::get('/', 'SiteController@index')->name("landing");
//Route::get('/landing', 'SiteController@index')->name("landing");
Route::get('/home', 'HomeController@index')->name("home");
Route::get('/dashboard', 'HomeController@index')->name("reports.dashboard");
Route::get('/minor', 'HomeController@minor')->name("minor");
Route::get('/states', 'HomeController@get_states')->name("states");

//development only routes, should be commented on production
//Route::get('/artisan', 'HomeController@artisan')->name('artisan');
Route::get('/mail_registered', 'HomeController@registered')->name('mail_registered');
Route::get('/mail_applied', 'HomeController@applied')->name('mail_applied');
Route::get('/mail_accepted', 'HomeController@accepted')->name('mail_accepted');
Route::get('/mail_rejected', 'HomeController@rejected')->name('mail_rejected');

Route::resource('roles', 'RoleController');

Route::get('users/export', 'UserController@export')->name('users.export');
Route::resource('users', 'UserController');
Route::get('/profile', 'UserController@profile')->name('profile');
Route::get('/users/{user}/change', 'UserController@showChangePassword')->name('users.change_password');
Route::patch('/users/{user}/change', 'UserController@changePassword')->name('users.change_password');

Route::resource('organizations', 'OrganizationController');

Route::resource('projects', 'ProjectController');
Route::patch('/projects/{project}/close', 'ProjectController@closeProject')->name('projects.close_project');
Route::get('open/{project}/positions', 'ProjectController@showOpenPosition')->name("projects.open_position");

Route::get('/open', 'PositionController@open')->name("positions.open");
Route::get('/positions/{position}/stages/create', 'PositionController@StageCreate')->name("positions.stages.create");
Route::post('/positions/{position}/stages', 'PositionController@StageStore')->name("positions.stages.store");
Route::get('/preview/{position}', 'PositionController@preview')->name("positions.preview");
Route::resource('positions', 'PositionController');

Route::resource('sectors', 'SectorController');

Route::resource('organizations', 'OrganizationController');

Route::resource('positions', 'PositionController');

Route::resource('stages', 'StageController');

// Route::get('/stages/{stage}/tests/create', 'StageController@TestCreate')->name("stages.tests.create");

// Route::post('/stages/{stage}/tests/store', 'StageController@TestStore')->name("stages.tests.store");

Route::resource('tests', 'TestController');

// Route::get('/tests/{test}/questions/create', 'TestController@QuestionCreate')->name("tests.questions.create");

// Route::post('/tests/{test}/questions', 'TestController@QuestionStore')->name("tests.questions.store");

Route::resource('questions', 'QuestionController');

Route::resource('educations', 'EducationController');
Route::resource('certificates', 'CertificateController');
Route::resource('experiences', 'ExperienceController');
Route::resource('languages', 'LanguageController');
Route::resource('referees', 'RefereeController');
Route::resource('achievements', 'AchievementController');
Route::resource('assignments', 'AssignmentController');
Route::resource('publications', 'PublicationController');
Route::resource('stagetests', 'StageTestController');
Route::resource('applications', 'ApplicationController');
Route::get('/application/{application}', 'ApplicationController@application')->name('applications.application');
Route::get('/advance', 'ApplicationController@advance')->name('applications.advance');
Route::patch('/advance', 'ApplicationController@advance')->name('applications.advance');
Route::get('/applied', 'ApplicationController@applied')->name('applications.applied');
Route::get('applicationstages/export', 'ApplicationStageController@export')->name('applicationstages.export');
Route::resource('applicationstages', 'ApplicationStageController');

//cv routes
Route::get('/basic', 'UserController@get_basic')->name("users.basic");
Route::patch('/basic', 'UserController@post_basic')->name("users.basic");
Route::patch('/edits/{applicant?}', 'UserController@post_edits')->name("users.edits");
Route::get('/resume/{applicant?}', 'UserController@get_resume')->name("users.resume");
Route::get('/cv/{applicant?}', 'UserController@get_cv')->name("users.cv");

//social auth routes
Route::get('/auth/social/provider/{name}', 'Auth\SocialAuthController@signIn')
    ->name('auth.social.provider');
Route::get('/auth/social/callback/{name}', 'Auth\SocialAuthController@signInCallback')
    ->name('auth.social.callback');
Route::get('/auth/social/existing-user', 'Auth\SocialAuthController@getCurrentUserSignIn')->name('auth.social.existing.user');
Route::post('/auth/social/existing-user', 'Auth\SocialAuthController@postCurrentUserSignin');

<?php

/*
|--------------------------------------------------------------------------
| Application Breadcrumbs
|--------------------------------------------------------------------------
|
| Here is where you can register breadcrumbs for your application
 */


//-------------------------------------------------------------------------
//Static Routes
//-------------------------------------------------------------------------


//Home
Breadcrumbs::register('home', function ($breadcrumbs) {
    $breadcrumbs->push('Home', route('home'));
});

Breadcrumbs::register('profile', function ($breadcrumbs) {
    $breadcrumbs->push('Profile', route('profile'));
});

Breadcrumbs::register('open_positions', function ($breadcrumbs) {
    $breadcrumbs->push('Open Jobs/Positions', route('open_positions'));
});

Breadcrumbs::register('my_applications', function ($breadcrumbs) {
    $breadcrumbs->push('My Applications', route('my_applications'));
});



//-------------------------------------------------------------------------
//My CV Routes
//-------------------------------------------------------------------------

Breadcrumbs::register('cvs.basic', function ($breadcrumbs) {
    $breadcrumbs->push('Basic Details', route('cvs.basic'));
});

Breadcrumbs::register('cvs.education', function ($breadcrumbs) {
    $breadcrumbs->push('Education Details', route('cvs.education'));
});

Breadcrumbs::register('cvs.certificates', function ($breadcrumbs) {
    $breadcrumbs->push('Proffessional Certificates', route('cvs.certificates'));
});

Breadcrumbs::register('cvs.experiences', function ($breadcrumbs) {
    $breadcrumbs->push('Work Experiences', route('cvs.experiences'));
});

Breadcrumbs::register('cvs.languages', function ($breadcrumbs) {
    $breadcrumbs->push('Languages', route('cvs.languages'));
});

Breadcrumbs::register('cvs.referees', function ($breadcrumbs) {
    $breadcrumbs->push('Referees', route('cvs.referees'));
});

Breadcrumbs::register('cvs.achievements', function ($breadcrumbs) {
    $breadcrumbs->push('Honors/Awards', route('cvs.achievements'));
});

Breadcrumbs::register('cvs.projects', function ($breadcrumbs) {
    $breadcrumbs->push('Projects', route('cvs.projects'));
});

Breadcrumbs::register('cvs.publications', function ($breadcrumbs) {
    $breadcrumbs->push('Publications', route('cvs.publications'));
});



//-------------------------------------------------------------------------
//Reports Routes
//-------------------------------------------------------------------------


//Dashboard
Breadcrumbs::register('dashboard', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Dashboard', route('reports.dashboard'));
});


//---------------------------------------------------------------------
//Resources Routes
//---------------------------------------------------------------------


// ---------------------Users Breadcrumbs-----------------------------------
// Home > Users
Breadcrumbs::register('users.index', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Users', route('users.index'));
});

// Home > Users > Create User
Breadcrumbs::register('users.create', function ($breadcrumbs) {
    $breadcrumbs->parent('users.index');
    $breadcrumbs->push('Create User', route('users.create'));
});

// Home > Users > [User Name]
Breadcrumbs::register('users.show', function ($breadcrumbs, $instance) {
    $breadcrumbs->parent('users.index');
    $breadcrumbs->push($instance->name, route('users.show', $instance->id));
});

// Home > Users > [User Name] > Edit
Breadcrumbs::register('users.edit', function ($breadcrumbs, $instance) {
    $breadcrumbs->parent('users.show', $instance);
    $breadcrumbs->push('Edit', route('users.edit', $instance->id));
});

// Home > Users > [User Name] > Change User Password
Breadcrumbs::register('users.change_password', function ($breadcrumbs, $instance) {
    $breadcrumbs->parent('users.show', $instance);
    $breadcrumbs->push('Change Password', route('users.change_password', $instance->id));
});


// -------------------Roles Breadcrumbs--------------------------------------
// Home > Roles
Breadcrumbs::register('roles.index', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Roles', route('roles.index'));
});

// Home > Roles > Create Role
Breadcrumbs::register('roles.create', function ($breadcrumbs) {
    $breadcrumbs->parent('roles.index');
    $breadcrumbs->push('Create Role', route('roles.create'));
});

// Home > Roles > [Role Name]
Breadcrumbs::register('roles.show', function ($breadcrumbs, $instance) {
    $breadcrumbs->parent('roles.index');
    $breadcrumbs->push($instance->name, route('roles.show', $instance->id));
});

// Home > Roles > [Role Name] > Edit
Breadcrumbs::register('roles.edit', function ($breadcrumbs, $instance) {
    $breadcrumbs->parent('roles.show', $instance);
    $breadcrumbs->push('Edit', route('roles.edit', $instance->id));
});
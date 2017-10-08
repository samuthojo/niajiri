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


// -------------------Educations Breadcrumbs--------------------------------------
// Home > Educations
Breadcrumbs::register('educations.index', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Educations', route('educations.index'));
});

// Home > Educations > Create Education
Breadcrumbs::register('educations.create', function ($breadcrumbs) {
    $breadcrumbs->parent('educations.index');
    $breadcrumbs->push('Create Education', route('educations.create'));
});

// Home > Educations > [Education Title]
Breadcrumbs::register('educations.show', function ($breadcrumbs, $instance) {
    $breadcrumbs->parent('educations.index');
    $breadcrumbs->push($instance->level, route('educations.show', $instance->id));
});

// Home > Educations > [Education Title] > Edit
Breadcrumbs::register('educations.edit', function ($breadcrumbs, $instance) {
    $breadcrumbs->parent('educations.show', $instance);
    $breadcrumbs->push('Edit', route('educations.edit', $instance->id));
});

// -------------------Certificates Breadcrumbs--------------------------------------
// Home > Certificates
Breadcrumbs::register('certificates.index', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Certificates', route('certificates.index'));
});

// Home > Certificates > Create Certificate
Breadcrumbs::register('certificates.create', function ($breadcrumbs) {
    $breadcrumbs->parent('certificates.index');
    $breadcrumbs->push('Create Certificate', route('certificates.create'));
});

// Home > Certificates > [Certificate Title]
Breadcrumbs::register('certificates.show', function ($breadcrumbs, $instance) {
    $breadcrumbs->parent('certificates.index');
    $breadcrumbs->push($instance->title, route('certificates.show', $instance->id));
});

// Home > Certificates > [Certificate Title] > Edit
Breadcrumbs::register('certificates.edit', function ($breadcrumbs, $instance) {
    $breadcrumbs->parent('certificates.show', $instance);
    $breadcrumbs->push('Edit', route('certificates.edit', $instance->id));
});


// -------------------Experiences Breadcrumbs--------------------------------------
// Home > Experiences
Breadcrumbs::register('experiences.index', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Experiences', route('experiences.index'));
});

// Home > Experiences > Create Experience
Breadcrumbs::register('experiences.create', function ($breadcrumbs) {
    $breadcrumbs->parent('experiences.index');
    $breadcrumbs->push('Create Experience', route('experiences.create'));
});

// Home > Experiences > [Experience Title]
Breadcrumbs::register('experiences.show', function ($breadcrumbs, $instance) {
    $breadcrumbs->parent('experiences.index');
    $breadcrumbs->push($instance->position, route('experiences.show', $instance->id));
});

// Home > Experiences > [Experience Title] > Edit
Breadcrumbs::register('experiences.edit', function ($breadcrumbs, $instance) {
    $breadcrumbs->parent('experiences.show', $instance);
    $breadcrumbs->push('Edit', route('experiences.edit', $instance->id));
});
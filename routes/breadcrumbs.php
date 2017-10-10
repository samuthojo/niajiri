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

Breadcrumbs::register('open', function ($breadcrumbs) {
    $breadcrumbs->push('Open Jobs/Positions', route('positions.open'));
});

Breadcrumbs::register('my_applications', function ($breadcrumbs) {
    $breadcrumbs->push('My Applications', route('my_applications'));
});



//-------------------------------------------------------------------------
//My CV Routes
//-------------------------------------------------------------------------

Breadcrumbs::register('users.basic', function ($breadcrumbs) {
    $breadcrumbs->push('Basic Details', route('users.basic'));
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


// -------------------Languages Breadcrumbs--------------------------------------
// Home > Languages
Breadcrumbs::register('languages.index', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Languages', route('languages.index'));
});

// Home > Languages > Create Language
Breadcrumbs::register('languages.create', function ($breadcrumbs) {
    $breadcrumbs->parent('languages.index');
    $breadcrumbs->push('Create Language', route('languages.create'));
});

// Home > Languages > [Language Title]
Breadcrumbs::register('languages.show', function ($breadcrumbs, $instance) {
    $breadcrumbs->parent('languages.index');
    $breadcrumbs->push($instance->name, route('languages.show', $instance->id));
});

// Home > Languages > [Language Title] > Edit
Breadcrumbs::register('languages.edit', function ($breadcrumbs, $instance) {
    $breadcrumbs->parent('languages.show', $instance);
    $breadcrumbs->push('Edit', route('languages.edit', $instance->id));
});


// -------------------Referees Breadcrumbs--------------------------------------
// Home > Referees
Breadcrumbs::register('referees.index', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Referees', route('referees.index'));
});

// Home > Referees > Create Referee
Breadcrumbs::register('referees.create', function ($breadcrumbs) {
    $breadcrumbs->parent('referees.index');
    $breadcrumbs->push('Create Referee', route('referees.create'));
});

// Home > Referees > [Referee Title]
Breadcrumbs::register('referees.show', function ($breadcrumbs, $instance) {
    $breadcrumbs->parent('referees.index');
    $breadcrumbs->push($instance->name, route('referees.show', $instance->id));
});

// Home > Referees > [Referee Title] > Edit
Breadcrumbs::register('referees.edit', function ($breadcrumbs, $instance) {
    $breadcrumbs->parent('referees.show', $instance);
    $breadcrumbs->push('Edit', route('referees.edit', $instance->id));
});


// -------------------Achievements Breadcrumbs--------------------------------------
// Home > Achievements
Breadcrumbs::register('achievements.index', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Achievements', route('achievements.index'));
});

// Home > Achievements > Create Achievement
Breadcrumbs::register('achievements.create', function ($breadcrumbs) {
    $breadcrumbs->parent('achievements.index');
    $breadcrumbs->push('Create Achievement', route('achievements.create'));
});

// Home > Achievements > [Achievement Title]
Breadcrumbs::register('achievements.show', function ($breadcrumbs, $instance) {
    $breadcrumbs->parent('achievements.index');
    $breadcrumbs->push($instance->title, route('achievements.show', $instance->id));
});

// Home > Achievements > [Achievement Title] > Edit
Breadcrumbs::register('achievements.edit', function ($breadcrumbs, $instance) {
    $breadcrumbs->parent('achievements.show', $instance);
    $breadcrumbs->push('Edit', route('achievements.edit', $instance->id));
});


// -------------------Assignments Breadcrumbs--------------------------------------
// Home > Assignments
Breadcrumbs::register('assignments.index', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Assignments', route('assignments.index'));
});

// Home > Assignments > Create Assignment
Breadcrumbs::register('assignments.create', function ($breadcrumbs) {
    $breadcrumbs->parent('assignments.index');
    $breadcrumbs->push('Create Assignment', route('assignments.create'));
});

// Home > Assignments > [Assignment Title]
Breadcrumbs::register('assignments.show', function ($breadcrumbs, $instance) {
    $breadcrumbs->parent('assignments.index');
    $breadcrumbs->push($instance->title, route('assignments.show', $instance->id));
});

// Home > Assignments > [Assignment Title] > Edit
Breadcrumbs::register('assignments.edit', function ($breadcrumbs, $instance) {
    $breadcrumbs->parent('assignments.show', $instance);
    $breadcrumbs->push('Edit', route('assignments.edit', $instance->id));
});


// -------------------Publications Breadcrumbs--------------------------------------
// Home > Publications
Breadcrumbs::register('publications.index', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Publications', route('publications.index'));
});

// Home > Publications > Create Publication
Breadcrumbs::register('publications.create', function ($breadcrumbs) {
    $breadcrumbs->parent('publications.index');
    $breadcrumbs->push('Create Publication', route('publications.create'));
});

// Home > Publications > [Publication Title]
Breadcrumbs::register('publications.show', function ($breadcrumbs, $instance) {
    $breadcrumbs->parent('publications.index');
    $breadcrumbs->push($instance->title, route('publications.show', $instance->id));
});

// Home > Publications > [Publication Title] > Edit
Breadcrumbs::register('publications.edit', function ($breadcrumbs, $instance) {
    $breadcrumbs->parent('publications.show', $instance);
    $breadcrumbs->push('Edit', route('publications.edit', $instance->id));
});


// ---------------------Organization Breadcrumbs-----------------------------------
// Home > Users
Breadcrumbs::register('organizations.index', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Organizations', route('organizations.index'));
});

// Home > Users > Create User
Breadcrumbs::register('organizations.create', function ($breadcrumbs) {
    $breadcrumbs->parent('organizations.index');
    $breadcrumbs->push('Create organization', route('organizations.create'));
});

// Home > Users > [User Name]
Breadcrumbs::register('organizations.show', function ($breadcrumbs, $instance) {
    $breadcrumbs->parent('organizations.index');
    $breadcrumbs->push($instance->name, route('organizations.show', $instance->id));
});

// Home > Users > [User Name] > Edit
Breadcrumbs::register('organizations.edit', function ($breadcrumbs, $instance) {
    $breadcrumbs->parent('organizations.show', $instance);
    $breadcrumbs->push('Edit', route('organizations.edit', $instance->id));
});

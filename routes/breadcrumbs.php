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

Breadcrumbs::register('positions.open', function ($breadcrumbs) {
	$breadcrumbs->push('Open Positions', route('positions.open'));
});

Breadcrumbs::register('positions.preview', function ($breadcrumbs, $instance) {
	$breadcrumbs->parent('positions.open');
	$breadcrumbs->push($instance->title, route('positions.preview', $instance->id));
});

Breadcrumbs::register('applications.applied', function ($breadcrumbs) {
	$breadcrumbs->push('My Applications', route('applications.applied'));
});

Breadcrumbs::register('applications.application', function ($breadcrumbs, $instance) {
	$breadcrumbs->parent('applications.applied');
	$breadcrumbs->push($instance->position->title . ' at ' . $instance->organization->name, route('applications.applied', $instance->id));
});

Breadcrumbs::register('applications.create', function ($breadcrumbs, $instance) {
	$breadcrumbs->parent('positions.open');
	$breadcrumbs->push($instance->title, route('applications.create', $instance->id));
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
	$breadcrumbs->push($instance->name !== null ? $instance->name : $instance->email , route('users.show', $instance->id));
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

//User Basic Details
Breadcrumbs::register('users.basic', function ($breadcrumbs) {
	$breadcrumbs->push('Basic Details', route('users.basic'));
});

//User Resume
Breadcrumbs::register('users.resume', function ($breadcrumbs, $instance) {
	$breadcrumbs->push($instance->fullName() . ' - Resume', route('users.resume', $instance->id));
});

//User CV
Breadcrumbs::register('users.cv', function ($breadcrumbs, $instance) {
	$breadcrumbs->push($instance->fullName() . ' - CV', route('users.cv', $instance->id));
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
	$breadcrumbs->push('Education Levels', route('educations.index'));
});

// Home > Educations > Create Education
Breadcrumbs::register('educations.create', function ($breadcrumbs) {
	$breadcrumbs->parent('educations.index');
	$breadcrumbs->push('Create Education Level', route('educations.create'));
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
	$breadcrumbs->push('Honors/Awards', route('achievements.index'));
});

// Home > Achievements > Create Achievement
Breadcrumbs::register('achievements.create', function ($breadcrumbs) {
	$breadcrumbs->parent('achievements.index');
	$breadcrumbs->push('Create Honor/Award', route('achievements.create'));
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
// Home > Organizations
Breadcrumbs::register('organizations.index', function ($breadcrumbs) {
	$breadcrumbs->parent('home');
	$breadcrumbs->push('Organizations', route('organizations.index'));
});

// Home > Organizations > Create Organization
Breadcrumbs::register('organizations.create', function ($breadcrumbs) {
	$breadcrumbs->parent('organizations.index');
	$breadcrumbs->push('Create organization', route('organizations.create'));
});

// Home > Organizations > [Organization Name]
Breadcrumbs::register('organizations.show', function ($breadcrumbs, $instance) {
	$breadcrumbs->parent('organizations.index');
	$breadcrumbs->push($instance->name, route('organizations.show', $instance->id));
});

// Home > Organizations > [Organization Name] > Edit
Breadcrumbs::register('organizations.edit', function ($breadcrumbs, $instance) {
	$breadcrumbs->parent('organizations.show', $instance);
	$breadcrumbs->push('Edit', route('organizations.edit', $instance->id));
});

// -------------------Positions Breadcrumbs--------------------------------------
// Home > Positions
Breadcrumbs::register('positions.index', function ($breadcrumbs) {
	$breadcrumbs->parent('home');
	$breadcrumbs->push('Positions', route('positions.index'));
});

// Home > Positions > Create Position
Breadcrumbs::register('positions.create', function ($breadcrumbs) {
	$breadcrumbs->parent('positions.index');
	$breadcrumbs->push('Create Position', route('positions.create'));
});

// Home > project > [Position Title]
Breadcrumbs::register('positions.show', function ($breadcrumbs, $instance) {
	$breadcrumbs->push($instance->project->name, route('projects.show', $instance->project_id));
	$breadcrumbs->push($instance->title, route('positions.show', $instance->id));
});

// Home > Positions > [Position Title] > Create Stage
Breadcrumbs::register('positions.stages.create', function ($breadcrumbs, $instance) {
	$breadcrumbs->parent('positions.show', $instance);
	$breadcrumbs->push('Create Stage', route('positions.stages.create', $instance->id));
});

// Home > Positions > [Position Title] > Edit
Breadcrumbs::register('positions.edit', function ($breadcrumbs, $instance) {
	$breadcrumbs->parent('positions.show', $instance);
	$breadcrumbs->push('Edit', route('positions.edit', $instance->id));
});

// -------------------Projects Breadcrumbs--------------------------------------
// Home > Projects
Breadcrumbs::register('projects.index', function ($breadcrumbs) {
	$breadcrumbs->parent('home');
	$breadcrumbs->push('Projects', route('projects.index'));
});

// Home > Projects > Create Project
Breadcrumbs::register('projects.create', function ($breadcrumbs) {
	$breadcrumbs->parent('projects.index');
	$breadcrumbs->push('Create Project', route('projects.create'));
});

// Home > Projects > [Project Title]
Breadcrumbs::register('projects.show', function ($breadcrumbs, $instance) {
	$breadcrumbs->push($instance->organization->name, route('organizations.show', $instance->organization_id));
	$breadcrumbs->push($instance->name, route('projects.show', $instance->id));
});

// Home > Projects > [Project Title] > Edit
Breadcrumbs::register('projects.edit', function ($breadcrumbs, $instance) {
	$breadcrumbs->parent('projects.show', $instance);
	$breadcrumbs->push('Edit', route('projects.edit', $instance->id));
});

Breadcrumbs::register('projects.open_position', function ($breadcrumbs, $instance) {
	$breadcrumbs->push('Open Positions', route('projects.open_position', $instance->id));
});

// -------------------Sectors Breadcrumbs--------------------------------------
// Home > Sectors
Breadcrumbs::register('sectors.index', function ($breadcrumbs) {
	$breadcrumbs->parent('home');
	$breadcrumbs->push('Sectors', route('sectors.index'));
});

// Home > Sectors > Create Sector
Breadcrumbs::register('sectors.create', function ($breadcrumbs) {
	$breadcrumbs->parent('sectors.index');
	$breadcrumbs->push('Create Sector', route('sectors.create'));
});

// Home > Sectors > [Sector Title]
Breadcrumbs::register('sectors.show', function ($breadcrumbs, $instance) {
	$breadcrumbs->parent('sectors.index');
	$breadcrumbs->push($instance->name, route('sectors.show', $instance->id));
});

// Home > Sectors > [Sector Title] > Edit
Breadcrumbs::register('sectors.edit', function ($breadcrumbs, $instance) {
	$breadcrumbs->parent('sectors.show', $instance);
	$breadcrumbs->push('Edit', route('sectors.edit', $instance->id));
});

// -------------------Stages Breadcrumbs--------------------------------------
// Home > Stages
Breadcrumbs::register('stages.index', function ($breadcrumbs) {
	$breadcrumbs->parent('home');
	$breadcrumbs->push('Stages', route('stages.index'));
});

// Home > Stages > Create Stage
Breadcrumbs::register('stages.create', function ($breadcrumbs) {
	$breadcrumbs->parent('stages.index');
	$breadcrumbs->push('Create Stage', route('stages.create'));
});

// Home > Stages > [Stage Title]
Breadcrumbs::register('stages.show', function ($breadcrumbs, $instance) {
	$breadcrumbs->push($instance->position->title, route('positions.show', $instance->position_id));
	$breadcrumbs->push($instance->name, route('stages.show', $instance->id));
});

// Home > Stages > [Stage Title] > Edit
Breadcrumbs::register('stages.edit', function ($breadcrumbs, $instance) {
	$breadcrumbs->parent('stages.show', $instance);
	$breadcrumbs->push('Edit', route('stages.edit', $instance->id));
});

// Home > Stages > Create Stage
Breadcrumbs::register('stages.tests.create', function ($breadcrumbs, $instance) {
	$breadcrumbs->parent('stages.show', $instance);
	$breadcrumbs->push('Test Create', route('stages.create'));
});

// -------------------ApplicationStages Breadcrumbs--------------------------------------
// Home > Application Stages
Breadcrumbs::register('applicationstages.index', function ($breadcrumbs, $instance) {
	$breadcrumbs->parent('positions.show', $instance->position);
	$breadcrumbs->push($instance->name, route('applicationstages.index', ['position_id' => $instance->position_id, 'stage_id' => $instance->id]));
});

// Home > Application Stages > Create ApplicationStage
Breadcrumbs::register('applicationstages.create', function ($breadcrumbs, $instance) {
	$breadcrumbs->parent('applicationstages.index', $instance);
	$breadcrumbs->push('Create Application Stage', route('applicationstages.create'));
});

// Home > Application Stages > [ApplicationStage Name]
Breadcrumbs::register('applicationstages.show', function ($breadcrumbs, $instance) {
	$breadcrumbs->parent('applicationstages.index', $instance->stage);
	$breadcrumbs->push($instance->applicant->fullName(), route('applicationstages.show', $instance->id));
});

// Home > Application Stages > [ApplicationStage Name] > Edit
Breadcrumbs::register('applicationstages.edit', function ($breadcrumbs, $instance) {
	$breadcrumbs->parent('applicationstages.show', $instance->stage);
	$breadcrumbs->push($instance->applicant->fullName(), route('applicationstages.edit', $instance->id));
});

// -------------------StageTests Breadcrumbs--------------------------------------
// Home > Application Stages
Breadcrumbs::register('stagetests.index', function ($breadcrumbs, $instance) {
	$breadcrumbs->parent('home');
	$breadcrumbs->push($instance->stage->name, route('stagetests.index', ['position_id' => $instance->position_id, 'stage_id' => $instance->id]));
});

// Home > Application Stages > Create StageTest
Breadcrumbs::register('stagetests.create', function ($breadcrumbs, $instance) {
	$breadcrumbs->parent('stagetests.index', $instance);
	$breadcrumbs->push('Create Stage Test', route('stagetests.create'));
});

// Home > Application Stages > [StageTest Name]
Breadcrumbs::register('stagetests.show', function ($breadcrumbs, $instance) {
	$breadcrumbs->parent('stagetests.index', $instance->stage);
	$breadcrumbs->push($instance->stage->name, route('stagetests.show', $instance->id));
});

// Home > Application Stages > [StageTest Name] > Edit
Breadcrumbs::register('stagetests.edit', function ($breadcrumbs, $instance) {
	$breadcrumbs->parent('stagetests.show', $instance->stage);
	$breadcrumbs->push($instance->stage->name, route('stagetests.edit', $instance->id));
});

// -------------------Tests Breadcrumbs--------------------------------------
// Home > Tests
Breadcrumbs::register('tests.index', function ($breadcrumbs, $instance) {
	if ($instance && $instance->position) {
		$breadcrumbs->parent('positions.show', $instance->position);
		$breadcrumbs->push($instance->name, route('tests.index', ['position_id' => $instance->position_id, 'stage_id' => $instance->id]));
	} else {
		$breadcrumbs->parent('home');
		$breadcrumbs->push('Test', route('tests.index'));
	}
});

// Home > Tests > Create Test
Breadcrumbs::register('tests.create', function ($breadcrumbs, $instance) {
	$breadcrumbs->parent('tests.index', $instance);
	$breadcrumbs->push('Create Test', route('tests.create'));
});

// Home > Tests > [Test Name]
Breadcrumbs::register('tests.show', function ($breadcrumbs, $instance) {
	$breadcrumbs->parent('tests.index', $instance->stage);
	// $breadcrumbs->parent('positions.show', $instance->position);
	$breadcrumbs->push($instance->category, route('tests.show', $instance->id));
});

// Home > Tests > [Test Name] > Edit
Breadcrumbs::register('tests.edit', function ($breadcrumbs, $instance) {
	$breadcrumbs->parent('tests.show', $instance->stage);
	$breadcrumbs->push($instance->category, route('tests.edit', $instance->id));
});

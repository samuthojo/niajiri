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


//---------------------------------------------------------------------
//Resources Routes
//---------------------------------------------------------------------
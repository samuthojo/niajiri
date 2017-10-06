/**
 * First we will load all project's JavaScript dependencies
 */
require('./bootstrap');

/**
 * Require theme
 */
require('./theme');


//Next initialize jQuery and its plugins
$(document).ready(function($) {

    //setup jquery ajax to use csrf token
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    //kick-in resource delete
    require('./plugins/delete');

    //autosize textarea based on content
    autosize($('textarea'));

});

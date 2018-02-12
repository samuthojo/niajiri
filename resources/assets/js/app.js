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

    //allow form to add hidden fields
    jQuery.fn.hidden = function (name, value) {
        return this.each(function () {
            var input = $('<input>').attr('type', 'hidden').attr('name', name).val(value);
            $(this).append($(input));
        });
    };

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

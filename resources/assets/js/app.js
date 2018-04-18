/**
 * First we will load all project's JavaScript dependencies
 */
require('./bootstrap');

/**
 * Require theme
 */
require('./theme');


//Next initialize jQuery and its plugins

Vue.component('basic', require('./cv/components/Basic.vue'));
Vue.component('certificate', require('./cv/components/Certificate.vue'));
Vue.component('education', require('./cv/components/Education.vue'));
Vue.component('honor', require('./cv/components/Honor.vue'));
Vue.component('referee', require('./cv/components/Referee.vue'));
Vue.component('intern', require('./cv/components/Intern.vue'));
Vue.component('language', require('./cv/components/Language.vue'));
Vue.component('skills', require('./cv/components/Skills.vue'));
Vue.component('extra-curriculum', require('./cv/components/ExtraCurriculum.vue'));

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




window._ = require('lodash');

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

 try {
     window.$ = window.jQuery = require('jquery');

     require('bootstrap-sass');
 } catch (e) {}

/**
 * We'll load jQuery plugins
 */
require('metismenu');
require('bootstrap-datepicker');
require('bootstrap-filestyle');
require('countdowntimer/dist/js/jQuery.countdownTimer.js');
window.autosize = window.autosize ? window.autosize : require('autosize');

window.Vue = require('vue');

window.axios = require('axios');

let token = document.head.querySelector('meta[name="csrf-token"]');

if(token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

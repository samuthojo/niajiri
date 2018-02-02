window._ = require('lodash');

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

window.$ = window.jQuery = require('jquery');
require('bootstrap-sass');

/**
 * We'll load jQuery plugins
 */
require('metismenu');
require('bootstrap-datepicker');
require('bootstrap-filestyle');
require('countdowntimer/dist/js/jQuery.countdownTimer.js');
window.autosize = window.autosize ? window.autosize : require('autosize');

/**
 * First we will load all project's JavaScript dependencies
 */
require('./bootstrap');

/**
 * VueSnotify notification plugin
 */
import Snotify, { SnotifyPosition } from 'vue-snotify';

const options = {
  toast: {
    position: SnotifyPosition.rightTop
  }
}

Vue.use(Snotify, options);

/**
 * Require theme
 */
require('./theme');

/**
 * Filters
 */
 Vue.filter('isoDate', function(date) {

   if(!date) return '';

   date = _.split(date.toString(), ' ')[0];

   return date;

 });

 Vue.filter('shortDate', function(date) {

   if(!date) return '';

   if(date.indexOf(' ') == -1) {
     return date;
   }
   else {
     date = _.split(date.toString(), ' ')[0];
     date = _.split(date, '-');
     let month = date[1];
     let year = date[0];
     return month + "-"  + year;
   }

 });

 /**
  * Components
  */
Vue.component('cv-placeholder', require('./cv/components/CvPlaceholder.vue'));
Vue.component('cv-avatar', require('./cv/components/CvAvatar.vue'));
Vue.component('basic', require('./cv/components/Basic.vue'));
Vue.component('cv-confirm', require('./cv/components/CvConfirm.vue'));
Vue.component('cv-notification', require('./cv/components/CvNotification.vue'));
Vue.component('experience-item', require('./cv/components/ExperienceItem.vue'));
Vue.component('intern', require('./cv/components/Intern.vue'));
Vue.component('cv-attachment', require('./cv/components/CvAttachment.vue'));
Vue.component('honor-item', require('./cv/components/HonorItem.vue'));
Vue.component('honor', require('./cv/components/Honor.vue'));
Vue.component('education-item', require('./cv/components/EducationItem.vue'));
Vue.component('education', require('./cv/components/Education.vue'));
Vue.component('language-item', require('./cv/components/LanguageItem.vue'));
Vue.component('language', require('./cv/components/Language.vue'));
Vue.component('certificate-item', require('./cv/components/CertificateItem.vue'));
Vue.component('certificate', require('./cv/components/Certificate.vue'));
Vue.component('referee-item', require('./cv/components/RefereeItem.vue'));
Vue.component('referee', require('./cv/components/Referee.vue'));
Vue.component('skill-form', require('./cv/components/SkillForm.vue'));
Vue.component('skills', require('./cv/components/Skills.vue'));
Vue.component('extra-curriculum-form', require('./cv/components/ExtraCurriculumForm.vue'));
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

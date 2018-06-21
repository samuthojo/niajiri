<template>

<div> <!--To serve as root element-->

    <div class="row m-b-lg"><!--start of title-->

      <div class="col-md-12 cv-sub-title clearfix flex flex-vertical-center flex-horizontal-center">

        <div class="col-md-12">

          <h5>EDUCATION</h5>

        </div>

      </div>

    </div><!--end of title-->

      <template v-if="userEducations.length == 0">
        <education-item
          :applicant-id="user.id"
          :institutions="institutions"
          :qualifications="qualifications"
          :is-empty-template="false"
          :show-delete-action="false"
          :show-add-action="emptyTemplates.length == 0"
          @add-empty-template="addEmptyTemplate"
          @education-added="onEducationAdded"></education-item>
      </template>

      <!--start of education list-->
        <template v-else>
          <education-item v-for="(education, n) in userEducations"
            :key="education.id"
            :index="n"
            :education="education"
            :institutions="institutions"
            :qualifications="qualifications"
            :applicant-id="user.id"
            :is-empty-template="false"
            :show-delete-action="true"
            :show-add-action="n == userEducations.length - 1 && emptyTemplates.length == 0"
            @education-added="onEducationAdded"
            @education-updated="onEducationUpdated"
            @education-deleted="onEducationDeleted"
            @add-empty-template="addEmptyTemplate">
          </education-item>
       </template>
      <!--end of education list-->

      <template v-if="emptyTemplates.length > 0">
        <education-item
          v-for="(emptyTemplate, n) in emptyTemplates"
          :key="emptyTemplate"
          :id="'empty' + emptyTemplate"
          :applicant-id="user.id"
          :institutions="institutions"
          :qualifications="qualifications"
          :is-empty-template="true"
          :show-delete-action="false"
          :show-add-action="n == emptyTemplates.length - 1"
          @add-empty-template="addEmptyTemplate"
          @cancel-empty-template="cancelEmptyTemplate"
          @education-added="onEducationAdded"></education-item>
      </template>

</div>
</template>

<script>
export default {
  props: {
    user: Object,
    educations: Array,
    institutions: Array,
    qualifications: Array
  },
  data() {
    return {
      counter: 0,
      userEducations: [],
      emptyTemplates: []
    }
  },
  created() {
    if(this.educations)
      this.userEducations = this.educations;
  },
  methods: {
    onEducationAdded(education) {
      this.userEducations.push(education);
      if(this.emptyTemplates.length >= 1) {
          this.emptyTemplates.pop();
          this.counter = this.emptyTemplates.length;
      }
    },

    onEducationUpdated(result) {
      this.userEducations.splice(result.index, 1, result.education);
    },

    onEducationDeleted(index) {
      this.userEducations.splice(index, 1);
    },

    addEmptyTemplate() {
      this.counter = this.counter + 1;
      this.emptyTemplates.push(this.counter);
      $('html, body').css({
          WebkitTransition : 'all 2s ease-in-out',
          MozTransition    : 'all 2s ease-in-out',
          MsTransition     : 'all 2s ease-in-out',
          OTransition      : 'all 2s ease-in-out',
          transition       : 'all 2s ease-in-out'
      });
      $('html, body').animate({
        scrollTop: window.scrollTo(0, window.pageYOffset + 240)
      }, 2000);
    },

    cancelEmptyTemplate() {
      this.emptyTemplates.pop();
      this.counter = this.emptyTemplates.length;
      $('html, body').css({
          WebkitTransition : 'all 2s ease-in-out',
          MozTransition    : 'all 2s ease-in-out',
          MsTransition     : 'all 2s ease-in-out',
          OTransition      : 'all 2s ease-in-out',
          transition       : 'all 2s ease-in-out'
      });
      $('html, body').animate({
        scrollTop: window.scrollTo(0, window.pageYOffset - 240)
      }, 2000);
    }

  //End of methods
  }
}
</script>

<style>
</style>

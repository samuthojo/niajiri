<template>

<div> <!--To serve as root element-->

    <div class="row m-b-lg"><!--start of title-->

      <div class="col-md-12 cv-sub-title clearfix flex flex-vertical-center flex-horizontal-center">

        <div class="col-md-10">

          <h5>FIELD ATTACHMENT/WORK EXPERIENCE</h5>

        </div>

      </div>

    </div><!--end of title-->

      <template v-if="workExperiences.length == 0">
        <experience-item
          :applicant-id="user.id"
          :is-empty-template="false"
          :show-delete-action="false"
          :show-add-action="emptyTemplates.length == 0"
          @add-empty-template="addEmptyTemplate"
          @experience-added="onExperienceAdded"></experience-item>
      </template>

      <!--start of experience list-->
        <template v-else>
          <experience-item v-for="(experience, n) in workExperiences"
            :key="experience.id"
            :experience="experience"
            :index="n"
            :applicant-id="user.id"
            :is-empty-template="false"
            :show-delete-action="true"
            :show-add-action="n == workExperiences.length - 1 && emptyTemplates.length == 0"
            @experience-added="onExperienceAdded"
            @experience-updated="onExperienceUpdated"
            @experience-deleted="onExperienceDeleted"
            @add-empty-template="addEmptyTemplate">
          </experience-item>
       </template>
      <!--end of experiences list-->

      <template v-if="emptyTemplates.length > 0">
        <experience-item
          v-for="(emptyTemplate, n) in emptyTemplates"
          :key="emptyTemplate"
          :id="'empty' + emptyTemplate"
          :applicant-id="user.id"
          :is-empty-template="true"
          :show-delete-action="false"
          :show-add-action="n == emptyTemplates.length - 1"
          @add-empty-template="addEmptyTemplate"
          @cancel-empty-template="cancelEmptyTemplate"
          @experience-added="onExperienceAdded"></experience-item>
      </template>

</div>
</template>

<script>
export default {
  props: {
    user: Object,
    experiences: Array
  },
  data() {
    return {
      counter: 0,
      workExperiences: [],
      emptyTemplates: []
    }
  },
  created() {
    if(this.experiences)
      this.workExperiences = this.experiences;
  },
  methods: {

    onExperienceAdded(experience) {
      this.workExperiences.push(experience);
      if(this.emptyTemplates.length >= 1) {
          this.emptyTemplates.pop();
      }
    },

    onExperienceUpdated(result) {
      this.workExperiences.splice(result.index, 1, result.experience);
    },

    onExperienceDeleted(index) {
      this.workExperiences.splice(index, 1);
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

  }//End of methods

}
</script>

<style></style>

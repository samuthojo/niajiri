<template>

<div> <!--To serve as root element-->

    <div class="row m-b-lg"><!--start of title-->

      <div class="col-md-12 cv-sub-title clearfix flex flex-vertical-center flex-horizontal-center">

        <div class="col-md-12">

          <h5>CERTIFICATIONS</h5>

        </div>

      </div>

    </div><!--end -of title-->

      <template v-if="userCertifications.length == 0">
        <certificate-item
          :applicant-id="user.id"
          :is-empty-template="false"
          :show-delete-action="false"
          :show-add-action="emptyTemplates.length == 0"
          @add-empty-template="addEmptyTemplate"
          @certification-added="onCertificationAdded"></certificate-item>
      </template>

      <!--start of Certification list-->
        <template v-else>
          <certificate-item v-for="(certification, n) in userCertifications"
            :key="certification.id"
            :index="n"
            :certification="certification"
            :applicant-id="user.id"
            :is-empty-template="false"
            :show-delete-action="true"
            :show-add-action="n == userCertifications.length - 1 && emptyTemplates.length == 0"
            @certification-deleted="onCertificationDeleted"
            @add-empty-template="addEmptyTemplate"
            @certification-added="onCertificationAdded"
            @certification-updated="onCertificationUpdated">
          </certificate-item>
       </template>
      <!--end of Certification list-->

      <template v-if="emptyTemplates.length > 0">
        <certificate-item
          v-for="(emptyTemplate, n) in emptyTemplates"
          :key="emptyTemplate"
          :id="'empty' + emptyTemplate"
          :applicant-id="user.id"
          :is-empty-template="true"
          :show-delete-action="false"
          :show-add-action="n == emptyTemplates.length - 1"
          @add-empty-template="addEmptyTemplate"
          @cancel-empty-template="cancelEmptyTemplate"
          @certification-added="onCertificationAdded"></certificate-item>
      </template>

</div><!-- root element ends here-->

</template>

<script>
export default {
  props: {
    user: Object,
    certifications: Array
  },
  data() {
    return {
      counter: 0,
      userCertifications: [],
      emptyTemplates: []
    }
  },
  created() {
    if(this.certifications)
      this.userCertifications = this.certifications;
  },
  methods: {
    onCertificationAdded(certification) {
      this.userCertifications.push(certification);
      if(this.emptyTemplates.length >= 1) {
          this.emptyTemplates.pop();
      }
    },

    onCertificationUpdated(result) {
      this.userCertifications.splice(result.index, 1, result.certification);
    },

    onCertificationDeleted(index) {
      this.userCertifications.splice(index, 1);
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

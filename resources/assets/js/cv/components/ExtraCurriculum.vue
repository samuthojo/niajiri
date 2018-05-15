<template>

<div> <!--To serve as root element-->

    <div class="row m-b-lg"><!--start of title-->

      <div class="col-md-12 cv-sub-title clearfix flex flex-vertical-center flex-horizontal-center">

        <div class="col-md-12">

          <h5>EXTRACURRICULUM ACTIVITIES</h5>

        </div>

      </div>

    </div><!--end -f title-->

    <!--start of skill form-->
    <extra-curriculum-form
      :extracurriculum="user.extracurricular_activities"
      :applicant-id="user.id"
      :disable-delete="isEmptyApplicant"
      @extracurriculum-updated="onExtraCurriculumUpdated">
    </extra-curriculum-form>
    <!--end of skill form-->

</div>
</template>

<script>
export default {
  props: {
    user: Object
  },
  data() {
    return {
      applicant: {}
    }
  },
  computed: {
    isEmptyApplicant: function() {
      return _.isEmpty(this.applicant);
    }
  },
  created() {
    this.applicant = this.user;
  },
  methods: {
    onExtraCurriculumUpdated(user) {
      this.applicant = user;
    }
  }
}
</script>

<style></style>

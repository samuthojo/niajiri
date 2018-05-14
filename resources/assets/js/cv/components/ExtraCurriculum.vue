<template>

<div> <!--To serve as root element-->

    <div class="row m-b-lg"><!--start of title-->

      <div class="col-md-12 cv-sub-title clearfix flex flex-vertical-center flex-horizontal-center">

        <div class="col-md-10">

          <h5>EXTRACURRICULUM ACTIVITIES</h5>

        </div>

        <div class="col-md-2">

            <button type="button" class="btn btn-warning pull-right">Add</button>

        </div>

      </div>

    </div><!--end -f title-->

    <!--start of skill form-->
    <extra-curriculum-form
      :extracurriculum="user.extracurricular_activities"
      :applicant-id="user.id"
      @extracurriculum-added="onExtraCurriculumAdded">
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
  created() {
    this.applicant = this.user;
  },
  methods: {
    onExtraCurriculumAdded(user) {
      this.applicant = user;
    }
  }
}
</script>

<style></style>

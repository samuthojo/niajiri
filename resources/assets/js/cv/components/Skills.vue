<template>

<div> <!--To serve as root element-->

    <div class="row m-b-lg"><!--start of title-->

      <div class="col-md-12 cv-sub-title clearfix flex flex-vertical-center flex-horizontal-center">

        <div class="col-md-12">

          <h5>SKILLS/PERSONAL INTERESTS</h5>

        </div>

      </div>

    </div><!--end -of title-->

    <!--start of skill form-->
    <skill-form
      :skills="applicant.skills"
      :interests="applicant.interests"
      :applicant-id="applicant.id"
      :disable-delete="isEmptyApplicant"
      @skills-updated="onSkillUpdated">
    </skill-form>
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
  computed: {
    isEmptyApplicant: function() {
      return _.isEmpty(this.applicant);
    }
  },
  methods: {
    onSkillUpdated(user) {
      this.applicant = user;
    }
  }
}
</script>

<style></style>

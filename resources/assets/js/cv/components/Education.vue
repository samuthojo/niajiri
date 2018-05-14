<template>

<div> <!--To serve as root element-->

    <div class="row m-b-lg"><!--start of title-->

      <div class="col-md-12 cv-sub-title clearfix flex flex-vertical-center flex-horizontal-center">

        <div class="col-md-10">

          <h5>EDUCATION</h5>

        </div>

        <div class="col-md-2">

            <button type="button" class="btn btn-warning pull-right">Add</button>

        </div>

      </div>

    </div><!--end -f title-->

      <template v-if="educations.length == 0">
        <education-item
          :applicant-id="user.id"
          :institutions="institutions"
          :qualifications="qualifications"></education-item>
      </template>

      <!--start of education list-->
        <template v-else>
          <education-item v-for="education in educations"
            :key="education.id"
            :education="education"
            :institutions="institutions"
            :qualifications="qualifications"
            :applicant-id="user.id"
            @education-added="onEducationAdded">
          </education-item>
       </template>
      <!--end of honor list-->

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
  methods: {
    onEducationAdded(educations) {
      this.educations = educations;
    }
  }
}
</script>

<style>
</style>

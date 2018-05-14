<template>

<div> <!--To serve as root element-->

    <div class="row m-b-lg"><!--start of title-->

      <div class="col-md-12 cv-sub-title clearfix flex flex-vertical-center flex-horizontal-center">

        <div class="col-md-10">

          <h5>CERTIFICATIONS</h5>

        </div>

        <div class="col-md-2">

            <button type="button" class="btn btn-warning pull-right">Add</button>

        </div>

      </div>

    </div><!--end -of title-->

      <template v-if="certifications.length == 0">
        <certificate-item :applicant-id="user.id"></certificate-item>
      </template>

      <!--start of Certification list-->
        <template v-else>
          <certificate-item v-for="certification in certifications"
            :key="Certification.id"
            :certification="certification"
            :applicant-id="user.id"
            @certification-added="onCertificationAdded">
          </certificate-item>
       </template>
      <!--end of Certification list-->

</div>
</template>

<script>
export default {
  props: {
    user: Object,
    certifications: Array
  },
  methods: {
    onCertificationAdded(certifications) {
      this.certifications = certifications;
    }
  }
}
</script>

<style>
</style>

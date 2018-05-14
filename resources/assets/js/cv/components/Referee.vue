<template>

<div> <!--To serve as root element-->

    <div class="row m-b-lg"><!--start of title-->

      <div class="col-md-12 cv-sub-title clearfix flex flex-vertical-center flex-horizontal-center">

        <div class="col-md-10">

          <h5>REFEREES</h5>

        </div>

        <div class="col-md-2">

            <button type="button" class="btn btn-warning pull-right">Add</button>

        </div>

      </div>

    </div><!--end -f title-->

      <template v-if="referees.length == 0">
        <referee-item :applicant-id="user.id"></referee-item>
      </template>

      <!--start of referee list-->
        <template v-else>
          <referee-item v-for="referee in referees"
            :key="referee.id"
            :referee="referee"
            :applicant-id="user.id"
            @referee-added="onRefereeAdded">
          </referee-item>
       </template>
      <!--end of referee list-->

</div>
</template>

<script>
export default {
  props: {
    user: Object,
    referees: Array
  },
  methods: {
    onRefereeAdded(referees) {
      this.referees = referees;
    }
  }
}
</script>

<style>
</style>

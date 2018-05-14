<template>

<div> <!--To serve as root element-->

    <div class="row m-b-lg"><!--start of title-->

      <div class="col-md-12 cv-sub-title clearfix flex flex-vertical-center flex-horizontal-center">

        <div class="col-md-10">

          <h5>HONOR/AWARDS RECEIVED</h5>

        </div>

        <div class="col-md-2">

            <button type="button" class="btn btn-warning pull-right">Add</button>

        </div>

      </div>

    </div><!--end -f title-->

      <template v-if="honors.length == 0">
        <honor-item :applicant-id="user.id"></honor-item>
      </template>

      <!--start of honor list-->
        <template v-else>
          <honor-item v-for="honor in honors"
            :key="honor.id"
            :honor="honor"
            :applicant-id="user.id"
            @honor-added="onHonorAdded">
          </honor-item>
       </template>
      <!--end of honor list-->

</div>
</template>

<script>
export default {
  props: {
    user: Object,
    honors: Array
  },
  methods: {
    onHonorAdded(honors) {
      this.honors = honors;
    }
  }
}
</script>

<style>
</style>

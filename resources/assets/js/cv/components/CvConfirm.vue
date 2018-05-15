<template lang="html">

  <div class="cv-block-modal flex flex-vertical-center flex-horizontal-center"><!--start of modal-->

      <div class="cv-block-modal-dialog"><!--start of dialog-->

          <div class="row m-t-15"> <!--header-->

            <div class="col-md-12">

              <div class="flex flex-space-btn cv-modal-pad">

                <h6 class="cv-confirm-title">Please Confirm</h6>

                <button type="button" class="cv-btn cv-cancel pull-right"
                  @click="$emit('cancel')">
                  <i class="fa fa-times"></i>
                </button>

              </div>

            </div>

          </div><!--end of header-->

          <div class="col-md-12 cv-modal-pad cv-modal-border"> <!--body-->

            <p>{{ message }}</p>

          </div><!--end of body-->


          <div class="col-md-12 cv-modal-pad"><!--footer-->

            <div class="pull-right">

              <button type="button" @click="$emit('okay')"
                class="btn btn-success">Okay</button>

              <button type="button" class="btn btn-default"
                @click="$emit('cancel')">Cancel</button>

            </div>

          </div><!--end of footer-->

      </div><!--end of dialog-->

  </div><!--end of modal-->

</template>

<script>
export default {
  props: {
    message: String
  }
}
</script>

<style lang="css">
</style>

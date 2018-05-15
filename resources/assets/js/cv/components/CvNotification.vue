<template lang="html">

  <div class="cv-block-modal flex flex-vertical-center flex-horizontal-center">

      <p class="cv-loading" v-show="isLoading">
        <span class="fa fa-circle"></span>
        <span class="fa fa-circle"></span>
        <span class="fa fa-circle"></span>
      </p>

      <div class="cv-notify cv-notify-success" v-show="showSuccess">

        <div class="message-pad">

          <div class="flex flex-space-btn">

            <div class="notify-message">{{ successMessage }}</div>

            <div class="cv-icon-notify icon-success"></div>

          </div>

        </div>

      </div>

      <div class="cv-notify cv-notify-error" v-show="showError">

        <div class="message-pad">

          <div class="flex flex-space-btn">

            <div class="notify-message">{{ errorMessage }}</div>

            <div class="cv-icon-notify icon-error"></div>

          </div>

        </div>

      </div>

    </div>

  </div>

</template>

<script>
export default {
  props: {
    successMessage: String,
    errorMessage: String,
    showSuccess: Boolean,
    showError: Boolean,
    isLoading: Boolean
  }
}
</script>

<style lang="css">
</style>

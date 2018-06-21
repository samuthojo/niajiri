<template lang="html">
  <div class="avatar-container flex flex-vertical-center flex-horizontal-center"
    :style="avatar">
    <input type="file" name="avatar"
      class="no-display" id="avatar-file-input" @change="saveAvatar">
    <button type="button" class="btn btn-primary avatar-upload-btn"
      id="avatar-upload-btn" @click="attemptUpload">
      <i class="fa fa-upload"></i>Change
    </button>
  </div>
</template>

<script>
export default {
  props: {
    'avatarUrl': String
  },
  computed: {
    avatar: function () {
      return 'background-image: url(' + this.avatarUrl + ');';
    }
  },
  methods: {
    attemptUpload() {
      $("#avatar-file-input").click();
    },
    saveAvatar(event) {
      var file = event.target.files[0];
      var cvAvatar = this; //this component's instance
      if(file) {
        let formData = new FormData();
        formData.append('avatar', file);
        formData.append('_method', 'PATCH');
        cvAvatar.$emit("avatar-changed", formData);
      }
    }
  }
}
</script>

<style lang="css">
</style>

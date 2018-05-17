<template lang="html">

  <!--the file image -->
  <div class="flex flex-column flex-horizontal-center">

    <div class="attachment-container m-b-sm"><!--start container-->

      <!--the placeholder to show incase no attachment-->
      <i class="fa fa-file fa-5x" v-show="showPlaceHolder"></i>

      <!--show the uploaded fileName inside this div-->
      <div class="file-name" v-show="showFileName" style="height: 5em;">
        <p>{{ fileName }}</p>
      </div>

      <!--the attachment-->
      <img v-show="showAttachment" :src="attachmentUrl"
         alt="Award Certificate" class="img-thumbnail cv-attachment">

    </div><!--end container-->

    <div v-show="showAttachment"><!--start show attachment name-->
      <span>{{ attachmentName }}</span>
    </div><!--end show attachment name-->

    <button type="button" class="btn btn-primary"
       @click="onUpload" title="Attach">
      <i class="fa fa-upload"></i>
      <span v-show="attachmentUrl != null">Replace</span>
      <span v-show="attachmentUrl == null">Upload</span>
    </button>

    <input type="file" name="attachment" class="no-display"
      :id="'attachment' + id" @change="captureAttachment">

  </div>
  <!--end of file image -->

</template>

<script>
export default {
  props: {
    isEntity: Boolean,
    attachmentUrl: String,
    attachmentName: String
  },
  data () {
    return {
      fileName: '',
      id: null
    }
  },
  mounted () {
    this.id = this._uid;
  },
  computed: {
    showPlaceHolder: function () {
      return this.attachmentUrl == null && this.fileName.length == 0;
    },
    showFileName: function () {
      return this.fileName.length > 0;
    },
    showAttachment: function () {
      return this.attachmentUrl != null && this.fileName.length == 0;
    }
  },
  methods: {

    onUpload() {
      let id = this.id;
      $("#attachment" + id).click();
    },

    captureAttachment(event) {
      let file = event.target.files[0];
      this.fileName = file.name;
      if(this.isEntity){
        this.updateAttachment(file);
      } else {
        this.$emit('file-uploaded', file);
      }
    },

    updateAttachment(file) {
      this.$emit('update-attachment', file);
      this.fileName = '';
    }

    //End of methods
  }
}
</script>

<style lang="css">
</style>

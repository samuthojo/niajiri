<template lang="html">

  <div class="download-cv-btn">

    <button
      type="button"
      class="btn btn-primary pull-right"
      title="Download"
      @click="onDownloadClicked">

      <i class="fa fa-download"></i>

      <span>Download CV</span>

    </button>

  </div>

</template>

<script>
import { PdfDefinition } from '../pdf/PdfDefinition.js'

export default {

  data() {
    return {
      pdfDefinition: new PdfDefinition()
    }
  },

  created() {
    //Fetch the pdfPayload
    axios.get('/pdfPayload')

         .then(({data}) => {
           this.pdfDefinition.payload = data

           this.getAvatarDataURL()
         })

         .catch(error => console.error())
  },

  methods: {

    onDownloadClicked() {

      pdfMake.createPdf(this.pdfDefinition.getDocDefinition()).download()

    },

    getAvatarDataURL() {

        var xhr = new XMLHttpRequest()

        var _this = this

        xhr.onload = function() {

          var reader = new FileReader()

          reader.onloadend = function() {

           _this.pdfDefinition.payload.user = _.assign({},
                                            _this.pdfDefinition.payload.user,
                                            {
                                              pdfAvatar: ''
                                            })

           _this.pdfDefinition.payload.user.pdfAvatar = reader.result

          }

          reader.readAsDataURL(xhr.response)

        }

        let url = this.pdfDefinition.payload.user.avatar

        xhr.open('GET', url)

        xhr.responseType = 'blob'

        xhr.send()

    }

  }

}
</script>

<style lang="css" scoped>
.download-cv-btn {
  margin-bottom: 15px;
}
</style>

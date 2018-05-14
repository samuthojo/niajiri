<template lang="html">

<form @submit.prevent="onSubmit"
      @keydown="form.errors.clear($event.target.name)">

      <div class="row m-b-lg">

        <div class="col-md-12">

         <div class="cv-element position-relative">

            <div class="actions"> <!--start of actions-->

              <div class="btn-group">

                <button type="button" class="btn btn-default">
                  <i class="fa fa-trash-o"></i>
                </button>

              </div>

            </div> <!--end of actions-->

<div class="cv-block clearfix"> <!-- block contents go here-->

    <div class="row">

        <div class="col-md-4">

          <div class="form-group">

            <label>Name:</label>
            <span class="asterik">*</span>
            <select name="name" class="form-control"
              v-model="form.name" @change="form.errors.clear('name')">
              <option>Swahili</option>
              <option>English</option>
              <option>French</option>
              <option>Chinese</option>
              <option>Italian</option>
              <option>Spanish</option>
              <option>Hindi</option>
              <option>Portuguese</option>
              <option>Bengali</option>
              <option>Russian</option>
            </select>

          </div>

        </div>

        <div class="col-md-4">

          <div class="form-group">

            <label>Written:</label>
            <span class="asterik">*</span>
            <select name="write_fluency" class="form-control"
              v-model="form.write_fluency" @change="form.errors.clear('write_fluency')">
              <option>Excellent</option>
              <option>Very Good</option>
              <option>Fair</option>
            </select>

          </div>

       </div>

       <div class="col-md-4">

          <div class="form-group">

            <label>Oral:</label>
            <span class="asterik">*</span>
            <select name="speak_fluency" class="form-control"
              v-model="form.speak_fluency" @change="form.errors.clear('speak_fluency')">
              <option>Excellent</option>
              <option>Very Good</option>
              <option>Fair</option>
            </select>

          </div>

       </div>

    </div>

    <div class="row">

      <div class="col-md-12">

        <div class="form-group">

          <button type="submit" class="btn btn-primary pull-right">Save</button>

        </div>

      </div>

     </div>

   </div><!--block contents end here-->

  </div>

 </div>

 </div>

</form>

</template>

<script>
import { Form } from '../../ValidationFramework/Form.js';

export default {
  props: {
    language: Object,
    applicantId: String
  },
  data() {
    return {
      model: {
        name: '',
        speak_fluency: '',
        write_fluency: ''
      },
      form: new Form({})
    }
  },
  created() {
    let formModel = _.assign({}, this.language,  { 'applicant_id': this.applicantId });
    if(this.language) {
      this.form = new Form(formModel);
    }
    else {
      formModel = _.assign({}, this.model,  { 'applicant_id': this.applicantId });
      this.form = new Form(formModel);
    }
  },
  methods: {
    onSubmit() {
     this.$snotify.async('Saving ...', '', () => new Promise((resolve, reject) => {
      this.form.submit('POST', '/user_languages')
               .then(response => {
                 this.$emit("language-added", response.data.languages);
                 resolve({
                   body: response.data.message,
                   timeout: 2000,
                   closeOnClick: true,
                   showProgressBar: false
                 });
               })
               .catch(error => {
                 console.log(error.response);
                 reject({
                   body: error.response.data.message,
                   timeout: 2000,
                   closeOnClick: true,
                   showProgressBar: false
                 });
               });
             }));
    }
  }
}
</script>

<style lang="css">
</style>

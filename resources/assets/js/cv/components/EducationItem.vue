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

<div class="cv-block flex flex-space-btn"> <!--start of cv-block -->

  <div class="clearfix"><!-- block contents go here-->

    <div class="row">

      <div class="col-md-6">

        <div class="form-group">

          <label>Level:</label>
          <span class="asterik">*</span>
          <select name="level" class="form-control"
            v-model="form.level" @change="form.errors.clear('level')">
              <option>Certificate</option>
              <option>Diploma</option>
              <option>Degree</option>
              <option>Masters</option>
          </select>

        </div>

      </div>

      <div class="col-md-6">

        <div class="form-group">

          <label>Institution:</label>
          <span class="asterik">*</span>
          <select name="institution" class="form-control"
            v-model="form.institution" @change="form.errors.clear('institution')">
              <option v-for="institution in institutions"
                :key="institution.name">{{ institution.name }}</option>
          </select>

        </div>

      </div>

    </div>

    <div class="row">

        <div class="col-md-6">

          <div class="form-group">

            <label>Certificate/Diploma/Degree:</label>
            <span class="asterik">*</span>
            <select name="summary" class="form-control"
              v-model="form.summary" @change="form.errors.clear('summary')">
                <option v-for="qualification in qualifications"
                  :key="qualification.name">{{ qualification.name }}</option>
            </select>

          </div>

        </div>

        <div class="col-md-6">

          <div class="form-group">
              <textarea rows="1" name="remark" class="cv-textarea-input"
                placeholder="GPA/Score e.g 3.8"
                v-model="form.remark"></textarea>
          </div>

       </div>

    </div>

    <div class="row">

      <div class="col-md-6">

        <div class="form-group">
          <input type="text" name="started_at" v-model="form.started_at"
            placeholder="Date Started e.g 10-2014" class="cv-text-input">
        </div>

      </div>

      <div class="col-md-6">

        <div class="form-group">
          <input type="text" name="finished_at" v-model="form.finished_at"
            placeholder="Date ended e.g 11-2016" class="cv-text-input">
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

   <!--the file image -->
   <div class="flex flex-vertical-center flex-horizontal-center">

     <div class="attachment-container">

        <img src="http://niajiri.co.tz/images/attachment.jpg"
          alt="Award Certificate" class="img-thumbnail cv-attachment">

     </div>

   </div><!--end of file image -->

 </div><!--end of cv-block -->

  </div>

 </div>

 </div>

</form>

</template>

<script>
import { Form } from '../../ValidationFramework/Form.js';

export default {
  props: {
    education: Object,
    applicantId: String,
    institutions: Array,
    qualifications: Array
  },
  data() {
    return {
      model: {
        level: '',
        institution: '',
        started_at: '',
        finished_at: '',
        remark: '',
        summary: ''
      },
      form: new Form({})
    }
  },
  created() {
    let formModel = _.assign({}, this.education,  { 'applicant_id': this.applicantId });
    if(this.education) {
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
      this.form.submit('POST', '/user_educations')
               .then(response => {
                 this.$emit("education-added", response.data.educations);
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

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

<div class="cv-block clearfix">

    <div class="row">

      <div class="col-md-12">

        <div class="form-group">
            <textarea rows="1" name="skills" class="cv-textarea-input"
              placeholder="Skills e.g Team work, Problem Solving"
              v-model="form.skills"></textarea>
        </div>

      </div>

    </div>

    <div class="row">

      <div class="col-md-12">

        <div class="form-group">
            <textarea rows="1" name="interests" class="cv-textarea-input"
              placeholder="Interests e.g Financial Inclusion, Data Mining"
              v-model="form.interests"></textarea>
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

    </div>

  </div>

  </div>

 </div>

</form>

</template>

<script>
import { Form } from '../../ValidationFramework/Form.js';

export default {
  props: {
    skills: String,
    interests: String,
    applicantId: String
  },
  data() {
    return {
      model: {
        skills: '',
        interests: ''
      },
      form: new Form({})
    }
  },
  created() {
    let formModel = _.assign({}, {
      'applicant_id': this.applicantId,
      'skills': this.skills,
      'interests': this.interests
    });
    if(this.skills && this.interests) {
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
      this.form.submit('POST', '/user_skills')
               .then(response => {
                 this.$emit("skill-added", response.data.user);
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

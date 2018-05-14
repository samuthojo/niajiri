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
            <textarea rows="1" name="extracurricular_activities" class="cv-textarea-input"
              placeholder="ExtraCurricular Activities e.g Cycling, Swimming"
              v-model="form.extracurricular_activities"></textarea>
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
    extracurriculum: String,
    applicantId: String
  },
  data() {
    return {
      model: {
        extracurricular_activities: ''
      },
      form: new Form({})
    }
  },
  created() {
    let formModel = _.assign({},  {
      'applicant_id': this.applicantId,
      'extracurricular_activities': this.extracurriculum
    });
    if(this.extracurriculum) {
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
      this.form.submit('POST', '/user_extracurricular')
               .then(response => {
                 this.$emit("extracurriculum-added", response.data.user);
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

<template lang="html">

<form @submit.prevent="onSubmit"
      @keydown="form.errors.clear($event.target.name)">

      <div class="row m-b-lg">

        <div class="col-md-12">

         <div class="cv-element position-relative">

           <!--progress modal-->
           <cv-notification
             :success-message="successMessage"
             :error-message="errorMessage"
             :isLoading="showProgress"
             :show-success="showSuccess"
             :show-error="showError"
             v-show="showAsync"></cv-notification>
           <!--end progress modal-->

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

          <button type="submit" class="btn btn-primary pull-right" title="Save">
            <i class="fa fa-save"></i>
          </button>

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
      form: new Form({}),
      showAsync: false,
      showSuccess: false,
      showError: false,
      successMessage: '',
      errorMessage: ''
    }
  },
  created() {
    let formModel = {};

    if(this.extracurriculum) {

      formModel = _.assign({},  {
        'applicant_id': this.applicantId,
        'extracurricular_activities': this.extracurriculum
      });

      this.form = new Form(formModel);
    }
    else {
      formModel = _.assign({}, this.model,  { 'applicant_id': this.applicantId });
      this.form = new Form(formModel);
    }
  },
  computed: {
    showProgress: function () {
      return (this.showSuccess  == false) && (this.showError == false);
    }
  },
  methods: {

    onSubmit() {
      this.updateSkills();
    },

    updateSkills() {
      this.showAsync = true;
      let url = '/edits/' + this.applicantId;
      this.form.submit('PATCH', url)
               .then(response => {
                 this.successMessage = "Updated successfully";
                 this.showSuccess = true;
                 var _this = this;
                 setTimeout(function () {
                   _this.showSuccess = false;
                   _this.showAsync = false;
                   _this.$emit('extracurriculum-updated', response.data.user);
                 }, 2000);
               })
               .catch(error => {
                 this.errorMessage = error.response.data.message;
                 this.showError = true;
                 var _this = this;
                 setTimeout(function () {
                   _this.showError = false;
                   _this.showAsync = false;
                 }, 2000);
               });
    }

  //End of methods
  }

}
</script>

<style lang="css">
</style>

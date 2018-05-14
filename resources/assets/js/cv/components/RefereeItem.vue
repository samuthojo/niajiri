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

      <div class="col-md-6">

        <div class="form-group">
            <textarea name="title" placeholder="Title e.g General Manager"
              class="cv-textarea-input" rows="1"
              v-model="form.title"></textarea>
        </div>

      </div>

      <div class="col-md-6">

        <div class="form-group">
            <textarea name="organization" placeholder="Organization e.g KPMG"
             class="cv-textarea-input" rows="1"
             v-model="form.organization"></textarea>
        </div>

      </div>

    </div>

    <div class="row">

        <div class="col-md-6">

          <div class="form-group">
              <textarea name="organization" class="cv-textarea-input" rows="1"
                placeholder="Organization" v-model="form.organization"></textarea>
          </div>

        </div>

        <div class="col-md-6">

          <div class="form-group">
              <textarea name="email" placeholder="Email"
                class="cv-textarea-input" rows="1"
                v-model="form.email"></textarea>
          </div>

        </div>

    </div>

    <div class="row">

        <div class="col-md-6">

          <div class="form-group">
              <textarea name="mobile" placeholder="Mobile" rows="1"
                class="cv-textarea-input" v-model="form.mobile"></textarea>
          </div>

        </div>

        <div class="col-md-6">

          <div class="form-group">
            <textarea name="alternative_mobile" placeholder="Alternative Mobile"
              rows="1" class="cv-textarea-input"
              v-model="form.alternative_mobile"></textarea>
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
    referee: Object,
    applicantId: String
  },
  data() {
    return {
      model: {
        name: '',
        title: '',
        organization: '',
        email: '',
        mobile: '',
        alternative_mobile: ''
      },
      form: new Form({})
    }
  },
  created() {
    let formModel = _.assign({}, this.referee,  { 'applicant_id': this.applicantId });
    if(this.referee) {
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
      this.form.submit('POST', '/user_referees')
               .then(response => {
                 this.$emit("referee-added", response.data.referees);
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

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
            <textarea name="title" placeholder="Title e.g Best Employee"
              class="cv-textarea-input" rows="1"
              v-model="form.title"></textarea>
        </div>

      </div>

      <div class="col-md-6">

        <div class="form-group">
            <textarea name="organization" placeholder="Institution e.g Niajiri"
             class="cv-textarea-input" rows="1"
             v-model="form.institution"></textarea>
        </div>

      </div>

    </div>

    <div class="row">

        <div class="col-md-6">

          <div class="form-group">
              <input type="text" name="issued_at"
                placeholder="Date Issued e.g 11-2015"
                class="cv-text-input" v-model="form.issued_at">
          </div>

        </div>

        <div class="col-md-6">

          <div class="form-group">
              <textarea rows="1" name="summary" class="cv-textarea-input"
                placeholder="e.g I worked hard"
                v-model="form.summary"></textarea>
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
    honor: Object,
    applicantId: String
  },
  data() {
    return {
      model: {
        title: '',
        organization: '',
        issued_at: '',
        summary: ''
      },
      form: new Form({})
    }
  },
  created() {
    let formModel = _.assign({}, this.honor,  { 'applicant_id': this.applicantId });
    if(this.honor) {
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
      this.form.submit('POST', '/user_honors')
               .then(response => {
                 this.$emit("honor-added", response.data.honors);
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

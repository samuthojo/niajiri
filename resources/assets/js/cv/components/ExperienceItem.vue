<template lang="html">

<form @submit.prevent="onSubmit"
      @keydown="form.errors.clear($event.target.name)">

      <div class="row m-b-lg">

        <div class="col-md-12">

         <div class="cv-element position-relative">

            <div class="actions"> <!--start of actions-->

                <button type="button" class="cv-btn cv-add"
                  v-show="showAddAction" title="Add"
                  @click="$emit('add-empty-template')">
                  <i class="fa fa-plus"></i>
                </button>
                <button type="button" class="cv-btn cv-cancel"
                  v-show="isEmptyTemplate" title="Cancel"
                  @click="$emit('cancel-empty-template')">
                  <i class="fa fa-times"></i>
                </button>

            </div> <!--end of actions-->

<div class="cv-block clearfix">

    <div class="row">

      <div class="col-md-6">

        <div class="form-group">
            <textarea name="position" placeholder="Position e.g Accountant"
              class="cv-textarea-input" rows="1"
              v-model="form.position"></textarea>
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
              <textarea name="sector" class="cv-textarea-input" rows="1"
                placeholder="Sector e.g Auditing" v-model="form.sector"></textarea>
          </div>

        </div>

        <div class="col-md-6">

          <div class="form-group">
              <textarea name="location" placeholder="Location e.g Dar es Salaam"
                class="cv-textarea-input" rows="1"
                v-model="form.location"></textarea>
          </div>

        </div>

    </div>

    <div class="row">

        <div class="col-md-6">

          <div class="form-group">
              <input type="text" name="started_at" placeholder="Start Date e.g 11-2015"
                class="cv-text-input" v-model="form.started_at">
          </div>

        </div>

        <div class="col-md-6">

          <div class="form-group">
              <input type="text" name="ended_at" placeholder="End Date e.g 12-2016"
                class="cv-text-input" v-model="form.ended_at">
          </div>

        </div>

    </div>

    <div class="row">

      <div class="col-md-12">

        <div class="form-group">
            <textarea rows="1" name="summary" class="cv-textarea-input"
              placeholder="What did you achieve in this role"
              v-model="form.summary"></textarea>
        </div>

      </div>

    </div>

    <div class="row">

      <div class="col-md-12">

        <div class="form-group">

          <div class="btn-group pull-right">

            <button type="submit" class="btn btn-success" title="Save">
              <i class="fa fa-save"></i>
            </button>
            <button type="submit" class="btn btn-danger" title="Delete"
              :disabled="disableDelete" @click="delete-experience">
              <i class="fa fa-trash-o"></i>
            </button>

          </div>

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
    experience: Object,
    applicantId: String,
    showAddAction: Boolean,
    isEmptyTemplate: Boolean,
    disableDelete: Boolean
  },
  data() {
    return {
      model: {
        position: '',
        organization: '',
        sector: '',
        location: '',
        started_at: '',
        ended_at: '',
        summary: ''
      },
      form: new Form({})
    }
  },
  created() {
    let formModel = _.assign({}, this.experience,  { 'applicant_id': this.applicantId });
    if(this.experience) {
      this.form = new Form(formModel);
    }
    else {
      formModel = _.assign({}, this.model,  { 'applicant_id': this.applicantId });
      this.form = new Form(formModel);
    }
  },
  methods: {
    onSubmit() {
      if(this.experience) {
        this.updateExperience();
      }
      else {
        this.createExperience();
      }
    },
    createExperience() {

      this.$snotify.async('Saving ...', '', () => new Promise((resolve, reject) => {
       this.form.submit('POST', '/user_experiences')
                .then(response => {
                  this.$emit("experience-added", response.data.experiences);
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
          // End of createExperience method
    },
    updateExperience() {

      this.$snotify.async('Updating ...', '', () => new Promise((resolve, reject) => {
        let url = '/user_experiences' + this.experience.id;
       this.form.submit('PATCH', url)
                .then(response => {
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
      //End of updateExperience method
    }

  }
}
</script>

<style lang="css">
</style>

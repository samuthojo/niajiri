<template lang="html">

<form @submit.prevent="onSubmit"
      @keydown="form.errors.clear($event.target.name)">

      <div class="row m-b-lg">

        <div class="col-md-12">

         <div class="cv-element position-relative">

            <div class="actions" v-show="showAdd"> <!--start of actions-->

                <button type="button" class="cv-btn cv-add"
                  title="Add"
                  @click="$emit('add-empty-template')">
                  <i class="fa fa-plus"></i>
                </button>
                <button type="button" class="cv-btn cv-cancel"
                  v-show="isEmptyTemplate" title="Cancel"
                  @click="$emit('cancel-empty-template')">
                  <i class="fa fa-times"></i>
                </button>

            </div> <!--end of actions-->

            <!--confirmation modal-->
            <cv-confirm
              :message="'You are about to delete this entry'"
              v-show="showConfirm"
              @cancel="onCancel"
              @okay="onOkay"></cv-confirm>
            <!--end confirmation modal-->

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
                class="cv-text-input" :value="form.started_at"
                @input="form.started_at = $event.target.value">
          </div>

        </div>

        <div class="col-md-6">

          <div class="form-group">
              <input type="text" name="ended_at" placeholder="End Date e.g 12-2016"
                class="cv-text-input" :value="form.ended_at"
                @input="form.ended_at = $event.target.value">
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
            <button type="button" class="btn btn-danger" title="Delete"
              v-show="showDeleteAction" @click="onDelete">
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
    showDeleteAction: Boolean
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
      form: new Form({}),
      showConfirm: false,
      showAsync: false,
      showSuccess: false,
      showError: false,
      successMessage: '',
      errorMessage: '',
      showAdd: ''
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
    this.showAdd = this.showAddAction;
  },
  computed: {
    showProgress: function () {
      return (this.showSuccess  == false) && (this.showError == false);
    }
  },
  watch: {
    showAddAction: function (val) {
      this.showAdd = val;
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
        this.showAdd = false;
        this.showAsync = true;
        this.form.submit('POST', '/user_experiences')
            .then(response => {
              this.successMessage = "Saved successfully";
              this.showSuccess = true;
              var _this = this;
              setTimeout(function () {
                _this.showSuccess = false;
                _this.showAsync = false;
                _this.showAdd = _this.showAddAction;
                _this.$emit('experience-added', response.data.experiences);
              }, 2000);
            })
            .catch(error => {
              this.errorMessage = error.response.data.message;
              this.showError = true;
              var _this = this;
              setTimeout(function () {
                _this.showError = false;
                _this.showAsync = false;
                _this.showAdd = _this.showAddAction;
              }, 2000);
            });

          // End of createExperience method
    },

    updateExperience() {
        this.showAdd = false;
        this.showAsync = true;
        let url = '/user_experiences/' + this.experience.id;
        this.form.submit('PATCH', url)
            .then(response => {
              this.successMessage = "Updated successfully";
              this.showSuccess = true;
              var _this = this;
              setTimeout(function () {
                _this.showSuccess = false;
                _this.showAsync = false;
                _this.showAdd = _this.showAddAction;
                _this.$emit('experience-updated', response.data.experiences);
              }, 2000);
            })
            .catch(error => {
              this.errorMessage = error.response.data.message;
              this.showError = true;
              var _this = this;
              setTimeout(function () {
                _this.showError = false;
                _this.showAsync = false;
                _this.showAdd = _this.showAddAction;
              }, 2000);
            });
      //End of updateExperience method
    },

    onDelete() {
      this.showConfirm = true;
      this.showAdd = false;
    },

    onOkay() {
      this.showConfirm = false;
      this.showAsync = true;
      this.deleteExperience();
    },

    onCancel() {
      this.showConfirm = false;
      this.showAdd = this.showAddAction;
    },

    deleteExperience() {
        this.showAsync = true;
        let url = '/user_experiences/' + this.experience.id;
        this.form.submit('DELETE', url)
            .then(response => {
              this.successMessage = "Deleted successfully";
              this.showSuccess = true;
              var _this = this;
              setTimeout(function () {
                _this.showSuccess = false;
                _this.showAsync = false;
                _this.$emit('experience-deleted', response.data.experiences);
              }, 2000);
            })
            .catch(error => {
              this.errorMessage = error.response.data.message;
              this.showError = true;
              var _this = this;
              setTimeout(function () {
                _this.showError = false;
                _this.showAsync = false;
                _this.showAdd = _this.showAddAction;
              }, 2000);
            });

      //End of deleteExperience method
    }

  } //End of methods

}
</script>

<style lang="css">
</style>

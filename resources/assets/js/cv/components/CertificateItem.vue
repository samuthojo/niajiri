<template lang="html">

<form @submit.prevent="onSubmit"
      @keydown="form.errors.clear($event.target.name)">

      <div class="row m-b-lg">

        <div class="col-md-12">

         <div class="cv-element position-relative">

            <div class="actions"> <!--start of actions-->

              <button type="button" class="cv-btn cv-add"
                v-show="showAdd" title="Add"
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

<div class="cv-block flex flex-space-btn"> <!--start of cv-block -->

  <div class="clearfix"><!-- block contents go here-->

    <div class="row">

      <div class="col-md-6">

        <div class="form-group">
            <textarea name="title" placeholder="Title e.g CCNA"
              class="cv-textarea-input" rows="1"
              v-model="form.title"></textarea>
        </div>

      </div>

      <div class="col-md-6">

        <div class="form-group">
            <textarea name="organization" placeholder="Institution e.g Cisco"
             class="cv-textarea-input" rows="1"
             v-model="form.institution"></textarea>
        </div>

      </div>

    </div>

    <div class="row">

        <div class="col-md-6">

          <div class="form-group">
              <input type="text" name="started_at"
                placeholder="Date Started e.g 07-2014"
                class="cv-text-input" v-model="form.started_at">
          </div>

        </div>

        <div class="col-md-6">

          <div class="form-group">
              <input type="text" name="finished_at"
                placeholder="Date Finished e.g 11-2015"
                class="cv-text-input" v-model="form.finished_at">
          </div>

        </div>

    </div>

    <div class="row">

        <div class="col-md-12">

          <div class="form-group">
              <textarea rows="1" name="summary" class="cv-textarea-input"
                placeholder="summary e.g Pass"
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
    certification: Object,
    applicantId: String,
    showAddAction: Boolean,
    isEmptyTemplate: Boolean,
    showDeleteAction: Boolean
  },
  data() {
    return {
      model: {
        title: '',
        institution: '',
        started_at: '',
        finished_at: '',
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
    let formModel = _.assign({}, this.certification,  { 'applicant_id': this.applicantId });
    if(this.certification) {
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
      if(this.certification) {
        this.updateCertification();
      }
      else {
        this.createCertification();
      }
    },

    createCertification() {
      this.showAsync = true;
      this.form.submit('POST', '/user_certifications')
               .then(response => {
                 this.successMessage = "Saved successfully";
                 this.showSuccess = true;
                 var _this = this;
                 setTimeout(function () {
                   _this.showSuccess = false;
                   _this.showAsync = false;
                   _this.$emit('certification-added', response.data.certifications);
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

    //End of createCertification method
    },

    updateCertification() {
        this.showAsync = true;
        let url = '/user_certifications/' + this.certification.id;
        this.form.submit('PATCH', url)
            .then(response => {
              this.successMessage = "Updated successfully";
              this.showSuccess = true;
              var _this = this;
              setTimeout(function () {
                _this.showSuccess = false;
                _this.showAsync = false;
                _this.$emit('certification-updated', response.data.certifications);
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

    //End of updateCertification method
    },

    onDelete() {
      this.showConfirm = true;
      this.showAdd = false;
    },

    onOkay() {
      this.showConfirm = false;
      this.showAsync = true;
      this.deleteCertification();
    },

    onCancel() {
      this.showConfirm = false;
      this.showAdd = true;
    },

    deleteCertification() {
        let url = '/user_certifications/' + this.certification.id;
        this.form.submit('DELETE', url)
            .then(response => {
              this.successMessage = "Deleted successfully";
              this.showSuccess = true;
              var _this = this;
              setTimeout(function () {
                _this.showSuccess = false;
                _this.showAsync = false;
                _this.$emit('certification-deleted', response.data.certifications);
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
      //End of deleteCertification method
      }

  //End of methods
  }

}
</script>

<style lang="css">
</style>

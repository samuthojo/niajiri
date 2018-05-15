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
    education: Object,
    applicantId: String,
    institutions: Array,
    qualifications: Array,
    showAddAction: Boolean,
    isEmptyTemplate: Boolean,
    showDeleteAction: Boolean
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
    let formModel = _.assign({}, this.education,  { 'applicant_id': this.applicantId });
    if(this.education) {
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
      if(this.education) {
        this.updateEducation();
      }
      else {
        this.createEducation();
      }
      this.showAdd = false;
    },

    createEducation() {
        this.showAsync = true;
        this.form.submit('POST', '/user_educations')
            .then(response => {
              this.successMessage = "Saved successfully";
              this.showSuccess = true;
              var _this = this;
              setTimeout(function () {
                _this.showSuccess = false;
                _this.showAsync = false;
                _this.showAdd = _this.showAddAction;
                _this.$emit('education-added', response.data.educations);
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

          // End of createEducation method
    },

    updateEducation() {
        this.showAsync = true;
        let url = '/user_educations/' + this.education.id;
        this.form.submit('PATCH', url)
            .then(response => {
              this.successMessage = "Updated successfully";
              this.showSuccess = true;
              var _this = this;
              setTimeout(function () {
                _this.showSuccess = false;
                _this.showAsync = false;
                _this.showAdd = _this.showAddAction;
                _this.$emit('education-updated', response.data.educations);
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
      //End of updateEducation method
    },

    onDelete() {
      this.showConfirm = true;
      this.showAdd = false;
    },

    onOkay() {
      this.showConfirm = false;
      this.showAsync = true;
      this.deleteEducation();
    },

    onCancel() {
      this.showConfirm = false;
      this.showAdd = this.showAddAction;
    },

    deleteEducation() {
        this.showAsync = true;
        let url = '/user_educations/' + this.education.id;
        this.form.submit('DELETE', url)
            .then(response => {
              this.successMessage = "Deleted successfully";
              this.showSuccess = true;
              var _this = this;
              setTimeout(function () {
                _this.showSuccess = false;
                _this.showAsync = false;
                _this.showAdd = _this.showAddAction;
                _this.$emit('education-deleted', response.data.educations);
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

      //End of deleteEducation method
    }

  }, //End of methods

}
</script>

<style lang="css">
</style>

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

        <div :class="['form-group', 'position-relative', {'has-cv-error': form.errors.has('position')}]">

            <cv-placeholder
              :name="'Position e.g Accountant'"
              :length="getLength('position')"></cv-placeholder>

            <textarea name="position"
              class="cv-textarea-input" rows="1"
              v-model="form.position"></textarea>

        </div>

      </div>

      <div class="col-md-6">

        <div :class="['form-group', 'position-relative', {'has-cv-error': form.errors.has('organization')}]">

            <cv-placeholder
              :name="'Organization e.g KPMG'"
              :length="getLength('organization')"></cv-placeholder>

            <textarea name="organization"
             class="cv-textarea-input" rows="1"
             v-model="form.organization"></textarea>

        </div>

      </div>

    </div>

    <div class="row">

        <div class="col-md-6">

          <div :class="['form-group', 'position-relative', {'has-cv-error': form.errors.has('sector')}]">

              <cv-placeholder
                :name="'Sector e.g Auditing'"
                :length="getLength('sector')"></cv-placeholder>

              <textarea name="sector" class="cv-textarea-input" rows="1"
               v-model="form.sector"></textarea>

          </div>

        </div>

        <div class="col-md-6">

          <div :class="['form-group', 'position-relative', {'has-cv-error': form.errors.has('location')}]">

              <cv-placeholder
                :name="'Location e.g Dar es Salaam'"
                :length="getLength('location')"></cv-placeholder>

              <textarea name="location"
                class="cv-textarea-input" rows="1"
                v-model="form.location"></textarea>

          </div>

        </div>

    </div>

    <div class="row">

        <div class="col-md-6">

          <div :class="['form-group', 'position-relative', {'has-cv-error': form.errors.has('started_at')}]">

              <cv-placeholder
                :name="'Started e.g 11-2015'"
                :length="getLength('started_at')"></cv-placeholder>

              <input type="text" name="started_at"
                class="cv-text-input" :value="form.started_at | shortDate"
                :id="'started_at' + id"
                @input="form.started_at = $event.target.value">

          </div>

        </div>

        <div class="col-md-6">

          <div :class="['form-group', 'position-relative', {'has-cv-error': form.errors.has('ended_at')}]">

              <cv-placeholder
                :name="'Ended e.g 12-2016'"
                :length="getLength('ended_at')"></cv-placeholder>

              <input type="text" name="ended_at"
                class="cv-text-input" :value="form.ended_at | shortDate"
                :id="'ended_at' + id"
                @input="form.ended_at = $event.target.value">

          </div>

        </div>

    </div>

    <div class="row">

      <div class="col-md-12">

        <div :class="['form-group', 'position-relative', {'has-cv-error': form.errors.has('summary')}]">

            <cv-placeholder
              :name="'What did you achieve in this role'"
              :length="getLength('summary')"></cv-placeholder>

            <textarea rows="1" name="summary" class="cv-textarea-input"
              v-model="form.summary"></textarea>

        </div>

      </div>

    </div>

    <div class="row">

      <div class="col-md-12">

        <div class="form-group">

          <button type="submit" class="btn btn-primary pull-right"
            title="Save" v-show="!showDeleteAction">
            <i class="fa fa-save"></i>
          </button>

          <div class="btn-group pull-right" v-show="showDeleteAction">

            <button type="submit" class="btn btn-primary"
              title="Save">
              <i class="fa fa-save"></i>
            </button>

            <button type="button" class="btn btn-danger" title="Delete"
              @click="onDelete">
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
    showDeleteAction: Boolean,
    index: Number
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
      showAdd: '',
      id: ''
    }
  },
  created() {
    let formModel = {};

    if(this.experience) {
      formModel = _.assign({}, this.experience,  { 'applicant_id': this.applicantId });
      this.form = new Form(formModel);
    }
    else {
      formModel = _.assign({}, this.model,  { 'applicant_id': this.applicantId });
      this.form = new Form(formModel);
    }
    this.showAdd = this.showAddAction;

    this.id = this._uid;

  },
  mounted() {

    let start_id = "#started_at" + this.id;

    $(start_id).datepicker({
      format: "mm-yyyy",
      startView: 1,
      minViewMode: 1
    }).on("changeDate", () => {
      this.form.started_at = $(start_id).val();
      this.form.errors.clear('started_at');
    });

    let end_id = "#ended_at" + this.id;

    $(end_id).datepicker({
      format: "mm-yyyy",
      startView: 1,
      minViewMode: 1
    }).on("changeDate", () => {
      this.form.ended_at = $(end_id).val();
      this.form.errors.clear('ended_at');
    });

    //autosize textarea based on content
    autosize($('textarea'));
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
      this.showAdd = false;
    },

    createExperience() {
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
                _this.$emit('experience-added', response.data.experience);
              }, 2000);
            })
            .catch(error => {
              this.form.onFail(error);
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
                _this.$emit('experience-updated', {
                  'index': _this.index,
                  'experience': response.data.experience
                });
              }, 2000);
            })
            .catch(error => {
              this.form.onFail(error);
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
                _this.$emit('experience-deleted', _this.index);
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
    },

    getLength(field) {
      if(this.form[field])
        return this.form[field].toString().length;
      return 0;
    }

  } //End of methods

}
</script>

<style lang="css">
</style>

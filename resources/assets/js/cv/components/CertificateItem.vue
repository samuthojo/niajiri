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

        <div :class="['form-group', 'position-relative', {'has-cv-error': form.errors.has('title')}]">

            <cv-placeholder
              :name="'Title e.g CCNA'"
              :length="getLength('title')"></cv-placeholder>

            <textarea name="title"
              class="cv-textarea-input" rows="1"
              v-model="form.title"></textarea>

        </div>

      </div>

      <div class="col-md-6">

        <div :class="['form-group', 'position-relative', {'has-cv-error': form.errors.has('institution')}]">

            <cv-placeholder
              :name="'Institution e.g Cisco'"
              :length="getLength('institution')"></cv-placeholder>

            <textarea name="institution"
             class="cv-textarea-input" rows="1"
             v-model="form.institution"></textarea>

        </div>

      </div>

    </div>

    <div class="row">

        <div class="col-md-6">

          <div :class="['form-group', 'position-relative', {'has-cv-error': form.errors.has('started_at')}]">

              <cv-placeholder
                :name="'Started e.g 07-2014'"
                :length="getLength('started_at')"></cv-placeholder>

              <input type="text" name="started_at"
                class="cv-text-input" :id="'started_at' + id"
                :value="form.started_at | shortDate"
                @input="form.started_at = $event.target.value">

          </div>

        </div>

        <div class="col-md-6">

          <div :class="['form-group', 'position-relative', {'has-cv-error': form.errors.has('finished_at')}]">

              <cv-placeholder
                :name="'Finished e.g 11-2015'"
                :length="getLength('finished_at')"></cv-placeholder>

              <input type="text" name="finished_at"
                class="cv-text-input" :id="'finished_at' + id"
                :value="form.finished_at | shortDate"
                @input="form.finished_at = $event.target.value">

          </div>

        </div>

    </div>

    <div class="row">

        <div class="col-md-12">

          <div :class="['form-group', 'position-relative', {'has-cv-error': form.errors.has('summary')}]">

              <textarea rows="1" name="summary" class="cv-textarea-input"
                placeholder="Summary e.g Pass"
                v-model="form.summary"></textarea>

          </div>

       </div>

    </div>

    <div class="row">

      <div class="col-md-12">

        <div class="form-group">

          <button type="submit" class="btn btn-primary pull-right" title="Save"
            v-show="!showDeleteAction">
            <i class="fa fa-save"></i>
          </button>

          <div class="btn-group pull-right" v-show="showDeleteAction">

            <button type="submit" class="btn btn-primary" title="Save">
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

   </div><!--block contents end here-->

   <!--start of the file-->
   <cv-attachment
     :is-entity="isCertification"
     :attachment-url="attachmentUrl"
     :attachment-name="attachmentName"
     @file-uploaded="onFileUploaded"
     @update-attachment="onUpdateAttachment"></cv-attachment>
   <!--end of the file-->

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
    showDeleteAction: Boolean,
    index: Number
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
      file: null,
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
    this.showAdd = this.showAddAction;

    if(this.certification) {

      let formModel = _.assign({}, this.certification,  {
        'applicant_id': this.applicantId
      });

      if(_.has(formModel, 'expired_at'))
       {
         delete formModel.expired_at;
       }

      this.form = new Form(formModel);

    }
    else {
      let formModel = _.assign({}, this.model,  {
        'applicant_id': this.applicantId
      });
      this.form = new Form(formModel);
    }

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

    let finished_id = "#finished_at" + this.id;

    $(finished_id).datepicker({
      format: "mm-yyyy",
      startView: 1,
      minViewMode: 1
    }).on("changeDate", () => {
      this.form.finished_at = $(finished_id).val();
      this.form.errors.clear('finished_at');
    });

    //autosize textarea based on content
    autosize($('textarea'));
  },
  computed: {
    showProgress: function () {
      return (this.showSuccess  == false) && (this.showError == false);
    },
    attachmentUrl: function () {
      if(!this.certification || !this.certification.attachment)
        return null;
      return this.certification.attachment;
    },
    attachmentName: function () {
      if(!this.certification || !this.certification.attachmentName)
        return null;
      return this.certification.attachmentName;
    },
    isCertification: function () {
      if(this.certification)
        return true;
      return false;
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
      this.showAdd = false;
    },

    createCertification() {
        this.showAsync = true;
        var formData = new FormData();
        for(let field in this.form) {
          formData.append(field, this.form[field]);
        }
        if(this.file) {
          formData.append('attachment', this.file);
        }
        axios.post('/user_certifications', formData)
            .then(response => {
              console.log(response.data.certification);
              this.successMessage = "Saved successfully";
              this.showSuccess = true;
              var _this = this;
              setTimeout(function () {
                _this.showSuccess = false;
                _this.showAsync = false;
                _this.showAdd = _this.showAddAction;
                _this.$emit('certification-added', response.data.certification);
              }, 2000);
            })
            .catch(error => {
              console.log(error);
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

          // End of createCertification method
    },

    updateCertification() {
        this.showAsync = true;
        var url = '/user_certifications/' + this.certification.id;
        var formData = new FormData();
        for(let field in this.form) {
          formData.append(field, this.form[field]);
        }
        formData.append('_method', 'PATCH');
          axios.post(url, formData)
            .then(response => {
              console.log(response.data.certification);
              this.successMessage = "Updated successfully";
              this.showSuccess = true;
              var _this = this;
              setTimeout(function () {
                _this.showSuccess = false;
                _this.showAsync = false;
                _this.showAdd = _this.showAddAction;
                _this.$emit('certification-updated', {
                                              'index': _this.index,
                                              'certification': response.data.certification
                                            });
              }, 2000);
            })
            .catch(error => {
              this.errorMessage = error.response.data.message;
              this.showError = true;
              this.form.onFail(error);
              var _this = this;
              setTimeout(function () {
                _this.showError = false;
                _this.showAsync = false;
                _this.showAdd = _this.showAddAction;
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
      this.showAdd = this.showAddAction;
    },

    deleteCertification() {
        this.showAsync = true;
        let url = '/user_certifications/' + this.certification.id;
        this.form.submit('DELETE', url)
            .then(response => {
              this.successMessage = "Deleted successfully";
              this.showSuccess = true;
              var _this = this;
              setTimeout(function () {
                _this.showSuccess = false;
                _this.showAsync = false;
                _this.showAdd = _this.showAddAction;
                _this.$emit('certification-deleted', _this.index);
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

      //End of deleteCertification method
    },

    onFileUploaded(file) {
      // this.form.attachment = file;
      this.file = file;
    },

    onUpdateAttachment(file) {
      this.showAdd = false;
      this.showAsync = true;
      let formData = new FormData();
      formData.append('attachment', file);
      formData.append('_method', 'PATCH');
      let url = '/update_certification_attachment/' + this.certification.id;
      axios.post(url, formData, {
        'headers': {
          'Content-Type': 'multipart/form-data'
        }
      })
      .then(response => {
        this.successMessage = response.data.message;
        this.showSuccess = true;
        var _this = this;
        setTimeout(function () {
          _this.showSuccess = false;
          _this.showAsync = false;
          _this.showAdd = _this.showAddAction;
          _this.$emit('certification-updated', {
                                        'index': _this.index,
                                        'certification': response.data.certification
                                      });
        }, 2000);
      })
      .catch(error => {
        console.log(error);
        this.errorMessage = "Error, Attachment couldn\'t be updated";
        this.showError = true;
        var _this = this;
        setTimeout(function () {
          _this.showError = false;
          _this.showAsync = false;
          _this.showAdd = _this.showAddAction;
        }, 2000);
      });
    },

      getLength(field) {
        if(this.form[field])
          return this.form[field].toString().length;
        return 0;
      }

  //End of methods
  }

}
</script>

<style lang="css">
</style>

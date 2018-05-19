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

<div class="cv-block clearfix"> <!-- block contents go here-->

    <div class="row">

        <div class="col-md-4">

          <div :class="['form-group', 'position-relative', {'has-cv-error': form.errors.has('name')}]">

            <label>Name:</label>
            <span class="asterik">*</span>
            <select name="name" class="form-control"
              v-model="form.name" @change="form.errors.clear('name')">
              <option>Swahili</option>
              <option>English</option>
              <option>French</option>
              <option>Chinese</option>
              <option>Italian</option>
              <option>Spanish</option>
              <option>Hindi</option>
              <option>Portuguese</option>
              <option>Bengali</option>
              <option>Russian</option>
            </select>

          </div>

        </div>

        <div class="col-md-4">

          <div :class="['form-group', 'position-relative', {'has-cv-error': form.errors.has('write_fluency')}]">

            <label>Written:</label>
            <span class="asterik">*</span>
            <select name="write_fluency" class="form-control"
              v-model="form.write_fluency" @change="form.errors.clear('write_fluency')">
              <option>Excellent</option>
              <option>Very Good</option>
              <option>Fair</option>
            </select>

          </div>

       </div>

       <div class="col-md-4">

          <div :class="['form-group', 'position-relative', {'has-cv-error': form.errors.has('speak_fluency')}]">

            <label>Oral:</label>
            <span class="asterik">*</span>
            <select name="speak_fluency" class="form-control"
              v-model="form.speak_fluency" @change="form.errors.clear('speak_fluency')">
              <option>Excellent</option>
              <option>Very Good</option>
              <option>Fair</option>
            </select>

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

  </div>

 </div>

 </div>

</form>

</template>

<script>
import { Form } from '../../ValidationFramework/Form.js';

export default {
  props: {
    language: Object,
    applicantId: String,
    showAddAction: Boolean,
    isEmptyTemplate: Boolean,
    showDeleteAction: Boolean,
    index: Number
  },
  data() {
    return {
      model: {
        name: '',
        speak_fluency: '',
        write_fluency: ''
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
    this.showAdd = this.showAddAction;

    if(this.language) {

      console.log(this.language);

      let formModel = _.assign({}, this.language,  {
        'applicant_id': this.applicantId
      });

      this.form = new Form(formModel);
    }
    else {
      let formModel = _.assign({}, this.model,  {
        'applicant_id': this.applicantId
      });
      this.form = new Form(formModel);
    }

  },

  mounted() {
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
      if(this.language) {
        this.updateLanguage();
      }
      else {
        this.createLanguage();
      }
      this.showAdd = false;
    },

    createLanguage() {
        this.showAsync = true;
        this.form.submit('POST', '/user_languages')
            .then(response => {
              this.successMessage = "Saved successfully";
              this.showSuccess = true;
              var _this = this;
              setTimeout(function () {
                _this.showSuccess = false;
                _this.showAsync = false;
                _this.showAdd = _this.showAddAction;
                _this.$emit('language-added', response.data.language);
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

          // End of createLanguage method
    },

    updateLanguage() {
        this.showAsync = true;
        let url = '/user_languages/' + this.language.id;
        this.form.submit('PATCH', url)
            .then(response => {
              this.successMessage = "Updated successfully";
              this.showSuccess = true;
              var _this = this;
              setTimeout(function () {
                _this.showSuccess = false;
                _this.showAsync = false;
                _this.showAdd = _this.showAddAction;
                _this.$emit('language-updated', {
                  'index': _this.index,
                  'language': response.data.language
                });
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
      //End of updateLanguage method
    },

    onDelete() {
      this.showConfirm = true;
      this.showAdd = false;
    },

    onOkay() {
      this.showConfirm = false;
      this.showAsync = true;
      this.deleteLanguage();
    },

    onCancel() {
      this.showConfirm = false;
      this.showAdd = this.showAddAction;
    },

    deleteLanguage() {
        this.showAsync = true;
        let url = '/user_languages/' + this.language.id;
        this.form.submit('DELETE', url)
            .then(response => {
              this.successMessage = "Deleted successfully";
              this.showSuccess = true;
              var _this = this;
              setTimeout(function () {
                _this.showSuccess = false;
                _this.showAsync = false;
                _this.showAdd = _this.showAddAction;
                _this.$emit('language-deleted', _this.index);
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

      //End of deleteLanguage method
    }

  }, //End of methods

}
</script>

<style lang="css">
</style>

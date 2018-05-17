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

        <div :class="['form-group', 'position-relative', {'has-cv-error': form.errors.has('name')}]">

            <cv-placeholder
              :name="'Name'"
              :length="getLength('name')"></cv-placeholder>

            <textarea name="name"
               class="cv-textarea-input" rows="1"
               v-model="form.name"></textarea>

        </div>

      </div>

      <div class="col-md-6">

        <div :class="['form-group', 'position-relative', {'has-cv-error': form.errors.has('title')}]">

            <cv-placeholder
              :name="'Title e.g General Manager'"
              :length="getLength('title')"></cv-placeholder>

            <textarea name="title"
              class="cv-textarea-input" rows="1"
              v-model="form.title"></textarea>

        </div>

      </div>

    </div>

    <div class="row">

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

        <div class="col-md-6">

          <div :class="['form-group', 'position-relative', {'has-cv-error': form.errors.has('email')}]">

              <cv-placeholder
                :name="'Email'"
                :length="getLength('email')"></cv-placeholder>

              <textarea name="email"
                class="cv-textarea-input" rows="1"
                v-model="form.email"></textarea>

          </div>

        </div>

    </div>

    <div class="row">

        <div class="col-md-6">

          <div :class="['form-group', 'position-relative', {'has-cv-error': form.errors.has('mobile')}]">

              <cv-placeholder
                :name="'Mobile'"
                :length="getLength('mobile')"></cv-placeholder>

              <textarea name="mobile" rows="1"
                class="cv-textarea-input" v-model="form.mobile"></textarea>

          </div>

        </div>

        <div class="col-md-6">

          <div :class="['form-group', 'position-relative', {'has-cv-error': form.errors.has('alternative_mobile')}]">

            <textarea name="alternative_mobile" placeholder="Alternative Mobile"
              rows="1" class="cv-textarea-input"
              v-model="form.alternative_mobile"></textarea>

          </div>

        </div>

    </div>

    <div class="row">

      <div class="col-md-12">

        <div class="form-group">

          <button type="submit" class="btn btn-success pull-right" title="Save"
            v-show="!showDeleteAction">
            <i class="fa fa-save"></i>
          </button>

          <div class="btn-group pull-right" v-show="showDeleteAction">

            <button type="submit" class="btn btn-success" title="Save">
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
    referee: Object,
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
        title: '',
        organization: '',
        email: '',
        mobile: '',
        alternative_mobile: ''
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

    if(this.referee) {

      console.log(this.referee);

      let formModel = _.assign({}, this.referee,  {
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
        this.updateReferee();
      }
      else {
        this.createReferee();
      }
      this.showAdd = false;
    },

    createReferee() {
           this.showAsync = true;
           this.form.submit('POST', '/user_referees')
               .then(response => {
                 this.successMessage = "Saved successfully";
                 this.showSuccess = true;
                 var _this = this;
                 setTimeout(function () {
                   _this.showSuccess = false;
                   _this.showAsync = false;
                   _this.showAdd = _this.showAddAction;
                   _this.$emit("referee-added", response.data.referee);
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
    //End of createReferee
  },

    updateReferee() {
      this.showAsync = true;
      let url = '/user_referees/' + this.referee.id
      this.form.submit('PATCH', url)
          .then(response => {
            this.successMessage = "Updated successfully";
            this.showSuccess = true;
            var _this = this;
            setTimeout(function () {
              _this.showSuccess = false;
              _this.showAsync = false;
              _this.showAdd = _this.showAddAction;
              _this.$emit("referee-updated", {
                'index': _this.index,
                'referee': response.data.referee
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

    //End of updateReferee
    },

    onDelete() {
      this.showConfirm = true;
      this.showAdd = false;
    },

    onOkay() {
      this.showConfirm = false;
      this.showAsync = true;
      this.deleteReferee();
    },

    onCancel() {
      this.showConfirm = false;
      this.showAdd = this.showAddAction;
    },

    deleteReferee() {
        this.showAsync = true;
        let url = '/user_referees/' + this.referee.id;
        this.form.submit('DELETE', url)
            .then(response => {
              this.successMessage = "Deleted successfully";
              this.showSuccess = true;
              var _this = this;
              setTimeout(function () {
                _this.showSuccess = false;
                _this.showAsync = false;
                _this.showAdd = _this.showAddAction;
                _this.$emit('referee-deleted', _this.index);
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

      //End of deleteReferee method
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

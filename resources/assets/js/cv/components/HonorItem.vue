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
            <textarea name="title" placeholder="Title e.g Best Employee"
              class="cv-textarea-input" rows="1"
              v-model="form.title"></textarea>
        </div>

      </div>

      <div class="col-md-6">

        <div class="form-group">
            <textarea name="organization" placeholder="Institution e.g Niajiri"
             class="cv-textarea-input" rows="1"
             v-model="form.organization"></textarea>
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
    honor: Object,
    applicantId: String,
    showAddAction: Boolean,
    isEmptyTemplate: Boolean,
    showDeleteAction: Boolean
  },
  data() {
    return {
      model: {
        title: '',
        organization: '',
        issued_at: '',
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
    let formModel = _.assign({}, this.honor,  { 'applicant_id': this.applicantId });
    if(this.honor) {
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
      if(this.honor) {
        this.updateHonor();
      }
      else {
        this.createHonor();
      }
    },

    createHonor() {
        this.showAdd = false;
        this.showAsync = true;
        this.form.submit('POST', '/user_honors')
            .then(response => {
              this.successMessage = "Saved successfully";
              this.showSuccess = true;
              var _this = this;
              setTimeout(function () {
                _this.showSuccess = false;
                _this.showAsync = false;
                _this.showAdd = _this.showAddAction;
                _this.$emit('honor-added', response.data.honors);
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

          // End of createHonor method
    },

    updateHonor() {
        this.showAdd = false;
        this.showAsync = true;
        let url = '/user_honors/' + this.honor.id;
        this.form.submit('PATCH', url)
            .then(response => {
              this.successMessage = "Updated successfully";
              this.showSuccess = true;
              var _this = this;
              setTimeout(function () {
                _this.showSuccess = false;
                _this.showAsync = false;
                _this.showAdd = _this.showAddAction;
                _this.$emit('honor-updated', response.data.honors);
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
      //End of updateHonor method
    },

    onDelete() {
      this.showConfirm = true;
      this.showAdd = false;
    },

    onOkay() {
      this.showConfirm = false;
      this.showAsync = true;
      this.deleteHonor();
    },

    onCancel() {
      this.showConfirm = false;
      this.showAdd = this.showAddAction;
    },

    deleteHonor() {
        this.showAsync = true;
        let url = '/user_honors/' + this.honor.id;
        this.form.submit('DELETE', url)
            .then(response => {
              this.successMessage = "Deleted successfully";
              this.showSuccess = true;
              var _this = this;
              setTimeout(function () {
                _this.showSuccess = false;
                _this.showAsync = false;
                _this.showAdd = _this.showAddAction;
                _this.$emit('honor-deleted', response.data.honors);
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

      //End of deleteHonor method
    }

  } //End of methods
}
</script>

<style lang="css">
</style>

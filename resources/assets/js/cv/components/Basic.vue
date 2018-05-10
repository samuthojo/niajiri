<template>
  <form @submit.prevent="onSubmit"
        @keydown="form.errors.clear($event.target.name)">
      <div>
          <!-- TODO: To put translations -->
          <div class="form-group flex flex-vertical-center">
              <i :class="['fa fa-user cv-icon', {'has-cv-error': form.errors.has('first_name')}]"></i>
              <div :class="['col-md-4', 'position-relative', {'has-cv-error': form.errors.has('first_name')}]">
                <cv-placeholder
                  :name="'FirstName'"
                  :length="getLength('first_name')"></cv-placeholder>
                <input type="text" name="first_name" class="cv-text-input"
                  v-model="form.first_name" id="first_name">
              </div>
              <div :class="['col-md-4', {'has-cv-error': form.errors.has('middle_name')}]">
                <input type="text" name="middle_name"
                  placeholder="MiddleName" class="cv-text-input"
                  v-model="form.middle_name">
              </div>
              <div :class="['col-md-4', 'position-relative', {'has-cv-error': form.errors.has('surname')}]">
                <cv-placeholder
                  :name="'LastName'"
                  :length="getLength('surname')"></cv-placeholder>
                <input type="text" name="surname"
                  class="cv-text-input"
                  v-model="form.surname">
              </div>
          </div>
          <div class="form-group flex flex-vertical-center">
              <i :class="['fa fa-calendar cv-icon', {'has-cv-error': form.errors.has('dob')}]"></i>
              <div :class="['col-md-6', 'position-relative', {'has-cv-error': form.errors.has('dob')}]">
                <cv-placeholder
                  :name="'Date Of Birth'"
                  :length="getLength('dob')"></cv-placeholder>
                <input type="text" name="dob" class="cv-text-input"
                  :value="form.dob | isoDate" id="date_of_birth"
                  @input="form.dob = $event.target.value">
              </div>
              <i :class="['fa fa-male cv-icon', {'has-cv-error': form.errors.has('gender')}]"></i>
              <i :class="['fa fa-female cv-icon', {'has-cv-error': form.errors.has('gender')}]"></i>
              <div :class="['col-md-6', 'radio', {'has-cv-error': form.errors.has('gender')}]">
                <label
                  :class="{'has-cv-error': form.errors.has('gender')}">
                  <input type="radio" name="gender" value="Male"
                  v-model="form.gender"
                  @change="form.errors.clear('gender')">Male</label>
                <label
                  :class="{'has-cv-error': form.errors.has('gender')}">
                  <input type="radio" name="gender" value="Female"
                  v-model="form.gender"
                  @change="form.errors.clear('gender')">Female</label>
                <span class="asterik">*</span>
              </div>
          </div>
          <div class="form-group flex flex-vertical-center">
              <i :class="['fa fa-phone cv-icon', {'has-cv-error': form.errors.has('mobile')}]"></i>
              <div :class="['col-md-6', 'position-relative', {'has-cv-error': form.errors.has('mobile')}]">
                <cv-placeholder
                  :name="'Mobile'"
                  :length="getLength('mobile')"></cv-placeholder>
                <input type="text" name="mobile" class="cv-text-input"
                  v-model="form.mobile">
              </div>
              <i :class="['fa fa-phone cv-icon', {'has-cv-error': form.errors.has('alternative_mobile')}]"></i>
              <div :class="['col-md-6', {'has-cv-error': form.errors.has('alternative_mobile')}]">
                <input type="text" name="alternative_mobile"
                  placeholder="Alternative Mobile" class="cv-text-input"
                  v-model="form.alternative_mobile">
              </div>
          </div>
          <div class="form-group flex flex-vertical-center">
              <i :class="['fa fa-at cv-icon', {'has-cv-error': form.errors.has('email')}]"></i>
              <div :class="['col-md-6', 'position-relative', {'has-cv-error': form.errors.has('email')}]">
                <cv-placeholder
                  :name="'Email'"
                  :length="getLength('email')"></cv-placeholder>
                <input type="text" name="email" class="cv-text-input"
                  v-model="form.email">
              </div>
              <i :class="['fa fa-at cv-icon', {'has-cv-error': form.errors.has('secondary_email')}]"></i>
              <div :class="['col-md-6', {'has-cv-error': form.errors.has('secondary_email')}]">
                <input type="text" name="secondary_email"
                  placeholder="Secondary Email" class="cv-text-input"
                  v-model="form.secondary_email">
              </div>
          </div>
          <div class="form-group flex flex-vertical-center">
              <i :class="['fa fa-envelope cv-icon', {'has-cv-error': form.errors.has('postal_address')}]"></i>
              <div :class="['col-md-6', {'has-cv-error': form.errors.has('postal_address')}]">
                <input type="text" name="postal_address"
                  placeholder="Postal Address" class="cv-text-input"
                  v-model="form.postal_address">
              </div>
              <i :class="['fa fa-map-marker cv-icon', {'has-cv-error': form.errors.has('physical_address')}]"></i>
              <div :class="['col-md-6', 'position-relative', {'has-cv-error': form.errors.has('physical_address')}]">
                <cv-placeholder
                  :name="'Physical Address'"
                  :length="getLength('physical_address')"></cv-placeholder>
                <input type="text" name="physical_address" class="cv-text-input"
                  v-model="form.physical_address">
              </div>
          </div>
          <div class="form-group flex flex-vertical-center">
              <div class="col-md-6">
                <label for="country"
                  :class="{'has-cv-error': form.errors.has('country')}">Country:</label>
                <span class="asterik">*</span>
                <select name="country" @change="set_states"
                  :class="['form-control', {'has-cv-error': form.errors.has('country')}]"
                  id="country"
                  v-model="form.country">
                    <option v-for="country in countries"
                      :key="country.name"
                      :selected="user.country ? user.country == country.name : country.name == 'Tanzania'">
                      {{ country.name }}
                    </option>
                </select>
              </div>
              <div class="col-md-6">
                <label for="state"
                  :class="{'has-cv-error': form.errors.has('state')}">State/Region/City:</label>
                <span class="asterik">*</span>
                <select name="state" id="state"
                  :class="['form-control', {'has-cv-error': form.errors.has('state')}]"
                  v-model="form.state" @change="form.errors.clear('state')">
                    <option v-for="state in states" :key="state.name">{{ state.name }}</option>
                </select>
              </div>
          </div>
          <div class="form-group">
              <div :class="['col-md-12', 'position-relative', {'has-cv-error': form.errors.has('summary')}]">
                <cv-placeholder
                  :name="'About Me'"
                  :length="getLength('summary')"></cv-placeholder>
                <textarea name="summary" id="about_me" class="cv-textarea-input"
                  v-model="form.summary"></textarea>
              </div>
          </div>
          <button type="submit" class="btn btn-primary pull-right"
            :disabled="form.errors.any()">Save</button>
      </div>

      <div class="flex flex-vertical-center">
        <cv-avatar
          :avatar-url="form.avatar"
          @avatar-changed="onAvatarChanged"></cv-avatar>
      </div>

  </form>
</template>

<script>
import { Form } from '../../ValidationFramework/Form.js';
export default {
    props: {
      'user': Object
    },
    data() {
        return {
            countries: [],
            states: [],
            form: new Form({
              'country': '',
              'state': ''
            })
        }
    },
    created() {
        this.set_countries();
        this.set_states();
        this.set_form();
    },
    methods: {
        set_states(event) {

            let country;

            if(event) {
             country = event.target.value;
             this.form.state = '';
            }
            else if (this.user.country) {
              country = this.user.country;
            }
            else {
              country = 'Tanzania';
            }

            let url = '/location/states?country=' + country;
            axios.get(url)
                .then(response => this.states = _.toArray(response.data))
                .catch(error => console.error(error.response.data));
        },
        set_countries() {
          axios.get('/location/countries')
               .then(response => this.countries = _.toArray(response.data))
               .catch(error => console.error(error.response.data));
        },
        set_form() {
          if(this.user.country) {
            this.form = new Form(this.user);
          }
          else {
            this.form = new Form(_.assign({}, this.user, {'country': 'Tanzania'}));
          }
        },
        onSubmit() {
            this.$snotify.async('Saving ...', 'Please Wait', () => new Promise((resolve, reject) => {
              this.form.submit('PATCH', '/basic')
                        .then(response => {
                          this.form.onSuccess();
                          resolve({
                            title: 'Success',
                            body: response.data.message,
                            config: {
                              timeout: 2000,
                              closeOnClick: true,
                              showProgressBar: true
                            }
                          });
                        })
                        .catch(error =>  {
                          this.form.onFail(error);
                          let message = "Sorry, An Error Occured, please try later!";
                          if(error.response.status == 422) {
                            message = error.response.data.message;
                          }
                          reject({
                            title: 'Error',
                            body: message,
                            config: {
                              timeout: 3000,
                              closeOnClick: true,
                              showProgressBar: true
                            }
                          });
                        });
                  }));
        },
        onAvatarChanged(file) {
          this.$snotify.async('Updating ...', '', () => new Promise((resolve, reject) => {
            axios.post('/avatar', file, {
                                  'headers': {
                                    'Content-Type': 'multipart/form-data'
                                  }
                                })
                 .then(response => {
                        console.log(response.data);
                        this.form.avatar = response.data.user.avatar;
                        this.user.avatar = response.data.user.avatar;
                        $("#user-avatar").attr('src', this.user.avatar);
                        resolve({
                          title: 'Updated',
                          body: response.data.message,
                          config: {
                            timeout: 2000,
                            closeOnClick: true,
                            showProgressBar: true
                          }
                        });
                      })
               .catch(error => {
                 console.log(error);
                 reject({
                   title: 'Oops',
                   body: 'Sorry, an error occured, picture couldn\'t be updated',
                   config: {
                     timeout: 2000,
                     closeOnClick: true,
                     showProgressBar: false
                   }
                 });
               });
             }));
        },
        initDatePicker() {
          $('#date_of_birth').datepicker({
            format: "yyyy-mm-dd",
            autoclose: true
          }).on("changeDate", () => {
            this.form.dob = $('#date_of_birth').val();
            this.form.errors.clear('dob');
          });
        },
        getLength(field) {
          if(this.form[field])
            return this.form[field].toString().length;
          return 0;
        }
    }
}
</script>

<style>
</style>

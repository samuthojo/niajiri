<template>
  <div class="basic-container">
      <div>
          <!-- TODO: To put translations -->
          <div class="form-group flex-container">
              <i class="fa fa-user cv-icon"></i>
              <div class="col-sm-4">
                <input type="text" name="first_name" placeholder="FirstName" class="cv-text-input">
              </div>
              <div class="col-sm-4">
                <input type="text" name="middle_name" placeholder="MiddleName" class="cv-text-input">
              </div>
              <div class="col-sm-4">
                <input type="text" name="last_name" placeholder="LastName" class="cv-text-input">
              </div>
          </div>
          <div class="form-group flex-container">
              <i class="fa fa-calendar cv-icon"></i>
              <div class="col-sm-6">
                <input type="text" name="date_of_birth" placeholder="Date Of Birth" class="cv-text-input">
              </div>
              <i class="fa fa-male cv-icon"></i>
              <i class="fa fa-female cv-icon"></i>
              <div class="col-sm-6 radio">
                <label><input type="radio" name="gender">Male</label>
                <label><input type="radio" name="gender">Female</label>
              </div>
          </div>
          <div class="form-group flex-container">
              <i class="fa fa-phone cv-icon"></i>
              <div class="col-sm-6">
                <input type="text" name="mobile" placeholder="Mobile" class="cv-text-input">
              </div>
              <i class="fa fa-phone cv-icon"></i>
              <div class="col-sm-6">
                <input type="text" name="mobile" placeholder="Alternative Mobile" class="cv-text-input">
              </div>
          </div>
          <div class="form-group flex-container">
              <i class="fa fa-at cv-icon"></i>
              <div class="col-sm-6">
                <input type="text" name="email" placeholder="Email" class="cv-text-input">
              </div>
              <i class="fa fa-at cv-icon"></i>
              <div class="col-sm-6">
                <input type="text" name="secondary_email" placeholder="Secondary Email" class="cv-text-input">
              </div>
          </div>
          <div class="form-group flex-container">
              <i class="fa fa-envelope cv-icon"></i>
              <div class="col-sm-6">
                <input type="text" name="postal_address" placeholder="Postal Address" class="cv-text-input">
              </div>
              <i class="fa fa-map-marker cv-icon"></i>
              <div class="col-sm-6">
                <input type="text" name="physical_address" placeholder="Physical Address" class="cv-text-input">
              </div>
          </div>
          <div class="form-group flex-container">
              <div class="col-sm-6">
                <label for="country">Country:</label>
                <select name="country" @change="get_states" ref="country" class="form-control" id="country">
                    <option v-for="country in countries" :value="country.name" :key="country.name">{{ country.name }}</option>
                </select>
              </div>
              <div class="col-sm-6">
                <label for="region">State/Region/City:</label>
                <select name="region" id="region" class="form-control">
                    <option v-for="state in states" :value="state.name" :key="state.name">{{ state.name }}</option>
                </select>
              </div>
          </div>
          <div class="form-group">
              <div class="col-sm-12">
                <textarea name="" id="" class="cv-textarea-input" placeholder="About Me"></textarea>
              </div>
          </div>
      </div>

      <div class="cv-image-container">
        <div class="cv-image"></div>
      </div>
      
  </div>
</template>

<script>
export default {
    data() {
        return {
            countries: [],
            states: []
        }
    },
    created() {
        
        this.set_countries()
            .then(country => {
                this.$refs.country.value = country.name;

                this.get_states();
            })
            .catch(error => console.error(error));
         
    },
    methods: {
        get_states(event) {
            let country = 'Tanzania';
            if(event) {
             country = event.target.value;
            }
            let url = '/location/states?country=' + country; 
            axios.get(url)
                .then(response => this.states = response.data)
                .catch(error => console.error(error.response.data));
        },
        set_countries() {
            return new Promise((resolve, reject) => {
                axios.get('/location/countries')
                     .then(response => {
                         this.countries = response.data
                         resolve(this.countries.TZ); 
                     })
                     .catch(error => reject(error.response.data));
            });
        }
    }
}
</script>

<style>
.basic-container {
    display: flex;
    justify-content: space-between;
    padding: 16px 16px 16px 16px;
}

.cv-image-container {
    display: flex;
    align-items: center;
}

.cv-image{
    background-image: url('http://localhost:8000/images/cv_avatar.svg');
    background-size: cover;
    background-repeat: no-repeat;
    height: 220px;
    width: 220px;
    border-radius: 50%;
}

.flex-container {
    display: flex;
    align-items: center;
}
</style>

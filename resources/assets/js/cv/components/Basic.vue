<template>
  <div class="basic-container">
      <div>
          <!-- TODO: To put translations -->
          <h1>BASIC DETAILS</h1>
          <div class="form-group">
              <input type="text" name="first_name" placeholder="FirstName">
              <input type="text" name="middle_name" placeholder="MiddleName">
              <input type="text" name="last_name" placeholder="LastName">
          </div>
          <div class="form-group">
              <input type="text" name="date_of_birth" placeholder="Date Of Birth">
              <input type="radio" name="gender">Male
              <input type="radio" name="gender">Female
          </div>
          <div class="form-group">
              <input type="text" name="mobile" placeholder="Mobile">
              <input type="text" name="mobile" placeholder="Alternative Mobile">
          </div>
          <div class="form-group">
              <input type="text" name="email" placeholder="Email">
              <input type="text" name="secondary_email" placeholder="Secondary Email">
              <input type="text" name="postal_address" placeholder="Postal Address">
          </div>
          <div class="form-group">
              <select name="country" placeholder="Country" @change="get_states" ref="country">
                  <option v-for="country in countries" :value="country.name" :key="country.name">{{ country.name }}</option>
              </select>
              <select name="region" placeholder="State/Region/City">
                <option v-for="state in states" :value="state.name" :key="state.name">{{ state.name }}</option>
              </select>
              <input type="text" name="physical_address" placeholder="Physical Address">
          </div>
          <div class="form-group">
              <textarea name="" id="" class="form-control" placeholder="About Me"></textarea>
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
    border: 1px solid;
    padding: 0 16px 16px 16px;
}

.cv-image-container {
    display: flex;
    align-items: center;
}

.cv-image{
    background-image: url('http://localhost:8000/images/cv_avatar.svg');
    background-size: cover;
    background-repeat: no-repeat;
    height: 300px;
    width: 300px;
    border-radius: 50%;
}
</style>

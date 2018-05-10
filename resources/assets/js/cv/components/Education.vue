<template>

  <form class="education-container" @submit.prevent="">

      <div>
          <!-- TODO: To put translations -->
          <h3 class="component-title panel-title">EDUCATION</h3>
          <div class="form-group">
              <label for="level">Level</label>
              <select name="level" ref="level" id="level" class="form-control">
                  <option value="Certificate" selected>Certificate</option>
                  <option value="Diploma">Diploma</option>
                  <option value="Degree">Degree</option>
                  <option value="Masters">Masters</option>
              </select>
          </div>
          <div class="form-group">
              <label for="institution">Institution</label>
              <select name="institution" ref="institution" id="institution"
                class="form-control">
                  <option selected disabled key="institution">e.g Mtakuja</option>
                  <option v-for="institution in institutions" :key="institution.name" :value="institution.name">{{ institution.name }}</option>
              </select>
          </div>
          <div class="form-group">
              <label for="qualification">Qualification</label>
              <select name="qualification" ref="qualification"
                id="qualification" class="form-control">
                  <option selected disabled key="qualification">e.g Primary, Bsc. In Computer Science</option>
                  <option v-for="qualification in qualifications" :key="qualification.name" :value="qualification.name">{{ qualification.name }}</option>
              </select>
          </div>
          <div class="form-group">
              <input type="text" name="start_date" placeholder="Date Started"
                class="cv-text-input">
          </div>
          <div class="form-group">
              <input type="text" name="end_date" placeholder="Date Finished"
                class="cv-text-input">
          </div>
          <div class="form-group">
              <input type="text" name="gpa" placeholder="GPA/Score"
                class="cv-text-input">
          </div>
          <div class="form-group">
              <input type="file" name="attachment">
          </div>
          <button type="submit" class="btn btn-primary pull-right">Save</button>
      </div>

  </form>
</template>

<script>
export default {
    props: {
        institutions: Array,
        qualifications: Array
    }
}
</script>

<style>
.education-container {
    display: flex;
    flex-direction: column;
    padding: 0 16px 16px 16px;
}
</style>

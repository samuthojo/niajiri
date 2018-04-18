<template>

  <div class="education-container">

      <div>
          <!-- TODO: To put translations -->
          <h1>EDUCATION</h1>
          <div class="form-group">
              <select name="level" ref="level">
                  <option value="Certificate" selected>Certificate</option>
                  <option value="Diploma">Diploma</option>
                  <option value="Degree">Degree</option>
                  <option value="Masters">Masters</option>
              </select>
          </div>
          <div class="form-group">
              <select name="institution" ref="institution">
                  <option selected disabled>e.g Mtakuja</option>
              </select>
          </div>
          <div class="form-group">
              <select name="qualification" ref="qualification">
                  <option selected disabled>e.g Primary, Bsc. In Computer Science</option>
              </select>
          </div>
          <div class="form-group">
              <i class="fa fa-calendar"></i>
              <input type="text" name="start_date" placeholder="Date Started">
          </div>
          <div class="form-group">
              <i class="fa fa-calendar"></i>
              <input type="text" name="end_date" placeholder="Date Finished">
          </div>
          <div class="form-group">
              <input type="text" name="gpa" placeholder="GPA/Score">
          </div>
          <div class="form-group">
              <input type="file" name="attachment">
          </div>
      </div>
      
  </div>
</template>

<script>
export default {
    
}
</script>

<style>
.education-container {
    display: flex;
    flex-direction: column;
    border: 1px solid;
    padding: 0 16px 16px 16px;
}
</style>

<template>

  <div class="intern-container">

      <div>
          <!-- TODO: To put translations -->
          <h1>FIELD ATTACHMENT/INTERNSHIP/WORK EXPERIENCE</h1>
          <div class="form-group">
              <input type="text" name="position" placeholder="Position">
          </div>
          <div class="form-group">
              <input type="text" name="organization" placeholder="Organization/Company">
          </div>
          <div class="form-group">
              <input type="text" name="sector" placeholder="Sector">
          </div>
          <div class="form-group">
              <input type="text" name="location" placeholder="Location">
          </div>
          <div class="form-group">
              <input type="text" name="start_date" placeholder="Start Date">
          </div>
          <div class="form-group">
              <input type="text" name="end_date" placeholder="End Date">
          </div>
          <div class="form-group">
              <textarea name="" id="" class="form-control" placeholder="What did you achieve in this role"></textarea>
          </div>
      </div>
      
  </div>
</template>

<script>
export default {
    
}
</script>

<style>
.intern-container {
    display: flex;
    flex-direction: column;
    padding: 0 16px 16px 16px;
}
</style>

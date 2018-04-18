<template>

  <div class="honor-container">

      <div>
          <!-- TODO: To put translations -->
          <h1>HONOR/AWARDS DETAILS</h1>
          <div class="form-group">
              <input type="text" name="title" placeholder="Title">
          </div>
          <div class="form-group">
              <input type="text" name="institution" placeholder="Institution">
          </div>
          <div class="form-group">
              <input type="text" name="date_issued" placeholder="Date Issued">
          </div>
          <div class="form-group">
              <textarea class="form-control" name="summary" placeholder="Summary"></textarea>
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
.honor-container {
    display: flex;
    flex-direction: column;
    padding: 0 16px 16px 16px;
}
</style>

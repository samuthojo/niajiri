<template>

  <div class="certificate-container">

      <div>
          <!-- TODO: To put translations -->
          <h1>CERTIFICATION DETAILS</h1>
          <div class="form-group">
              <input type="text" name="name" placeholder="Title/Name">
          </div>
          <div class="form-group">
              <input type="text" name="institution" placeholder="Institution">
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
              <textarea name="summary" class="form-control" placeholder="Summary"></textarea>
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
.certificate-container {
    display: flex;
    flex-direction: column;
    border: 1px solid;
    padding: 0 16px 16px 16px;
}
</style>

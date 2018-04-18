<template>

  <div class="referees-container">

      <div>
          <!-- TODO: To put translations -->
          <h1>REFEREES DETAILS</h1>
          <div class="form-group">
              <input type="text" name="name" placeholder="Name">
          </div>
          <div class="form-group">
              <input type="text" name="title" placeholder="Position">
          </div>
          <div class="form-group">
              <input type="text" name="organization" placeholder="Organization">
          </div>
          <div class="form-group">
              <input type="text" name="email" placeholder="Email">
          </div>
          <div class="form-group">
              <input type="text" name="mobile" placeholder="Mobile">
          </div>
          <div class="form-group">
              <input type="text" name="alternative_mobile" placeholder="Alternative Mobile">
          </div>
      </div>
      
  </div>
</template>

<script>
export default {
    
}
</script>

<style>
.referees-container {
    display: flex;
    flex-direction: column;
    padding: 0 16px 16px 16px;
}
</style>

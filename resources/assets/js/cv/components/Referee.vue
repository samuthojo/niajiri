<template>

  <form class="referees-container" @submit.prevent="">

      <div>
          <!-- TODO: To put translations -->
          <h3 class="component-title panel-title">REFEREES DETAILS</h3>
          <div class="form-group">
              <input type="text" name="name" placeholder="Name"
                class="cv-text-input">
          </div>
          <div class="form-group">
              <input type="text" name="title" placeholder="Position"
                class="cv-text-input">
          </div>
          <div class="form-group">
              <input type="text" name="organization" placeholder="Organization"
                class="cv-text-input">
          </div>
          <div class="form-group">
              <input type="text" name="email" placeholder="Email"
                class="cv-text-input">
          </div>
          <div class="form-group">
              <input type="text" name="mobile" placeholder="Mobile"
                class="cv-text-input">
          </div>
          <div class="form-group">
              <input type="text" name="alternative_mobile"
                placeholder="Alternative Mobile"
                class="cv-text-input">
          </div>
          <button type="submit" class="btn btn-primary pull-right">Save</button>
      </div>

  </form>
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

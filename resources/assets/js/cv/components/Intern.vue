<template>

  <form class="intern-container" @submit.prevent="">

      <div>
          <!-- TODO: To put translations -->
          <h3 class="component-title panel-title">
            FIELD ATTACHMENT/INTERNSHIP/WORK EXPERIENCE</h3>
          <div class="form-group">
              <input type="text" name="position" placeholder="Position"
                class="cv-text-input">
          </div>
          <div class="form-group">
              <input type="text" name="organization"
                placeholder="Organization/Company" class="cv-text-input">
          </div>
          <div class="form-group">
              <input type="text" name="sector" placeholder="Sector"
                class="cv-text-input">
          </div>
          <div class="form-group">
              <input type="text" name="location" placeholder="Location"
                class="cv-text-input">
          </div>
          <div class="form-group">
              <input type="text" name="start_date" placeholder="Start Date"
                class="cv-text-input">
          </div>
          <div class="form-group">
              <input type="text" name="end_date" placeholder="End Date"
                class="cv-text-input">
          </div>
          <div class="form-group">
              <textarea name="" class="form-control cv-textarea-input"
                placeholder="What did you achieve in this role"></textarea>
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
.intern-container {
    display: flex;
    flex-direction: column;
    padding: 0 16px 16px 16px;
}
</style>

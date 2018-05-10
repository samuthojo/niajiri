<template>

  <form class="certificate-container" @submit.prevent="">

      <div>
          <!-- TODO: To put translations -->
          <h3 class="component-title panel-title">CERTIFICATION DETAILS</h3>
          <div class="form-group">
              <input type="text" name="name" placeholder="Title/Name"
                class="cv-text-input">
          </div>
          <div class="form-group">
              <input type="text" name="institution" placeholder="Institution"
                class="cv-text-input">
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
              <textarea name="summary" class="form-control cv-textarea-input"
                placeholder="Summary"></textarea>
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

}
</script>

<style>
.certificate-container {
    display: flex;
    flex-direction: column;
    padding: 0 16px 16px 16px;
}
</style>

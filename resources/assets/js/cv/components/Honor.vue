<template>

  <form class="honor-container" @submit.prevent="">

      <div>
          <!-- TODO: To put translations -->
          <h3 class="component-title panel-title">HONOR/AWARDS DETAILS</h3>
          <div class="form-group">
              <input type="text" name="title" placeholder="Title"
                class="cv-text-input">
          </div>
          <div class="form-group">
              <input type="text" name="institution" placeholder="Institution"
                class="cv-text-input">
          </div>
          <div class="form-group">
              <input type="text" name="date_issued" placeholder="Date Issued"
                class="cv-text-input">
          </div>
          <div class="form-group">
              <textarea class="form-control cv-textarea-input"
                name="" placeholder="Summary"></textarea>
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
.honor-container {
    display: flex;
    flex-direction: column;
    padding: 0 16px 16px 16px;
}
</style>

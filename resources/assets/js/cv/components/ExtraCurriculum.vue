<template>

  <form class="extra-curriculum-container" @submit.prevent="">

      <div>
          <!-- TODO: To put translations -->
          <h3 class="component-title panel-title">EXTRACURRICULAR ACTIVITIES</h3>
          <div class="form-group">
              <textarea name="extracurriculum" class="form-control cv-textarea-input"
                placeholder="Extracurricular activities"></textarea>
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
.extra-curriculum-container {
    display: flex;
    flex-direction: column;
    padding: 0 16px 16px 16px;
}
</style>

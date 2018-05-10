<template>

  <form class="skills-container" @submit.prevent="">

      <div>
          <!-- TODO: To put translations -->
          <h3 class="component-title panel-title">SKILLS</h3>
          <div class="form-group">
              <textarea name="skills" class="form-control cv-textarea-input"
                placeholder="Skills"></textarea>
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
.skills-container {
    display: flex;
    flex-direction: column;
    padding: 0 16px 16px 16px;
}
</style>

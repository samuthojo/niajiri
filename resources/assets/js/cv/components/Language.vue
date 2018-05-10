<template>

  <form class="language-container" @submit.prevent="">

      <div>
          <!-- TODO: To put translations -->
          <h3 class="component-title panel-title">LANGUAGES</h3>
          <div class="form-group">
              <select name="name" ref="name" class="form-control">
                  <option selected value="Swahili">Swahili</option>
                  <option value="English">English</option>
                  <option value="French">French</option>
                  <option value="Chinese">Chinese</option>
                  <option value="Italian">Italian</option>
                  <option value="Spanish">Spanish</option>
                  <option value="Hindi">Hindi</option>
                  <option value="Portuguese">Portuguese</option>
                  <option value="Bengali">Bengali</option>
                  <option value="Russian">Russian</option>
              </select>
          </div>
          <div class="form-group">
              <select name="written" ref="written" class="form-control">
                  <option value="Excellent">Excellent</option>
                  <option value="Very Good">Very Good</option>
                  <option value="Fair">Fair</option>
              </select>
          </div>
          <div class="form-group">
              <select name="oral" ref="oral" class="form-control">
                  <option value="Excellent">Excellent</option>
                  <option value="Very Good">Very Good</option>
                  <option value="Fair">Fair</option>
              </select>
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
.language-container {
    display: flex;
    flex-direction: column;
    padding: 0 16px 16px 16px;
}
</style>

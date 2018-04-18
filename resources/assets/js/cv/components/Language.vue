<template>

  <div class="language-container">

      <div>
          <!-- TODO: To put translations -->
          <h1>LANGUAGES</h1>
          <div class="form-group">
              <select name="name" ref="name">
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
              <select name="written" ref="written">
                  <option value="Excellent">Excellent</option>
                  <option value="Very Good">Very Good</option>
                  <option value="Fair">Fair</option>
              </select>
          </div>
          <div class="form-group">
              <select name="oral" ref="oral">
                  <option value="Excellent">Excellent</option>
                  <option value="Very Good">Very Good</option>
                  <option value="Fair">Fair</option>
              </select>
          </div>
      </div>
      
  </div>
</template>

<script>
export default {
    
}
</script>

<style>
.language-container {
    display: flex;
    flex-direction: column;
    border: 1px solid;
    padding: 0 16px 16px 16px;
}
</style>

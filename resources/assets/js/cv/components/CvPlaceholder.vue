<template lang="html">
  <div class="cv-placeholder" v-show="length == 0">
    <label :for=" name | snakeCase ">{{ name }}</label>
    <span class="asterik">*</span>
  </div>
</template>

<script>
export default {
  props: {
    'name': String,
    'length': Number
  },
  data() {
    return {
      show: false
    }
  },
  filters: {
    snakeCase: function (name) {
      return _.snakeCase(name);
    }
  }
}
</script>

<style lang="css">
</style>

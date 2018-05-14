<template>

<div> <!--To serve as root element-->

    <div class="row m-b-lg"><!--start of title-->

      <div class="col-md-12 cv-sub-title clearfix flex flex-vertical-center flex-horizontal-center">

        <div class="col-md-10">

          <h5>LANGUAGES</h5>

        </div>

        <div class="col-md-2">

            <button type="button" class="btn btn-warning pull-right">Add</button>

        </div>

      </div>

    </div><!--end -f title-->

      <template v-if="languages.length == 0">
        <language-item :applicant-id="user.id"></language-item>
      </template>

      <!--start of experience list-->
        <template v-else>
          <language-item v-for="language in languages"
            :key="language.id"
            :language="language"
            :applicant-id="user.id"
            @language-added="onLanguageAdded">
          </language-item>
       </template>
      <!--end of experiences list-->

</div><!-- root element ends here -->

</template>

<script>
export default {
  props: {
    user: Object,
    languages: Array
  },
  methods: {
    onLanguageAdded(languages) {
      this.languages = languages;
    }
  }
}
</script>

<style></style>

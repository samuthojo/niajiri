<template>

<div> <!--To serve as root element-->

    <div class="row m-b-lg"><!--start of title-->

      <div class="col-md-12 cv-sub-title clearfix flex flex-vertical-center flex-horizontal-center">

        <div class="col-md-12">

          <h5>LANGUAGES</h5>

        </div>

      </div>

    </div><!--end -f title-->

      <template v-if="userLanguages.length == 0">
        <language-item :applicant-id="user.id"
        :show-delete-action="false"
        :show-add-action="emptyTemplates.length == 0"
        @add-empty-template="addEmptyTemplate"
        @language-added="onLanguageAdded"></language-item>
      </template>

      <!--start of language list-->
        <template v-else>
          <language-item v-for="(language, n) in userLanguages"
            :key="language.id"
            :index="n"
            :language="language"
            :applicant-id="user.id"
            :is-empty-template="false"
            :show-delete-action="true"
            :show-add-action="n == userLanguages.length - 1 && emptyTemplates.length == 0"
            @language-added="onLanguageAdded"
            @language-updated="onLanguageUpdated"
            @language-deleted="onLanguageDeleted"
            @add-empty-template="addEmptyTemplate">
          </language-item>
       </template>
      <!--end of language list-->

      <template v-if="emptyTemplates.length > 0">
        <language-item
          v-for="(emptyTemplate, n) in emptyTemplates"
          :key="emptyTemplate"
          :id="'empty' + emptyTemplate"
          :applicant-id="user.id"
          :is-empty-template="true"
          :show-delete-action="false"
          :show-add-action="n == emptyTemplates.length - 1"
          @add-empty-template="addEmptyTemplate"
          @cancel-empty-template="cancelEmptyTemplate"
          @language-added="onLanguageAdded"></language-item>
      </template>

</div><!-- root element ends here -->

</template>

<script>
export default {
  props: {
    user: Object,
    languages: Array
  },
  data() {
    return {
      counter: 0,
      userLanguages: [],
      emptyTemplates: []
    }
  },
  created() {
    if(this.languages)
      this.userLanguages = this.languages;
  },
  methods: {
    onLanguageAdded(language) {
      this.userLanguages.push(language);
      if(this.emptyTemplates.length >= 1) {
          this.emptyTemplates.pop();
          this.counter = this.emptyTemplates.length;
      }
    },

    onLanguageUpdated(result) {
      this.userLanguages.splice(result.index, 1, result.language);
    },

    onLanguageDeleted(index) {
      this.userLanguages.splice(index, 1);
    },

    addEmptyTemplate() {
      this.counter = this.counter + 1;
      this.emptyTemplates.push(this.counter);
      $('html, body').css({
          WebkitTransition : 'all 2s ease-in-out',
          MozTransition    : 'all 2s ease-in-out',
          MsTransition     : 'all 2s ease-in-out',
          OTransition      : 'all 2s ease-in-out',
          transition       : 'all 2s ease-in-out'
      });
      $('html, body').animate({
        scrollTop: window.scrollTo(0, window.pageYOffset + 240)
      }, 2000);
    },

    cancelEmptyTemplate() {
      this.emptyTemplates.pop();
      this.counter = this.emptyTemplates.length;
      $('html, body').css({
          WebkitTransition : 'all 2s ease-in-out',
          MozTransition    : 'all 2s ease-in-out',
          MsTransition     : 'all 2s ease-in-out',
          OTransition      : 'all 2s ease-in-out',
          transition       : 'all 2s ease-in-out'
      });
      $('html, body').animate({
        scrollTop: window.scrollTo(0, window.pageYOffset - 240)
      }, 2000);
    }

  //End of methods
  }
}
</script>

<style></style>

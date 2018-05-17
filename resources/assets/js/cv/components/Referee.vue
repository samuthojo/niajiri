<template>

<div> <!--To serve as root element-->

    <div class="row m-b-lg"><!--start of title-->

      <div class="col-md-12 cv-sub-title clearfix flex flex-vertical-center flex-horizontal-center">

        <div class="col-md-12">

          <h5>REFEREES</h5>

        </div>

      </div>

    </div><!--end -f title-->

      <template v-if="userReferees.length == 0">
        <referee-item
          :applicant-id="user.id"
          :is-empty-template="false"
          :show-delete-action="false"
          :show-add-action="emptyTemplates.length == 0"
          @add-empty-template="addEmptyTemplate"
          @referee-added="onRefereeAdded"></referee-item>
      </template>

      <!--start of referee list-->
        <template v-else>
          <referee-item v-for="(referee, n) in userReferees"
            :key="referee.id"
            :index="n"
            :referee="referee"
            :applicant-id="user.id"
            :is-empty-template="false"
            :show-delete-action="true"
            :show-add-action="n == userReferees.length - 1 && emptyTemplates.length == 0"
            @referee-deleted="onRefereeDeleted"
            @add-empty-template="addEmptyTemplate"
            @referee-added="onRefereeAdded">
          </referee-item>
       </template>
      <!--end of referee list-->

      <template v-if="emptyTemplates.length > 0">
        <referee-item
          v-for="(emptyTemplate, n) in emptyTemplates"
          :key="emptyTemplate"
          :id="'empty' + emptyTemplate"
          :applicant-id="user.id"
          :is-empty-template="true"
          :show-delete-action="false"
          :show-add-action="n == emptyTemplates.length - 1"
          @add-empty-template="addEmptyTemplate"
          @cancel-empty-template="cancelEmptyTemplate"
          @referee-added="onRefereeAdded"></referee-item>
      </template>

</div><!--end of root element-->

</template>

<script>
export default {
  props: {
    user: Object,
    referees: Array
  },
  data() {
    return {
      counter: 0,
      userReferees: [],
      emptyTemplates: []
    }
  },
  created() {
    if(this.referees)
      this.userReferees = this.referees;
  },
  methods: {
    onRefereeAdded(referee) {
      this.userReferees.push(referee);
      if(this.emptyTemplates.length >= 1) {
          this.emptyTemplates.pop();
      }
    },

    onRefereeUpdated(result) {
      this.userReferees.splice(result.index, 1, result.referee);
    },

    onRefereeDeleted(index) {
      this.userReferees.splice(index, 1);
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

<style>
</style>

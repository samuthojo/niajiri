<template>

<div> <!--To serve as root element-->

    <div class="row m-b-lg"><!--start of title-->

      <div class="col-md-12 cv-sub-title clearfix flex flex-vertical-center flex-horizontal-center">

        <div class="col-md-12">

          <h5>HONOR/AWARDS RECEIVED</h5>

        </div>

      </div>

    </div><!--end of title-->

      <template v-if="userHonors.length == 0">
        <honor-item
          :applicant-id="user.id"
          :is-empty-template="false"
          :show-delete-action="false"
          :show-add-action="emptyTemplates.length == 0"
          @add-empty-template="addEmptyTemplate"
          @honor-added="onHonorAdded"></honor-item>
      </template>

      <!--start of honor list-->
        <template v-else>
          <honor-item v-for="(honor, n) in userHonors"
            :key="honor.id"
            :honor="honor"
            :index=n
            :applicant-id="user.id"
            :is-empty-template="false"
            :show-delete-action="true"
            :show-add-action="n == userHonors.length - 1 && emptyTemplates.length == 0"
            @honor-added="onHonorAdded"
            @honor-updated="onHonorUpdated"
            @honor-deleted="onHonorDeleted"
            @add-empty-template="addEmptyTemplate">
          </honor-item>
       </template>
      <!--end of honor list-->

      <template v-if="emptyTemplates.length > 0">
        <honor-item
          v-for="(emptyTemplate, n) in emptyTemplates"
          :key="emptyTemplate"
          :id="'empty' + emptyTemplate"
          :applicant-id="user.id"
          :is-empty-template="true"
          :show-delete-action="false"
          :show-add-action="n == emptyTemplates.length - 1"
          @add-empty-template="addEmptyTemplate"
          @cancel-empty-template="cancelEmptyTemplate"
          @honor-added="onHonorAdded"></honor-item>
      </template>

</div><!-- root element ends here -->

</template>

<script>
export default {
  props: {
    user: Object,
    honors: Array
  },
  data() {
    return {
      counter: 0,
      userHonors: [],
      emptyTemplates: []
    }
  },
  created() {
    if(this.honors)
      this.userHonors = this.honors;
  },
  methods: {
    onHonorAdded(honor) {
      this.userHonors.push(honor);
      if(this.emptyTemplates.length >= 1) {
          this.emptyTemplates.pop();
      }
    },

    onHonorUpdated(result) {
      this.userHonors.splice(result.index, 1, result.honor);
    },

    onHonorDeleted(index) {
      this.userHonors.splice(index, 1);
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

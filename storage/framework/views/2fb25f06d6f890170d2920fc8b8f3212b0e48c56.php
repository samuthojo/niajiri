<?php $__env->startSection('page'); ?>


<div class="row">

    <div class="col-md-12">

        

        
        <div class="ibox" id="vue-candidate-cv">

          <div class="flex flex-column">

            <download-cv-button></download-cv-button>

            
            <div class="ibox-content">

              <vue-snotify></vue-snotify>


              <div class="row m-t-md m-b-md">

                <div class="col-md-12">
                  <basic class="cv-major-block" :user="<?php echo e($user); ?>" ref="basic"></basic>
                </div>

              </div>

            <div class="row m-t-md m-b-md">

                <div class="col-md-6">
                  <intern
                    :user="<?php echo e($user); ?>"
                    :experiences=" <?php echo e($user->experiences); ?>"></intern>
                </div>

                <div class="col-md-6">
                  <honor
                    :user="<?php echo e($user); ?>"
                    :honors="<?php echo e($honors); ?>"></honor>
                </div>

            </div>

            <div class="row m-t-md m-b-md">

                <div class="col-md-6">
                  <education
                    :user="<?php echo e($user); ?>"
                    :educations="<?php echo e($educations); ?>"
                    :institutions= "<?php echo e(config('education.institutions')); ?>"
                    :qualifications="<?php echo e(config('education.qualifications')); ?>"></education>
                </div>

                <div class="col-md-6">
                  <language
                    :user="<?php echo e($user); ?>"
                    :languages="<?php echo e($user->languages); ?>"></language>
                </div>

            </div>

            <div class="row m-t-md m-b-md">

                <div class="col-md-6">
                  <certificate
                    :user="<?php echo e($user); ?>"
                    :certifications="<?php echo e($certificates); ?>">
                  </certificate>
                </div>

                <div class="col-md-6">
                  <referee
                    :user="<?php echo e($user); ?>"
                    :referees="<?php echo e($user->referees); ?>"></referee>
                </div>

            </div>

            <div class="row m-t-md m-b-md">

                <div class="col-md-6">
                  <skills
                    :user="<?php echo e($user); ?>">
                  </skills>
                </div>

                <div class="col-md-6">
                  <extra-curriculum
                    :user="<?php echo e($user); ?>">
                  </extra-curriculum>
                </div>

            </div>

           </div>

    </div>

    </div>

  </div>

</div>

<?php $__env->startPush('vue_scripts'); ?>

<script>

    new Vue({
        el: "#vue-candidate-cv",
        mounted() {
          if (this.$refs.basic) {
            this.$refs.basic.initDatePicker();
          }
        }
    });

</script>

<?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
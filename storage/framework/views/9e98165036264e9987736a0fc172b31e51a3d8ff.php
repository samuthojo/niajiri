<div class="tab-pane active" id="tab-1">
  <div class="btn-group">
      <a href="<?php echo e(route('projects.create')); ?>" class="btn btn-sm btn-primary" role="button" title="<?php echo e(trans('projects.actions.create.title')); ?>">
      <i class="fa fa-plus"></i> <?php echo e(trans('projects.actions.create.name')); ?></a>
  </div>
  
  <div class="wrapper wrapper-content animated fadeInRight">
  <?php $__currentLoopData = $organization->projects->chunk(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chunkedProject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <div class="row">
    <?php $__currentLoopData = $chunkedProject; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

  <a href="<?php echo e(route('projects.show', ['id' => $item->id])); ?>">
    <div class="col-md-4 ">
      <div class="payment-card gray-bg  m-l-n-md text-center">
          <h1 class="font-bold text-black">
              <?php echo e($item->name); ?>

          </h1>
          <div class="row">
            
                <div class="col-sm-12 text-black">
                  <small>
                      <strong>Start At:</strong> <?php echo e($item->startedAt->format('d-m-y')); ?>

                      <br/>
                      <strong>End At:</strong> <?php echo e($item->endedAt->format('d-m-y')); ?>

                  </small>
              </div>
               <hr>
              
              <div class="col-sm-12 m-t-md">
                  <a href="<?php echo e(route('projects.show', ['id' => $item->id])); ?>" class="btn btn-sm niajiri-label">More Info </a>
              </div>
          </div>
      </div>
    </div>
    </a>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </div>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

  </div>
  
</div>

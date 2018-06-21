<?php $__env->startSection('content'); ?>


<div class="row wrapper  page-heading">
    <div class="col-md-12">

    	
        <h2 title="<?php echo e($route_description); ?>" class="page_title">
	        <span id="route-title"><?php echo e($route_title); ?></span>
        </h2>
        

        
        <span id="breadcrumb-text">
          <?php if(!empty($route_name)): ?>
              <?php if($instance): ?>
  	            <?php echo Breadcrumbs::render($route_name, $instance); ?>

              <?php else: ?>
                
              <?php endif; ?>
          <?php endif; ?>
        </span>
        

    </div>
</div>



<div class="row wrapper">
    
    <div class="row">
        <div class="col-md-12">
            <?php echo $__env->make('flash::message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
    </div>
    


        <?php echo $__env->yieldContent('page'); ?>

</div>


<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('page'); ?>


<div class="row p-md">
    <div class="col-md-12 white-bg p-md client-profile ibox-content">
        
            <img 
            src="<?php echo e($organization->logo()); ?>" 
            class="img-responsive col-md-2"
            alt="compant logo">
            <div class="col-md-10 m-t-n-sm">
                <div class="col-md-8 p-l-md">
                    <h1><?php echo e($organization->name); ?>&nbsp <a href="<?php echo e(route('organizations.edit', ['id' => $organization->id])); ?>" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i> &nbsp  Edit Organization</a></h1>
                    <h2>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look
                        even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing</h2>
                </div>
                <div class="col-md-4 gray-bg p-sm m-t-sm">
                    <span class="block m-b-sm">  <i class="fa fa-fax"></i>&nbsp <?php echo e($organization->fax); ?></span>
                    <span class="block m-b-sm">  <i class="fa fa-envelope"></i>&nbsp <?php echo e($organization->email); ?></span>
                    <span class="block m-b-sm">  <i class="fa fa-globe"></i>&nbsp <a href="<?php echo e($organization->website); ?>" target="_blank" class="text-navy"><?php echo e($organization->website); ?></a></span>
                    <span class="block m-b-sm">  <i class="fa fa-home"></i>&nbsp <?php echo e($organization->physical_address); ?></span>
                    <span class="block m-b-sm">  <i class="fa fa-address-book"></i>&nbsp <?php echo e($organization->postal_address); ?></span>
                </div>
            </div>

    </div>
    <div class="col-md-12">
        <h1 class="font-bold">Projects (1)  
        </h1>
        
            
    </div>
    <div class="col-md-12 white-bg p-md client-profile ibox-content">
       <?php echo $__env->make('pages.organizations.projects', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    
    </div>
</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
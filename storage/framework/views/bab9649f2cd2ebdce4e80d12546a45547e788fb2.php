<?php $__env->startSection('page'); ?>

<div class="row">
    <div class="col-md-12">

        
        <div class="ibox">

            
            <?php $__currentLoopData = $applications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $application): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="ibox-content">
                <div class="table-responsive">
                    <table class="table shoping-cart-table">
                        <tbody>
                        <tr>
                            <td width="90">
                                <div class="cart-product-imitation cart-position-organization-logo">
                                    <img src="<?php echo e($application->organization->logo()); ?>">
                                </div>
                            </td>
                            <td class="desc">
                                <h3>
                                <a href="<?php echo e(route('applications.application', ['id' => $application->id, 'applicant_id' => $application->applicant_id])); ?>"  class="text-navy">
                                    <?php echo e($application->position->title); ?> - <?php echo e($application->position->organization->name); ?>

                                </a>
                                </h3>
                                <p class="small">
                                    <?php echo e(str_limit($application->position->summary, 250)); ?>

                                </p>

                                <div class="m-t-sm">
                                    
                                    <span class="text-muted"><i class="fa fa-bullhorn"></i> Sector: <?php echo e($application->position->sector); ?> </span>
                                    
                                    |
                                    
                                    <span class="text-muted"><i class="fa fa-clock-o"></i> Deadline: <?php echo e($application->created_at->toFormattedDateString()); ?> </span>
                                    
                                </div>
                            </td>

                            <td>
                                <?php echo Form::open([
                                    'method'=>'DELETE',
                                    'url' => route('applications.destroy', ['id' => $application->id, 'applicant_id'=> $application->applicant_id]),
                                    'style' => 'display:inline'
                                ]); ?>

                                    <?php echo Form::button(trans('applications.actions.delete.name'), [
                                            'type' => 'submit',
                                            'class' => 'btn btn-danger',
                                            'title' => trans('applications.actions.delete.title'),
                                            'onclick'=>'return confirm("Confirm Delete?")'
                                    ]); ?>

                                <?php echo Form::close(); ?>

                            </td>

                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            

            
            <div class="ibox-content">
                <div class="pagination-wrapper">
                    <?php echo $applications->render(); ?>

                </div>
            </div>
            

        </div>
        

    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
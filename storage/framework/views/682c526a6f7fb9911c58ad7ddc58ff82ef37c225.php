<?php $__env->startSection('page'); ?>


<div class="row">
    <div class="col-md-12">

        
        <div class="ibox">

            
                
            

            
            <div class="ibox-content">

                
                <div class="row m-t-md">
                    <div class="col-sm-8 m-b-xs">
                        <div class="btn-group">
                            <a href="<?php echo e(route('organizations.create')); ?>" class="btn btn-sm btn-primary " role="button" title="<?php echo e(trans('organizations.actions.create.title')); ?>">
                            <i class="fa fa-plus"></i> <?php echo e(trans('organizations.actions.create.name')); ?></a>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        
                        <?php echo Form::open([
                            'method'=>'GET',
                            'route' => 'organizations.index',
                            'style' => 'display:inline'
                        ]); ?>

                        <div class="input-group" title="<?php echo e(trans('organizations.actions.search.title')); ?>">
                            <input name="name" value="name" type="text" placeholder="<?php echo e(trans('organizations.actions.search.placeholder')); ?>" class="input-sm form-control"/>
                                <span class="input-group-btn">
                                    <?php echo Form::button(trans('organizations.actions.search.name'),[
                                            'type' => 'submit',
                                            'class' => 'btn btn-primary btn-sm',
                                            'title' => trans('organizations.actions.search.title')
                                        ]); ?>

                                </span>
                        </div>
                        <?php echo Form::close(); ?>

                        

                    </div>
                </div>
                

                
                <div class="wrapper wrapper-content animated fadeInRight white-bg">
                <?php $__currentLoopData = $organizations->chunk(4); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chunkedOrgs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="row">
                  <?php $__currentLoopData = $chunkedOrgs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <a href="<?php echo e(route('organizations.show', ['id' => $item->id])); ?>" >
                  <div class="col-lg-3 float-e-margins m-l-n-md">
                        <div class="ibox niajiri-black-text niajiri-white-card" >
                            <div class="ibox-title" style="background:#f5f5f5">
                                <span class="label niajiri-label p-xs m-b-sm"><?php echo e($item->sector); ?></span>
                            </div>
                            <div class="ibox-content">
                                <h2><?php echo e($item->name); ?></h2>
                                <small class="stat-percent"><?php echo e(count($item->positions)); ?> position(s)</small>
                                <small class=""><?php echo e(count($item->projects)); ?> project(s)</small>
                            </div>
                        </div>
                    </div>
                  </a>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    
                    <div class="pagination-wrapper">
                        <?php echo $organizations->render(); ?>

                    </div>
                    

                </div>
                

            </div>
           

        </div>
        

    </div>
</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
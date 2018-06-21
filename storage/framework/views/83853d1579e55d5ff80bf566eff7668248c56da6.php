<?php $__env->startSection('page'); ?>


<div class="row">
    <div class="col-md-12">

        
        <div class="ibox">

            
                
            

            
            <div class="ibox-content">

                
                <div class="row m-t-md">
                    <div class="col-sm-8 m-b-xs">
                      <?php if (\Entrust::can('edit:project')) : ?>
                        <div class="btn-group">
                            <a href="<?php echo e(route('projects.create')); ?>" class="btn btn-sm btn-white" role="button" title="<?php echo e(trans('projects.actions.create.title')); ?>">
                            <i class="fa fa-plus"></i> <?php echo e(trans('projects.actions.create.name')); ?></a>
                        </div>
                      <?php endif; // Entrust::can ?>
                    </div>
                    <div class="col-sm-4">
                        
                        <?php echo Form::open([
                            'method'=>'GET',
                            'route' => 'projects.index',
                            'style' => 'display:inline'
                        ]); ?>

                        <div class="input-group" title="<?php echo e(trans('projects.actions.search.title')); ?>">
                            <input name="name" value="name" type="text" placeholder="<?php echo e(trans('projects.actions.search.placeholder')); ?>" class="input-sm form-control"/>
                                <span class="input-group-btn">
                                    <?php echo Form::button(trans('projects.actions.search.name'),[
                                            'type' => 'submit',
                                            'class' => 'btn btn-primary btn-sm',
                                            'title' => trans('projects.actions.search.title')
                                        ]); ?>

                                </span>
                        </div>
                        <?php echo Form::close(); ?>

                        

                    </div>
                </div>
                

                <div class="tab-pane active gray-bg" id="tab-1">
                  
                  <div class="wrapper wrapper-content animated fadeInRight">
                  <?php $__currentLoopData = $projects->chunk(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chunkedProject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <div class="row">
                    <?php $__currentLoopData = $chunkedProject; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                  <a href="<?php echo e(route('projects.show', ['id' => $item->id])); ?>">
                    <div class="col-md-4">
                      <div class="widget navy-bg p-xl text-center">
                        <div class="m-md">
                          <h1>
                              <?php echo e($item->name); ?>

                          </h1>
                        </div>
                      </div>
                    </div>
                    </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                  </div>
                  
                </div>

            </div>
           

        </div>
        

    </div>
</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
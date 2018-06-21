<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    

    
    <meta name="description" content="">
    <meta rel="author" href="<?php echo e(url('/')); ?>">
    <meta rel="publisher" href="<?php echo e(url('/')); ?>">

    
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name')); ?></title>

    
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    
    <?php echo $__env->make('layouts._google_analytics', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

</head>


<body class="niajiri pace-done fixed-sidebar fixed-nav fixed-nav-top skin-3" >

    
    <div id="wrapper">
    <?php echo $__env->make('layouts._fixed_top_nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    
    
    
        <?php echo $__env->make('app.blocks.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        
    
        <div id="page-wrapper" class="gray-bg">

            
            <?php echo $__env->yieldContent('content'); ?>
            

        </div>
    

    
    <script src="<?php echo e(asset('js/app.js')); ?>"></script>
        
        <?php echo $__env->yieldPushContent('vue_scripts'); ?>

    

    
    <?php echo $__env->yieldPushContent('scripts'); ?>
    

    
    <script type="text/javascript">
        //place google analytic scripts here
    </script>
    

</body>


</html>

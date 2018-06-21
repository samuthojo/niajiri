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

    
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    

</head>


<body class="niajiri gray-bg">

    <div class="container">

        <div class="loginscreen animated fadeInDown">

            <?php echo $__env->make('flash::message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        </div>

    </div>

    
    <?php echo $__env->yieldContent('content'); ?>
    

    
    <script src="<?php echo e(asset('js/app.js')); ?>"></script>
    

    
    <?php echo $__env->yieldContent('scripts'); ?>
    

    
    <script type="text/javascript">
        //place google analytic scripts here
    </script>
    

</body>


</html>

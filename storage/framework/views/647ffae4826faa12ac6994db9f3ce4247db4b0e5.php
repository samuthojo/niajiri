<?php $__env->startSection('content'); ?>
<div class="register-wrapper">
    <div class="middle-box text-center loginscreen animated fadeInDown ">
		<!-- <img src="<?php echo e(asset('images/logo.png')); ?>" width="160" height="120"> -->
		<div class="col-lg-4 signup-container">
			<a href="#" id="logo" class="layout center-center">
					<img src="<?php echo e(asset('images/landing/logo.png')); ?>" alt="Niajiri logo" style="height: 50px">
			</a>

			<h1>New here?</h1>
			<h2>Let us jumpstart your career.<br/>We prepare you for your career and open doors to endless opportunities. </h2>
			<a class="btn btn-block full-width m-b" href="<?php echo e(route('register')); ?>" title="Click to create new account">Sign Up Now</a>
		</div>
		<form class="col-lg-8" role="form" method="POST" action="<?php echo e(route('login')); ?>">
			<?php echo e(csrf_field()); ?>

			<h1>Welcome back!</h1>
			<div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
				<input class="form-control" type="email" name="email" placeholder="Email" required="">
				<?php if($errors->has('email')): ?>
					<span class="help-block">
						<strong><?php echo e($errors->first('email')); ?></strong>
					</span>
				<?php endif; ?>
			</div>

			<div class="m-b-lg form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
				<input class="form-control" type="password" name="password" placeholder="Password" required="">
				<?php if($errors->has('password')): ?>
					<span class="help-block">
						<strong><?php echo e($errors->first('password')); ?></strong>
					</span>
				<?php endif; ?>
			</div>

			<button type="submit" class="btn btn-primary block full-width">Sign In</button>

			<a href="<?php echo e(route('password.request')); ?>"><small>Forgot password?</small></a>

			

			

			
			
			
			

			

            
			<a class="btn btn-danger btn-google block full-width m-b"
				href="<?php echo e(url(config('services.google.url'))); ?>">
			   <span class="fa fa-google"></span> Signin with Google
			</a>
			


		    
			<a class="btn btn-info btn-twitter block full-width m-b"
				href="<?php echo e(url(config('services.twitter.url'))); ?>">
		       <span class="fa fa-twitter"></span> Signin with Twitter
		    </a>
		    

		    
			<a class="btn btn-success btn-linkedin block full-width m-b"
				href="<?php echo e(url(config('services.linkedin.url'))); ?>">
		       <span class="fa fa-linkedin"></span> Signin with LinkedIn
		    </a>
		    

            
		</form>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
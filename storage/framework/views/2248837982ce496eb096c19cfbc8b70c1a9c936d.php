<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
	<meta name="theme-color" content="#4fce8d">
	<title>Niajiri</title>
	<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" /> -->
	<link rel="stylesheet" href="<?php echo e(asset('css/landing/ext.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('css/landing/styles.css')); ?>">
	<link rel="icon" href="<?php echo e(asset('images/landing/favicon.png')); ?>">
	<?php echo $__env->make('layouts._google_analytics', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</head>
<body>
	<header id="header">
		<div class="container">
			<div class="layout center justified">
				<a href="#" id="logo" class="layout center-center">
					<img src="<?php echo e(asset('images/landing/logo.png')); ?>" alt="Niajiri logo" style="height: 50px">
				</a>
				<div>
					<a href="<?php echo e(route('login')); ?>" class="for-lg">Sign In</a>&nbsp;&nbsp;&nbsp;
					<a href="<?php echo e(route('register')); ?>" class="for-lg">&nbsp;&nbsp;Get Started&nbsp;&nbsp;</a>
					<a href="<?php echo e(route('register')); ?>" class="round-btn for-mob">&nbsp;&nbsp;Get Started&nbsp;&nbsp;</a>
				</div>
			</div>
		</div>
	</header>

	<div id="banner">
		<div class="scrim layout vertical center-center">
			<div id="text" class="text-center" style="display: inline-block;">
				<h2>
					Let us Jumpstart<span class="for-mob"><br></span> your Career
				</h2>
				<p>
					Niajiri is an online platform curated to serve the needs of entry level talent. We prepare you for your career and open doors to endless opportunities.
				</p>
				<a href="<?php echo e(route('register')); ?>" class="round-btn">Get Started Now</a>
			</div>
		</div>
	</div>

	<div class="value-proposition">
		<div class="container layout justified center" style="padding-top: 8em; padding-bottom: 8em; max-width: 1300px">
			<div class="for-lg layout center-center" style="background-color: #000; color: #fff; box-shadow: 2px 2px 20px rgba(0,0,0,0.1); height: 350px; width: 50%; position: relative;">

				<span style="width: 100%;position: absolute;text-align: center; font-size: 1.4em">LOADING VIDEO...</span>

				<iframe id="introVideo" width="100%" height="100%" src="" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen>
				</iframe>
			</div>
				
			<div>
				<!-- <span>What is this you ask?</span> -->
				<h2>About Niajiri</h2>
				<p style="max-width: 520px;">
					Niajiri is a provider of a streamlined and transparent experience for employers looking for competent job ready entry level talent at the touch of their fingertips.
				</p>
			</div>
		</div>
	</div>

	<div class="value-proposition" style="background-color: #eee; background-image:url(<?php echo e(asset('images/landing/cvpc.png')); ?>); background-position: 0 35%">
		<div class="container layout vertical center-justified">
			<span>Not sure about your CV?</span>
			<h2>Build yourself<br>an optimal CV</h2>
			<p>
				We help you design a compelling CV that will attract your career of choice.
			</p>
		</div>
	</div>

	<div id="employersSection" class="value-proposition">
		<div class="container layout justified center">
			<div class="for-lg" style="background-colo: #f3f3f3;background-image: url(<?php echo e(asset('images/landing/polygon.png')); ?>);background-size: 80%; background-repeat: no-repeat; border-radiu: 50%; background-position: left center; width: 580px; height: 410px; margin: 1.3em 0; max-width: 50%;"></div>

			<div>
				<span>Cant wait to land your dream job?</span>
				<h2>
					<strong class="for-lg">Get connected<br></strong>
					<strong class="for-mob">Connect</strong>
					</strong> with top employers
				</h2>
				<p>
					Top employers have partnered with Niajiri Platform to seek entry level talent.
				</p>
			</div>
		</div>
	</div>

	<div id="edgeSection" class="value-proposition" style="background-color: transparent;background-image: url(<?php echo e(asset('images/landing/crowds.jpg')); ?>);background-size: cover; background-position: top right; to: 20%;">
		<div class="scrim"></div>
		<div class="container layout vertical center-justified" style="color: #fff">
			<span>Want to have an edge over others?</span>
			<h2>Stand out<br>from the crowd</h2>
			<p>
				Be part of our community and get the latest interview tips and access to employability resources.
			</p>
		</div>
	</div>

	<div id="cta">
		<h2 class="layout inline center">Your career starts with us!</h2>
		<a href="#" class="round-btn">Get Started Now</a>
	</div>

	<footer>
		<div class="container">
			<div class="layout justified">
				<div class="flex layout center-justified">
					<div>
						<h5>About</h5>
						<p>
							Niajiri is a provider of a streamlined and transparent experience for employers looking for competent job ready entry level talent at the touch of their fingertips.
						</p>
					</div>
				</div>
				<div class="flex layout center-justified">
					<div id="socialIcons">
						<h5 class="text-center">Follow Us</h5>
						<p>
							<a title="Facebook" target="_blank" href="https://www.facebook.com/niajiriplatform/" class="social-icon facebook layout inline center-center">
								<span class="icon fa fa-facebook"></span>
			                </a>

			                <a title="Twitter" target="_blank" href="https://twitter.com/niajiriplatform" class="social-icon twitter layout inline center-center">
								<span class="icon fa fa-twitter"></span>
			                </a>

			                <a title="Instagram" target="_blank" href="https://www.instagram.com/niajiriplatform/" class="social-icon instagram layout inline center-center">
								<span class="icon fa fa-instagram"></span>
			                </a>
						</p>
					</div>
				</div>
				<div class="flex layout center-justified">
					<div>
						<h5>Contact Us</h5>
						<p>
					     <a href="mailto:niajiritz@gmail.com"> <i class="fa fa-envelope"></i> &nbsp niajiritz@gmail.com </a>
						</p>
						<p>
						<a href="tel:+255689403300"><i class="fa fa-phone"></i> &nbsp+255 689 403 300</a>
						</p>
						<p>
						<a href="tel:+255768353551"><i class="fa fa-phone"></i> &nbsp+255 768 353 551</a>
						</p>
					</div>
				</div>
			</div>

			<div class="ipf layout justified">
				
				<div class="flex">
				<p class="flex layout center-justified">
				&copy <?php echo e(date('Y')); ?> Niajiri All rights reserved |
					Web strategies by &nbsp; 
					<a target="_blank" href="http://www.ipfsoftwares.com">iPF Softwares</a>
				</p>
				</div>
				
				
			</div>
		</div>
	</footer>

	<script>
		window.onload = function(){
			console.log("window loaded, creating fawesome link tag.");
			var headHTML = document.getElementsByTagName('head')[0].innerHTML;
			headHTML    += '<link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">';
			document.getElementsByTagName('head')[0].innerHTML = headHTML;

			if(window.innerWidth > 568){
				document.getElementById("introVideo").src = "https://www.youtube.com/embed/SD0_glF9t88";
				console.log("Loading video for lg screens!");
			}
		}
	</script>
</body>
</html>
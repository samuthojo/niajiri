<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
	<meta name="theme-color" content="#4fce8d">
	<title>Niajiri</title>
	<link rel="stylesheet" href="{{asset('css/landing/ext.css')}}">
	<link rel="stylesheet" href="{{asset('css/landing/flex.css')}}">
	<link  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
	<link rel="stylesheet" href="{{asset('css/landing/styles.css')}}">
</head>
<body>
	<header id="header">
		<div class="container">
			<div class="layout center justified">
				<a href="#" id="logo">
					<img src="{{asset('images/landing//logo_white.png')}}" alt="Niajiri logo">
				</a>
				<div>
					<a href="{{ route('login') }}" class="for-lg">SIGN IN</a>&nbsp;&nbsp;&nbsp;
					<a href="{{ route('register') }}" class="round-btn">&nbsp;&nbsp;Get Started&nbsp;&nbsp;</a>
				</div>
			</div>
		</div>
	</header>

	<div id="banner">
		<div class="scrim layout vertical center-center">
			<div id="text" class="text-center" style="display: inline-block;">
				<h2>
					Jump start<span class="for-mob"><br></span>your career
				</h2>
				<p>
					<span class="for-lg">
						Niajiri is a platform created specifically for job seekers.
						We have made it in a way such that potential employers meet you.
					</span>
					<span class="for-mob">
						With Niajiri you can now land your dream job by connecting with employers.
					</span>
				</p>
				<a href="{{ route('register') }}" class="round-btn">Get Started Now</a>
			</div>
		</div>
	</div>

	<div class="value-proposition">
		<div class="container layout justified center" style="padding-top: 8em; padding-bottom: 8em; max-width: 1300px">
			<div class="for-lg" style="background-color: #000; box-shadow: 2px 2px 20px rgba(0,0,0,0.1); height: 350px; width: 50%; position: relative;">

				<iframe width="100%" height="100%" src="https://www.youtube.com/embed/2MpUj-Aua48" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
			</div>
				
			<div>
				<!-- <span>Cant wait to land your dream job?</span> -->
				<span>What is this you ask?</span>
				<h2>About Niajiri</h2>
				<p style="max-width: 520px;">
					Niajiri is the provider of a streamlined and transparent experience for employers looking for competent job ready entry level talent at the touch of their fingertips.
				</p>
			</div>
		</div>
	</div>

	<div class="value-proposition" style="background-color: #f5f5f5;background-image: url({{asset('images/landing/resume.jpg')}});">
		<div class="container layout vertical center-justified">
			<span>Not sure about your CV?</span>
			<h2>Build yourself<br>an optimal CV</h2>
			<p>
				We help you create a compelling CV that will attract your career of choice.
			</p>
		</div>
	</div>

	<div class="value-proposition">
		<div class="container layout justified center">
			<div class="for-lg" style="background-color: #f3f3f3;background-image: url({{asset('images/landing/employees.jpg')}});background-size: cover; border-radius: 50%; background-position: center; width: 450px; height: 450px; margin: 1.3em 0; max-width: 50%;"></div>

			<div>
				<span>Cant wait to land your dream job?</span>
				<h2>
					<strong class="for-lg">Get connected<br></strong>
					<strong class="for-mob">Connect</strong>
					</strong> with top employers</h2>
				<p>
					Top employers have partnered with the Niajiri Platform to seek employees.
				</p>
			</div>
		</div>
	</div>

	<div class="value-proposition" style="background-color: #000;background-image: url({{asset('images/landing/crowd.jpg')}});
	background-size: cover; background-position: bottom center; color: #fff">
		<div class="container layout vertical center-justified">
			<span>Want to be the first one in?</span>
			<h2>Get ahead<br>of the crowd</h2>
			<p>
				Find out the latest available through our uniquely placed platform.
			</p>
		</div>
	</div>

	<div id="cta">
		<h2 class="layout inline center">Ready to start?</h2>
		<a href="{{ route('register') }}" class="round-btn">Get Started Now</a>
	</div>

	<footer>
		<div class="container">
			<div class="layout justified">
				<div class="flex layout center-justified">
					<div>
						<h5>About</h5>
						<p>
							Niajiri is the provider of a streamlined and transparent experience for employers looking for competent job ready entry level talent.
						</p>
					</div>
				</div>
				<div class="flex layout center-justified">
					<div id="socialIcons">
						<h5>Social Media</h5>
						<p>
							<a target="_blank" href="https://www.facebook.com/niajiriplatform/" class="social-icon facebook layout inline center-center">
								<span class="icon fa fa-facebook"></span>
			                </a>

			                <a target="_blank" href="https://twitter.com/niajiriplatform" class="social-icon twitter layout inline center-center">
								<span class="icon fa fa-twitter"></span>
			                </a>

			                <a target="_blank" href="https://www.instagram.com/niajiriplatform/" class="social-icon instagram layout inline center-center">
								<span class="icon fa fa-instagram"></span>
			                </a>
						</p>
					</div>
				</div>
				<div class="flex layout center-justified">
					<div>
						<h5>Contact Us:</h5>
						<p>
							support@niajiri.co.tz
						</p>
						<p>
							+255 718 321 452
						</p>
					</div>
				</div>
			</div>

			<div class="ipf layout justified">
				<div class="flex-2"></div>
				<div class="flex"></div>
				<p class="flex layout center-justified">
					Web strategies by:&nbsp; 
					<a target="_blank" href="http://www.ipfsoftwares.com">iPF Softwares</a>
				</p>
			</div>
		</div>
	</footer>
</body>
</html>
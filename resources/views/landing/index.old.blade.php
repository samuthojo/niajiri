<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
	<meta name="theme-color" content="#4fce8d">
	<title>Niajiri</title>
	<link rel="stylesheet" href="{{asset('css/landing/ext.css')}}">
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
					<a href="{{ route('login') }}" class="for-lg">Sign In</a>&nbsp;&nbsp;&nbsp;
					<a href="{{ route('register') }}" class="for-lg">&nbsp;&nbsp;Get Started&nbsp;&nbsp;</a>
					<a href="{{ route('register') }}" class="round-btn for-mob">&nbsp;&nbsp;Get Started&nbsp;&nbsp;</a>
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
					Niajiri is an online platform curated to serve the needs of entry level talent. We prepare you for career and open doors to endless opportunities.
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
				<!-- <span>What is this you ask?</span> -->
				<h2>About Niajiri</h2>
				<p style="max-width: 520px;">
					Niajiri is a provider of a streamlined and transparent experience for employers looking for competent job ready entry level talent at the touch of their fingertips.
				</p>
			</div>
		</div>
	</div>

	<div class="value-proposition" style="background-color: #fafafa;background-image: url({{asset('images/landing/gn.png')}});">
		<div class="container layout vertical center-justified">
			<span>Not sure about your CV?</span>
			<h2>Build yourself<br>an optimal CV</h2>
			<p>
				We help you design a compelling CV that will attract your career of choice.
			</p>
		</div>
	</div>

	<!-- <div class="value-proposition" style="background-color: #fafafa;">
		<div class="container layout justified center">
			<div>
				<span>Not sure about your CV?</span>
				<h2>Build yourself<br>an optimal CV</h2>
				<p>
					We help you design a compelling CV that will attract your career of choice.
				</p>
			</div>

			<div class="for-lg" style="box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);background-image: url(images/cvimage.png);background-size: 98%; background-repeat: no-repeat; background-position: center; width: 330px; height: 450px; margi: 1.3em 0; max-width: 50%;"></div>
		</div>
	</div> -->

	<div id="employersSection" class="value-proposition">
		<div class="container layout justified center">
			<div class="for-lg" style="background-color: #f3f3f3;background-image: url({{asset('images/landing/employees2-min.png')}});background-size: 98%; background-repeat: no-repeat; border-radiu: 50%; background-position: center; width: 620px; height: 450px; margin: 1.3em 0; max-width: 50%;"></div>

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

	<div class="value-proposition" style="background-color: #000;background-image: url({{asset('images/landing/crowds.jpg')}});background-size: cover; background-position: top right;">
		<div class="scrim layout vertical center-center" style="background-color: rgba(0, 0, 0, 0.5);"></div>
		<div class="container layout vertical center-justified" style="color: #eee">
			<span>Want to have an edge over others?</span>
			<!-- <h2>Get ahead<br>of the crowd</h2> -->
			<h2>Stand out<br>from the crowd</h2>
			<!-- <p>Find out the latest available through our uniquely placed platform.</p> -->
			<p>
				Be part of our community and get the latest interview tips and access to employability resources.
			</p>
		</div>
	</div>

	<div id="cta">
		<h2 class="layout inline center">Your career starts with us!</h2>
		<a href="{{ route('register') }}" class="round-btn">Get Started Now</a>
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
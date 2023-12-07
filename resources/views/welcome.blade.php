<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>mini jira</title>
		<meta http-equiv="X-UA-Compatible" content="IE=Edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="keywords" content="">
		<meta name="description" content="">
		<link rel="icon" href="{{ asset('images/management.png') }}">

		<!-- animate css -->
		<link rel="stylesheet" href="{{ asset('css/animate.min.css') }}">
		<!-- bootstrap css -->
		<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
		<!-- font-awesome -->
		<link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
		<!-- google font -->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,700,800' rel='stylesheet' type='text/css'>

		<!-- custom css -->
		<link rel="stylesheet" href="{{ asset('css/templatemo-style.css') }}">

	</head>
	<body>
		
		<!-- start navigation -->
		
		<nav class="navbar navbar-default navbar-fixed-top templatemo-nav" role="navigation">
			<div class="container">
				<div class="navbar-header">
					
					<button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="icon icon-bar"></span>
						<span class="icon icon-bar"></span>
						<span class="icon icon-bar"></span>
					</button>
					
					<a href="{{ route('welcome') }}" class="navbar-brand"><img style="display: inline;border-radius: 50%" src="{{ asset('images/management.png') }}" height="50px" width="50px"> mini jira</a>
					
				</div>
				<div class="collapse navbar-collapse">
					<ul class="nav navbar-nav navbar-right text-uppercase">
						<li><a href="#home">Home</a></li>
						
						<li><a href="#pricing">Pricing</a></li>
						<li><a href="#get-started">Get Started</a></li>
						<li><a href="{{ route('login') }}">Login</a></li>
						<li><a href="{{ route('register') }}">Sign up</a></li>
					</ul>
				</div>
			</div>
		</nav>
		<!-- end navigation -->
		<!-- start home -->
		<section id="home">
			<div class="overlay">
				<div class="container">
					<div class="row">
						<div class="col-md-1"></div>
						<div class="col-md-10 wow fadeIn" data-wow-delay="0.3s">
							<h1 class="text-upper">Effortless Developer Management</h1>
							<p class="tm-white">Managing your development team has never been simpler. Our intuitive task management system empowers you to effortlessly coordinate, assign, and track your developers' progress in real-time. Streamline your workflow and witness unparalleled productivity as you oversee projects with ease.</p>
							<img src="images/software-img.png" class="img-responsive" alt="home img">
						</div>
						<div class="col-md-1"></div>
					</div>
				</div>
			</div>
		</section>
		<!-- end home -->
		<!-- start divider -->
		<section id="divider">
			<div class="container">
				<div class="row">
					<div class="col-md-4 wow fadeInUp templatemo-box" data-wow-delay="0.3s">
						<i class="fa fa-clock-o"></i>
						<h3 class="text-uppercase"> Time Management Tools</h3>
						<p>Efficiently schedule tasks, set deadlines, and prioritize assignments. Utilize built-in time-tracking tools to monitor progress and optimize your team's time management. </p>
					</div>
					<div class="col-md-4 wow fadeInUp templatemo-box" data-wow-delay="0.3s">
						<i class="fa fa-list-alt"></i>
						<h3 class="text-uppercase"> Strategic Planning and Roadmapping</h3>
						<p>Plan your projects strategically with roadmap visualization. Create clear project milestones, outline objectives, and ensure alignment with long-term goals. </p>
					</div>
					<div class="col-md-4 wow fadeInUp templatemo-box" data-wow-delay="0.3s">
						<i class="fa fa-arrows-alt"></i>
						<h3 class="text-uppercase">Responsive Platform</h3>
						<p>Maximize productivity without breaking the bank. Our platform offers robust functionalities at an affordable price point, making it a cost-effective choice for teams of all sizes.</p>
					</div>
				</div>
			</div>
		</section>
		<!-- end divider -->


		<!-- start pricing -->
		<section id="pricing">
			<div class="container">
				<div class="row">
					<div class="col-md-12 wow bounceIn">
						<h2 class="text-uppercase">Our Pricing</h2>
					</div>
					<div class="col-md-4 wow fadeIn" data-wow-delay="0.6s">
						<div class="pricing text-uppercase">
							<div class="pricing-title">
								<h4>Basic Plan</h4>
								<p>$11</p>
								<small class="text-lowercase">monthly</small>
							</div>
							<ul>
								<li>6 GB Space</li>
								<li>600 GB Bandwidth</li>
								<li>60 More Themes</li>
								<li>Lifetime Support</li>
							</ul>
							<button class="btn btn-primary text-uppercase">Sign up</button>
						</div>
					</div>
					<div class="col-md-4 wow fadeIn" data-wow-delay="0.6s">
						<div class="pricing active text-uppercase">
							<div class="pricing-title">
								<h4>Business Plan</h4>
								<p>$22</p>
								<small class="text-lowercase">monthly</small>
							</div>
							<ul>
								<li>15 GB space</li>
								<li>1,500 GB Bandwidth</li>
								<li>150 More Themes</li>
								<li>Lifetime Support</li>
							</ul>
							<button class="btn btn-primary text-uppercase">Sign up</button>
						</div>
					</div>
					<div class="col-md-4 wow fadeIn" data-wow-delay="0.6s">
						<div class="pricing text-uppercase">
							<div class="pricing-title">
								<h4>Pro Plan</h4>
								<p>$33</p>
								<small class="text-lowercase">monthly</small>
							</div>
							<ul>
								<li>35 GB space</li>
								<li>3,500 GB bandwidth</li>
								<li>350 more themes</li>
								<li>Lifetime Support</li>
							</ul>
							<button class="btn btn-primary text-uppercase">Sign Up</button>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- end pricing -->

		<!-- start download -->
		<section id="get-started">
			<div class="container">
				<div class="row">
					<div class="col-md-6 wow fadeInLeft" data-wow-delay="0.6s">
						<h2 class="text-uppercase">Get started with Our Software</h2>
						<p>Start managing tasks effortlessly! Sign up now and discover a user-friendly platform designed to streamline your projects. Join countless teams already benefiting from our powerful tools. Get organized, collaborate efficiently, and achieve more with ease. Take the plunge today and experience better project management </p>
						<a href="{{ route('register') }}" class="btn btn-primary text-uppercase"><i class="fa fa-sign-in"></i> Sign Up</a>
					</div>
					<div class="col-md-6 wow fadeInRight" data-wow-delay="0.6s">
						<img src="images/software-img.png" class="img-responsive" alt="feature img">
					</div>
				</div>
			</div>
		</section>
		<!-- end download -->
		<br><br>
		
        
		<script src="{{ asset('js/jquery.js') }}"></script>
		<script src="{{ asset('js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('js/wow.min.js') }}"></script>
		<script src="{{ asset('js/jquery.singlePageNav.min.js') }}"></script>
		<script src="{{ asset('js/custom.js') }}"></script>
	</body>
</html>
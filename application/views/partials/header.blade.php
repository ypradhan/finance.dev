<!DOCTYPE html>
<html lang="en">
<head>

	<title>{{ $title }}</title>

	<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	{{ Asset::styles() }}

</head>
<body>
<header>
	<nav class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				
				{{ HTML::link('/', 'App Name', array('class' => 'brand')) }}		
				
				<div class="nav-collapse collapse">
				@if (Auth::check())
					<p class="navbar-text pull-right">
						Welcome {{ Auth::user()->name() }}, {{ HTML::link_to_route('session.logout', 'Logout') }}	
					</p>
				@endif
					<ul class="nav">
						<li>{{ HTML::link_to_route('home', 'Home') }}</li>
					@if ( ! Auth::check())
						<li>{{ HTML::link_to_route('session.register', 'Register') }}</li>
						<li>{{ HTML::link_to_route('session.login', 'Login') }}</li>
					@endif
					</ul>
				</div><!--/.nav-collapse -->
			</div> <!-- /container -->
		</div> <!-- /navbar-inner -->
	</nav> <!-- /navbar -->
</header>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="/sorin/css/bootstrap.min.css" rel="stylesheet">
	<link href="/sorin/css/custom.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Noto+Serif+JP" rel="stylesheet">
	<link href="/sorin/css/hover.css" rel="stylesheet" media="all">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
	.disabled {
		pointer-events: none;
	}
	.navbar-default {
		background-color: #FFFFFF;
		max-height: 35px;
	}
	.navbar-inverse {
		background-color: #711717;
		max-height: 130px;
	}
	.navbar {
		min-height: 35px;
		margin-bottom: 0px;
		margin-top: 0px;
		border: 0px;
	}
	.navbar ul {
		margin: 0px;
	}
	.restxt {
		text-transform: uppercase;
		font-weight: bold;
		letter-spacing: 1px;
		padding-top: 8px;
		padding-bottom: 8px;
		height: 35px;
		display: inline-block;
		vertical-align: middle;
		font-family: 'Open Sans', sans-serif;
		float: left;
		padding-left: 8px;
	}
	.topleft {
		text-transform: uppercase;
		font-weight: bold;
		letter-spacing: 1px;
	}
	.topleft > li > a {
		padding-top: 8px;
		padding-bottom: 8px;
		height: 35px;
		display: inline-block;
		vertical-align: middle;
		font-family: 'Open Sans', sans-serif;
		color: #570000 !important;
	}
	.topright > li > a {
		padding-top: 8px;
		padding-bottom: 8px;
		height: 35px;
		display: inline-block;
		vertical-align: middle;
		font-family: 'Open Sans', sans-serif;
		color: #570000 !important;
	}
	.topnavbar-right {
		color: #570000 !important;
		border-left: 1px solid #E0E0E0;
	}
	.topnavbar-right > li {
		-webkit-transition-duration: 0.3s; /* safari transition */
		transition-duration: 0.3s;
	}
	.topnavbar-right > li:hover {
		background-color: #E7E7E7;
	}
	.search-container button {
		padding-top: 8px;
		padding-bottom: 8px;
		height: 35px;
		display: inline-block;
		vertical-align: middle;
		background-color: #FFFFFF;
		border: none;
		-webkit-transition-duration: 0.3s; /* safari transition */
		transition-duration: 0.3s;
	}
	.search-container button:hover {
		background-color: #E7E7E7;
	}
	.search-container button:focus {
		-webkit-transition-duration: 0.05s; /* safari transition */
		transition-duration: 0.05s;
	}
	.search-container input[type=text] {
		padding-top: 8px;
		padding-bottom: 8px;
		padding-left: 8px;
		height: 35px;
		display: inline-block;
		vertical-align: middle;
		border: none;
		font-family: 'Open Sans', sans-serif;
		-webkit-transition-duration: 0.05s; /* safari transition */
		transition-duration: 0.05s;
	}
	.search-container input[type=text]:focus {
		outline-color: #570000 !important;
	}
	.search-container button[type=submit]:focus {
		outline-color: #570000 !important;
	}
	.center-brand {
		vertical-align: middle;	
		float: left;
		padding-top: 35px;
		padding-left: 100px;
		padding-right: 15px;
		position: absolute;
		border-right: 1px solid #FFFFFF;
	}
	.bottomnav {
		position: relative;
		min-height: 100px;
		float:right;
		padding-top: 50px;
		padding-bottom: 30px;
	}
	.bottomnav > li {
		padding-left: 8px;
		padding-right: 8px;
		vertical-align: middle;
	}
	.bottomnav > li:hover {
		background-color: #FFFFFF;
		color: #711717 !important;
	}
	.bottomnav > li > a {
		font-family: 'Noto Serif JP', sans-serif;
		font-size: 18px;
		font-weight: 400;
		color: #FFFFFF !important;
		transition-duration: 0.4s;
		-webkit-transition-duration: 0.4s;
		-webkit-transition-timing-function: ease-in-out;
		transition-timing-function: ease-in-out;
	}
	.bottomnav > li > a:hover {
		color: #711717 !important;
		font-weight: 400;
		font-size: 18px;
	}
	.hvr-underline-from-center {
		display: inline-block;
		vertical-align: middle;
		-webkit-transform: perspective(1px) translateZ(0);
		transform: perspective(1px) translateZ(0);
		box-shadow: 0 0 1px rgba(0, 0, 0, 0);
		position: relative;
		overflow: hidden;
	}
	.hvr-underline-from-center:before {
		content: "";
		position: absolute;
		z-index: -1;
		left: 51%;
		right: 51%;
		bottom: 0;
		background: #711717;
		height: 4px;
		-webkit-transition-property: left, right;
		transition-property: left, right;
		-webkit-transition-duration: 0.3s;
		transition-duration: 0.3s;
		-webkit-transition-timing-function: ease-in-out;
		transition-timing-function: ease-in-out;
	}
	.hvr-underline-from-center:hover:before, .hvr-underline-from-center:focus:before, .hvr-underline-from-center:active:before {
		left: 0;
		right: 0;
	}
	.hvr-overline-reveal {
		display: inline-block;
		vertical-align: middle;
		-webkit-transform: perspective(1px) translateZ(0);
		transform: perspective(1px) translateZ(0);
		box-shadow: 0 0 1px rgba(0, 0, 0, 0);
		position: relative;
		overflow: hidden;
	}
	.hvr-overline-reveal:before {
		content: "";
		position: absolute;
		z-index: -1;
		left: 0;
		right: 0;
		top: 0;
		background: #711717;
		height: 4px;
		-webkit-transform: translateY(-4px);
		transform: translateY(-4px);
		-webkit-transition-property: transform;
		transition-property: transform;
		-webkit-transition-duration: 0.2s;
		transition-duration: 0.2s;
		-webkit-transition-timing-function: ease-in-out;
		transition-timing-function: ease-in-out;
	}
	.hvr-overline-reveal:hover:before, .hvr-overline-reveal:focus:before, .hvr-overline-reveal:active:before {
		-webkit-transform: translateY(0);
		transform: translateY(0);
	}
</style>
</head>
<body>
	<div class = "totaltopnav">
		<nav class="navbar navbar-default navbar-static-top justify-content-between" role = "navigation">
			<div class="container-fluid">
				<span class="restxt" style="color: #656256 !important;">Resources for:</span>
				<ul class="nav navbar-nav topleft">	
					<li><a href="/sorin/students" class="hvr-overline-reveal">Students</a></li>
					<li><a href="/sorin/faculty-staff" class="hvr-overline-reveal">Faculty & Staff</a></li>
					<li><a href="/sorin/parents" class="hvr-overline-reveal">Parents</a></li>
					<li><a href="/sorin/alumni" class="hvr-overline-reveal">Alumni</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right topnavbar-right topright">
					<li><a href="/sorin/directory">Directory</a></li>
					<li><a href="/sorin/map">Campus Map</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right topnavbar-right search">
					<div class="search-container">
						<form action="/action_page.php">
							<input type="text" placeholder="Search.." name="search">
							<button type="submit"><i class="fa fa-search"></i></button>
						</form>
					</div>
					<!-- search goes here -->
				</ul>
			</div>
		</nav>
		<nav class="navbar navbar-inverse navbar-static-top justify-content-center" role="navigation">
			<div class="container-fluid">
				<a class="brand-img" href="/sorin/index.php" title="Mentor High School Homepage">
					<img class="center-brand" src="/sorin/inc/mentor.png" alt="Mentor High School heading"></a> 
					<ul class="nav navbar-nav bottomnav">
						<li><a href="/sorin/academics" class="hvr-underline-from-center">Academics/Curriculum</a></li>
						<li><a href="/sorin/athletics" class="hvr-underline-from-center">Athletics</a></li>
						<li><a href="/sorin/music" class="hvr-underline-from-center">Music</a></li>
						<li><a href="/sorin/arts-theatre" class="hvr-underline-from-center">Arts & Theatre</a></li>
						<li><a href="/sorin/activities" class="hvr-underline-from-center">Activities</a></li>
						<li><a href="/sorin/guidance" class="hvr-underline-from-center">Guidance</a></li>
						<li><a href="/sorin/about" class="hvr-underline-from-center">About</a></li>
					</ul>
				</nav>
			</div>
		</div>
		<div class="container-fluid" style="margin-left: 0px; margin-right: 0px; padding-left: 0px; padding-right: 0px;">
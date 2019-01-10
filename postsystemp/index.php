<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Dashboard</title>
	<?php include '../inc/includes.php';?>
	<link rel="stylesheet" href="dashboard.css">
</head>

<body>

	<nav class="navbar navbar-expand-lg" id="top-nav">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<div class="navbar-nav ml-auto">
				<div class="nav-item border-divider"></div>
				<a class="nav-link" href="#" id="usernameDropdownToggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Username<span class="caret-dropdown"></span></button>
				</a>
				<div id="usernameDropdown" class="dropdown-menu dropdown-menu-right" aria-labelledby="usernameDropdown">
					<span class="dropdown-item-text" href="#"><strong>Status:</strong> Online</span>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="#">Settings</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="#">Feedback</a>
					<div class="dropdown-divider"></div>
					<!--<a class="dropdown-item" href="#">Lock</a>
						<div class="dropdown-divider"></div>-->
						<a class="dropdown-item" href="logout.inc.php">Logout</a>
					</div>
				</div>
			</div>
		</nav>

		<div class="sidebar" id="sidebar-expanded">
			<div class="row">
				<div class="brand">
					<div class="col-8">
						<a class="navbar-brand" id="dashboard-brand-redir">Dashboard</a>
					</div>
					<div class="col-4">
						<i class="fa fa-stream toggler"></i>
					</div>
				</div>
			</div>
			<div class="row">
				<nav class="nav nav-tabs flex-column" id="tabs" role="tablist">
					<a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="false"><i class="fa fa-home"></i>Home</a>
					<a class="nav-link active" id="dashboard-tab" data-toggle="tab" href="#dashboard" role="tab" aria-controls="dashboard" aria-selected="true"><i class="fa fa-chart-bar"></i>Dashboard</a>
					<a class="nav-link" id="pages-tab" data-toggle="tab" href="#pages" role="tab" aria-controls="pages" aria-selected="false"><i class="fa fa-pen"></i>Pages</a>
				</nav>
			</div>
		</div>

		<div class="sidebar" id="sidebar-collapsed">
			<div class="row">
				<div class="brand">
					<div class="col-12">
						<i class="fa fa-stream toggler"></i>
					</div>
				</div>
			</div>
			<div class="row">
				<nav class="nav nav-tabs flex-column" id="tabs" role="tablist">
					<a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="false"><i class="fa fa-home"></i></a>
					<a class="nav-link active" id="dashboard-tab" data-toggle="tab" href="#dashboard" role="tab" aria-controls="dashboard" aria-selected="true"><i class="fa fa-chart-bar"></i></a>
					<a class="nav-link" id="pages-tab" data-toggle="tab" href="#pages" role="tab" aria-controls="pages" aria-selected="false"><i class="fa fa-pen"></i></a>
				</nav>
			</div>
		</div>

		<div class="tab-content" style="margin-left: 500px;">
			<div class="tab-pane" id="home" role="tabpanel" aria-labelledby="home-tab">home</div>
			<div class="tab-pane active" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">dashboard</div>
			<div class="tab-pane" id="pages" role="tabpanel" aria-labelledby="pages-tab">pages</div>
		</div>


		<script src="main.js"></script>

	</body>
	</html>
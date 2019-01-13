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

	<?php include 'dashboard_navbar.php';?>
	<?php include 'dashboard_sidebars.php';?>
	<?php include 'create_post.php';?>
	<div class="content-wrapper" id="content">
		<div class="container-fluid">
			<div class="row">
				<div class="tab-content">
					<div class="tab-pane" id="home" role="tabpanel" aria-labelledby="home-tab">
						<h1 class="tab-heading">Home</h1>
					</div>
					<div class="tab-pane active" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
						<div id="dashboard-tab-content">
							<h1 class="tab-heading">Dashboard</h1>
							<div class="container no-padding">
								<div class="row">
									<div class="dashboard-wrapper container">
										<div class="row">
											<h2>Welcome to your dashboard.</h2>
										</div>
										<div class="row">
											<p>This is not technically a release of the dashboard, but more of a concept design and wireframe for what it will become. Many functions do not work at this point and therefore are disabled. <br><br>However, your recommendations and comments are still appreciated! Any feature requests should also be submit either directly to <a href="mailto:rmaximsorin@gmail.com">rmaximsorin@gmail.com</a> or through the <a href="../contact">contact</a> page.</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="tab-pane" id="pages" role="tabpanel" aria-labelledby="pages-tab">
						<div id="pages-tab-content">
							<h1 class="tab-heading">Your Pages</h1>
							<div class="container no-padding">
								<div class="row">
									<div class="card-wrapper container">
										<div class="card-img row">
											<img class="img-fluid" src="https://images.pexels.com/photos/908284/pexels-photo-908284.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="bg img">
										</div>
										<div class="card-content">
											<h1 class="card-title">Create a new post</h1>
											<p class="card-info">Some information here.</p>
											<button class="btn btn-primary create-btn" onclick="showCreatePost()">Create</button>
										</div>
									</div>
									<div class="card-wrapper container">
										<div class="card-img row">
											<img class="img-fluid" src="https://images.pexels.com/photos/1509428/pexels-photo-1509428.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="bg img">
										</div>
										<div class="card-content">
											<h1 class="card-title">Create a new event</h1>
											<p class="card-info">Some information here.</p>
											<button class="btn btn-primary create-btn" onclick="showCreateEvent()" disabled>Create</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid unavailable">
      <div class="container" id="content">
            <div class="row">
                <h1 id="coming-soon">
                    Mobile unavailable
                </h1>
            </div>
            <div class="row mx-auto" id="message">
                <p>
                    Unfortunately, the mobile version of the dashboard is not supported at this time. Please login to the dashboard using a desktop device.
                </p>
            </div>
            <a href="../index.php" class="btn btn-dark raise" id="home-btn">Home</a>
        </div>
        </div>
	<script src="main.js"></script>

</body>
</html>
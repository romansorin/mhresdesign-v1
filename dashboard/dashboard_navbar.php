<nav class="navbar navbar-expand-lg" id="top-nav">
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<div class="navbar-nav ml-auto">
			<div class="nav-item border-divider"></div>
			<a class="nav-link" href="#" id="usernameDropdownToggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?=$_SESSION['username']?><span class="caret-dropdown"></span></button>
			</a>
			<div id="usernameDropdown" class="dropdown-menu dropdown-menu-right" aria-labelledby="usernameDropdown">
				<span class="dropdown-item-text" href="#"><strong>Status:</strong> Online</span>
				<div class="dropdown-divider"></div>
				<a class="dropdown-item disabled" href="#">Settings</a>
				<div class="dropdown-divider"></div>
				<a class="dropdown-item disabled" href="#">Feedback</a>
				<div class="dropdown-divider"></div>
				<a class="dropdown-item disabled" href="#">Lock</a>
				<div class="dropdown-divider"></div>
				<a class="dropdown-item" name="logout" href="../login/logout.inc.php?logout=true">Logout</a>
			</div>
		</div>
	</div>
</nav>
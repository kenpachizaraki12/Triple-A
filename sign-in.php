<?php 
// session_start();
include('dist/config.php');

if(isset($_POST['submit'])){
	$errors = array();

	if(empty($_POST['username'])){
		$errors[] = 'Enter Username';
	}else{
		$username = mysqli_real_escape_string($con, $_POST['username']);
	}

	if(empty($_POST['password'])){
		$errors[] = 'Enter Password';
	}else{
		$password = mysqli_real_escape_string($con, $_POST['password']);
	}

	if(empty($errors)){
		$query = mysqli_query($con, 'SELECT * FROM users
								WHERE username = "'.$username.'"
								AND password = "'.$password.'"
		') or die(mysqli_error($con));

		if(mysqli_num_rows($query) == 1){
			$result = mysqli_fetch_array($query);

			// $_SESSION['email'] = $result['email'];
			// $_SESSION['username'] = $result['username'];
			// $_SESSION['id'] = $result['id'];

			header('location:index.php');
		}else{
			$err_msg = "Invalid Login Details";

			header("location:sign-in.php?msg=$err_msg");
		}
	}
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
		<meta charset="utf-8">
		<title>Sign In – Swipe</title>
		<meta name="description" content="#">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Bootstrap core CSS -->
		<link href="dist/css/lib/bootstrap.min.css" type="text/css" rel="stylesheet">
		<!-- Swipe core CSS -->
		<link href="dist/css/swipe.min.css" type="text/css" rel="stylesheet">
		<!-- Favicon -->
		<link href="dist/img/favicon.png" type="image/png" rel="icon">
	</head>
	<body class="start">
		<main>
			<div class="layout">
				<!-- Start of Sign In -->
				<div class="main order-md-1">
					<div class="start">
						<div class="container">
							<div class="col-md-12">
								<div class="content">
									<h1>Sign in to Swipe</h1>
									<div class="third-party">
										<button class="btn item bg-blue">
											<i class="material-icons">pages</i>
										</button>
										<button class="btn item bg-teal">
											<i class="material-icons">party_mode</i>
										</button>
										<button class="btn item bg-purple">
											<i class="material-icons">whatshot</i>
										</button>
									</div>
									<p>or use your email account:</p>
									<form method="post" action="sign-in.php">
										<div class="form-group">
											<input type="text" id="inputUsername" class="form-control" placeholder="Username" name="username" required>
											<button class="btn icon"><i class="material-icons">mail_outline</i></button>
										</div>
										<div class="form-group">
											<input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>
											<button class="btn icon"><i class="material-icons">lock_outline</i></button>
										</div>
										<button type="submit" class="btn button" name="submit">Sign In</button>
										<div class="callout">
											<span>Don't have account? <a href="sign-up.php">Create Account</a></span>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- End of Sign In -->
				<!-- Start of Sidebar -->
				<div class="aside order-md-2">
					<div class="container">
						<div class="col-md-12">
							<div class="preference">
								<h2>Hello, Friend!</h2>
								<p>Enter your personal details and start your journey with Swipe today.</p>
								<a href="sign-up.php" class="btn button">Sign Up</a>
							</div>
						</div>
					</div>
				</div>
				<!-- End of Sidebar -->
			</div> <!-- Layout -->
		</main>
		<!-- Bootstrap core JavaScript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="dist/js/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script>window.jQuery || document.write('<script src="dist/js/vendor/jquery-slim.min.js"><\/script>')</script>
		<script src="dist/js/vendor/popper.min.js"></script>
		<script src="dist/js/bootstrap.min.js"></script>
	</body>

</html>
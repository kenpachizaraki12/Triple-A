<?php include('dist/config.php'); 
// $page_title = "Triple A.com | SIGN UP";

if(isset($_POST['submit'])){
	$errors = array();
	if(empty($_POST['username'])){
		$errors[] = 'Enter Username';
	}else{
		$username = mysqli_real_escape_string($con, $_POST['username']);
	}

	if(empty($_POST['email'])){
		$errors[] = 'Enter Email Address';
	}else{
		$email = mysqli_real_escape_string($con, $_POST['email']);
	}


	if(empty($_POST['password'])){
		$errors[] = 'Enter Password';
	}
	// elseif($_POST['repeat-pass'] != $_POST['password']){
	// 	$errors[] ='password does not match';
	// }
	else{
		$password = mysqli_real_escape_string($con, $_POST['password']);
		// $secured_password = md5(mysqli_real_escape_string($blog, $_POST['password']));
	}

	if(empty($errors)){
		$query = mysqli_query($con, 'INSERT INTO users
								VALUES(NULL,
								"'.$username.'",
								"'.$email.'",
								"'.$password.'")
		') or die(mysqli_error($con));

		$msg = "Registered Succesfully! Login";
		header("location:sign-in.php?msg=$msg");
	}else{
		foreach($errors as $error){
			echo "<p style=\"color:red\">$error</p>";
		}
	}
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
		<meta charset="utf-8">
		<title>Sign Up – Swipe</title>
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
				<!-- Start of Sign Up -->
				<div class="main order-md-2">
					<div class="start">
						<div class="container">
							<div class="col-md-12">
								<div class="content">
									<h1>Create Account</h1>
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
									<p>or use your email for registration:</p>
									<form class="signup" method="post" action="sign-up.php">
										<div class="form-parent">
											<div class="form-group">
												<input type="text" id="inputName" class="form-control" placeholder="Username" name="username" required>
												<button class="btn icon"><i class="material-icons">person_outline</i></button>
											</div>
											<div class="form-group">
												<input type="email" id="inputEmail" class="form-control" placeholder="Email Address" name="email" required>
												<button class="btn icon"><i class="material-icons">mail_outline</i></button>
											</div>
										</div>
										<div class="form-group">
											<input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>
											<button class="btn icon"><i class="material-icons">lock_outline</i></button>
										</div>
										<button type="submit" class="btn button" name="submit">Sign Up</button>
										<div class="callout">
											<span>Already a member? <a href="sign-in.html">Sign In</a></span>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- End of Sign Up -->
				<!-- Start of Sidebar -->
				<div class="aside order-md-1">
					<div class="container">
						<div class="col-md-12">
							<div class="preference">
								<h2>Welcome Back!</h2>
								<p>To keep connected with your friends please login with your personal info.</p>
								<a href="sign-in.php	" class="btn button">Sign In</a>
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
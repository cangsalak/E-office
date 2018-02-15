<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Login</title>

	<link href="assets/css/freelancer.min.css" rel="stylesheet">
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/login.css" rel="stylesheet">
	<!-- Custom fonts for this template -->
	
	
	
</head>
<body background="images/eau.jpg">

	<div class="container">
		<div class="row vertical-offset-100">
			<div class="col-md-12 col-md-offset-4">
				<div class="panel panel-default">

					<div class="panel-heading">
						<div class="row-fluid user-row">
							<img src="images/logo_eau.png" class="img-responsive" alt="Conxole Admin"/>
						</div>
						<p class="form-title">Electronic office  </p>
						
					</div>
						<div class="panel-body">
							<form action="checklogin.php" method="post" role="form" class="login" >
								<div class="form-group">
									<label for="exampleInputEmail1">Username or Email</label>
									<input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Enter email" type="text">
								</div>
								<div class="form-group">
									<label for="exampleInputPassword1">Password</label>
									<input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password" type="password">
								</div>
								
								<input type="submit" value="Sign In" class="btn btn-info btn-sm" />

							</form>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Page Content -->

		<!-- Bootstrap core JavaScript -->
		<script src="js/login.js"></script>
		<script src="http://mymaplist.com/js/vendor/TweenLite.min.js"></script>
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/popper/popper.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

	</body>
</html>
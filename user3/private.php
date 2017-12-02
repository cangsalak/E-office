<?php
session_start();
include "../connect.php";
$userId = $_GET['userId'];
$q =  "SELECT * FROM the_user where userId='$userId'";
$result = mysqli_query($link,$q);
$rowpro = mysqli_fetch_array($result,MYSQLI_ASSOC);

if($_SESSION['ses_Id'] ==""){
	header("Location: ../login.php");
	die();
} else if($_SESSION['status'] != 3){
	header("Location: ../logout.php");
	die();
}else{

	?>
	<!DOCTYPE HTML>
<!--
	Massively by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
<head>
	<title>Massively by HTML5 UP</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" href="../assets/css/main.css" />
	<noscript><link rel="stylesheet" href="../assets/css/noscript.css" /></noscript>
</head>
<body class="is-loading">

	<!-- Wrapper -->
	<div id="wrapper" class="fade-in">


		<!-- Header -->
		<header id="header">
			<a href="../index.php" class="logo">Home</a>
		</header>

		<!-- Nav -->
		<nav id="nav">
			<ul class="links">
				<li ><a href="../user3/index.php">Home</a></li>
				<li><a href="../user3/Document.php">Document search</a></li>
				<li class="active"><a href="../user3/private.php?userId=<?php echo $_SESSION['ses_userId']?>">private</a></li>
				
			</ul>
			<ul class="icons">
				<li><a href="../logout.php" class="fa fa-sign-out"><span class="label"> Log out</span></a></li>

			</ul>
		</nav>

		<!-- Main -->
		<div id="main">

			<!-- Featured Post -->
			<article class="post featured">
				<header class="major">
					<span class="date"><?php echo "$date $month $year";?></span>
					<h3><a href="#">ข้อมูลส่วนตัว</a></h3>

				</header>
				<form method="post" action="../membersUpdate.php" class="alt" id="membersUpdate">
					<div class="row uniform">
						<div class="2u 12u$(xsmall)">
							<p for="exampleInputEmail1">E-mail</p>
						</div>
						<div class="10u 12u$(xsmall)">
							<input type="email" class="form-control" name="email" id="email" value="<?php echo $rowpro['email']; ?>" type="text">
						</div>
						<div class="2u 12u$(xsmall)">
							<p for="exampleInputPassword1">รหัสผ่าน</p>
						</div>
						<div class="10u 12u$(xsmall)">
							<input type="password" class="form-control" name="password" id="password" value="<?php echo $rowpro['password']; ?>" type="password">
						</div>
						<div class="2u 12u$(xsmall)">
							<p>ชื่อ</p>
						</div>
						<div class="10u 12u$(xsmall)">
							<input type="text" name="userName" id="userName" value="<?php echo $rowpro['userName']; ?>" />
						</div>
						<div class="12u$">
							<ul class="actions">
								<li>
									<input type="hidden" name="positionId" value="<?php echo $rowpro['positionId']; ?>" />
									<input type="hidden" name="userId" value="<?php echo $rowpro['userId']; ?>" />
									<input type="submit" value="บันทึก " class="special" /></li>
									<li><input type="reset" value="ล้าง" /></li>
								</ul>
							</div>
						</div>
					</form>		


				</article>

				<!-- Posts -->


			</div>



			<!-- Copyright -->
			<div id="copyright">
				<ul><li>&copy; Untitled</li><li>By: <a href="https://html5up.net">Foremost & Kwang</a></li></ul>
			</div>

		</div>

		<!-- Scripts -->
		<script src="../assets/js/jquery.min.js"></script>
		<script src="../assets/js/jquery.scrollex.min.js"></script>
		<script src="../assets/js/jquery.scrolly.min.js"></script>
		<script src="../assets/js/skel.min.js"></script>
		<script src="../assets/js/util.js"></script>
		<script src="../assets/js/main.js"></script>

	</body>
	</html>
	<?php }

	?>
<?php
session_start();
include "connect.php";
$id = $_GET['id'];

$sql = "SELECT * FROM document WHERE documentId = '$id'";
$rs = mysqli_query($link,$sql);
$data = mysqli_fetch_array($rs,MYSQLI_ASSOC);

$type = "save_file";
$src = "{$type}/{$data['attachment']}";
if($_SESSION['ses_Id'] ==""){
	header("Location: ../login.php");
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
	<link rel="stylesheet" href="assets/css/main.css" />
	<link href="assets/css/freelancer.min.css" rel="stylesheet">
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">

	<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
</head>
<body class="is-loading"  id="page-top">

	<!-- Wrapper -->
	<div id="wrapper" class="fade-in">


		<!-- Header -->
		<header id="header">
			<a href="index.php" class="logo">Home</a>
		</header>

		<!-- Nav -->
		<nav id="nav">
			<ul class="links">
				<li><a href="user/index.php">Home</a></li>
				<li class="active"><a href="user/Document.php">Document search</a></li>
				<li><a href="user/private.php?userId=<?php echo $_SESSION['ses_userId']?>">private</a></li>

			</ul>
			<ul class="icons">
				<li><a href="logout.php" class="fa fa-sign-out"><span class="label"> Log out</span></a></li>

			</ul>
		</nav>

		<!-- Main -->
		<div id="main">

			<!-- Featured Post -->
			<article class="post featured">
				<header class="major">
					<span class="date"><?php echo "$date $month $year";?></span>
					<h3><a href="#"><?php echo "ไฟล์: {$data['attachment']}";?></a></h3>
				</header>
				<div class="table-wrapper">
					
						<?php
						if($type=="save_file") {


							echo "<img src=\"$src\"> ";

						}
						else {
							echo "<h3>ไม่สามารถเปิดไฟล์นี้ได้ กรุณาดาวน์โหลดมาเปิดบนเครื่องของท่านเอง</h3>";
						}

						mysqli_close($link);
						?>


						
						
					</div><br><br><br>
					<a href="download.php?id=<?php echo $id  ?>" target="iframe"><img src="images/arw-down.png" title="ดาวน์โหลด"></a>
				</article>







				<!-- Copyright -->
				<div id="copyright">
					<ul><li>&copy; Untitled</li><li>By: <a href="#">Foremost & Kwang</a></li></ul>
				</div>

			</div>

			<!-- Scripts -->
			<script src="js/jquery.min.js"></script>
			<script src="js/popper.min.js"></script>
			<script src="js/bootstrap.min.js"></script>
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>


		</body>
		</html>
		<?php }

		?>
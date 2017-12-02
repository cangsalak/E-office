<?php
session_start();
include "../connect.php";


$positionId = $_GET['positionId'];
$qpro = "SELECT * FROM positionuser WHERE positionId='$positionId'";
$respro = mysqli_query($link,$qpro);
$rowpro = mysqli_fetch_array($respro,MYSQLI_ASSOC);

 $result = mysqli_query($link,$q);

if($_SESSION['ses_Id'] ==""){
	header("Location: ../login.php");
	die();
} else if($_SESSION['status'] != 1){
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
	<link href="../assets/css/freelancer.min.css" rel="stylesheet">
	<link href="../assets/css/bootstrap.min.css" rel="stylesheet">

	<noscript><link rel="stylesheet" href="../assets/css/noscript.css" /></noscript>
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
				<li ><a href="../admin/index.php">Home</a></li>
				<li ><a href="../admin/Document_admin.php">Document search</a></li>
				<li ><a href="../admin/AddDocument.php">Add the document</a></li>
				<li class="active"><a href="../admin/members.php">members</a></li>
				<li ><a href="../admin/report.php">report</a></li>
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
					<h3><a href="#">แก้ไขข้อมูลตำแหน่ง</a></h3>
				</header>
				<div class="table-wrapper">
					<form method="post" action="../positionUpdate.php" class="alt" id="membersUpdate">
						<div class="row uniform">
							
							<div class="2u 12u$(xsmall)">
								<p>ตำแหน่ง</p>
							</div>
							<div class="10u 12u$(xsmall)">
								<input type="text" name="positionName" id="positionName" value="<?php echo $rowpro['positionName']; ?>" />
							</div>
						
							

							<div class="12u$">
								<ul class="actions">
									<li>
									<input type="hidden" name="positionId" value="<?php echo $rowpro['positionId']; ?>" />
									<input type="submit" value="บันทึก " class="special" /></li>
									<li><input type="reset" value="ล้าง" /></li>
								</ul>
							</div>
						</div>
					</form>		
				</div>

			</article>








			<!-- Posts -->


		</div>




		<!-- Copyright -->
		<div id="copyright">
			<ul><li>&copy; Untitled</li><li>By: <a href="https://html5up.net">Foremost & Kwang</a></li></ul>
		</div>

	</div>

	<!-- Scripts -->
	<script src="../js/jquery.min.js"></script>
	<script src="../js/popper.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
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
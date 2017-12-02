
<?php
session_start();
include "../connect.php";
include "../pagination.php";

if($_SESSION['ses_Id'] ==""){
	header("Location: ../login.php");
	die();
} else if($_SESSION['status'] != 6){
	header("Location: ../logout.php");
	die();
}else{

	?><!DOCTYPE HTML>
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
<body class="is-loading">

	<!-- Wrapper -->
	<div id="wrapper" class="fade-in">


		<!-- Header -->
		<header id="header">
			<a href="../index.html" class="logo">Home</a>
		</header>

		<!-- Nav -->
		<nav id="nav">
			<ul class="links">
				<ul class="links">
					<li ><a href="../user6/index.php">Home</a></li>
					<li class="active"><a href="../user6/Document.php">Document search</a></li>
					<li><a href="../user6/private.php?userId=<?php echo $_SESSION['ses_userId']?>">private</a></li>
				</ul>
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
					<h3><a href="#">ค้นหาเอกสาร</a></h3>
				</header>
				<form action="../user6/Search.php" method="post" class="alt" >
					<div class="row uniform">
						<div class="2u 12u$(xsmall)">
							<p>เลขที่เอกสาร</p>
						</div>
						<div class="10u 12u$(xsmall)">
							<input type="text" name="documentId" id="documentId" value="" placeholder="xxxx" />
						</div>
						<div class="2u 12u$(xsmall)">
							<p>ชื่อเรื่อง</p>
						</div>
						<div class="10u 12u$(xsmall)">
							<input type="text" name="documentName" id="documentName" value="" placeholder="เรื่อง" />
						</div>
						<div class="2u 12u$(xsmall)">
							<p>หน่วยงานที่ส่งมา</p>
						</div>
						<div class="10u 12u$(xsmall)">
							<input type="text" name="fromName" id="fromName" value="" placeholder="หน่วยงาน" />
						</div>
						<div class="2u 12u$(xsmall)">
							<p>ค้นหาจากวันที่</p>
						</div>
						<div class="5u 12u$(small)">
							<input type="checkbox" id="documentDateStart" name="documentDateStart" checked>
							<label for="documentDateStart">วันที่</label>
							<input type="date" name="documentDateStart" id="documentDateStart" min="2017-01-01" max="2017-12-31" >
						</div>
						<div class="5u$ 12u$(small)">
							<input type="checkbox" id="documentDateEnd" name="documentDateEnd" >
							<label for="documentDateEnd">ถึงวันที่</label>
							<input type="date" name="documentDateEnd" id="documentDateEnd" min="2016-01-01" max="2017-12-31" >
						</div>

						<div class="6u 12u$(small)">
							<input type="radio" id="categoryDocument" name="categoryDocument" value="categoryDocumentIn">
							<label for="demo-priority-in">เอกสารภายใน</label>
						</div>
						<div class="6u 12u$(small)">
							<input type="radio" id="categoryDocument" name="categoryDocument" value="categoryDocumentOut"checked>
							<label for="demo-priority-out">เอกสารภายนอก</label>
						</div>

						<div class="12u$">
							<ul class="actions">
								<li><input type="submit" value="ค้นหา " class="special" /></li>
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
			<ul><li>&copy; Untitled</li><li>By: <a href="#">Foremost & Kwang</a></li></ul>
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
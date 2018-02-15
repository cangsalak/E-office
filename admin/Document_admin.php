<?php
session_start();
include "../connect.php";
include "../pagination.php";

if($_SESSION['ses_Id'] ==""){
	header("Location: ../login.php");
	die();
} else if($_SESSION['status'] != 'admin'){
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
<?php include "../headAdmin.php"; ?>

<body class="is-loading">

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
				<li class="active"><a href="../admin/Document_admin.php">Document search</a></li>
				<li><a href="../admin/AddDocument.php">Add the document</a></li>
				<li><a href="../admin/members.php">members</a></li>
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
					<h3><a href="#">ค้นหาเอกสาร</a></h3>
				</header>
				<form action="../admin/Search.php" method="post" class="alt" >
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
							<input type="checkbox" id="documentDateStart" name="documentDateStart" >
							<label for="documentDateStart">วันที่</label>
							<input type="date" name="documentDateStart" id="documentDateStart" min="<?php echo "$yearMin-01-01";?>" max="<?php echo "$year-$m-$date";?>" value="<?php echo "$year-$m-$date";?>">
						</div>
						<div class="5u$ 12u$(small)">
							<input type="checkbox" id="documentDateEnd" name="documentDateEnd" >
							<label for="documentDateEnd">ถึงวันที่</label>
							<input type="date" name="documentDateEnd" id="documentDateEnd" min="<?php echo "$yearMin-01-01";?>" max="<?php echo "$year-$m-$date";?>" value="<?php echo "$year-$m-$date";?>">
						</div>

						<div class="6u 12u$(small)">
							<input type="radio" id="categoryDocumentIn" name="categoryDocument" value="เอกสารภายใน" >
							<label for="categoryDocumentIn">เอกสารภายใน</label>
						</div>
						<div class="6u 12u$(small)">
							<input type="radio" id="categoryDocumentOut" name="categoryDocument" value="เอกสารภายนอก">
							<label for="categoryDocumentOut">เอกสารภายนอก</label>
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
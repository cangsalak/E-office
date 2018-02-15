<?php
session_start();
include "../connect.php";
$q =  "SELECT * FROM the_user";
$result = mysqli_query($link,$q);
$sq =  "SELECT * FROM positionuser";
 $resulti = mysqli_query($link,$sq);
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
				<li ><a href="../admin/members.php">members</a></li>
				<li class="active"><a href="../report.php">members</a></li>

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
					<h2><a href="#">รายงาน</a></h2>
				</header>
				<div class="table-wrapper">
					<table class="alt">
						<thead>
							<tr>
										
								<th></th>
								<th>รายงาน</th>
								<th>ออกรายงาน</th>
							</tr>
						</thead>
						
						<tbody>
								<tr>
									<td>1</td>
									<td>การดำเนินงานของเอกสาร</td>
									<td><a href="operation.php">รายงาน</a></td>
								</tr>
								<tr>
									<td>2</td>
									<td>รายงานเอกสารภายใน</td>
									<td><a href="internal.php">รายงาน</a></td>
								</tr>
								<tr>
									<td>3</td>
									<td>รายงานเอกสารภายนอก</td>
									<td><a href="external.php">รายงาน</a></td>
								</tr>
								
							</tbody>
						</table>

					</div>

				</article>




				


					
					<!-- Posts -->






				<!-- Copyright -->
				
			</div>
				<div id="copyright">
					<ul><li>&copy; Untitled</li><li>By: <a href="#">Foremost & Kwang</a></li></ul>
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
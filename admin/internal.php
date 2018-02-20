<?php
session_start();
include "../connect.php";
include "../pagination.php";
$sql = "SELECT * FROM document  WHERE categoryDocument IN ('เอกสารภายใน') ";
$result = page_query($link,$sql,5);
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
						<table class="table">
							<thead>
								<tr>
									<th> รหัสเอกสาร</th>							
									<th>เรื่อง</th>	
									<th>วันจัดเก็บ</th>	
									<th>ผู้ส่งมาให้</th>	
									<th>ระดับความสำคัญ</th>	
								</tr>
							</thead>

							<tbody>				
								<tr>
									<?php
									while ($row = mysqli_fetch_array($result)) {
										?>

											
										<td>
											<a href="../admin/accessDocument.php?documentId=<?php echo $row['documentId']?>" class="alert alert-info">
											<?php echo substr($row['documentTime'],0,4)."/".$row['documentId'];?>
											</a>
										</td>
										<td><p><?php echo $row['documentName'];?></p></td>
										<td><?php echo $row['documentTime'];?></td>
										<td><?php echo $row['fromName']; ?></td>
										<td ><code><?php echo $row['urgent'];?></code></td>
									</tr>
									<?php
								} 
								?>
								


							</tbody>
						</table>
						<?php
						page_echo_pagenums(5,true,false);
						mysqli_free_result($result);
						
						?>
						<br><br><br>

						<input value="Print" onclick="window.print()" type="button">
					</div>

				</article>


								<!-- Posts -->



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
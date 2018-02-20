<?php
session_start();
include "../connect.php";
include "../pagination.php";
$q =  "SELECT * FROM positionuser";
$result = page_query($link,$q,10);
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
					<h3><a href="#">ตำแหน่ง</a></h3>
				</header>
				<div class="table-wrapper">
					<table class="alt">
						
							<thead>
								<tr>
									<th>รหัสตำแหน่ง</th>							

									<th>ชื่อตำแหน่ง</th>
									<th>จัดการ</th>
								</tr>
							</thead>

							<tbody>
								<?php
								while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
									
									?>
									<tr>
										<td>
											<?php echo $row['positionId']-1 ?>
										</td>
										<td><?php echo $row['positionName'] ?></td>
							<td><a href="positionUpdate.php?positionId=<?php echo $row['positionId'] ?>"><button class="btn btn-primary">แก้ไข</button></a>
										</td>
									</tr>

									<?php } 


									?>
								</tbody>
							</table>
							<P id="portfolio">
							<div class="container">
								<div class="portfolio-link" href="#portfolioModal1" data-toggle="modal">
									<button type="button" class="btn btn-primary" >	เพิ่มตำแหน่ง</button>
							
								</div>
								
							</div>
							
						</P>

							<?php
							page_echo_pagenums(5,true,false);
							mysqli_close($link);
							?>
						</div>

					</article>


				</div>

				<div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="close-modal" data-dismiss="modal">
								<div class="lr">
									<div class="rl"></div>
								</div>
							</div>
							<div class="container">
								<div class="row">
									<div class="col-lg-10 mx-auto">
										<div class="modal-body">

											<header class="major">
												<span class="date"><?php echo "$date $month $year";?></span>
											</header>
											<form method="post" action="../positionAdd.php" class="alt" id="positionAdd">
												<div class="row uniform">
													<div class="2u 12u$(xsmall)">
														<p for="exampleInputEmail1">ตำแหน่ง</p>
													</div>
													<div class="10u 12u$(xsmall)">
														<input type="text" class="form-control" name="positionName" id="positionName" placeholder="Enter name" type="text">
													</div>
													

														<div class="12u$">
															<ul class="actions">
																<li><input type="submit" value="บันทึก " class="special" /></li>
																<li><input type="reset" value="ล้าง" /></li>
															</ul>
														</div>
													</div>


												</form>



											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
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
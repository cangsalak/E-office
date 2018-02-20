<?php
session_start();
include "../connect.php";
$q =  "SELECT * FROM the_user";
$result = mysqli_query($link,$q);
$sq =  "SELECT * FROM positionuser";
$resulti = mysqli_query($link,$sq);
$resulti1 = mysqli_query($link,$sq);
$resulti2 = mysqli_query($link,$sq);
$resulti3 = mysqli_query($link,$sq);
$resulti4 = mysqli_query($link,$sq);
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
				<li class="active"><a href="members.php">members</a></li>
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
					<h3><a href="#">สมาชิก</a></h3>
				</header>
				<div class="table-wrapper">
					<table class="alt">
						<thead>
							<tr>
								<th>รหัสสมาชิก</th>							
								
								<th>E-mail</th>
								<th>ชื่อ</th>
								<th>แก้ไข</th>
							</tr>
						</thead>
						
						<tbody>
							<?php
							while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
								?>
								<tr>
									<td>
										<?php echo $row['userId'] ?>
									</td>
									<td><?php echo $row['email'] ?></td>
									<td><?php echo $row['userName'] ?></td>
									<!--<td id="portfolio">
										<div class="container">
											<div class="portfolio-link" href="#portfolioModal2" data-toggle="modal">
												<i class="fa fa-sign-out" id="portfolio"><span class="label"> แก้ไข</span></i>
											</div>
										</div>
									</td>-->
									<td><a href="addMembersUpdate.php?userId=<?php echo $row['userId'] ?>"><i class="fa fa-sign-out" id="portfolio"><span class="label"> แก้ไข</span></i></a></td>
								</tr>
								<?php } 
								mysqli_free_result($result);
								mysqli_close($link);

								?>
							</tbody>
						</table>

						<P id="portfolio">
							<div class="container">
								<div class="portfolio-link" href="#portfolioModal1" data-toggle="modal">
									<button type="button" class="btn btn-primary" >	เพิ่มสมาชิก</button>
									<a href="../admin/position.php"> <button type="button" class="btn btn-danger" >	จัดการตำแหน่ง</button> </a>
								</div>
								
							</div>
							</div>
						</P>
					</div>

				</article>




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
											<form method="post" action="../membersAdd.php" class="alt" id="membersAdd">
												<div class="row uniform">
													<div class="2u 12u$(xsmall)">
														<p for="exampleInputEmail1">เลขสมาชิก</p>
													</div>
													<div class="10u 12u$(xsmall)">
														<input type="text" class="form-control" name="userId" id="userId" placeholder="Enter userId" type="text">
													</div>
													<div class="2u 12u$(xsmall)">
														<p for="exampleInputEmail1">E-mail</p>
													</div>
													<div class="10u 12u$(xsmall)">
														<input type="text" class="form-control" name="email" id="email" placeholder="ใส่แค่ชื่อที่ต้องการ เมลเราจัดการให้ ...@stu.eau.ac.th" type="text">
													</div>
													<div class="2u 12u$(xsmall)">
														<p for="exampleInputPassword1">รหัสผ่าน </p>
													</div>
													<div class="10u 12u$(xsmall)">
														<input type="password" class="form-control" name="password" id="password" placeholder="Password" type="password">
													</div>
													<div class="2u 12u$(xsmall)">
														<p>ชื่อ</p>
													</div>
													<div class="10u 12u$(xsmall)">
														<input type="text" name="userName" id="userName" value="" placeholder="ชื่อ" />
													</div>
													<div class="2u 12u$(xsmall)">
														<p>ตำแหน่ง</p>
													</div>
													<div class="10u 12u$(xsmall)">
														<div class="select-wrapper">
															<select name="positionId" id="positionId">
																<option value="">- เลือก -</option>
																<?php
																while ($row = mysqli_fetch_array($resulti,MYSQLI_ASSOC)) {
																	?>
																	<option value="<?php echo $row['positionId'];?>"><?php echo $row['positionName'];?></option>
																	<?php } 
																	mysqli_free_result($result);
																	


																	?>

																</select>
															</div>
													</div>
													<div class="2u 12u$(xsmall)">
														<p>ตำแหน่งที่ 2</p>
													</div>
													<div class="10u 12u$(xsmall)">
														<div class="select-wrapper">
															<select name="positionId2" id="positionId2">
																<option value="">- เลือก -</option>
																<?php
																while ($row = mysqli_fetch_array($resulti1,MYSQLI_ASSOC)) {
																	?>
																	<option value="<?php echo $row['positionId'];?>"><?php echo $row['positionName'];?></option>
																	<?php } 
																	mysqli_free_result($result1);
																	


																	?>

																</select>
															</div>
													</div>
													<div class="2u 12u$(xsmall)">
														<p>ตำแหน่งที่ 3</p>
													</div>
													<div class="10u 12u$(xsmall)">
														<div class="select-wrapper">
															<select name="positionId3" id="positionId3">
																<option value="">- เลือก -</option>
																<?php
																while ($row = mysqli_fetch_array($resulti2,MYSQLI_ASSOC)) {
																	?>
																	<option value="<?php echo $row['positionId'];?>"><?php echo $row['positionName'];?></option>
																	<?php } 
																	mysqli_free_result($result2);
																	


																	?>
																</select>
															</div>
													</div>
													<div class="2u 12u$(xsmall)">
														<p>ตำแหน่งที่ 4</p>
													</div>
													<div class="10u 12u$(xsmall)">
														<div class="select-wrapper">
															<select name="positionId4" id="positionId4">
																<option value="">- เลือก -</option>
																<?php
																while ($row = mysqli_fetch_array($resulti3,MYSQLI_ASSOC)) {
																	?>
																	<option value="<?php echo $row['positionId'];?>"><?php echo $row['positionName'];?></option>
																	<?php } 
																	mysqli_free_result($result3);
																	


																	?>
																</select>
															</div>
													</div>
													<div class="2u 12u$(xsmall)">
														<p>ตำแหน่งที่ 5</p>
													</div>
													<div class="10u 12u$(xsmall)">
														<div class="select-wrapper">
															<select name="positionId5" id="positionId5">
																<option value="">- เลือก -</option>
																<?php
																while ($row = mysqli_fetch_array($resulti4,MYSQLI_ASSOC)) {
																	?>
																	<option value="<?php echo $row['positionId'];?>"><?php echo $row['positionName'];?></option>
																	<?php } 
																	mysqli_free_result($result4);
																	mysqli_close($link);

																	?>
																</select>
															</div>
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


					
					<!-- Posts -->






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
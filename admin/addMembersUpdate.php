<?php
session_start();
include "../connect.php";


$userId = $_GET['userId'];
$qpro =  "SELECT * FROM the_user where userId='$userId'";
$respro = mysqli_query($link,$qpro);
$rowpro = mysqli_fetch_array($respro,MYSQLI_ASSOC);
$q =  "SELECT * FROM positionuser";
 $result = mysqli_query($link,$q);
 $result2 = mysqli_query($link,$q);
 $result3 = mysqli_query($link,$q);
  
 

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
				<li ><a href="index.php">Home</a></li>
				<li ><a href="Document_admin.php">Document search</a></li>
				<li ><a href="AddDocument.php">Add the document</a></li>
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
					<h3><a href="#">แก้ไขข้อมูลสมาชิก</a></h3>
				</header>
				<div class="table-wrapper">
					<form method="post" action="../membersUpdate.php?categoryId=1" class="alt" id="membersUpdate">
						<div class="row uniform">
							<div class="2u 12u$(xsmall)">
								<p for="exampleInputEmail1">E-mail</p>
							</div>
							<div class="10u 12u$(xsmall)">
								<input type="email" class="form-control" name="email" id="email" value="<?php echo $rowpro['email']; ?>" type="text" >
							</div>
							<div class="2u 12u$(xsmall)">
								<p for="exampleInputPassword1">รหัสผ่าน</p>
							</div>
							<div class="10u 12u$(xsmall)">
								<input type="password" class="form-control" name="password" id="password" value="">
							</div>
							<div class="2u 12u$(xsmall)">
								<p>ชื่อ</p>
							</div>
							<div class="10u 12u$(xsmall)">
								<input type="text" name="userName" id="userName" value="<?php echo $rowpro['userName']; ?>" />
							</div>
							<?php
								if ($rowpro['categoryId']!=1) {
								?>
							<div class="2u 12u$(xsmall)">
								<p>ตำแหน่ง</p>
							</div>
							<div class="10u 12u$(xsmall)">
								<div class="select-wrapper">
									
									<select name="positionId" id="positionId">
										<?php	$Id=$rowpro['positionId'];  
												    $p =  "SELECT * FROM positionuser WHERE positionId=$Id"; 
												    $pi = mysqli_query($link,$p);
													$rp = mysqli_fetch_array($pi,MYSQLI_ASSOC);?>
										<option value="<?php echo $Id; ?>"><?php echo $rp['positionName']; ?></option>
										<?php
										while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
											?>
											<?php
										if (($row['positionId']>1)&&$row['positionId']!=$Id) {
											?>
										<option value="<?php echo $row['positionId'];?>"><?php echo $row['positionName'];?></option>
										<?php } ?>
										<?php } 
									mysqli_free_result($result);
									

								?>
									</select>
								</div>
							</div>

							<?php  if(!empty($rowpro['positionId2'])) {?>
							<div class="2u 12u$(xsmall)">
								<p>ตำแหน่งที่ 2</p>
							</div>
							<div class="10u 12u$(xsmall)">
								<div class="select-wrapper">
									<select name="positionId2" id="positionId2">
										<?php	 $Id2=$rowpro['positionId2'];  
												    $p2 =  "SELECT * FROM positionuser WHERE positionId=$Id2"; 
												    $pi2 = mysqli_query($link,$p2);
													$rp2 = mysqli_fetch_array($pi2,MYSQLI_ASSOC);?>
										<option value="<?php echo $Id2; ?>"><?php echo $rp2['positionName']; ?></option>

										<?php
										while ($row = mysqli_fetch_array($result2,MYSQLI_ASSOC)) {
											?>
											<?php
										if (($row['positionId']>1)&&$row['positionId']!=$Id)  {
											?>
										<option value="<?php echo $row['positionId'];?>"><?php echo $row['positionName'];?></option>
										<?php } ?>
										<?php } 
								mysqli_free_result($result);

								?>
									</select>
								</div>
							</div>

							<?php }  if(!empty($rowpro['positionId3'])) {?>

							<div class="2u 12u$(xsmall)">
								<p>ตำแหน่งที่ 3</p>
							</div>
							<div class="10u 12u$(xsmall)">
								<div class="select-wrapper">
									<select name="positionId3" id="positionId3">
										<?php	$Id3=$rowpro['positionId3'];  
												    $p3 =  "SELECT * FROM positionuser WHERE positionId=$Id3"; 
												    $pi3 = mysqli_query($link,$p3);
													$rp3 = mysqli_fetch_array($pi3,MYSQLI_ASSOC);?>
										<option value="<?php echo $rowpro['positionId3']; ?>"><?php echo $rp3['positionName']; ?></option>
										<?php
										while ($row = mysqli_fetch_array($result3,MYSQLI_ASSOC)) {
											?>
											<?php
										if (($row['positionId']>1)&&$row['positionId']!=$Id)  {
											?>
										<option value="<?php echo $row['positionId'];?>"><?php echo $row['positionName'];?></option>
										<?php } ?>
										<?php } 
								mysqli_free_result($result);
								

								?>
									</select>
								</div>
							</div>
							<?php } mysqli_close($link);?>
							<?php } ?>
							<div class="12u$">
								<ul class="actions">
									<li>
									<input type="hidden" name="userId" value="<?php echo $rowpro['userId']; ?>" />
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
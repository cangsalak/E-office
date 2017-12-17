<?php
session_start();
include "../connect.php";
$q =  "SELECT * FROM positionuser";
 $resulti = mysqli_query($link,$q);
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
				<li class="active"><a href="../admin/AddDocument.php">Add the document</a></li>
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
					<h3><a href="#">เพิ่มเอกสาร</a></h3>
				</header>
				<form action="../addDocumentPhp.php" method="post"  class="alt" id="document1" enctype="multipart/form-data">
					<div class="row uniform">
						<div class="2u 12u$(xsmall)">
							<p>เลขที่หนังสือ </p>
						</div>
						<div class="10u 12u$(xsmall)">
							<input type="text" name="Number_of_book" id="Number_of_book" value="" placeholder="เลขที่หนังสือ" />
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
							<p>ถึง</p>
						</div>
						<div class="10u 12u$(xsmall)">

								<div class="select-wrapper">

									<select name="positionId" id="positionId">
										<option value="">- เลือก -</option>
									<?php
										while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
											?>
										<option value="<?php echo $row['positionId'];?>"><?php echo $row['positionName'];?></option>
										<?php } 
								mysqli_free_result($result);
								mysqli_close($link);

								?>
									</select>
								</div>

								
						</div>
						<div class="2u 12u$(xsmall)">
							<p>วันที่รับ</p>
						</div>
						<div class="5u 12u$(small)">
							<input type="date" name="documentDate" id="documentDate" min="2560-01-01" max="<?php echo "$year-$m-$date";?>" value="<?php echo "$year-$m-$date";?>">
						</div>
						<div class="5u$ 12u$(small)">
							
						</div>
						
						<div class="2u 12u$(xsmall)">
							<p>เรียน</p>
						</div>
						<div class="10u 12u$(xsmall)">
							<div class="select-wrapper">
								<select name="statusName" id="statusName">
									<option value="">- เลือก -</option>
									<?php
										while ($row = mysqli_fetch_array($resulti,MYSQLI_ASSOC)) {
											?>
										<option value="<?php echo $row['positionName'];?>"><?php echo $row['positionName'];?></option>
										<?php } 
								mysqli_free_result($resulti);
								mysqli_close($link);

								?>
								</select>
							</div>
						</div>
						<div class="2u 12u$(xsmall)">
							<p>การดำเนินการ</p>
						</div>
						<div class="10u 12u$(xsmall)">
							<div class="select-wrapper">
								<select name="action" id="action">
									<option value="">- เลือก -</option>
									<option value="เพื่อโปรดทราบ">เพื่อโปรดทราบ</option>
									<option value="เพื่อโปรดอนุมัติ">เพื่อโปรดอนุมัติ</option>
									<option value="เพื่อโปรดพิจารณา">เพื่อโปรดพิจารณา</option>
									<option value="เพื่อโปรดสั่งการ">เพื่อโปรดสั่งการ</option>
									<option value="โปรดตรวจสอบข้อมูล">โปรดตรวจสอบข้อมูล</option>
									<option value="โปรดดำเนินการตามขั้นตอนต่อไป">โปรดดำเนินการตามขั้นตอนต่อไป</option>
									<option value="ขอความเห็น">ขอความเห็น</option>
									<option value="เห็นควรชะลอ">เห็นควรชะลอ</option>
									<option value="นำส่งสำนักหอสมุดกลาง">นำส่งสำนักหอสมุดกลาง</option>
									<option value="นำส่งสำนักการคลังและทรัพย์สิน">นำส่งสำนักการคลังและทรัพย์สิน</option>
									<option value="ทราบ/รวบรวม">ทราบ/รวบรวม</option>
								</select>
								

							</div>
						</div>
						<div class="2u 12u$(xsmall)">
							<p>ไฟล์เอกสาร</p>
						</div>
						<div class="10u 12u$(xsmall)">
							<input type="file" name="attachment" style="color:red;" id="attachment" accept="image/*">
						</div>
						<div class="6u 12u$(small)">
							<input type="radio" id="categoryDocumentIn" name="categoryDocument" value="เอกสารภายใน">
							<label for="categoryDocumentIn">เอกสารภายใน</label>
						</div>
						<div class="6u 12u$(small)">
							<input type="radio" id="categoryDocumentOut" name="categoryDocument" value="เอกสารภายนอก" checked>
							<label for="categoryDocumentOut">เอกสารภายนอก</label>
						</div>
						<div class="3u 12u$(xsmall)">
							<p>หมายเหตุ</p>
						</div>
						<div class="9u 12u$(xsmall)">
							<textarea name="story" id="story" placeholder="Enter your message" rows="6"></textarea>
						</div>
						<!-- Break -->




						<!-- Break -->
						<div class="12u$">
							<ul class="actions">
								<li><input type="submit" value="บันทึก " class="special" /></li>
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
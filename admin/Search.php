<?php
session_start();
include "../connect.php";
include "../pagination.php";


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
<body class="is-loading">
	<?php



	$field = "ทั้งหมด";
	$sql = "SELECT * FROM document " ;

	if(!empty($_POST['documentId'])) {
		$sql .= " WHERE documentId = " . $_POST['documentId'];
		$field = " รหัสเอกสาร " . $_POST['documentId'];
		if(!empty($_POST['documentName'])) {
			$sql .= " OR documentName LIKE '%" . $_POST['documentName'] . "%'";
			$field .= " เรื่อง " . $_POST['documentName'];

		}
		if(!empty($_POST['fromName'])) {
			$sql .= " OR fromName LIKE '%" . $_POST['fromName'] . "%'";
			$field .= " จาก" . $_POST['fromName'];
		}
		if( $_POST['documentDateStart'] ){
			if((@$_POST['documentDateEnd']) >= ( @$_POST['documentDateStart'] )){
				if( (!empty($_POST['documentDateStart'])) && (!empty($_POST['documentDateEnd']))  )  {
					$sql .= " OR documentDate BETWEEN '" . $_POST['documentDateStart'] . "'" ." OR "."'". $_POST['documentDateEnd'] . "'";
					$field .= " ค้นหาวันที่ " . $_POST['documentDateStart'] . " ถึง " . $_POST['documentDateEnd']; 

				}
			}else{
				$sql .= " OR documentDate BETWEEN '" . $_POST['documentDateStart'] . "'" ." AND "."'". $_POST['documentDateStart'] . "'";
				$field .= " ค้นหาวันที่ " . $_POST['documentDateStart']; 
			}
		}
		if(@$_POST['categoryDocument']) {
			if ($_POST['categoryDocument'] == "categoryDocumentIn") {
				$sql .= " OR categoryDocument = " . $_POST['categoryDocument'];
				$field = " จาก" . $_POST['categoryDocument'];
			}else if ($_POST['categoryDocument'] == "categoryDocumentOut") {
				$sql .= " OR categoryDocument = " . $_POST['categoryDocument'];
				$field = " จาก" . $_POST['categoryDocument'];
			}
		}		
	}

	else if(!empty($_POST['documentName'])) {
		$sql .= " WHERE documentName LIKE '%" . $_POST['documentName'] . "%'";
		$field = " เรื่อง " . $_POST['documentName'];
		if(!empty($_POST['fromName'])) {
			$sql .= " OR fromName LIKE '%" . $_POST['fromName'] . "%'";
			$field .= " จาก" . $_POST['fromName'];
		}
		if( @$_POST['documentDateStart'] ){
			if((@$_POST['documentDateEnd']) >= ( @$_POST['documentDateStart'] )){
				if( (!empty($_POST['documentDateStart'])) && (!empty($_POST['documentDateEnd']))  )  {
					$sql .= " OR documentDate BETWEEN '" . $_POST['documentDateStart'] . "'" ." AND "."'". $_POST['documentDateEnd'] . "'";
					$field .= " ค้นหาวันที่ " . $_POST['documentDateStart'] . " ถึง " . $_POST['documentDateEnd']; 

				}
			}else{
				$sql .= " and documentDate BETWEEN '" . $_POST['documentDateStart'] . "'" ." AND "."'". $_POST['documentDateStart'] . "'";
				$field .= " ค้นหาวันที่ " . $_POST['documentDateStart']; 
			}
		}
		if(@$_POST['categoryDocument']) {
			if ($_POST['categoryDocument'] == "categoryDocumentIn") {
				$sql .= " OR categoryDocument = " . $_POST['categoryDocument'];
				$field = " จาก" . $_POST['categoryDocument'];
			}else if ($_POST['categoryDocument'] == "categoryDocumentOut") {
				$sql .= " OR categoryDocument = " . $_POST['categoryDocument'];
				$field = " จาก" . $_POST['categoryDocument'];
			}
		}			

	}
	else if(!empty($_POST['fromName'])) {
		$sql .= " WHERE fromName LIKE '%" . $_POST['fromName'] . "%'";
		$field = " จาก" . $_POST['fromName'];
		if( @$_POST['documentDateStart'] ){
			if((@$_POST['documentDateEnd']) >= ( @$_POST['documentDateStart'] )){
				if( (!empty($_POST['documentDateStart'])) && (!empty($_POST['documentDateEnd']))  )  {
					$sql .= " OR documentDate BETWEEN '" . $_POST['documentDateStart'] . "'" ." AND "."'". $_POST['documentDateEnd'] . "'";
					$field .= " ค้นหาวันที่ " . $_POST['documentDateStart'] . " ถึง " . $_POST['documentDateEnd']; 

				}
			}else{
				$sql .= " OR documentDate BETWEEN '" . $_POST['documentDateStart'] . "'" ." AND "."'". $_POST['documentDateStart'] . "'";
				$field .= " ค้นหาวันที่ " . $_POST['documentDateStart']; 
			}
		}
		if(@$_POST['categoryDocument']) {
			if ($_POST['categoryDocument'] == "categoryDocumentIn") {
				$sql .= " OR categoryDocument = " . $_POST['categoryDocument'];
				$field = " จาก" . $_POST['categoryDocument'];
			}else if ($_POST['categoryDocument'] == "categoryDocumentOut") {
				$sql .= " OR categoryDocument = " . $_POST['categoryDocument'];
				$field = " จาก" . $_POST['categoryDocument'];
			}
		}		
	}
	else if( @$_POST['documentDateStart'] ){
		if((@$_POST['documentDateEnd']) >= ( @$_POST['documentDateStart'] )){
			if( (!empty($_POST['documentDateStart'])) && (!empty($_POST['documentDateEnd']))  )  {
				$sql .= " WHERE documentDate BETWEEN '" . $_POST['documentDateStart'] . "'" ." AND "."'". $_POST['documentDateEnd'] . "'";
				$field = " ค้นหาวันที่ " . $_POST['documentDateStart'] . " ถึง " . $_POST['documentDateEnd']; 

			}
		}else{
			$sql .= " WHERE documentDate BETWEEN '" . $_POST['documentDateStart'] . "'" ." AND "."'". $_POST['documentDateStart'] . "'";
			$field = " ค้นหาวันที่ " . $_POST['documentDateStart']; 
		}
		if(@$_POST['categoryDocument']) {
			if ($_POST['categoryDocument'] == "categoryDocumentIn") {
				$sql .= " OR categoryDocument = " . $_POST['categoryDocument'];
				$field = " จาก" . $_POST['categoryDocument'];
			}else if ($_POST['categoryDocument'] == "categoryDocumentOut") {
				$sql .= " OR categoryDocument = " . $_POST['categoryDocument'];
				$field = " จาก" . $_POST['categoryDocument'];
			}
		}
	}

	else if(@$_POST['categoryDocument']) {
			if ($_POST['categoryDocument'] == "categoryDocumentIn") {
				$sql .= " WHERE categoryDocument = " . $_POST['categoryDocument'];
				$field = " จาก" . $_POST['categoryDocument'];
			}else if ($_POST['categoryDocument'] == "categoryDocumentOut") {
				$sql .= " WHERE categoryDocument = " . $_POST['categoryDocument'];
				$field = " จาก" . $_POST['categoryDocument'];
			}	
		}


	$sql .= " ORDER BY documentId DESC";
	$result = page_query($link, $sql, 5);
	$first = page_start_row();
	$last = page_stop_row();
	$total = page_total_rows();
	if($total == 0) {
		$first = 0;
	}
	?>

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

			<article class="post featured">
				<header class="major">
					<span class="date" >
						<?php echo "$date $month $year";?>

					</span>
					<h2><a href="#">เอกสารที่ค้นหา</a></h2>
				</header>
				<div class="table-wrapper">
					<caption>
						<?php 	echo "สินค้าลำดับที่  $first - $last จาก $total  ($field)"; ?>
					</caption>
					<br><br>
					<table class="table">
					
						<thead>
							<tr>
								<th>รหัสเอกสาร</th>							
								<th>เรื่อง</th>
								<th>วันจัดเก็บ</th>
								<th>วันที่เอกสาร</th>
								<th>ผู้ส่งมาให้</th>
								<th>สถานะ</th>
							</tr>
						</thead>

						<tbody>
							<?php
							while ($row = mysqli_fetch_array($result)) {
								?>
								<tr>
									<td>
											<?php echo "$year /";?><a href="../admin/accessDocument.php?documentId=<?php echo $row['documentId']?>" ><?php echo $row['documentId'];?></a>

										</td>
									<td><p><?php echo $row['documentName'];?></p></td>
									<td><?php echo $row['documentTime'];?></td>
									<td><?php echo $row['documentDate'];?></td>
									<td><?php echo $row['fromName']; ?></td>
									<td><?php echo $row['statusName'];?></td>
								</tr>
								<?php
							}
							?>


						</tbody>
					</table>
					<?php
					page_echo_pagenums(5,true,false);
					mysqli_free_result($result);
					mysqli_close($link);
					?>
				</div>
			</article>
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
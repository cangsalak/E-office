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
	<?php

	
	

	$field = "ทั้งหมด";
	$sql = "SELECT DISTINCT * FROM document " ;

	if(!empty($_POST['documentId'])) {
		$sql .= " WHERE documentId = " . $_POST['documentId'];
		$field = " รหัสเอกสาร " . $_POST['documentId'];
		if(!empty($_POST['documentName'])) {
			$sql .= " OR documentName LIKE '%" . $_POST['documentName'] . "%'";
			$field .= " เรื่อง " . $_POST['documentName'];

		}
		if(!empty($_POST['fromName'])) {
			$sql .= " OR fromName LIKE '%" . $_POST['fromName'] . "%'";
			$field .= " จาก " . $_POST['fromName'];
		}
		if((@$_POST['documentDateEnd']) == ( @$_POST['documentDateStart'] )){
				 
		}
			else if( $_POST['documentDateStart'] ){
			if((@$_POST['documentDateEnd']) > ( @$_POST['documentDateStart'] )){
				if( (!empty($_POST['documentDateStart'])) && (!empty($_POST['documentDateEnd']))  )  {
					$sql .= " OR documentDate BETWEEN '" . $_POST['documentDateStart'] . "'" ." OR "."'". $_POST['documentDateEnd'] . "'";
					$field .= " ค้นหาวันที่ " . $_POST['documentDateStart'] . " ถึง " . $_POST['documentDateEnd']; 

				}
			}else{
				$sql .= " OR documentDate BETWEEN '" . $_POST['documentDateStart'] . "'" ." AND "."'". $_POST['documentDateStart'] . "'";
				$field .= " ค้นหาวันที่ " . $_POST['documentDateStart']; 
			}
		}
		if(!empty($_POST['categoryDocument'])) {
		
				$sql .= " OR categoryDocument = " ."'". $_POST['categoryDocument']."'";
				$field .= " ประเภท " . $_POST['categoryDocument'];
			
		}	
	}

	else if(!empty($_POST['documentName'])) {
		$sql .= " WHERE documentName LIKE '%" . $_POST['documentName'] . "%'";
		$field = " เรื่อง " . $_POST['documentName'];
		if(!empty($_POST['fromName'])) {
			$sql .= " OR fromName LIKE '%" . $_POST['fromName'] . "%'";
			$field .= " จาก" . $_POST['fromName'];
		}
		if((@$_POST['documentDateEnd']) == ( @$_POST['documentDateStart'] )){
				 
		}
			else if( @$_POST['documentDateStart'] ){
			if((@$_POST['documentDateEnd']) > ( @$_POST['documentDateStart'] )){
				if( (!empty($_POST['documentDateStart'])) && (!empty($_POST['documentDateEnd']))  )  {
					$sql .= " OR documentDate BETWEEN '" . $_POST['documentDateStart'] . "'" ." AND "."'". $_POST['documentDateEnd'] . "'";
					$field .= " ค้นหาวันที่ " . $_POST['documentDateStart'] . " ถึง " . $_POST['documentDateEnd']; 

				}
			}else{
				$sql .= " and documentDate BETWEEN '" . $_POST['documentDateStart'] . "'" ." AND "."'". $_POST['documentDateStart'] . "'";
				$field .= " ค้นหาวันที่ " . $_POST['documentDateStart']; 
			}
		}
		if(!empty($_POST['categoryDocument'])) {
		
				$sql .= " OR categoryDocument = " ."'". $_POST['categoryDocument']."'";
				$field .= " ประเภท " . $_POST['categoryDocument'];
			
		}		

	}
	else if(!empty($_POST['fromName'])) {
		$sql .= " WHERE fromName LIKE '%" . $_POST['fromName'] . "%'";
		$field = " จาก" . $_POST['fromName'];
		if( @$_POST['documentDateStart'] ){
			if((@$_POST['documentDateEnd']) == ( @$_POST['documentDateStart'] )){
				 
			}
			else if((@$_POST['documentDateEnd']) > ( @$_POST['documentDateStart'] )){
				if( (!empty($_POST['documentDateStart'])) && (!empty($_POST['documentDateEnd']))  )  {
					$sql .= " OR documentDate BETWEEN '" . $_POST['documentDateStart'] . "'" ." AND "."'". $_POST['documentDateEnd'] . "'";
					$field .= " ค้นหาวันที่ " . $_POST['documentDateStart'] . " ถึง " . $_POST['documentDateEnd']; 

				}
			}else{
				$sql .= " OR documentDate BETWEEN '" . $_POST['documentDateStart'] . "'" ." AND "."'". $_POST['documentDateStart'] . "'";
				$field .= " ค้นหาวันที่ " . $_POST['documentDateStart']; 
			}
		}
		if(!empty($_POST['categoryDocument'])) {
		
				$sql .= " OR categoryDocument = " ."'". $_POST['categoryDocument']."'";
				$field .= " ประเภท " . $_POST['categoryDocument'];
			
		}		
	}
	else if( @$_POST['documentDateStart'] ){
		if((@$_POST['documentDateEnd']) == ( @$_POST['documentDateStart'] )){
				 
		}
		else if((@$_POST['documentDateEnd']) > ( @$_POST['documentDateStart'] )){
			if( (!empty($_POST['documentDateStart'])) && (!empty($_POST['documentDateEnd']))  )  {
				$sql .= " WHERE documentDate BETWEEN '" . $_POST['documentDateStart'] . "'" ." AND "."'". $_POST['documentDateEnd'] . "'";
				$field = " ค้นหาวันที่ " . $_POST['documentDateStart'] . " ถึง " . $_POST['documentDateEnd']; 

			}
		}else{
			$sql .= " WHERE documentDate BETWEEN '" . $_POST['documentDateStart'] . "'" ." AND "."'". $_POST['documentDateStart'] . "'";
			$field = " ค้นหาวันที่ " . $_POST['documentDateStart']; 
		}
		if(!empty($_POST['categoryDocument'])) {
		
				$sql .= " OR categoryDocument = " ."'". $_POST['categoryDocument']."'";
				$field .= " ประเภท " . $_POST['categoryDocument'];
			
		}
	}

	else if(!empty($_POST['categoryDocument'])) {
		
				$sql .= " WHERE categoryDocument = " ."'". $_POST['categoryDocument']."'";
				$field = " ประเภท " . $_POST['categoryDocument'];
			
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
				<caption>
						<?php 	echo "เอกสารลำดับที่  $first - $last จาก $total  ($field)"; ?>
					</caption>
					<br><br> 
				<div class="table-wrapper">
					
					<table class="table table-bordered">
					
						<thead>
							<tr>
								<th><?php echo "รหัสเอกสาร";?></th>							
								<th><?php echo "เรื่อง";?></th>	
								<th><?php echo "วันจัดเก็บ";?></th>	
								<th><?php echo "ผู้ส่งมาให้";?></th>	
								<th><?php echo "ระดับความสำคัญ";?></th>	
							</tr>
						</thead>

						<tbody>
							<?php
							while ($row = mysqli_fetch_array($result)) {
								?>
								<tr>
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
					
				</div><br><br> 
				<?php
					page_echo_pagenums(5,true,false);
					mysqli_free_result($result);
					mysqli_close($link);
					?>
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
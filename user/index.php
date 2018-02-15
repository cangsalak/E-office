<?php
session_start();
include "../connect.php";
include "../pagination.php";
$num=$_SESSION['ses_position'];
$q = "SELECT DISTINCT document.*,access.* FROM document LEFT JOIN access 
	  on document.documentId = access.documentId 
	  WHERE access.positionId = '$num' and document.documentTime  = '$Time' and access.status = 'New' ORDER BY documentTime DESC";
$result = page_query($link,$q,5);

if($_SESSION['ses_Id'] ==""){
	header("Location: ../login.php");
	die();
} else if($_SESSION['status'] == 'admin'){
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

		<!-- Intro -->
		<div id="intro">
			<h1><a href="#">Wellcome to <br>E-Office Eastern University</a></h1>
			<p> <?php echo "สวัสดีครับ อ. ".$_SESSION['ses_Name'];	?></p>
			<ul class="actions">
				<li><a href="#header" class="button icon solo fa-arrow-down scrolly">Continue</a></li>
			</ul>
		</div>

		<!-- Header -->
		<header id="header">
			<a href="../index.php" class="logo">Home</a>
		</header>

		<!-- Nav -->
		<nav id="nav">
			<ul class="links">
				<li class="active"><a href="../user/index.php">Home</a></li>
				<li><a href="../user/Document.php">Document search</a></li>
				<li><a href="../user/private.php?userId=<?php echo $_SESSION['ses_userId']?>">private</a></li>
				
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
					<h2><a href="#">เอกสารล่าสุด</a></h2>
				</header>
				<div class="table-wrapper">

						
							<table class="table">
								<thead>
									<tr>
										<th>วันจัดเก็บ</th>
										<th>รหัสเอกสาร</th>	
										<th>จาก</th>						
										<th>เรื่อง</th>
										<th>ผู้ส่งมาให้</th>
										<th>จาก</th>
									</tr>
								</thead>

								<tbody>	
								<?php

						while ($row = mysqli_fetch_array($result)) {
							?>			
									<tr>
										<td><?php echo "$Time";?></td>
										<td>
											<a href="../user/accessDocument.php?documentId=<?php echo $row['documentId']?>" class="alert alert-info">
											<?php echo substr($row['documentTime'],0,4)."/".$row['documentId'];?>
											</a>
										</td>
									<td><?php echo $row['fromName'];?></td>
									<td><p><?php echo $row['documentName'];?></p></td>

									<?php 
									$nav=$row['userId'];
									$uq =  "SELECT positionuser.* FROM the_user LEFT JOIN positionuser 
	 										on the_user.positionId = positionuser.positionId  
	 										where the_user.userId='$nav' ";
									$resultU = mysqli_query($link,$uq);
									$rowproU = mysqli_fetch_array($resultU,MYSQLI_ASSOC);
										
									?>
										

									<td><span class="badge"><?php echo $rowproU['positionName'];?></span></td>
									<td><code><?php echo $row['urgent'];?></code></td>
								</tr>
									<?php
								} 
								?>


							</tbody>
						</table>

						
					</div>
					<?php
						page_echo_pagenums(5,true,false);
						mysqli_free_result($result);
						mysqli_close($link);
						?>
			</article>

			<!-- Posts -->


		</div>


			<!-- Copyright -->
			<div id="copyright">
				<ul><li>&copy; Untitled</li><li>By: <a href="#">Foremost & Kwang</a></li></ul>
			</div>

		</div>

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
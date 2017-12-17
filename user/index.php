<?php
session_start();
include "../connect.php";
include "../pagination.php";
$num=$_SESSION['ses_position'];
$q = "SELECT document.*,access.* FROM document LEFT JOIN access 
	  on document.documentId = access.documentId 
	  WHERE access.positionId = '$num' and document.documentTime  BETWEEN curdate() AND curdate() ORDER BY documentTime DESC";
$result = page_query($link,$q,5);

if($_SESSION['ses_Id'] ==""){
	header("Location: ../login.php");
	die();
} else if($_SESSION['status'] != 2){
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
										<th><?php echo "รหัสเอกสาร";?></th>							
										<th><?php echo "เรื่อง";?></th>	
										<th><?php echo "วันจัดเก็บ";?></th>	
										<th><?php echo "ผู้ส่งมาให้";?></th>	
										<th><?php echo "สถานะ";?></th>	
									</tr>
								</thead>

								<tbody>	
								<?php

						while ($row = mysqli_fetch_array($result)) {
							?>			
									<tr>
										<td>
											<?php echo "$year /";?><a href="../user/accessDocument.php?documentId=<?php echo $row['documentId']?>" ><?php echo $row['documentId'];?></a>

										</td>
										<td><p><?php echo $row['documentName'];?></p></td>
										<td><?php echo $row['documentTime'];?></td>
										<td><?php echo $row['fromName']; ?></td>
										<td><?php echo $row['action'];?></td>
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
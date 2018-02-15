<?php
session_start();
include "../connect.php";
include "../pagination.php";
$q = "SELECT * FROM document WHERE status = 'New' AND documentTime = '$Time'  ORDER BY documentTime DESC";
$result = page_query($link,$q,5);



if($_SESSION['ses_Id'] ==""){
	header("Location: ../login.php");
	die();
} else if($_SESSION['status'] != 'admin'){
	header("Location: ../logout.php");
	die();
}else{

	?>
	<!DOCTYPE HTML>
	<html>
	<?php include "../headAdmin.php"; ?>
	<body class="is-loading">

		<!-- Wrapper -->
		<div id="wrapper" class="fade-in">

			<!-- Intro -->
			<div id="intro">
				<h1><a href="#">Wellcome to </a></h1><br><h2><a href="#">Office automation Eastern University</a></h2>
				<p> <?php echo "สวัสดีครับ  ".$_SESSION['ses_Name'];	?></p>
				<ul class="actions">
					<li><a href="#header" class="button icon solo fa-arrow-down scrolly">Continue</a></li>
				</ul>
			</div>

			<!-- Header -->
			<header id="header">
				<a href="index.php" class="logo">Home</a>
			</header>
			<!-- Nav -->
			<nav id="nav">
				<ul class="links">
					<li class="active"><a href="../admin/index.php">Home</a></li>
					<li ><a href="../admin/Document_admin.php">Document search</a></li>
					<li ><a href="../admin/AddDocument.php">Add the document</a></li>
					<li><a href="../admin/members.php">members</a></li>
					<li ><a href="../admin/report.php">report</a></li>
				</ul>
				<ul class="icons">
					<li><a href="../logout.php" class="fa fa-sign-out"><span class="label"> Log out</span></a></li>

				</ul>
			</nav>

			<!-- Main -->
			<div id="main" >

				<!-- Featured Post -->
				<article class="post featured">
					<header class="major">
						<span class="date" >
							<?php echo "$date $month $year";?>

						</span>
						<h2><a href="#" >เอกสารล่าสุด</a></h2>
					</header>

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

					
					</div><br><br> 
						<?php
						page_echo_pagenums(5,true,false);
						mysqli_free_result($result);
						
						?>

				</article>

				<!-- Posts -->


			</div>

			

					<!-- Copyright -->
					<div id="copyright">
						<ul><li>&copy; Untitled</li><li>By: <a href="#">Foremost & Kwang</a></li></ul>
					</div>

				</div>

				<!-- Scripts -->
				<script src="../assets/js/jquery.min.js"></script>
				<script src="../js/popper.min.js"></script>
				<script src="../js/bootstrap.min.js"></script>
				<script src="../assets/js/jquery.scrollex.min.js"></script>
				<script src="../assets/js/jquery.scrolly.min.js"></script>
				<script src="../assets/js/skel.min.js"></script>
				<script src="../assets/js/util.js"></script>
				<script src="../assets/js/main.js"></script>
				
			</body>
			</html>
			<?php  }

			?>
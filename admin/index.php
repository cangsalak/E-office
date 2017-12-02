<?php
session_start();
include "../connect.php";
include "../pagination.php";
$q = "SELECT * FROM document WHERE documentTime  BETWEEN curdate() AND curdate() ORDER BY documentTime DESC";
$result = page_query($link,$q,4);

$sq =  "SELECT * FROM positionuser";
$resulti = mysqli_query($link,$sq);

if($_SESSION['ses_Id'] ==""){
	header("Location: ../login.php");
	die();
} else if($_SESSION['status'] != 1){
	header("Location: ../logout.php");
	die();
}else{

	?>
	<!DOCTYPE HTML>
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
								<tr>
									<?php
									while ($row = mysqli_fetch_array($result)) {
										?>
										<td>
											<?php echo "$year /";?><a href="../admin/accessDocument.php?documentId=<?php echo $row['documentId']?>" ><?php echo $row['documentId'];?></a>

										</td>
										<td><?php echo $row['documentName'];?></td>
										<td><?php echo $row['documentTime'];?></td>
										<td><?php echo $row['fromName']; ?></td>
										<td><?php echo $row['statusName'];?></td>
									</tr>
									<?php
								} 
								?>


							</tbody>
						</table>

						<?php
						page_echo_pagenums(4,true,false);
						mysqli_free_result($result);
						
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

				<!-- Scripts -->
				<script src="../assets/js/jquery.min.js"></script>
				<script src="../js/popper.min.js"></script>
				<script src="../js/bootstrap.min.js"></script>
				<script src="../assets/js/jquery.scrollex.min.js"></script>
				<script src="../assets/js/jquery.scrolly.min.js"></script>
				<script src="../assets/js/skel.min.js"></script>
				<script src="../assets/js/util.js"></script>
				<script src="../assets/js/main.js"></script>
				<script>
					$('a.doc-id').click(function(e) {
						e.preventDefault();

						var docId = $(this).text();
						if (docId && !isNaN(docId)) {
							$.ajax({
								url: '../documents.php?docid=' + docId,
								method: 'GET',
								error: function() {
									$('#info').html('<p>An error has occurred</p>');
								},
								success: function(data) {
									var doc = JSON.parse(data);
									if (doc) {
										$('#documentId').text(doc.documentId);
										$('#Doc_Date').text(doc.documentTime);
										$('#To').text(doc.statusName);
										$('#From').text(doc.fromName);
										$('#Title').text(doc.documentName);
										$('#portfolioModal1').modal('show');
									}
								}
							});
						}
					});
				</script>

			</body>
			</html>
			<?php  }

			?>
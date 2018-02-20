<?php
session_start();
include "../connect.php";
include "../pagination.php";
$documentId = $_GET['documentId'];
$qpro= "SELECT * FROM document WHERE documentId = '$documentId'  ORDER BY documentTime DESC";
$respro = mysqli_query($link,$qpro);
$rowpro = mysqli_fetch_array($respro,MYSQLI_ASSOC);

$qpr= "SELECT * FROM access WHERE documentId = '$documentId' ";
$respr = mysqli_query($link,$qpr);

$name=$_SESSION['ses_userId'];
$q =  "SELECT * FROM the_user where userId='$name'";
$result = mysqli_query($link,$q);
$rowproi = mysqli_fetch_array($result,MYSQLI_ASSOC);

$sq =  "SELECT * FROM positionuser";
$resulti = mysqli_query($link,$sq);

if($_SESSION['ses_Id'] ==""){
	header("Location: ../login.php");
	die();
} else if($_SESSION['status'] == 'admin'){
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


			<!-- Header -->
			<header id="header">
				<a href="index.php" class="logo">Home</a>
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
			<div id="main" >

				<!-- Featured Post -->
				<article class="post featured">
					

					<div class="container">
						<div class="row">
							<div class="col-lg-10 mx-auto">
								<div class="modal-body">


									<header class="major">
										<span class="date"><?php echo "$date $month $year";?></span>
									</header>
									<form method="post" action="../accessDocument.php?userId=<?php echo $_SESSION['ses_userId'] ?>" enctype="multipart/form-data" class="alt">
										<div class="row uniform">
											<div class="4u 12u$(xsmall)">
												<b for="documentId">เลขที่เอกสาร</b>
											</div>
											<div class="8u 12u$(xsmall)">
												<?php echo "$year/";?><span name="documentId" id="documentId" ><?php echo $rowpro['documentId']; ?></span> 
											</div>
											<div class="4u 12u$(xsmall)">
												<b for="documentTime">วันที่รับเอกสาร</b>
											</div>
											<div class="8u 12u$(xsmall)">
												<span name="documentTime" id="documentTime" ><?php echo $rowpro['documentTime']; ?></span> 
											</div>
											<div class="4u 12u$(xsmall)">
												<b for="statusName">ถึง</b>
											</div>
											<div class="8u 12u$(xsmall)">
												<span name="statusName" id="statusName" ><?php echo $rowpro['statusName']; ?></span> 
											</div>
											<div class="4u 12u$(xsmall)">
												<b for="fromName">จาก</b>
											</div>
											<div class="8u 12u$(xsmall)">
												<span name="fromName" id="fromName" ><?php echo $rowpro['fromName']; ?></span> 
											</div>

											<div class="4u 12u$(xsmall)">
												<b for="documentName">เรื่อง</b>
											</div>
											<div class="8u 12u$(xsmall)">
												<span name="documentName" id="documentName" ><?php echo $rowpro['documentName']; ?></span> 
											</div>

											<div class="4u 12u$(xsmall)">
												<p for="attachment">ไฟล์</p>
											</div>
											<div class="8u 12u$(xsmall)">
												<a href="view.php?id=<?php echo $rowpro['documentId'] ?>" target="_blank"><img src="../images/view.png" title="เปิด"
													width="32" height="32"></a>
													<a href="../download.php?id=<?php echo $rowpro['documentId'] ?>" target="iframe"><img src="../images/arw-down.png" title="ดาวน์โหลด" width="32" height="32"></a>
												</div>

										<?php 
												while($z = mysqli_fetch_array($respr,MYSQLI_ASSOC)){ 
												?>
												<?php 			$positionId=$z['positionId'];
																$s =  "SELECT * FROM positionuser WHERE positionId='$positionId'";
																$res = mysqli_query($link,$s);
																$row1 = mysqli_fetch_array($res,MYSQLI_ASSOC);
																
																?>
												<?php if(!empty($z['attached'])&& @$num1==0) { ?>
														<div class="12u 12u$(small)"><b>ข้อความแนบท้าย</b></div>
													<?php					$num1=1;           ?>
												<?php } ?>

											
												<?php 	if(!empty($z['attached'])&& ($z['positionId']!= $_SESSION['ses_position'])) { ?>
													<?php 	@$num++;?>
														<div class="6u 12u$(small)">
															<p><kbd>ความเห็นที่ <?php echo $num;?></kbd></p>
															<p><em>
																<?php if(!empty($z['accessAaction'])) { ?>
																<?php echo $z['accessAaction']; ?><br>
																<?php 			} ?>
															<?php echo $z['attached'];?></em></p>
															<p><code><?php echo $row1['positionName'];?></code></p>
														</div> 

												<?php $sum=$num+$num;}else if(empty($z['attached'])){ ?>
												<?php 			if(!empty($z['attached'])) { ?>	  		
																	
												<?php					break;           ?>
												<?php 			} ?>	
												<?php 	} ?>	 	
												
										<?php } 
											mysqli_free_result($respr);
											
											?>
											<?php 	if((@$sum/2)!= 0) { ?>
																		<div class="6u 12u$(small)"></div>

															<?php 	} ?>



														<div class="3u 12u$(small)"><b>ความคิดเห็น </b></div>
														<div class="4u 12u$(small)">
															<input name="accessAaction" type="radio" value="เพื่อโปรดทราบ" id="Attention" >
															<label for="Attention">เพื่อโปรดทราบ</label>
														</div>
														<div class="5u 12u$(small)">
															<input type="radio" id="Ask_Opinion" name="accessAaction" value="ขอความเห็น">
															<label for="Ask_Opinion">ขอความเห็น</label>
														</div>
														<div class="3u 12u$(small)"></div>
														<div class="4u 12u$(small)">
															<input type="radio" id="To_Approve" name="accessAaction" value="เพื่อโปรดอนุมัติ">
															<label for="To_Approve">เพื่อโปรดอนุมัติ</label>
														</div>
														<div class="5u 12u$(small)">
															<input type="radio" id="Should_Slow" name="accessAaction" value="เห็นควรชะลอ">
															<label for="Should_Slow">เห็นควรชะลอ</label>
														</div>
														<div class="3u 12u$(small)"></div>
														<div class="4u 12u$(small)">
															<input type="radio" id="For_Consider" name="accessAaction" value="เพื่อโปรดพิจารณา">
															<label for="For_Consider">เพื่อโปรดพิจารณา</label>
														</div>
														<div class="5u 12u$(small)">
															<input type="radio" id="Send_Cen_Lib" name="accessAaction" value="นำส่งสำนักหอสมุดกลาง">
															<label for="Send_Cen_Lib">นำส่งสำนักหอสมุดกลาง</label>
														</div>
														<div class="3u 12u$(small)"></div>
														<div class="4u 12u$(small)">
															<input type="radio" id="For_command" name="accessAaction" value="เพื่อโปรดสั่งการ">
															<label for="For_command">เพื่อโปรดสั่งการ</label>
														</div>
														<div class="5u 12u$(small)">
															<input type="radio" id="Send_Finance_and_Property" name="accessAaction" value="นำส่งสำนักการคลังและทรัพย์สิน">
															<label for="Send_Finance_and_Property">นำส่งสำนักการคลังและทรัพย์สิน</label>
														</div>
														<div class="3u 12u$(small)"></div>
														<div class="4u 12u$(small)">
															<input type="radio" id="Check_Info" name="accessAaction" value="โปรดตรวจสอบข้อมูล">
															<label for="Check_Info">โปรดตรวจสอบข้อมูล</label>
														</div>
														<div class="5u 12u$(small)">
															<input type="radio" id="Gather" name="accessAaction" value="ทราบ/รวบรวม">
															<label for="Gather" >ทราบ/รวบรวม</label>
														</div>
														<div class="3u 12u$(small)"></div>
														<div class="4u 12u$(small)">
															<input type="radio" id="Next_Step" name="accessAaction" value="โปรดดำเนินการตามขั้นตอนต่อไป">
															<label for="Next_Step">โปรดดำเนินการตามขั้นตอนต่อไป</label>
														</div>
														<div class="5u 12u$(small)">
															<input type="radio" id="Other" name="Other" value="โปรดดำเนินการตามขั้นตอนต่อไป" >
															<label for="Other">อื่นๆ</label>
														</div>
														<div class="3u 12u$(small)"></div>
														<div class="4u 12u$(small)"></div>
														<div class="5u 12u$(small)">
															<textarea name="Other" id="Message" placeholder="Enter your message" rows="2"></textarea>
														</div>

														<div class="3u 12u$(small)"><b>ข้อความแนบท้าย</b></div>
														<div class="9u 12u$(small)">
															<textarea name="attached" id="Message" placeholder="Enter your message" rows="2"></textarea>
														</div>

														<div class="4u 12u$(small)"><b>เอกสารเพิ่มเติม  </b></div>
														<div class="8u 12u$(small)"><span><input type="file" name="accessAttachment" accept="file_extension/*"></span></div>

														<div class="12u 12u$(small)"><b>ส่งต่อ  </b></div>

														<?php
														while ($row = mysqli_fetch_array($resulti,MYSQLI_ASSOC)) {
															?>
															<?php if($name!=$row['positionId']&&99!=$row['positionId']) { ?>
															<div class="6u$ 12u$(small) ">
																<input type="checkbox" id="positionId[<?php echo $row['positionId'];?>]" name="positionId[]" value="<?php echo $row['positionId'];?>">
															   <label for="positionId[<?php echo $row['positionId'];?>]"><?php echo $row['positionName'];?></label>
															</div> 
															<?php } ?>




															<?php } 
															mysqli_free_result($resulti);
															mysqli_close($link);

															?>


															<div class="12u$">
																<ul class="actions">
																	<li>
																		<input type="hidden" name="categoryId" value="<?php echo $rowproi['categoryId']; ?>" />
																		<input type="hidden" name="documentId" value="<?php echo $rowpro['documentId']; ?>" />
																		<input type="submit" value="ส่งต่อ " class="special" /></li>
																		<li><input type="reset" value="ล้าง" /></li>
																	</ul>
																</div>
															</div>
														</form>
														<footer>
															<p>
																&copy; Copyright  by Administrator
															</p>
														</footer>


													</div>
												</div>
											</div>
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
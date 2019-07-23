<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>devbanban.com</title>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script>
			$(document).ready(function(){
				$("#brand").change(function(){	
					$.ajax({
						url: "selectbrand.php", //ทำงานกับไฟล์นี้
						data: "bid=" + $("#brand").val(),  //ส่งตัวแปร
						type: "POST",
						async:false,
						success: function(data, status) {
								$("#model").html(data);
							},
						error: function(xhr, status, exception) { alert(status); }	
					});
					//return flag;
				});
			});
		</script>
	</head>

	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2>
					ตัวอย่างระบบ Ajax Select/Option : devbanban  <br />
					ตย.ข้อมูล เลือกยี่ห้อ แสดง รุ่นกล้อง
					</h2>
				</div>
				<div class="col-md-2"></div>
				<div class="col-md-5">
					<form class="form-horizontal">
						<div class="form-group">
							<?php
							include("condb.php");
							$sql= "SELECT * FROM  tb_brand" or die("Error:" . mysqli_error());
							$result = mysqli_query($con, $sql);
							echo"BRAND : <select id='brand' name='bid' class='form-control'>";
									echo"<option value=''>-Select-</option>";
									while($row = mysqli_fetch_array($result)){
										echo"<option value='$row[0]'>".$row["bname"]."</option>";
									}
								echo"</select>";
						echo '</div>';
						echo '<div class="form-group">';
							$sql= "SELECT * FROM  model WHERE bid='1'" or die("Error:" . mysqli_error());
							$result = mysqli_query($con, $sql);
							echo"MODEL : <select id='model' name='mid' class='form-control'>";
									echo"<option value=''>-Select-</option>";
									// while($row = mysqli_fetch_array($result)){
									// 	echo"<option value='$row[0]>" .$row["mname"]." </option>";
									// }
							echo"</select>";
							mysqli_close($con);
							?>
						</form>
						<hr />
						dev by <a href="http://devbanban.com/">
							devbanban.com
						</a>
					</div>
				</div>
			</div>
		</body>
	</html>
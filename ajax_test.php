<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Ajax</title>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script>
			$(document).ready(function(){
				$("#province").change(function(){	
					$.ajax({
						url: "select_district.php", //เรียกใช้งานไฟล์นี้
						data: "district_id=" + $("#province").val(),  //ส่งตัวแปร
						type: "POST",
						async:false,
						success: function(data, status) {
								$("#district").html(data);
							},
					});
					//return flag;
				});
			});
		</script>
	</head>

	<body>
		<div class="container">
			<h1>Address Ajax</h1>
            <form>
                <?php 
                    include("condb.php");
                    $sql= "SELECT * FROM  provinces" or die("Error:" . mysqli_error());
                    $result = mysqli_query($con, $sql);
                ?>
                <label>จังหวัด</label>
                <select name="" id="province">
                    <?php while($row = mysqli_fetch_array($result)){ ?>
                    <option value="<?php echo $row["id"]; ?>"><?php echo $row["name_in_thai"]; ?></option>
                    <?php } ?>
                </select>
                <br>
                <label>อำเภอ</label>
                <select name="" id="district">
                    
                </select>
            </form>
		</div>
	</body>
</html>
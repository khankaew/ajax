<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Test</title>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	</head>

	<body>
		<div class="container">
            <?php
                include("condb.php");
                $sql= "SELECT subdistricts.Id, provinces.name_in_thai as จังหวัด, districts.name_in_thai as อำเภอ, subdistricts.name_in_thai as ตำบลไทย, subdistricts.name_in_english as ตำบลอังกฤษ FROM subdistricts INNER JOIN districts ON subdistricts.district_id=districts.id INNER JOIN provinces ON districts.province_id=provinces.id LIMIT 100" or die("Error:" . mysqli_error());
                $result = mysqli_query($con, $sql);
            ?>
            <table class="table">
                <thead>
                </thead>
                <tbody>
                <?php while($row = mysqli_fetch_array($result)){ ?>
                    <tr>
                        <td><?php echo $row["จังหวัด"] ?></td>
                        <td><?php echo $row["อำเภอ"] ?></td>
                        <td>john@example.com</td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
		</div>
	</body>
</html>
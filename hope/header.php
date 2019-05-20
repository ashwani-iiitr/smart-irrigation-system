<html>
	<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<title>			
			Hope
		</title>
	</head>
<body>
<div style="width:100%; height:50px; background-color:#aaf; border:sollid 1px #655432;">

	<div class="col-sm-5" style="font-style: oblique; text-decoration-line:none;"><a href="index.php"><h3>Hope Farming System</a><h3></div>
	<div class="col-sm-4">
	<a href="irrigation.php" class="btn btn-primary">Irrigate</a>

	<a href="seeding.php" class="btn btn-primary">Seeding</a>

	<a href="weeding.php" class="btn btn-primary">Weeding</a>
	
	</div>

<?php
$conn=mysqli_connect('localhost','root','','hope');

$sql="SELECT gatestatus FROM nodes WHERE nodeid='0'";


$result=mysqli_query($conn,$sql);

while($var=mysqli_fetch_array($result)){
	
	$pumpstatus=$var['gatestatus'];

}


?>	
<div class="col-sm-3">
<form action="pump.php" method="get">
	<input type="submit" class="btn" style="color:white; background-color:<?php if($pumpstatus) echo "green;"; else echo "red;";?>" value="<?php if($pumpstatus) echo "Pump is On"; else echo "Pump is Off";?>">
</form>	
	</div>
</div>




<style>

.field{
	border:solid 10px #665543;
	background-color:green;
	color:white;
	width:300px;
	height:200px;
	
}
</style>
<?php
	include 'header.php';
$conn=mysqli_connect('localhost','root','','hope');

$sql="SELECT * FROM nodes";

$result=mysqli_query($conn,$sql);

?>
<h3> Field Structure</h3>
<form action="irrigate.php" method="POST">

<?php
while($var=mysqli_fetch_array($result)){
	
	if($var['nodeid']==0){
		
		$pumpstatus=$var['gatestatus'];
		if($pumpstatus==1)
		echo "<h2>Pump Status= On Irrigation Is going on.</h2> ";
		else
			echo "<h2>Pump Is=Off.</h2>";
	continue;
	}
else{	
	?>
<center>
		
	<div class="container">
	<div class="col-sm-4 field" style="background-color:<?php if($pumpstatus==1&&$var['gatestatus']==1) echo "blue;"; else echo "green;";?>">
	Gate Status =<?php echo $var['gatestatus'];?><br>
	Moisture level=<?php echo $var['moisturelevel'];?><br>
	Water level=<?php echo $var['waterlevel'];?><br>
		<br><b>Check to Irrigate </b><input type="checkbox" name="fields[]" value="<?php echo $var['nodeid']; ?>"><br>
		Enter new water level:<input type="text" class="form-control" style="width:60px;" name="<?php echo $var['nodeid'];?>">
		
		
		
	</div>
	<?php
	}
}	

?>
</div><br><input type="submit" class="btn btn-success">
</form>

	
	




<div class="container">
	<div class="row">
	
	</div>
	<div class="row">
	</div>
	
</div>
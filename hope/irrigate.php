<?php
$fields=$_POST['fields'];

$conn=mysqli_connect('localhost','root','','hope');

foreach($fields as $f){
	
	$sql="UPDATE nodes SET swaterlevel='$_POST[$f]' WHERE nodeid='$f'";
	$result=mysqli_query($conn,$sql);
	
	}
	if($result){
		echo  "Irrigation Process in Progress...";
		
		header('Location:irrigation.php');
		
		
	}
	else
		echo "failed";

?>
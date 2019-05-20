<?php
$conn=mysqli_connect('localhost','root','','hope');

$sql="SELECT gatestatus FROM nodes WHERE nodeid='0'";


$result=mysqli_query($conn,$sql);

while($var=mysqli_fetch_array($result)){
	
	$pumpstatus=$var['gatestatus'];

}

if($pumpstatus){
	$sql="UPDATE nodes SET gatestatus=0 WHERE nodeid=0";
	$result=mysqli_query($conn,$sql);
	header('Location:irrigation.php');
}
else
{$sql="UPDATE nodes SET gatestatus=1 WHERE nodeid=0";
	$result=mysqli_query($conn,$sql);
	header('Location:irrigation.php');}
	

?>
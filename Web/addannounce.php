<?php
include 'connect.php';
$conn = OpenCon();
if(isset($_POST['addannounce'])){
	$head=$_POST['head'];
	$comment=$_POST['comment'];
	$date = date('Y-m-d H:i:s');
	
	$sql ="INSERT INTO `announcement` (`ID`, `header`, `paragraph`, `date`) VALUES (NULL, '$head', '$comment', '$date');";
	$result=mysqli_query($conn,$sql);
	if($result){
	header('location:home.php?');
	exit();
	}else{
		die(mysqli_error($conn));
	}
	
}
?>
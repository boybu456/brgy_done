<?php
include 'connect.php';
$conn = OpenCon();
if(isset($_GET['delete'])){
	$id=$_GET['delete'];
	
	
	$sql = "DELETE FROM acc_req WHERE `acc_req`.`ID` = '$id'";
	$result=mysqli_query($conn, $sql);
	if(!$result){
		die(mysqli_error($conn));
	}else{
		header('location:home.php?deleteacc='.$id.'#display');
	}
	
	
}
?>
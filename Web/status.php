<?php
include 'connect.php';
$conn = OpenCon();

if(isset($_GET['Completed'])){
	$ID = $_GET['Completed'];
	$sql ="UPDATE `request` SET `status` = 'Completed' WHERE `request`.`ID` = $ID";
	$result=mysqli_query($conn,$sql);
	header('location:home.php?status='.$id.'#showlist');
}

if(isset($_GET['Cancelled'])){
	$ID = $_GET['Cancelled'];
	$sql ="UPDATE `request` SET `status` = 'Cancelled' WHERE `request`.`ID` = $ID";
	$result=mysqli_query($conn,$sql);
	header('location:home.php?status='.$id.'#showlist');
}

if(isset($_GET['Active'])){
	$ID = $_GET['Active'];
	$sql ="UPDATE `request` SET `status` = 'Active' WHERE `request`.`ID` = $ID";
	$result=mysqli_query($conn,$sql);
	header('location:home.php?status='.$id.'#showlist');
}
?>
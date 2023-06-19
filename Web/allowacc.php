<?php
include 'connect.php';
$conn = OpenCon();
if(isset($_GET['allow'])){
	$id=$_GET['allow'];
	$sql="INSERT INTO `residence` (`FirstName`, `LastName`, `ContactNumber`, `Address`, `Gender`, `Birthday`, `Age`) SELECT `FirstName`, `LastName`, `ContactNumber`, `Address`, `Gender`, `Birthday`, `Age` FROM `acc_req` WHERE `ID`='$id'";
	$result=mysqli_query($conn,$sql);
	if($result){
		$sqll = "DELETE FROM `acc_req` WHERE `acc_req`.`ID` = '$id'";
		mysqli_query($conn,$sqll);
		header('location:home.php?');
		exit();
	}else{
		die(mysqli_error($conn));
	}
	
}

?>
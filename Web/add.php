<?php
include 'connect.php';
$conn = OpenCon();
//Add Residdents
if(isset($_POST['add'])){
	$fn	=	$_POST['FirstName'];
	$ln =	$_POST['LastName'];
	$num =	$_POST['Number'];
	$address =	$_POST['Address'];
	$gen =	$_POST['Gender'];
	$bdate =	date('Y-m-d',strtotime($_POST['Birthday']));
	$age = date_diff(date_create($bdate), date_create('now'))->y;
	$acc = $_POST['Account'];
	
	$sql ="INSERT INTO `residence`(`FirstName`, `LastName`, `ContactNumber`, `Address`, `Gender`, `Birthday`, `Age`) VALUES ('$fn','$ln','$num','$address','$gen','$bdate','$age')";
	
	
	$result=mysqli_query($conn,$sql);
	
	if($result){
		$ID = mysqli_insert_id($conn);
		$sqll ="INSERT INTO `account`(`account_ID`,`Username`, `Password`, `Account`) VALUES ('$ID','$fn','$ln','$acc')";
		mysqli_query($conn,$sqll);
		header('location:home.php?last='.$id.'#display');
	}else{
		die(mysqli_error($conn));
	}
	
	
}
//Request Account
if(isset($_POST['Request'])){
	$fn	=	$_POST['FirstName'];
	$ln =	$_POST['LastName'];
	$num =	$_POST['Number'];
	$address =	$_POST['Address'];
	$gen =	$_POST['Gender'];
	$bdate =	date('Y-m-d',strtotime($_POST['Birthday']));
	$age = date_diff(date_create($bdate), date_create('now'))->y;
	$acc = "Resident";
	
	$sql ="INSERT INTO `acc_req`(`FirstName`, `LastName`, `ContactNumber`, `Address`, `Gender`, `Birthday`, `Age`) VALUES ('$fn','$ln','$num','$address','$gen','$bdate','$age')";
	
	
	$result=mysqli_query($conn,$sql);
	
	if($result){
		header('location:brg1.php?res=');
	}else{
		die(mysqli_error($conn));
	}
	
	
}
?>
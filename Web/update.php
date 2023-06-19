<?php
include 'connect.php';
$conn = OpenCon();
//Add Residdents
if(isset($_POST['update'])){
	$fn	=	$_POST['UpdateFirstName'];
	$ln =	$_POST['UpdateLastName'];
	$num =	$_POST['UpdateNumber'];
	$address =	$_POST['UpdateAddress'];
	$gen =	$_POST['UpdateGender'];
	$bdate =	date('Y-m-d',strtotime($_POST['UpdateBirthday']));
	$age = date_diff(date_create($bdate), date_create('now'))->y;
	$acc = $_POST['UpdateAccount'];
	
	$IDS =	$_POST['ID'];
	
	$user =	$_POST['UpdateUsername'];
	$pass =	$_POST['UpdatePassword'];
	
	
	$sql ="UPDATE `residence` SET `FirstName`='$fn', `LastName`='$ln', `ContactNumber`='$num', `Address`='$address', `Gender`='$gen', `Birthday`='$bdate', `Age`='$age' WHERE `residence`.`ID`='$IDS'";
	
	
	$result=mysqli_query($conn,$sql);
	
	if($result){

		$sqll ="UPDATE `account` SET `Username`='$user', `Password`='$pass', `Account`='$acc' WHERE `account`.`account_ID`='$IDS'";
		mysqli_query($conn,$sqll);
		header('location:home.php?updated='.$id.'#display');
	}else{
		die(mysqli_error($conn));
	}
	
	
}
?>
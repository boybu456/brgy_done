<?php
session_start();
include 'connect.php';
$conn = OpenCon();

if(isset($_SESSION['Account'])||isset($_POST['requested'])){
	
	 $acc = $_SESSION['Account'];
	 $req = $_POST['requested'];
	 $id= $_SESSION['ID'];
	 
	 $sqll = "SELECT * FROM `residence` WHERE `ID`='$id'";
	 $results=mysqli_query($conn,$sqll);
	 $row=mysqli_fetch_assoc($results);
	 $name = $row['FirstName']." ".$row['LastName'];
	 
	
	//project status value... Active...Completed...Cancelled
	$sql = "INSERT INTO `request`(`Name`,`requested`,`resident_ID`,`status`) VALUE ('$name','$req','$id','Active')";
	
	$result=mysqli_query($conn,$sql);
	if($result){
		header('location:home.php?request='.$id.'#request');
	}else{
		die(mysqli_error($conn));
	}
	
}

?>

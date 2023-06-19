<?php
include 'connect.php';
$conn = OpenCon();
if(isset($_GET['deleteid'])){
	$id=$_GET['deleteid'];
	
	
	$sql = "DELETE residence,account FROM residence INNER JOIN account ON account.account_ID = residence.ID WHERE residence.ID  = '$id'";
	$result=mysqli_query($conn, $sql);
	if(!$result){
		die(mysqli_error($conn));
	}else{
		header('location:home.php?delete='.$id.'#display');
	}
	
	
}

?>
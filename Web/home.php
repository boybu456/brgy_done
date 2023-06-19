<?php
session_start();
include 'connect.php';
$conn = OpenCon();
if(isset($_SESSION['Username']) && isset($_SESSION['Account'])){



		
?>
<!-- -->
<!DOCTYPE html>
<html lang="en">
<head>
  <title>InfoQuest</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="logos/InfoQuest.png" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">


  <style>
  html {
  scroll-behavior: smooth;
  }
  .card {
  box-shadow: 0px 5px 10px 0px rgba(0, 0, 0, 0.5); 
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
  }
  .sss:hover,.card:hover {
  color: #F37E21;
  box-shadow:0px 0px 30px #2196F3;
  }
  #prof {
  width: 200px;
  height: 300px;
  object-fit: contain;
  }
  #blur:hover{
	  background-color: #5e798f63;
  }
  #content{
  box-shadow: 10px 10px 5px 12px lightblue;
  }
  /*ROCKET*/
  .rocket{
	width: 100px;
    height: 100px;
	animation-duration: 1s;
    animation-iteration-count: infinite;
  }
  .bounce:hover {
    animation-name: bounce;
    animation-timing-function: ease;
  }
  @keyframes bounce {
  0%   { transform: translateY(0); }
  50%  { transform: translateY(-20px); }
  100% { transform: translateY(0); }
  }	
  
  /* Scroll */
::-webkit-scrollbar {
  width: 5px;
}

::-webkit-scrollbar-track {
  box-shadow: inset 0 5 5px grey; 
  margin-top: 15px;
  margin-bottom: 15px;
}
::-webkit-scrollbar-thumb {
  background: #0089ff; 
  border-radius: 50px;
}
::-webkit-scrollbar-thumb:hover {
  background: #337ab7;
}
  </style>
</head>
<body>

<div class="container-fluid" id="top" style="background-color:#2196F3;position:relative;color:#d6dee4;">
	
</div>
<div style="position: absolute;z-index: -1;opacity: 0.5;">
  <img src="logos/barangay.png" style="width:100%;height:100%">
</div>
<br>

<div class="container" style="margin-left:10px;">
<!-- NavBar -->
<div style="padding-left:15px;padding-top:5px;border-bottom: 3px solid #d6dee4;">
	<img src="logos/InfoQuest.png" width="90" style="float:left"></img>
	<img src="logos/Barangay.svg.png" width="60" style="float:right"></img>
	<a href="home.php" style="text-decoration:none">
	<h2 style="text-align:center;">Barangay System Information and Request</h2></a>
</div>
    <nav class="col-sm-3" id="blur" style="position: sticky;top: 10px;z-index: 1;padding-top: 20px;margin-right: 20px;border-radius: 25px;">
      <ul class="nav nav-pills nav-stacked">
        <li><a id="btn" style="font-weight: bold;color:black;"><?php if(isset($_SESSION['Account']) && $_SESSION['Account']==='Admin'){?><img src="logos/login.png" width="50"/><?php }else{ ?><img src="logos/id.png" width="50"/><?php } ?> <?php echo $_SESSION['Account'];?>, <?php echo ucfirst($_SESSION['Username']);?></a></li>
        <li>
			<form id="form" method="post" style="display:none">

			<label for="NewUsername"><small style="color:#337ab7;">New Username:</small></label>
			<input type="text" class="form-control" id="NewUsername" placeholder="Enter New Username" name="NewUsername">
			
			<label for="Newpwd"><small style="color:#337ab7;">New Password:</small></label>
			<input type="password" class="form-control" id="Newpwd" placeholder="Enter New password" name="Newpwd"><br>
			
			<button type="submit" name="submit" class="btn btn-default" style="float:right;"><img src="logos/output-onlinegiftools.gif" width="15"/>Submit</button>
			<br><br>
			</form>
		</li>
		
		<?php if(isset($_SESSION['Account']) && $_SESSION['Account']==='Admin'){?>
		<li><a href="#display" id="DisplayAccounts" style="font-weight: bold;"><img src="logos/accounts.png" width="50"/> Accounts/Residents</a></li>
		<li><a href="#showlist" onclick="list()" style="font-weight: bold;"><img src="logos/Document.png" width="50"/> List Request</a></li>
		<li><a href="#AddAnnounce" onclick="an()" style="font-weight: bold;"><img src="logos/billboard.png" width="50"/> Announcement Etc.</a></li>
		<?php } ?>
		
		<?php if(isset($_SESSION['Account']) && $_SESSION['Account']==='Resident'){?>
		<li><a onclick="closing()" id="DisplayRequest" style="font-weight: bold;"><img src="logos/Document.png" width="50"/> Request</a></li>
		<li><a href="#Announcement" style="font-weight: bold;"><img src="logos/billboard.png" width="50"/> Announcement Etc.</a></li>
		<?php } ?>
		
		
		<li><a href="#Officials" style="font-weight: bold;"><img src="logos/Officials.png" width="50"/> Officials</a></li>
        <li><a href="#members" style="font-weight: bold;"><img src="logos/Team.png" width="50"/> Members</a></li>
		<li><a href="logout.php" style="font-weight: bold;"><img src="logos/key.png" width="50"/> Logout</a></li>
      </ul>
	  <br>
	  </nav>
	  
	  <!-- Edit USERNAME/PASSWORD -->
	  <?php
	  if(isset($_POST['submit'])){
		  $ID = $_SESSION['account_ID'];
		  $NewUser = $_POST['NewUsername'];
		  $NewPass = $_POST['Newpwd'];
	  $query = "UPDATE `account` SET `Username` = '$NewUser', `Password` = '$NewPass' WHERE `account`.`account_ID`='$ID'";
	  $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
		if(mysqli_affected_rows($conn) > 0){
			echo '<script>
	alert("Account Successfully Updated");
	</script>';
		}else{
			echo "Error updating data.";
		}
	}
	  
	  ?>

<!-- Content -->
    <div id="Announcement" class="col-sm-8" style="border-left:2px solid lightblue;">
	
<!-- Update -->
<?php

?>
<div id="Updates" style="display:none;"></div>
<!-- TABLE OF RESIDENCE -->
	<div id="display" style="display:hidden"></div>
	<div id="Residents" style="margin-top:20px;background-color:#5e798f63;border-radius: 25px;width:100%;height:500px;overflow:auto;border-style: solid;display:<?php if(isset($_POST['search'])||isset($_GET['last'])||isset($_GET['delete'])){ echo 'block';}else{ echo 'none';}?>">
	<h4 style="text-align:center;font-weight: bold;" ><img src="logos/group.png" width="50"/> Residence's Profile</h4>

	<div>	
	<form style="text-align:center;" method="POST">
	<input style="height: 21px;margin-top: 5px;margin-bottom: 5px;width: 110px;" name="searching" type="text"/><button style="margin-left:5px;" name="search" class="btn btn-primary btn-sm">Search</button>
	</form>
	<button style="float:right;" href="#" onclick="show()" name="add" class="btn btn-primary btn-sm">Add Residence</button>
	</div>
	
	<br>
		
		<table class="table">
  <thead>
    <tr>
      <th scope="col">First Name</th>
	  <th scope="col">Contact Number</th>
	  <th scope="col">Address</th>
	  <th scope="col">Gender</th>
	  <th scope="col">Birthday</th>
      <th scope="col">Age</th>
	  <th scope="col">Operations</th>
    </tr>
  </thead>
  <tbody>
  
  <?php
  //SEARCH
if(isset($_POST['search'])){
  $search = $_POST['searching'];
  $ssql="SELECT * FROM `residence` WHERE `FirstName`='$search'OR `LastName`='$search'OR `ContactNumber`='$search'OR `Address`='$search'OR `Gender`='$search'OR `Birthday`='$search'OR `Age`='$search'";
  $results=mysqli_query($conn,$ssql);
  if($results){
	  $NumResult=mysqli_num_rows($results);
	if($NumResult>0){
	$row=mysqli_fetch_assoc($results);
	echo '<h2 style="text-align:center;">Total Result:'.$NumResult.'</h2>';
	foreach($results as $row) {
		echo '
					<tbody>
					<tr>
					<td>'.$row['FirstName'].' '.$row['LastName'].'</td>
					<td>'.$row['ContactNumber'].'</td>
					<td>'.$row['Address'].'</td>
					<td>'.$row['Gender'].'</td>
					<td>'.$row['Birthday'].'</td>
					<td>'.$row['Age'].'</td>
					<td><a class="btn btn-primary btn-sm" href="update.php='.$row['ID'].'" style="width: 60px;">Update</a><a class="btn btn-danger btn-sm" href="delete.php?deleteid='.$row['ID'].'" style="width: 60px;">Delete</a></td>
					<td></td>
					</tr>
					</tbody>';
					
					echo '
					
					';
						
					}
	}else{
		echo '<h2 style="text-align:center;">Data Not Found</h2>';
	$ssql="SELECT * FROM `residence`";
  $results=mysqli_query($conn,$ssql);
  if($results){
	$row=mysqli_fetch_assoc($results);
	foreach($results as $row) {
		echo '
					<tbody>
					<tr>
					<td>'.$row['FirstName'].' '.$row['LastName'].'</td>
					<td>'.$row['ContactNumber'].'</td>
					<td>'.$row['Address'].'</td>
					<td>'.$row['Gender'].'</td>
					<td>'.$row['Birthday'].'</td>
					<td>'.$row['Age'].'</td>
					<td><a class="btn btn-primary btn-sm" href="update.php='.$row['ID'].'" style="width: 60px;">Update</a><a class="btn btn-danger btn-sm" href="delete.php?deleteid='.$row['ID'].'" style="width: 60px;">Delete</a></td>
					<td></td>
					</tr>
					</tbody>';
					
					echo '
					
					';
						
					}
	}
		
		
	}
  }
}
  
  //Default All Display
if(!isset($_POST['search'])){
  
  $ssql="SELECT * FROM `residence`";
  $results=mysqli_query($conn,$ssql);
  if($results){
	$row=mysqli_fetch_assoc($results);
	foreach($results as $row) {
		echo '
					<tbody>
					<tr>
					<td>'.$row['FirstName'].' '.$row['LastName'].'</td>
					<td>'.$row['ContactNumber'].'</td>
					<td>'.$row['Address'].'</td>
					<td>'.$row['Gender'].'</td>
					<td>'.$row['Birthday'].'</td>
					<td>'.$row['Age'].'</td>
					<td><a class="btn btn-primary btn-sm" href="home.php?update='.$row['ID'].'" style="width: 60px;">Update</a><a class="btn btn-danger btn-sm" href="delete.php?deleteid='.$row['ID'].'" style="width: 60px;">Delete</a></td>
					<td></td>
					</tr>
					</tbody>';
					
					echo '
					
					';
						
					}
	}
  
}
  
  
  ?>
  
  
  </tbody>
</table>
	</div>
	
	<!-- Add residence -->
	<div id="Add" style="margin-top:20px;background-color:#5e798f63;border-radius: 25px;border-style: solid;display:none">
	
	<h4 style="text-align:center;font-weight: bold;" ><img src="logos/add-user.png" width="50"/>Add Resident</h4>
	<button style="float:left;" href="#" onclick="show()" name="add" class="btn btn-primary btn-sm">Back to Table</button>
		<form action="add.php" method="POST" enctype="multipart/form-data" style="padding:20px;">
		
			<div class="input-group col-xs-12" style="padding-top:20px">
			
			<span class="input-group-addon"><img src="logos/Add.png" width="50"></img></span>
			<input style="background: #ffffff91;" id="FirstName" type="text" class="form-control" name="FirstName" placeholder="Enter First Name">

			<span class="input-group"></span>
			<input style="background: #ffffff91;" id="LastName" type="text" class="form-control" name="LastName" placeholder="Enter Last Name">
			
			</div>
			
			<div class="input-group" style="padding-top:5px">
			<span class="input-group-addon"><img src="logos/Number.png" width="20"></img></span>
			<input style="background: #ffffff91;" id="Number" type="number" class="form-control" name="Number" placeholder="Enter Contact Number">
			</div>
			<div class="input-group" style="padding-top:5px">
			<span class="input-group-addon"><img src="logos/Email.png" width="20"></img></span>
			<input style="background: #ffffff91;" id="Address" type="text" class="form-control" name="Address" placeholder="Enter Address">
			</div>
			
			<div class="input-group" style="padding-top:5px; text-align:left;">
			
			<label for="birthday" style="padding-right: 30px;">Birthday:
			<input style="background: #ffffff91;" type="date" id="birthday" name="Birthday">
			</label>
			
			<label class="radio-inline">
			<input type="radio" name="Gender" value="Male" checked>Male
			</label>
			<label class="radio-inline">
			<input type="radio" name="Gender" value="Female">Female
			</label>
			</div>
			
			
			<div class="input-group" style="padding-top:5px; text-align:left;">
			
			<label  style="padding-right: 30px;">Account:</label>
			<label class="radio-inline">
			<input type="radio" name="Account" value="Resident" checked>Resident

			</label>
			<label class="radio-inline">
			<input type="radio" name="Account" value="Admin">Admin/Residents
			</label>
			</div>
			<button style="float:right;" type="submit" name="add" class="btn btn-primary btn-sm">Add</button>
			<br>

		</form>

	</div>
	
	<!-- LIST REQUEST-->
	<div id="showlist" style="text-align:center;margin-top:20px;background-color:#5e798f63;border-radius: 25px;border-style: solid;width:100%;height:500px;overflow:auto;display:<?php if(isset($_POST['searchrequest'])||isset($_GET['status'])||isset($_POST['PreviousReceiver'])||isset($_POST['dated'])){echo 'block';}else{ echo 'none';}?>">
	<h4 style="text-align:center;font-weight: bold;" ><img src="logos/group.png" width="50"/> REQUEST</h4>
	<div>	
	<form style="text-align:center;" method="POST">
	<input style="height: 21px;margin-top: 5px;margin-bottom: 5px;width: 110px;" name="searchrequested" type="text"/><button style="margin-left:5px;" name="searchrequest" class="btn btn-primary btn-sm">Search</button>
	</form>
	<table class="table">
  <thead>
  <tr>
  <th scope="col" style="text-align: center;"></th>
  <th scope="col" style="text-align: center;">
	<form method="post">
    <select name='PreviousReceiver' onchange='if(this.value != 0) { this.form.submit(); }' style="padding: 10px;border-radius: 25px;background-color: #83c6ff;-webkit-appearance: none;width: 80px;">
         <option value='0'>Request</option>
		 <option value='Certification for Employment'>Certification for Employment</option>
         <option value='Certification for School Reference'>Certification for School Reference</option>
         <option value='Certification of Indigency'>Certification of Indigency</option>
         <option value='Barangay Indigency for Medical'>Barangay Indigency for Medical</option>
		 <option value='Barangay Indigency for Financial assistance'>Barangay Indigency for Financial assistance</option>
		 <option value='Burial Assistance'>Burial Assistance</option>
		 <option value='Barangay Clearance for Business Permit'>Barangay Clearance for Business Permit</option>
		 <option value='Barangay Clearance for Renovation'>Barangay Clearance for Renovation</option>
		 <option value='Barangay Clearance for Demolition'>Barangay Clearance for Demolition</option>
		 <option value='Barangay Clearance for Excavation'>Barangay Clearance for Excavation</option>
    </select>
</form>
  </th>
  <th><!--- BLANK --></th>
  <th scope="col" style="text-align: center;">
  <form method="post">
    <select name='dated' onchange='if(this.value != 0) { this.form.submit(); }' style="padding: 10px;border-radius: 25px;background-color: #83c6ff;-webkit-appearance: none;width: 55px;">
         <option value='0'>Date</option>
		 <option value='today'>Today</option>
         <option value='week'>A week ago</option>
         <option value='month'>A month ago</option>
    </select>
</form>
  </th>
  <th></th>
  </tr>
    <tr>
      <th scope="col" style="text-align: center;">Name</th>
	  <th scope="col" style="text-align: center;">Requested</th>
      <th scope="col" style="text-align: center;">Status</th>
	  <th scope="col" style="text-align: center;">Date</th>
	  <th scope="col" style="text-align: center;">Operations</th>
    </tr>
  </thead>
  
  <?php
if(isset($_POST['searchrequest'])OR isset($_POST['PreviousReceiver'])OR isset($_POST['dated'])){
	
	if(isset($_POST['searchrequest'])){
		$ask = $_POST['searchrequested'];
		$ssql="SELECT * FROM `request` WHERE `Name`='$ask'OR `requested`='$ask'OR `date`='$ask'OR `status`='$ask'";
	$results=mysqli_query($conn,$ssql);
	}elseif(isset($_POST['PreviousReceiver'])){
		$ask = $_POST['PreviousReceiver'];
		$ssql="SELECT * FROM `request` WHERE `Name`='$ask'OR `requested`='$ask'OR `date`='$ask'OR `status`='$ask'";
	$results=mysqli_query($conn,$ssql);
	}else{
		if($_POST['dated']=='today'){	
			$ssql="SELECT * FROM `request` WHERE `date`= CURRENT_DATE();";
			$results=mysqli_query($conn,$ssql);
		}elseif($_POST['dated']=='week'){
			
			$today=date("Y-m-d");
			$week=date("Y-m-d", strtotime($today . ' -7 day'));

			$ssql="SELECT * FROM request WHERE `date` BETWEEN '$week' AND '$today'";
			$results=mysqli_query($conn,$ssql);
		}elseif($_POST['dated']=='month'){
			
			$today=date("Y-m-d");
			$week=date("Y-m-d", strtotime($today . ' -1 month'));

			$ssql="SELECT * FROM request WHERE `date` BETWEEN '$week' AND '$today'";
			$results=mysqli_query($conn,$ssql);
		}else{
			echo "ERROR ON DATE!!";
		}
	}
if($results){
	  $NumResult=mysqli_num_rows($results);
	if($NumResult>0){
	$row=mysqli_fetch_assoc($results);
	echo '<h2 style="text-align:center;">Total Result:'.$NumResult.'</h2>';
	foreach($results as $row) {
		echo '<tbody>
		<tr>
		<td>'.$row['Name'].'</td>
		<td>'.$row['requested'].'</td>
		<td>'.$row['status'].'</td>
		<td>'.$row['date'].'</td>
		<td><a class="btn btn-success btn-sm" href="status.php?Completed='.$row['ID'].'">Completed</a><a class="btn btn-danger btn-sm" href="status.php?Cancelled='.$row['ID'].'" >Cancelled</a><a class="btn btn-primary btn-sm" href="status.php?Active='.$row['ID'].'" >Active</a></td>
		</tr>
		</tbody>
		';
	}
  }else{
	  echo '<h2 style="text-align:center;">Data Not Found</h2>';
	  $ssql="SELECT * FROM `request`";
  $results=mysqli_query($conn,$ssql);
  if($results){
	$row=mysqli_fetch_assoc($results);
	foreach($results as $row) {
		echo '<tbody>
		<tr>
		<td>'.$row['Name'].'</td>
		<td>'.$row['requested'].'</td>
		<td>'.$row['status'].'</td>
		<td>'.$row['date'].'</td>
		<td><a class="btn btn-success btn-sm" href="status.php?Completed='.$row['ID'].'">Completed</a><a class="btn btn-danger btn-sm" href="status.php?Cancelled='.$row['ID'].'" >Cancelled</a><a class="btn btn-primary btn-sm" href="status.php?Active='.$row['ID'].'" >Active</a></td>
		</tr>
		</tbody>
		';
	}
  }
  }
}
}
  //Default All Display
if(!isset($_POST['searchrequest'])AND !isset($_POST['PreviousReceiver'])AND !isset($_POST['dated'])){
	$ssql="SELECT * FROM `request`";
  $results=mysqli_query($conn,$ssql);
  if($results){
	$row=mysqli_fetch_assoc($results);
	foreach($results as $row) {
		echo '<tbody>
		<tr>
		<td>'.$row['Name'].'</td>
		<td>'.$row['requested'].'</td>
		<td>'.$row['status'].'</td>
		<td>'.$row['date'].'</td>
		<td><a class="btn btn-success btn-sm" href="status.php?Completed='.$row['ID'].'">Completed</a><a class="btn btn-danger btn-sm" href="status.php?Cancelled='.$row['ID'].'" >Cancelled</a><a class="btn btn-primary btn-sm" href="status.php?Active='.$row['ID'].'" >Active</a></td>
		</tr>
		</tbody>
		';
	}
  }
}
  ?>
  
	</table>
	
	</div>
	
	<br>
	
	</div>
	
<!-- SHOW ACCOUNT REQUEST -->
<div id="account" style="margin-top:20px;background-color:#5e798f63;border-radius: 25px;width:100%;height:500px;overflow:auto;border-style: solid;display:none">
	<h4 style="text-align:center;font-weight: bold;" ><img src="logos/group.png" width="50"/> Request Account:</h4>

	<div>	
	<form style="text-align:center;" method="POST">
	<input style="height: 21px;margin-top: 5px;margin-bottom: 5px;width: 110px;" name="searching" type="text"/><button style="margin-left:5px;" name="search" class="btn btn-primary btn-sm">Search</button>
	</form>
	<button style="float:right;" href="#" onclick="show()" name="add" class="btn btn-primary btn-sm">Add Residence</button>
	</div>
	
	<br>
		
		<table class="table">
  <thead>
    <tr>
      <th scope="col">First Name</th>
	  <th scope="col">Contact Number</th>
	  <th scope="col">Address</th>
	  <th scope="col">Gender</th>
	  <th scope="col">Birthday</th>
      <th scope="col">Age</th>
	  <th scope="col">Operations</th>
    </tr>
  </thead>
  <tbody>
<?php
$ssql="SELECT * FROM `acc_req`";
  $results=mysqli_query($conn,$ssql);
  if($results){
	$row=mysqli_fetch_assoc($results);
	if($row===0){
		echo "NONE";
	}
	foreach($results as $row) {
		echo '
					<tbody>
					<tr>
					<td>'.$row['FirstName'].' '.$row['LastName'].'</td>
					<td>'.$row['ContactNumber'].'</td>
					<td>'.$row['Address'].'</td>
					<td>'.$row['Gender'].'</td>
					<td>'.$row['Birthday'].'</td>
					<td>'.$row['Age'].'</td>
					<td><a class="btn btn-success btn-sm" href="allowacc.php?allow='.$row['ID'].'" style="width: 60px;">Allow</a><a class="btn btn-danger btn-sm" href="deleteacc.php?delete='.$row['ID'].'" style="width: 60px;">Delete</a></td>
					<td></td>
					</tr>
					</tbody>';
					
					
						
					}

	}
?>
  </tbody>
</table>
	</div>

	<!-- REQUEST -->
	<div id="request" style="text-align:center;margin-top:20px;background-color:#5e798f63;border-radius: 25px;border-style: solid;display:none">
	<h4 style="text-align:center;font-weight: bold;" ><img src="logos/Email.png" width="50"/>Request</h4>
	<button style="float:left;" href="#" onclick="closing()" name="add" class="btn btn-primary btn-sm">back</button>
	<form action="request.php" method="POST" style="padding:20px;">
	
	<label  style="padding-right: 30px;">Request Options:</label>
	<div class="row d-flex justify-content" style="padding-top:5px;">
			<br>
	<div class="form-check">
	
	<label class="radio-inline">
	<input type="radio" name="requested" value="Certification for Employment">Certification for Employment
	</label>
	</div>
	
	<div class="form-check">
	<label class="radio-inline">
	<input type="radio" name="requested" value="Certification for School Reference">Certification for School Reference
	</label>
	</div>
	
	<div class="form-check">
	<label class="radio-inline">
	<input type="radio" name="requested" value="Certification of Indigency">Certification of Indigency
	</label>
	</div>
	
	<div class="form-check">
	<label class="radio-inline">
	<input type="radio" name="requested" value="Barangay Indigency for Medical">Barangay Indigency for Medical
	</label>
	</div>
	
	<div class="form-check">
	<label class="radio-inline">
	<input type="radio" name="requested" value="Barangay Indigency for Financial assistance">Barangay Indigency for Financial assistance
	</label>
	</div>
	
	<div class="form-check">
	<label class="radio-inline">
	<input type="radio" name="requested" value="Burial Assistance">Burial Assistance
	</label>
	</div>
	
	<div class="form-check">
	<label class="radio-inline">
	<input type="radio" name="requested" value="Barangay Clearance for Business Permit">Barangay Clearance for Business Permit
	</label>
	</div>
	
	<div class="form-check">
	<label class="radio-inline">
	<input type="radio" name="requested" value="Barangay Clearance for Renovation">Barangay Clearance for Renovation
	</label>
	</div>
	
	<div class="form-check">
	<label class="radio-inline">
	<input type="radio" name="requested" value="Barangay Clearance for Demolition">Barangay Clearance for Demolition
	</label>
	</div>
	
	<div class="form-check">
	<label class="radio-inline">
	<input type="radio" name="requested" value="Barangay Clearance for Excavation">Barangay Clearance for Excavation
	</label>
	</div>
	
	
	</div>
	
	<button style="float:right;" type="submit" name="request" class="btn btn-primary btn-sm">Request</button>
	</form>
	<br>

	</div>
	
<!-- RECIDENT REQUEST ANNOUNCEMENT -->
	<div id="showlist" style="text-align:center;margin-top:20px;background-color:#5e798f63;border-radius: 25px;border-style: solid;width:100%;overflow:auto;display:<?php if($_SESSION['Account']==='Resident'){ echo 'block';}else{ echo 'none';}?>">
	<h4 style="text-align:center;font-weight: bold;" ><img src="logos/group.png" width="50"/> REQUESTED</h4>
	<div>	
	<table class="table">
  <thead>
  <tr>
  <th></th>
  <th></th>
  <th><!--- BLANK --></th>
  <th>
  </th>
  <th></th>
  </tr>
    <tr>
      <th scope="col" style="text-align: center;">Name</th>
	  <th scope="col" style="text-align: center;">Requested</th>
      <th scope="col" style="text-align: center;">Status</th>
	  <th scope="col" style="text-align: center;">Date</th>
    </tr>
  </thead>
  
  <?php
  //Default All Display
	$unknown = $_SESSION['account_ID'];
	$ssql="SELECT * FROM `request` WHERE `resident_ID` = '$unknown'";
  $results=mysqli_query($conn,$ssql);
  if($results){
	$row=mysqli_fetch_assoc($results);
	foreach($results as $row) {
		echo '<tbody>
		<tr>
		<td>'.$row['Name'].'</td>
		<td>'.$row['requested'].'</td>
		<td>'.$row['status'].'</td>
		<td>'.$row['date'].'</td>
		</tr>
		</tbody>
		';
	}
  }

  ?>
  
	</table>
	
	</div>
	
	<br>
	
	</div>
	
	
	<!-- UPDATE -->
	<?php
	$ShowUpdate;
	if(isset($_GET['update'])){
		$ShowUpdate = 'block';
		$Now = $_GET['update'];
		
		$sqll="SELECT * FROM `account` WHERE `account_ID`='$Now'";
		$sqqll="SELECT * FROM `residence` WHERE `ID`='$Now'";
		
		$rresults=mysqli_query($conn,$sqll);
		$rrow=mysqli_fetch_assoc($rresults);
		
		$rresultss=mysqli_query($conn,$sqqll);
		$rroww=mysqli_fetch_assoc($rresultss);
		
		echo '
		<script>
		window.history.pushState({}, document.title, "?" + "" );
		</script>';
	}else{
		$ShowUpdate = 'none';
	}
	
	
	?>
	<div id="Update" style="margin-top:20px;background-color:#5e798f63;border-radius: 25px;border-style: solid;display:<?php echo $ShowUpdate;?>"><br>
		<button style="float:left;" href="#"  name="add" class="btn btn-primary btn-sm" onclick="cancel()">Back to Table</button>
		<form action="update.php" method="POST" enctype="multipart/form-data" style="padding:20px;">
			<input type="number" style="visibility: hidden;" name="ID" value="<?php echo $Now;?>">
			<div class="input-group col-xs-12" style="padding-top:20px">
			
			<span class="input-group-addon"><img src="logos/Add.png" width="50"></img></span>
			<input style="background: #ffffff91;" id="UpdateFirstName" type="text" class="form-control" name="UpdateFirstName" placeholder="Enter First Name" value="<?php echo $rroww['FirstName'];?>">

			<span class="input-group"></span>
			<input style="background: #ffffff91;" id="UpdateLastName" type="text" class="form-control" name="UpdateLastName" placeholder="Enter Last Name" value="<?php echo $rroww['LastName'];?>">
			
			</div>
			
			<div class="input-group" style="padding-top:5px">
			<span class="input-group-addon"><img src="logos/Number.png" width="20"></img></span>
			<input style="background: #ffffff91;" id="UpdateNumber" type="number" class="form-control" name="UpdateNumber" placeholder="Enter Contact Number"  value="<?php echo $rroww['ContactNumber'];?>">
			</div>
			<div class="input-group" style="padding-top:5px">
			<span class="input-group-addon"><img src="logos/Email.png" width="20"></img></span>
			<input style="background: #ffffff91;" id="UpdateAddress" type="text" class="form-control" name="UpdateAddress" placeholder="Enter Address" value="<?php echo $rroww['Address'];?>">
			</div>

			<div class="input-group" style="padding-top:5px; text-align:left;">
			
			<label for="birthday" style="padding-right: 30px;">Birthday:
			<input style="background: #ffffff91;" type="date" id="Updatebirthday" name="UpdateBirthday"  value="<?php echo $rroww['Birthday'];?>">
			</label>
			
			<label class="radio-inline">
			<input type="radio" name="UpdateGender" value="Male" <?php if($rroww['Gender']=='Male'){ echo "checked";}?> >Male
			</label>
			<label class="radio-inline">
			<input type="radio" name="UpdateGender" value="Female" <?php if($rroww['Gender']=='Female'){ echo "checked";}?> >Female
			</label>
			</div>
			
			
			<div class="input-group" style="padding-top:5px; text-align:left;">
			
			<label  style="padding-right: 30px;">Account:</label>
			<label class="radio-inline">
			<input type="radio" name="UpdateAccount" value="Resident" <?php if($rrow['Account']=='Resident'){ echo "checked";}?> >Resident
			</label>
			<label class="radio-inline">
			<input type="radio" name="UpdateAccount" value="Admin" <?php if($rrow['Account']=='Admin'){ echo "checked";}?> >Admin/Residents
			</label>
			</div>
			<p style="color:red;margin:0px;"><small>This is Used for log in:</small></p>
			<div class="input-group col-xs-12">
			
			<span class="input-group-addon"><img src="logos/ToLogin.png" width="50"></img></span>
			<input style="background: #ffffff91;" id="UpdateUsername" type="text" class="form-control" name="UpdateUsername" placeholder="Enter Username" value="<?php echo $rrow['Username'];?>">

			<span class="input-group"></span>
			<input style="background: #ffffff91;" id="UpdatePassword" type="text" class="form-control" name="UpdatePassword" placeholder="Enter Password" value="<?php echo $rrow['Password'];?>">
			
			</div><br>
			<button style="float:right;" type="submit" name="update" class="btn btn-primary btn-sm">Update</button>
			<br>

		</form>
		
	</div>


	<!-- ANNOUNCEMENTS -->
	<div id="AddAnnounce" style="margin-top: 20px;background-color: #a8d3f8;border-radius: 25px;border-style: solid;display: none;border-color: #0084f6;">
		<div class="form-group" style="margin:15px;">
		<button style="float:left;" onclick="an()" class="btn btn-primary btn-sm">Cancel</button>
		<form action="addannounce.php" method="POST">
		<span class="input-group-addon" style="background-color:#eee0;border: 0px;"><img src="logos/Add.png" width="50"></img>Add Announcement</span>
		
		<br>
			
			<label for="head">Head:</label><br><input type="text" id="head" name="head" style="resize: horizontal;"> </input><br>
			<label for="comment">Comment:</label><small style="color:red;font-size: 60%;float: right;">Maximum of 255 characters! </small>
			<textarea maxlength="255" class="form-control" rows="5" id="comment" name="comment" style="resize: vertical;"></textarea><br>
			<button style="float:right;" name="addannounce" class="btn btn-primary btn-sm">Submit</button>
			<br>
			</form>
		</div>
	</div>
	<div id="Announcement">
	<?php

		$an ="SELECT * FROM `announcement` ORDER BY ID DESC";
		$res=mysqli_query($conn,$an);
		$row=mysqli_fetch_assoc($res);
		foreach($res as $row) {
			
			$date= date_create($row['date']);

			echo '<small style="float:right;color:blue;margin-top: 40px;">'.date_format($date,"Y/m/d H:m") .'</small>';
			echo '<h1>'.$row['header'].'</h1>';
			echo $row['paragraph'];
		}
	?>
      <h1>Section 1.10.32 of "de Finibus Bonorum et Malorum", written by Cicero in 45 BC</h1>
      <p>"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?"</p>

	  <br><br>
	  </div>
<!--Officials-->
<div id="Officials" style="border-top: 5px solid;">
  <div class="text-center">
    <h2>Officials:</h2>
	<!---h4 is here-->
  </div>
  <br>
  <div class="row">
    <div class="col-sm-4">

    </div>   	  
    <div class="col-sm-4">
<div class="card">
  <h2 style="text-align:center">P/B</h2>
  <img id="prof" src="Profile/Picture1.jpg" alt="John" style="width:100%">
  <h1>MARIO MACAPAGAL</h1>
	<!-- -->
</div>     
    </div>       
    <div class="col-sm-4">
    
    </div>    
  </div>
  <br>
  <div class="row">
    <div class="col-sm-4">
<div class="card">
  <h2 style="text-align:center">KAGAWAD</h2>
  <img id="prof" src="Profile/Picture2.jpg" alt="John" style="width:100%">
  <h1>GARRY T. ENDRIOLA</h1>
</div>   
    </div>     
    <div class="col-sm-4">
<div class="card">
  <h2 style="text-align:center">KAGAWAD</h2>
  <img id="prof" src="Profile/Picture3.jpg" alt="John" style="width:100%">
  <h1>LOLITA V. GALOPE</h1>
</div>     
    </div>	
    <div class="col-sm-4">
<div class="card">
  <h2 style="text-align:center">KAGAWAD</h2>
  <img id="prof" src="Profile/Picture4.jpg" alt="John" style="width:100%">
  <h1>REYNALDO C. GABIN</h1>
</div>     
    </div>
</div>
<br>
<div class="row">
    <div class="col-sm-4">
<div class="card">
  <h2 style="text-align:center">KAGAWAD</h2>
  <img id="prof" src="Profile/Picture5.jpg" alt="John" style="width:100%">
  <h1>JUANCHITO N. RAMOS</h1>
</div>    
    </div>  
    <div class="col-sm-4">
<div class="card">
  <h2 style="text-align:center">KAGAWAD</h2>
  <img id="prof" src="Profile/Picture6.jpg" alt="John" style="width:100%">
  <h1>JAYNE D. TANAEL JR.</h1>
</div>     
    </div>  
<div class="col-sm-4">
<div class="card">
  <h2 style="text-align:center">KAGAWAD</h2>
  <img id="prof" src="Profile/Picture7.jpg" alt="John" style="width:100%">
  <h1>EDUARDO B. TOLENTINO</h1>
</div>    
    </div>
</div>
<div class="row">
    <div class="col-sm-4">
<div class="card">
  <h2 style="text-align:center">KAGAWAD</h2>
  <img id="prof" src="Profile/Picture8.jpg" alt="John" style="width:100%">
  <h1>JOSELITO M. IBE</h1>
</div>    
    </div>  
    <div class="col-sm-4">
<div class="card">
  <h2 style="text-align:center">SK CHAIRMAN</h2>
  <img id="prof" src="Profile/Picture9.jpg" alt="John" style="width:100%">
  <h1>RONNEL U. AGUILAR</h1>
</div>     
    </div>  
<div class="col-sm-4">
<div class="card">
  <h2 style="text-align:center">SECRETARY</h2>
  <img id="prof" src="Profile/Picture10.jpg" alt="John" style="width:100%">
  <h1>WILFREDO B. SITYAR</h1>
</div>    
    </div>
</div>
  </div>	
	
<br>

<!-- Members" -->
<div id="members" style="border-top: 5px solid;">
  <div class="text-center">
    <h2>Members:</h2>
    <h4>The People who made it possible:</h4>
  </div>
  <br>
  <div class="row">
    <div class="col-sm-4">
<div class="card">
  <h2 style="text-align:center">IT22</h2>
  <img id="prof" src="Profile/cy.jpeg" alt="John" style="width:100%">
  <h1>Cy Brutas</h1>

</div>
    </div>   	  
    <div class="col-sm-4">
<div class="card">
  <h2 style="text-align:center">IT22</h2>
  <img id="prof" src="Profile/opi.jpg" alt="John" style="width:100%">
  <h1>Carl Joshua Opinaldo</h1>

</div>     
    </div>       
    <div class="col-sm-4">
<div class="card">
  <h2 style="text-align:center">IT22</h2>
  <img id="prof" src="Profile/sundra.jpg" alt="John" style="width:100%">
  <h1>Alessandra Coronel</h1>

</div>     
    </div>    
  </div>
  <br>
  <div class="row">
    <div class="col-sm-4">
<div class="card">
  <h2 style="text-align:center">IT22</h2>
  <img id="prof" src="Profile/aldrich.jpg" alt="John" style="width:100%">
  <h1>Aldrich Dale Hellera</h1>

</div>   
    </div>     
    <div class="col-sm-4">
<div class="card">
  <h2 style="text-align:center">IT22</h2>
  <img id="prof" src="Profile/allen.jpg" alt="John" style="width:100%">
  <h1>Allen Rosendo Alonzo</h1>

</div>     
    </div>       
    <div class="col-sm-4">
<div class="card">
  <h2 style="text-align:center">IT22</h2>
  <img id="prof" src="Profile/ghian.jpg" alt="John" style="width:100%">
  <h1>Ghianne Sayana</h1>

</div>     
    </div>
</div>
<br>
    <div class="col-sm-4">
   
    </div>  
    <div class="col-sm-4">
<div class="card">
  <h2 style="text-align:center">IT22</h2>
  <img id="prof" src="Profile/toylo.jpg" alt="John" style="width:100%">
  <h1>Kaye Toylo</h1>
  
</div>     
    </div>  
    
  </div>
</div>

</div>

</div>
</body>
<br><br>
<!-- ROCKET REQUEST ACCOUNT -->
<?php
if($_SESSION['Account']==='Admin'){
	?>
<div class="rocket bounce" style="position:fixed;top:0;right:0;padding-top: 30px;" title="Account Request">
<a onclick="req()" >
<img src="logos/Email.png" class="sss" width="70" style="border:2px solid black;  border-radius: 50%;background-color: #516fde8a;padding: 5px;top:20px;right:20px" />
</a>
</div>
<?php
}
?>
<!-- ROCKET -->
<div class="rocket bounce" style="position:fixed;bottom:0; right:0; " title="To Top">
<a href="#top">
<img src="logos/up.png" class="sss" width="70" style="border:2px solid black;  border-radius: 50%;background-color: #516fde8a;padding: 5px;bottom:20px;right:20px" />
</a>
</div>

<!-- Footer -->
<footer class="container-fluid" style="height:150px;text-align:center;background-color:#0e0e0e;position: relative;">
<br>
  <a href="#top" title="To Top">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a>
  <p>This is made By: InfoQuest</p>
  <img src="logos/Barangay.svg.png" width="50" style="position: absolute;left:5%;color: white;"></img>
  <img src="logos/UDM.png" width="250" style="position: absolute;left:17%"></img>
  <img src="logos/InfoQuest.png" width="90" style="position: absolute;left:10%"></img>
</footer> 

<?php
if(!isset($_POST['search'])){
	if(isset($_GET['last'])){
	echo '
		<script>
		window.history.pushState({}, document.title, "?" + "" );
		</script>';
	echo '
	<script>
	alert("New Recident Successfully Added");
	</script>';
	}
}
if(isset($_GET['delete'])){
	echo '
		<script>
		window.history.pushState({}, document.title, "?" + "" );
		</script>';
	echo '
	<script>
	alert("Recident Successfully Deleted");
	</script>';
}
if(isset($_GET['updated'])){
	echo '
		<script>
		window.history.pushState({}, document.title, "?" + "" );
		</script>';
	echo '
	<script>
	alert("Recident Successfully Updated");
	</script>';
}
if(isset($_GET['request'])){
	echo '
		<script>
		window.history.pushState({}, document.title, "?" + "" );
		</script>';
	echo '
	<script>
	alert("Your Request is Successful");
	</script>';
}
?>
<script type="text/javascript" src="scripts.js"></script>
<script>
function cancel() {
  const res = document.getElementById('Residents');
  const Up = document.getElementById('Update');
  
  res.style.display = 'block';
  Up.style.display = 'none';
  
};
function an(){
	const hug = document.getElementById('AddAnnounce');
	
	if(hug.style.display === 'block'){
	hug.style.display = 'none';
	}else{
	  hug.style.display = 'block';
	}
};
function req(){
	const ac = document.getElementById('account');
	
	if(ac.style.display === 'block'){
	ac.style.display = 'none';
	}else{
	  ac.style.display = 'block';
	}
};
</script>
	
</body>
</html>
<!-- -->
<?php
}else{
	header("location: brg1.php");
	exit();
}
?>
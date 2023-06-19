<?php
include 'connect.php';
$conn = OpenCon();
session_start();
?>
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
  </style>
</head>
<body>

<div class="container-fluid" id="top" style="background-color:#2196F3;position:relative;color:#d6dee4;padding:10px">
	
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
	<a href="" style="text-decoration:none">
	<h2 style="text-align:center;">: Barangay System Information and Request</h2></a>
</div>

    <nav class="col-sm-3" id="blur" style="position: sticky;top: 10px;z-index: 1;padding-top: 20px;margin-right: 20px;border-radius: 25px;">
      <ul class="nav nav-pills nav-stacked">
        <li><a href="#Announcement" style="font-weight: bold;position: relative;"><img src="logos/billboard.png" width="50"/> Announcement Etc.</a></li>
        <li><a href="#Officials" style="font-weight: bold;"><img src="logos/Officials.png" width="50"/> Officials</a></li>
        <li><a href="#members" style="font-weight: bold;"><img src="logos/Team.png" width="50"/> Members</a></li>
		<li><a href="#sign" onclick="ss()" style="font-weight: bold;"><img src="logos/Email.png" width="50"/> Request Account</a></li>
		<li><a id="btn" style="font-weight: bold;"><img src="logos/login.png" width="50"/> Login</a></li>
		<li>
			<form id="form" method="post" style="display:none">
			<label for="Username"><small style="color:#337ab7;">Username:</small></label>
			<input type="text" class="form-control" id="Username" placeholder="Enter Username" name="Username">
			<label for="pwd"><small style="color:#337ab7;">Password:</small></label>
			<input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd"><br>
			<button type="submit" name="submit" class="btn btn-default" style="float:right;"><img src="logos/output-onlinegiftools.gif" width="15"/>Submit</button>
			</form>
		</li>
      </ul>
	  <br>
<?php
if(isset($_POST['submit'])){
	$mail=$_POST['Username'];
	$pass=$_POST['pwd'];
	if(empty($mail)){
		echo '<div class="alert alert-info" role="alert">
  Email is required!
</div>';
	}elseif(empty($pass)){
		echo '<div class="alert alert-info" role="alert">
  Password is required!
</div>';
	}else{

	$sql="SELECT * FROM account WHERE Username='$mail' AND Password='$pass'";
	$result=mysqli_query($conn,$sql);
	$count = mysqli_num_rows($result);
	if($count >= 1){
		$row = mysqli_fetch_assoc($result);
		if($row['Username'] === $mail && $row['Password'] === $pass){
			sleep(1);
			echo "logged In";
			
			$_SESSION['Account'] = $row['Account'];
			$_SESSION['Username'] = $row['Username'];
			$_SESSION['LastName'] = $row['LastName'];
			$_SESSION['account_ID'] = $row['account_ID'];
			$_SESSION['ID'] = $row['ID'];
			
			header("location: home.php");
			exit();
			
		}else{
			echo '<div class="alert alert-warning" role="alert">
  Incorrect Username or Password!!
</div>';
		}
	}else{
		echo '<div class="alert alert-warning" role="alert">
  Incorrect Username or Password!!
</div>';
	}
	
	}
}
?>

    </nav>

	
<!-- Content -->
    <div id="Announcement" class="col-sm-8" id="content" style="border-left:2px solid lightblue;">	
	<!--  Request Account -->

		<div id="sign" style="margin-top:20px;background-color:#5e798f63;border-radius: 25px;border-style: solid;display:none">
	
	<h4 style="text-align:center;font-weight: bold;" ><img src="logos/add-user.png" width="50"/>Sign-In</h4>
	<button style="float:left;" href="#" onclick="ss()" name="signn" class="btn btn-primary btn-sm">Back</button>
		<form action="add.php" method="POST" enctype="multipart/form-data" style="padding:20px;">
		
			<div class="input-group col-xs-12" style="padding-top:20px">
			
			<span class="input-group-addon"><img src="logos/Add.png" width="50"></img></span>
			<input style="background: #ffffff91;" id="FirstName" type="text" class="form-control" name="FirstName" placeholder="Enter First Name" required>

			<span class="input-group"></span>
			<input style="background: #ffffff91;" id="LastName" type="text" class="form-control" name="LastName" placeholder="Enter Last Name" required>
			
			</div>
			
			<div class="input-group" style="padding-top:5px">
			<span class="input-group-addon"><img src="logos/Number.png" width="20"></img></span>
			<input style="background: #ffffff91;" id="Number" type="number" class="form-control" name="Number" placeholder="Enter Contact Number" required>
			</div>
			<div class="input-group" style="padding-top:5px">
			<span class="input-group-addon"><img src="logos/Email.png" width="20"></img></span>
			<input style="background: #ffffff91;" id="Address" type="text" class="form-control" name="Address" placeholder="Enter Address" required>
			</div>
			
			<div class="input-group" style="padding-top:5px; text-align:left;">
			
			<label for="birthday" style="padding-right: 30px;">Birthday:
			<input style="background: #ffffff91;" type="date" id="birthday" name="Birthday" required>
			</label>
			
			<label class="radio-inline">
			<input type="radio" name="Gender" value="Male" checked>Male
			</label>
			<label class="radio-inline">
			<input type="radio" name="Gender" value="Female">Female
			</label>
			</div>
			
			<button style="float:right;" type="submit" class="btn btn-primary btn-sm"><input type="submit" name="Request" value="Request" style="background-color: transparent;border: none;"></input></button>
			<br>

		</form>

	</div>
	
	<!-- Announcement -->
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
	

      <h1>Introduction:</h1>
      <p style="text-indent: 30px;">"A population census is a total process of collecting, compiling, evaluating, analyzing, and publishing or otherwise disseminating demographic, economic, and social data pertaining, at a specified time, to all persons in a country or in a well-delimited part of a country (United Nations (2008))."</p>
      <p style="text-indent: 30px;">"Barangay governance has an important role in the establishment of the local government units in the country. The barangay serves as the principal planning and executing unit of government programs, basic services, projects, and activities. It also acts as a platform through which the community's collective ideas may be articulated and taken into consideration."</p>
	  <p style="text-indent: 30px;">"Our system, called InfoQuest, is a system, that allows the barangay staff to input, modify, and store the information of their residents, at the same time, it also allows the residents to request the documents that they want, enter their personal details, and then the barangay will provide an update to their query in their given time or through the announcement page. Which where the people could also leave a message that is regarded to the barangay."</p>
	  <br><br>
	  <h1>Objectives:</h1>
      <p style="text-indent: 30px;">1. To improve the Data Storing System of the barangay by providing an automated system where they can store and retrieve records that they possess in an orderly and systematic manner.</p>
      <p style="text-indent: 30px;">2. To allow residents to view announcements and inquire about barangay certificates digitally.</p>
	  <p style="text-indent: 30px;">3. To quickly access information about the people of the barangay.</p>
	  <p style="text-indent: 30px;">4. To create a system that will aid the residents in processing documents they immediately need.</p>
	  <br><br>
	  
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
<?php
if(isset($_GET['res'])){
	echo '
		<script>
		window.history.pushState({}, document.title, "?" + "" );
		</script>';
	echo '
	<script>
	alert("Your Account Request is Successful");
	</script>';
}
?>
<!-- Rocket -->
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
<script>
function ss(){
	const si = document.getElementById('sign');
	
	if(si.style.display === 'block'){
	si.style.display = 'none';
	}else{
	  si.style.display = 'block';
	}
};
</script>
<script type="text/javascript" src="scripts.js"></script>
</body>
</html>

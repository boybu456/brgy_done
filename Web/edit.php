	  <!-- Edit USERNAME/PASSWORD -->
	  <?php
	  if(isset($_POST['submit'])){
		  $ID = $_SESSION['ID'];
		  $NewUser = $_POST['NewUsername'];
		  $NewPass = $_POST['Newpwd'];
	  $query = "UPDATE account SET Username='$NewUser', Password='$NewPass' WHERE ID='$ID'";
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
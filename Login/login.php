	<div id = "login" class = "aligncenter">
		<div id = "logincontent" class = "aligncenter">
		
<?php  
			if(isset($_POST['submit']))
			{ 
				$_SESSION['username'] = $_POST['username'];
				$_SESSION['password'] = $_POST['password'];
			
				include '../Includes/dbconnect.php';
			
				// Check connection
				if ($conn->connect_error) 
				{  
?>		 
					<br><center>
					invalid login, please try again.
					</center><br> 
<?php 
				} 
				
				else
				{	 
					$_SESSION['loggedon'] = true; 
					header("Refresh:0"); 
				} 
			}
		 
?>

			<center>
				login 
				<br><br>
				
				<form action = "" method = "POST"> 
					<input type = "text" id = "username" name = "username" placeholder = "USERNAME">
					<br>
					<input type = "password" id = "password" name = "password" placeholder = "PASSWORD">
					<br><br>
					<button type = "submit" id = "submit" name = "submit" >Sign In </button> 
				</form>
			</center>
	 
		</div>
	</div> 
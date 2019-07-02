<?php
	session_start();
?>
  
<html>

<head>
    <link rel="stylesheet" href="main.css"> 
</head>
 
<body> 

<?php
	if ($_SESSION['loggedon'] == true)
	  {
		  
?> 
 
	<div id = "header">  
			
		<?php include 'Login/logoutbutton.php'; ?>
		
		<div id = "title"> 
			   Web App Menu
		</div>  
	
	</div>
	
	<br>
	<br> 
	
	
	<div id = "menu" class = "aligncenter"> 
		<div id = "menucontent" class = "aligncenter">
			<center>
				<form action="Apps/CustomerMaintenance/index.php">
					<input type="submit" value="Customer Maintenance" />
				</form>
				<br>
				<br>
				<form action="Apps/PartImageMaintenance/index.php">
					<input type="submit" value="Part Image Maintenance" />
				</form>
				
				<br>
			</center> 
		</div>
	</div>
	
	 	 
	<br> 
    </center>
  
	
<?php 
		include 'Includes/footer.php';
	}

	else
	{    
		include 'Login/login.php'; 
	}
?>
 
</body> 
</html>
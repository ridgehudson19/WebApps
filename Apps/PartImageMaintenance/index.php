<?php
	session_start();
?>
  
<html>

<head>
    <link rel="stylesheet" href="../main.css"> 
</head>
 
<body> 

<?php
	if ($_SESSION['loggedon'] == true)
	  {
		  
?> 
 
	<div id = "header"> 
		
		<div id = "menubutton">
		  <form action="../index.php">
			 <button type="submit">Return to Menu</button>
		  </form>
		</div>
		
		
		<div id = "logoutbutton">
		  <form action="../logout.php">
			 <button type="submit">Log Out</button>
		  </form>  
		</div>
		
		<div id = "title"> 
			   Part Image Maintenance
		</div>  
	
	</div>
	
	<br>
	<br>
	 
	<div id = "footer"> 
		<center> Ridge Hudson Portfolio &copy; 2019 </center> 
	</div>
	
<?php 
	}

	else
	{  
		include 'login.php'; 
	}
?>
 
</body>

</html>
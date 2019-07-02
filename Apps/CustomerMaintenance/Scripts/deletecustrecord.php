<?php
	session_start();  
	 
	$servername = "localhost";
	$username = $_SESSION['username'];
	$password = $_SESSION['password'];
	$dbname = "dbtest";
	
    $conn = new mysqli($servername, $username, $password, $dbname); 
	
	 
	 
	if ($conn->connect_error) 
	{
		die("Connection failed: " . $conn->connect_error);
	} 

	$sql = "DELETE FROM CustomerMaster" .  
		   " WHERE CustomerID='" . $_GET['CustID'] . "'";

	if ($conn->query($sql) === TRUE) 
	{ 
		$_SESSION['errmsg'] = "Customer #" . $_GET['CustID'] . " successfully deleted."; 
	} 
	
	else 
	{
		$_SESSION['errmsg'] = "Unable to delete Customer #" . $_GET['CustID'] . ".";
	}

	$conn->close();  
	
	
	header('Location: ../index.php');
?> 
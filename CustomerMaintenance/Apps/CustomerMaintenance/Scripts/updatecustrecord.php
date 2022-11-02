<?php
	session_start();  
	
	include '../../../Includes/dbconnect.php';
	
	$CompanyName = $_POST['CompanyName'];
	$FirstName = $_POST['FirstName'];
	$LastName = $_POST['LastName'];
	$Phone = $_POST['Phone1'] . "-" . $_POST['Phone2'] . "-" . $_POST['Phone3'];
	$TollFreePhone = $_POST['TollFreePhone1'] . "-" . $_POST['TollFreePhone2'] . "-" . $_POST['TollFreePhone3'];
	$Address = $_POST['Address'];
	$City = $_POST['City'];
	$State = $_POST['State']; 
	$Zip = $_POST['Zip'];
	$Email = $_POST['Email']; 
	 
	 
	if ($TollFreePhone == "--")
	{
		$TollFreePhone = "";
	}
	 
	 
	if ($conn->connect_error) 
	{
		die("Connection failed: " . $conn->connect_error);
	} 

	$sql = "UPDATE CustomerMaster SET CompanyName='" . $CompanyName . "', " . 
		   "FirstName='" . $FirstName . "', " . 
		   "LastName='" . $LastName . "', " . 
		   "Phone='" . $Phone . "', " . 
		   "TollFreePhone='" . $TollFreePhone . "', " . 
		   "Address='" . $Address . "', " . 
		   "City='" . $City . "', " . 
		   "State='" . $State . "', " . 
		   "Zip='" . $Zip . "', " . 
		   "Email='" . $Email . "' " . 
		   " WHERE CustomerID='" . $_POST['CustID'] . "'";

	if ($conn->query($sql) == TRUE) 
	{ 
		$_SESSION['errmsg'] = "Customer #" . $_POST['CustID'] . " successfully updated."; 
	} 
	
	else 
	{
		$_SESSION['errmsg'] = "Unable to update Customer #" . $_POST['CustID'] . ".";
	}

	$conn->close();  
	
	
	header('Location: ../index.php');
?> 
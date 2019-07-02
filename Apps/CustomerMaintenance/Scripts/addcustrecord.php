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
	 
    $sql = "SELECT MAX(CustomerID) + 1 as MaxCustomer FROM CustomerMaster";
    $result = $conn->query($sql); 
    $row = $result->fetch_assoc(); 
	
	if ($row['MaxCustomer'] > 0)
	{
		$NewCustID = $row['MaxCustomer'];
	}
	
	else
	{
		$NewCustID = 1;
	}
	
	$sql = "INSERT INTO CustomerMaster (CustomerID, CompanyName, FirstName, LastName, Phone, TollFreePhone, Address, City, State, Zip, Email) VALUES" . 
			"(" . $NewCustID . ", '" . $CompanyName . "', " . "'" . $FirstName . "', " . "'" . $LastName . "', " . "'" . $Phone . "', " . "'" . $TollFreePhone . "', " . 
			"'" . $Address . "', " . "'" . $City . "', " . "'" . $State . "', " . "'" . $Zip . "', " . "'" . $Email . "')";			

	if ($conn->query($sql) === TRUE) 
	{ 
		$_SESSION['errmsg'] = "Customer #" . $NewCustID . " successfully Added."; 
	} 
	
	else 
	{
		$_SESSION['errmsg'] = "Unable to add new customer.";
	}

	$conn->close();  
	
	
	header('Location: ../index.php');
?> 
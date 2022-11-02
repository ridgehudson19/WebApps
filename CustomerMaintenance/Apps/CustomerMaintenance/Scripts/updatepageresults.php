<?php
	session_start();
	
	if ($_GET['result'] == "All")
	{
		$_SESSION['results'] = ""; 
		$_SESSION['RecordCount'] = 0;
	}
	
	else
	{
		$_SESSION['results'] = $_GET['result']; 
	}
	 
	 
	header('Location: ../index.php');
?>
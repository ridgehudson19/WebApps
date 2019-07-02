<?php 
	session_start();
	
	if (isset($_POST['firstpage'])){   
		$_SESSION['RecordCount'] = 0;
	}
	
	if (isset($_POST['lastpage'])){   
		$_SESSION['RecordCount'] = $_SESSION['MaxCustomer'] - $_SESSION['results'];
	}
	
	if (isset($_POST['previouspage'])){   
		$_SESSION['RecordCount'] -= $_SESSION['results'];
	}
	if (isset($_POST['nextpage'])){   
		$_SESSION['RecordCount'] += $_SESSION['results'];
	}
 
	header('Location: ../index.php');
?>
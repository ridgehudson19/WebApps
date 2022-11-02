<?php
	$servername = "localhost";
	$username = $_SESSION['username'];
	$password = $_SESSION['password'];
	$dbname = "dbtest";
	
    $conn = new mysqli($servername, $username, $password, $dbname);
?>
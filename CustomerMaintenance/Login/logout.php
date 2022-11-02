<?php
	session_start();
	session_destroy();
		
	$host  = $_SERVER['HTTP_HOST'];
	$uri   = "/WebApps";
	$extra = 'index.php';
	header("Location: http://$host$uri/$extra");
?> 
 
<?php
	session_start();
	
	$downloadoption = $_POST['downloadoption'];

	if ($downloadoption == "XLS")
	{	  
		include 'downloadexcel.php';
	}
	
	else if ($downloadoption == "CSV")
	{ 
		include 'downloadcsv.php';
	}

?> 
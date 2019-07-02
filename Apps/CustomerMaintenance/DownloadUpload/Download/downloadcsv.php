 
<?php
	session_start(); 
	
	ob_clean();
	header('Content-type: text/csv; charset=UTF-8');
	header('Content-Disposition: attachment; filename=CustomerMaster.csv');
		
	include '../../../../Includes/dbconnect.php';
	
	$output = fopen("php://output", "w");
	fputcsv($output, array('CustomerID', 'CompanyName'));
	
    $sql = "SELECT * FROM CustomerMaster";
	$result = $conn->query($sql);
    if ($result->num_rows > 0) 
    { 
			  
	   // output data of each row
       while($row = $result->fetch_assoc()) 
	   {   
			fputcsv($output, $row);
       } 
   } 
   
   else 
   {
	   fputcsv($output, "0 Results");
   }
   
   $conn->close(); 
   fclose($output, $row);
    
 ?> 
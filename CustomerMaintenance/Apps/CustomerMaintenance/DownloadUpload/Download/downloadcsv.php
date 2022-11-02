 
<?php
	session_start(); 
	
	ob_clean();
	header('Content-type: text/csv; charset=UTF-8');
	header('Content-Disposition: attachment; filename=CustomerMaster.csv');
		
	include '../../../../Includes/dbconnect.php';
	
	$output = fopen("php://output", "w");
	fputcsv($output, array('CompanyName', 'Phone', 'Toll-Free Phone', 'First Name', 'Last Name',
	                       'Address', 'City', 'State', 'Zip-Code', 'Email'));
	
    $sql = "SELECT CompanyName, Phone, TollFreePhone, FirstName, LastName,
		           Address, City, State, Zip, Email 
			  FROM CustomerMaster";
			  
	$result = $conn->query($sql);
    if ($result->num_rows > 0) 
    { 
			  
	   // output data of each row
       while($row = $result->fetch_assoc()) 
	   {    
			fputcsv($output, array($row["CompanyName"], $row["Phone"], $row["TollFreePhone"], 
								   $row["FirstName"], $row["LastName"], $row["Address"],
								   $row["City"], $row["State"], $row["Zip"], $row["Email"]));
			 
	   } 
   } 
   
   else 
   {
	   fputcsv($output, "0 Results");
   }
   
   $conn->close(); 
   fclose($output, $row);
    
 ?> 
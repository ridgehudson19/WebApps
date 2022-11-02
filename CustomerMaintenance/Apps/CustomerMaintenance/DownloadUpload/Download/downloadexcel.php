<?php
	session_start(); 
 
    header("Content-type: application/vnd.ms-excel");
	header("Content-Disposition: attachment; filename=CustomerMaster.xls");
	
	include '../../../../Includes/dbconnect.php'; 
 
    $sql = "SELECT * FROM CustomerMaster ORDER BY CompanyName ASC";
	$result = $conn->query($sql);
 
    if ($result->num_rows > 0) 
    {
		echo "<table id='t01'>";
		
		echo "<tr> 
				<th> Company Name </th> 
				<th> Phone </th> 
				<th> Toll-Free Phone </th> 
				<th> First Name </th> 
				<th> Last Name </th> 
				<th> Address </th> 
				<th> City </th> 
				<th> State </th> 
				<th> Zip-Code </th> 
				<th> Email </th> 
			  </tr>";
			  
	   // output data of each row
       while($row = $result->fetch_assoc()) 
	   { 
         echo "<tr>" . 
		      "<td>" . $row["CompanyName"] . "</td>" .  
	          "<td>" . $row["Phone"] . "</td>" .  
	          "<td>" . $row["TollFreePhone"] . "</td>" .  
	          "<td>" . $row["FirstName"] . "</td>" .  
	          "<td>" . $row["LastName"] . "</td>" .  
	          "<td>" . $row["Address"] . "</td>" .  
	          "<td>" . $row["City"] . "</td>" .  
	          "<td>" . $row["State"] . "</td>" .  
	          "<td>" . $row["Zip"] . "</td>" .  
	          "<td>" . $row["Email"] . "</td>" .  
			  "</tr>";
       } 
	   echo "</table>";
   } 
   
   else 
   {
      echo "0 results";
   }
   
   $conn->close(); 
    
 ?>
 
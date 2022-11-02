<?php
	session_start();
?>
  
<html>

<head>
    <link rel="stylesheet" href="../../../main.css"> 
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />

</head>
 

 
<body> 

<?php
	if ($_SESSION['loggedon'] == true)
	  {
		  
?> 
 
	<div id = "header"> 
		
		
		<?php 
			include '../../../Includes/menubutton.php'; 
			include '../../../Includes/returnbutton.php'; 
			include '../../../Login/logoutbutton.php'; 
		?>
		 
		<div id = "title"> 
			   Download / Upload Customer File
		</div>   
	
	</div>
	 
	<br>
	<br>
	<br>  

	<center>
		<div id = "title"> 
			   Download File
		</div>   
			
		<br>
		<br>
			 
		   <form action="Download/choosedownload.php" method = "POST">
			  <select name = "downloadoption" id = "downloadoption">
				<option value = "CSV"> .CSV </option>
				<option value = "XLS"> .XLS </option>
			  </select>
			  <button type="submit" >Download File</button>
		   </form>
		   
		   
		<br>
		<br>
		<br> 
		
		<div id = "title"> 
			   Upload File 
		</div>   
 
		<br>
		<br>
			   
			   
 
   
  <form method="post" enctype="multipart/form-data">
   <div align="center">  
    <label>Select CSV File:</label>
    <input type="file" name="file" accept=".csv" />
    <br>
    <br>
    <input type="submit" name="submit" value="Import" />
   </div>
  </form> 
			   
			   
<?php  
   include '../../../Includes/dbconnect.php'; 
if(isset($_POST["submit"]))
{
 if($_FILES['file']['name'])
 {
  $filename = explode(".", $_FILES['file']['name']);
  if($filename[1] == 'csv')
  {
   $handle = fopen($_FILES['file']['tmp_name'], "r");
   $data = fgetcsv($handle);
   while($data = fgetcsv($handle))
   {
				//$item1 = mysqli_real_escape_string($conn, $data[0]);  
				
				$sql = "SELECT MAX(CustomerID) + 1 as MaxCustomer FROM CustomerMaster";
				$result = $conn->query($sql); 
				$row = $result->fetch_assoc(); 
				
				if ($row['MaxCustomer'] > 0)
				{
					$CustID = $row['MaxCustomer'];
				}
				
				else
				{
					$CustID = 1;
				}
				
							
				
                $CompanyName = mysqli_real_escape_string($conn, $data[0]);
                $Phone = mysqli_real_escape_string($conn, $data[1]);
                $TollFreePhone = mysqli_real_escape_string($conn, $data[2]);
                $FirstName = mysqli_real_escape_string($conn, $data[3]);
                $LastName = mysqli_real_escape_string($conn, $data[4]);
                $Address = mysqli_real_escape_string($conn, $data[5]);
                $City = mysqli_real_escape_string($conn, $data[6]);
                $State = mysqli_real_escape_string($conn, $data[7]);
                $Zip = mysqli_real_escape_string($conn, $data[8]);
                $Email = mysqli_real_escape_string($conn, $data[9]); 
				 
				
				if (trim($data[0]) != ""){
                $query = "INSERT into CustomerMaster(CustomerID, FirstName, LastName, CompanyName, Address, City, State, Zip, Phone, TollFreePhone, Email ) 
											  values($CustID,'$FirstName','$LastName','$CompanyName','$Address','$City','$State','$Zip','$Phone','$TollFreePhone','$Email')";
                mysqli_query($conn, $query); 
				}
   }
   fclose($handle);
   
				echo ($CompanyName . " " . $Phone . " " . $TollFreePhone . " " .  $FirstName . " " .  $LastName . " " .  $Address . " " .  $City . " " .  $State . " " .  $Zip . " " .  $Email);
			 
   echo "file uploaded successfully";
   
  }
 }
}
?>   
			   
			    
	</center>
	
<?php  
   include '../../../Includes/footer.php'; 
	}

	else
	{    
		include '../../../Login/login.php'; 
	}
?>
 
</body> 
</html>
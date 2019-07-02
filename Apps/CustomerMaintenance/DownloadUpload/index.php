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
					$item1 = $row['MaxCustomer'];
				}
				
				else
				{
					$item1 = 1;
				}
				
							
				
                $item2 = mysqli_real_escape_string($conn, $data[1]);
                $item3 = mysqli_real_escape_string($conn, $data[2]);
                $item4 = mysqli_real_escape_string($conn, $data[3]);
                $item5 = mysqli_real_escape_string($conn, $data[4]);
                $item6 = mysqli_real_escape_string($conn, $data[5]);
                $item7 = mysqli_real_escape_string($conn, $data[6]);
                $item8 = mysqli_real_escape_string($conn, $data[7]);
                $item9 = mysqli_real_escape_string($conn, $data[8]);
                $item10 = mysqli_real_escape_string($conn, $data[9]);
                $item11 = mysqli_real_escape_string($conn, $data[10]);
                $query = "INSERT into CustomerMaster(CustomerID, FirstName, LastName, CompanyName, Address, City, State, Zip, Phone, TollFreePhone, Email ) 
											  values($item1,'$item2','$item3','$item4','$item5','$item6','$item7','$item8','$item9','$item10','$item11')";
                mysqli_query($conn, $query); 
   }
   fclose($handle);
   
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
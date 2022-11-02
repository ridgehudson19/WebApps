<?php
	session_start();
?>
  
<html>

<head> 
    <link rel="stylesheet" href="../../main.css?<?php echo date('l jS \of F Y h:i:s A'); ?>"> 
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />

</head>

 <script type = "text/javascript" src = "Scripts/confirmdelete.js"> </script>

 
<body> 

<?php
	if ($_SESSION['loggedon'] == true)
	  {
		  
?> 
 
	<div id = "header"> 
		
		
		<?php 
			include '../../Includes/menubutton.php'; 
			include '../../Login/logoutbutton.php'; 
		?>
		 
		<div id = "title"> 
			   Customer Maintenance
		</div>   
	
	</div>
	
	<br>
	<br>
	
	<script>

	function updatePageResults() {

    var result = document.getElementById("resultsperpage");
  
		window.location = 'Scripts/updatepageresults.php?result=' + result.value;
 
 
}
	
	</script> 
	<br> 
	 
	<div id = "notifymessage">
		<center>
			 
				<?php 
					if ($_SESSION['errmsg'] != "")
					{
						echo $_SESSION['errmsg'] . "<br>";
						$_SESSION['errmsg'] = "";
					}
				?>
			
		</center>
	</div> 
	
	<br> 
	<?php
			
	include '../../Includes/dbconnect.php';
		$sql = "SELECT MAX(CustomerID) as MaxCustomer FROM CustomerMaster";
		$result = $conn->query($sql); 
		$row = $result->fetch_assoc(); 
		
		$_SESSION['MaxCustomer'] = $row['MaxCustomer'];
	
	if ($row['MaxCustomer'] > 0)
	{
	?>
	 
	<div id ="wrapper"> 
	
 	<div style = "padding:3px; position:relative;">
			
			<div style = "float:left; width:163px;">
			&nbsp;
			</div>
			
			<div id = "results">	  
				Results per page:  
			<?php
			  if (!isset($_SESSION['results'])){
				  $_SESSION['results'] = 15;
			  }
			
				echo "<select id='resultsperpage' onchange='updatePageResults();'>
				  <option value='15' " . (($_SESSION['results'] == 15) ?'selected = "selected"':"") . ">15</option>
				  <option value='25' " . (($_SESSION['results'] == 25) ?'selected = "selected"':"") . ">25</option>
				  <option value='50' " . (($_SESSION['results'] == 50) ?'selected = "selected"':"") . ">50</option>
				  <option value='100' " . (($_SESSION['results'] == 100) ?'selected = "selected"':"") . ">100</option>
				  <option value='All' " . (($_SESSION['results'] == '') ?'selected = "selected"':"") . ">All</option>
				</select>";
			?>
			</div>    
			 
				 		<center>Customer Directory</center>
			 
	  
		</div>
	</div>  
	<?php } ?> 
	
	<?php
	include '../../Includes/dbconnect.php';
	

	if (!isset($_SESSION['RecordCount'])){
		$_SESSION['RecordCount'] = 0;
	}
		
	$sql = "SELECT * FROM CustomerMaster WHERE CustomerID > " . $_SESSION['RecordCount'];
	
	if ($_SESSION['results'] != ""){ 
		$sql = $sql . " LIMIT " . $_SESSION['results'];
	}
	
	
	
	$result = $conn->query($sql);
	?>
		
		<table id='maintenance'>
			<tr> 
				<th> Customer ID</th> 
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
				
	<?php
	if ($result->num_rows > 0){
		
		 echo " <th> &nbsp; </th>
				<th> &nbsp; </th>
				<th> &nbsp; </th>
				<th> &nbsp; </th>
			  </tr>";
		
		while($row = $result-> fetch_assoc()){
			
			
			 echo "<tr><td style='text-align:center'>" . $row["CustomerID"] . "</td>" .  
				  "<td>" . $row["CompanyName"] . "</td>" . 
				  "<td>" . $row["Phone"] . "</td>" . 
				  "<td>" . $row["TollFreePhone"] . "</td>" . 
				  "<td>" . $row["FirstName"] . "</td>" . 
				  "<td>" . $row["LastName"]  . "</td>" . 
				  "<td>" . $row["Address"]  . "</td>" . 
				  "<td>" . $row["City"]  . "</td>" . 
				  "<td>" . $row["State"]  . "</td>" . 
				  "<td>" . $row["Zip"]  . "</td>" . 
				  "<td>" . $row["Email"]  . "</td>" .  
				  "<td><div id = 'tablebutton'>" . "<a href = 'Maintenance/index.php?CustID=" . $row["CustomerID"]  . "&Mode=View'><center>View</center></a>" . "</div></td>" .
				  "<td><div id = 'tablebutton'>" . "<a href = 'Maintenance/index.php?CustID=" . $row["CustomerID"]  . "&Mode=Edit'><center>Edit</center></a>" . "</div></td>" . 
				  "<td><div id = 'tablebutton'>" . "<a href = 'Maintenance/index.php?CustID=" . $row["CustomerID"]  . "&Mode=Copy'><center>Copy</center></a>" . "</div></td>" . 
				  "<td><div id = 'tablebutton'>" . "<a href = '' onclick ='DeleteCustomer(" . $row["CustomerID"] . "); return false;'><center>Delete</center></a>" . "</div></td>" .  
				  "</tr>";	


			
		}
	}
	
	else{
?>
		</tr> 
			<tr> 
				<td>*no results</td> 
				<td>&nbsp </td> 
				<td>&nbsp </td> 
				<td>&nbsp </td> 
				<td>&nbsp </td> 
				<td>&nbsp </td> 
				<td>&nbsp </td> 
				<td>&nbsp </td> 
				<td>&nbsp </td> 
				<td>&nbsp </td> 
				<td>&nbsp </td> 
			</tr>
		
	<?php
	}
		echo "</table>";
	?>
	
	
	<?php
	 
	
	
	include '../../Includes/dbconnect.php';
		$sql = "SELECT MAX(CustomerID) as MaxCustomer FROM CustomerMaster";
		$result = $conn->query($sql); 
		$row = $result->fetch_assoc(); 
	
	if ($row['MaxCustomer'] > 0)
	{
	?>
	
		<div id = "wrapper">
	
		<div style = "padding:2px; position:relative;">
		
		
		<?php 
			if ($_SESSION['RecordCount'] != 0 && $_SESSION['results'] != ""){
		?>
			<div style = "float:left; left:2px; position:relative;">
			  <form method = "POST" action = "Scripts/changepage.php">
				 <button type="submit" name = "firstpage"  > First Page</button>
			  </form>
			  </div>

					
			<div style = "float:left; left:4px; position:relative;">
			  <form method = "POST" action = "Scripts/changepage.php">
				 <button type="submit" name = "previouspage" > Previous Page</button>
			  </form>  
			</div>
			<?php }
			
				  else{   
					echo "<div style = 'width:150px; float:left;'> &nbsp; </div>";
			    }
			
			if ($_SESSION['results'] + $_SESSION['RecordCount'] < $row['MaxCustomer']  && $_SESSION['results'] != ""){
		?>
			  
			<div style = "float:right; left:-2px; position:relative;">
			  <form method = "POST" action = "Scripts/changepage.php">
				 <button type="submit" name = "lastpage" > Last Page</button>
			  </form> 
				</div>
			  
			<div style = "float:right; left:-4px; position:relative;">
			  <form method = "POST" action = "Scripts/changepage.php"> 
				 <button type="submit" name = "nextpage" > Next Page</button>
			  </form>
			  </div>

			<?php } 
			
				  else{   
					echo "<div style = 'width:150px; float:right;'> &nbsp; </div>";
			    }
			
			
			?>
				 
			<center> 
			
			
			<?php
				
				echo ("Displaying ");
			
				if ($_SESSION['results'] == ""){
						echo ($_SESSION['MaxCustomer'] . " customers out of " . $_SESSION['MaxCustomer']);
				}
				
				else{
					echo(($_SESSION['RecordCount'] + 1) . " - ");
					
					if ($_SESSION['RecordCount'] + $_SESSION['results'] > $_SESSION['MaxCustomer']){
						echo $_SESSION['MaxCustomer'];
					} 
					
					else{
						echo ($_SESSION['RecordCount'] + $_SESSION['results']);
						
					}
					
					echo(" customers out of " . $_SESSION['MaxCustomer']);
				}
			?> 
			
			</center>
	 </div>
	</div>
    <?php } ?>
	   <br>
	    
	   <div id = "maintenancebuttons">
	   <center>
	   <a href = "Maintenance/index.php?Mode=Add" class = "button"> Add New Customer </a>
	   <a href = "DownloadUpload/index.php" class = "button"> Download / Upload File </a>  
	   </center>
	   </div> 
	   
	   <br> 
	   <br>  
	<br>

<?php  
   include '../../Includes/footer.php';
   $conn->close();  
	}

	else
	{    
		include '../../Login/login.php'; 
	}
?>
 
</body> 
</html>
<?php
	session_start();
?>
  
<html>

<head>
    <link rel="stylesheet" href="../../../main.css"> 
</head>
 
<body> 

<!-- force number key javascript!--> 
<script language = "javascript" src = "../Scripts/forcenumberfield.js"> </script>

<!--form validation javascript!--> 
<script language = "javascript" src = "../Scripts/validatecustomerform.js"> </script>



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
		
			  <?php 
					if ($_GET['Mode'] == 'Add'){
						echo "Add New Customer"; 
					}
					else{
						echo $_GET['Mode'] . " Customer #" . $_GET['CustID'];
					}
			  ?>
		</div>  
	
	</div>
	 
	<br>
	<br>
	<br> 
	
	<?php
	
	include '../../../Includes/dbconnect.php';
 
    $sql = "SELECT * FROM CustomerMaster where CustomerID = '". $_GET['CustID'] . "'";
    $result = $conn->query($sql);


    if ($result->num_rows > 0 || $_GET['Mode'] == 'Add') 
    {
		echo "<center>";
		
		if ($_GET['Mode'] == "Edit"){
		  echo  "<form name = 'CustomerForm' id = 'CustomerForm' action = '../Scripts/updatecustrecord.php' method = 'POST' onsubmit='return ValidateCustomerForm()'>";
		}
		
		else{ 
		  echo  "<form name = 'CustomerForm' id = 'CustomerForm' action = '../Scripts/addcustrecord.php' method = 'POST' onsubmit='return ValidateCustomerForm()'>";
		}
		
		echo "<table id='view'>"; 
			  
	   // output data of each row
	   
       $row = $result->fetch_assoc();
	     
         echo	  "<tr><th> Company Name:    </th>" . "<td><input type='text' id='CompanyName'   name='CompanyName'   value = '" . $row["CompanyName"]   . "' maxlength='50'" . (($_GET['Mode'] == 'View') ?'readonly':"") . " ></td></tr>" .  
		 
	              "<tr><th> Phone:           </th>" . 
				  "<td>" . 
							"(&nbsp;"              . "<input type='text' onkeypress='return isNumberKey(event)'  onpaste='return false' id='Phone1' name='Phone1' value = '" . substr($row["Phone"],0,3) . "' maxlength='3' size='1'" . (($_GET['Mode'] == 'View') ?'readonly':"") . " >" . 
							"&nbsp;)&nbsp;-&nbsp;" . "<input type='text' onkeypress='return isNumberKey(event)'  onpaste='return false' id='Phone2' name='Phone2' value = '" . substr($row["Phone"],4,3) . "' maxlength='3' size='1'" . (($_GET['Mode'] == 'View') ?'readonly':"") . " >" . 
							"&nbsp;-&nbsp;" . 		 "<input type='text' onkeypress='return isNumberKey(event)'  onpaste='return false' id='Phone3' name='Phone3' value = '" . substr($row["Phone"],8,4) . "' maxlength='4' size='1'" . (($_GET['Mode'] == 'View') ?'readonly':"") . " >" . 
				  "</td></tr>" . 
				  
	              "<tr><th> Toll-Free Phone:           </th>" . 
				  "<td>" . 
							"(&nbsp;"              . "<input type='text' onkeypress='return isNumberKey(event)'  onpaste='return false' id='TollFreePhone1' name='TollFreePhone1' value = '" . substr($row["TollFreePhone"],0,3) . "' maxlength='3' size='1'" . (($_GET['Mode'] == 'View') ?'readonly':"") . " >" . 
							"&nbsp;)&nbsp;-&nbsp;" . "<input type='text' onkeypress='return isNumberKey(event)'  onpaste='return false' id='TollFreePhone2' name='TollFreePhone2' value = '" . substr($row["TollFreePhone"],4,3) . "' maxlength='3' size='1'" . (($_GET['Mode'] == 'View') ?'readonly':"") . " >" . 
							"&nbsp;-&nbsp;"		   . "<input type='text' onkeypress='return isNumberKey(event)'  onpaste='return false' id='TollFreePhone3' name='TollFreePhone3' value = '" . substr($row["TollFreePhone"],8,4) . "' maxlength='4' size='1'" . (($_GET['Mode'] == 'View') ?'readonly':"") . " >" . 
				  "</td></tr>" . 
				  
	              "<tr><th> First Name:      </th>" . "<td><input type='text' id='FirstName'     name='FirstName'     value = '" . $row["FirstName"]     . "' maxlength='30'" . (($_GET['Mode'] == 'View') ?'readonly':"") . " ></td></tr>" . 
	              "<tr><th> Last Name:       </th>" . "<td><input type='text' id='LastName'      name='LastName'      value = '" . $row["LastName"]      . "' maxlength='30'" . (($_GET['Mode'] == 'View') ?'readonly':"") . " ></td></tr>" .  
	              "<tr><th> Email:           </th>" . "<td><input type='text' id='Email'         name='Email'         value = '" . $row["Email"]         . "' maxlength='100'" . (($_GET['Mode'] == 'View') ?'readonly':"") . " ></td></tr>" . 
	              "<tr><th> Address:         </th>" . "<td><input type='text' id='Address'       name='Address'       value = '" . $row["Address"]       . "' maxlength='50'" . (($_GET['Mode'] == 'View') ?'readonly':"") . " ></td></tr>" . 
	              "<tr><th> City:            </th>" . "<td><input type='text' id='City' 		 name='City' 		  value = '" . $row["City"]			 . "' maxlength='50'" . (($_GET['Mode'] == 'View') ?'readonly':"") . " ></td></tr>" . 
				  
				  
				  
				  
	              "<tr><th> State:           </th>" . 
					  "<td>
					  <select name='State' id = 'State'" . (($_GET['Mode'] == 'View') ?'disabled':"") . " >  
						<option value ='AL' " . (($row[State] == 'AL') ?'selected = "selected"':"") . ">Alabama</option> 
						<option value ='AK' " . (($row[State] == 'AK') ?'selected = "selected"':"") . ">Alaska</option> 
						<option value ='AZ' " . (($row[State] == 'AZ') ?'selected = "selected"':"") . ">Arizona</option> 
						<option value ='AR' " . (($row[State] == 'AR') ?'selected = "selected"':"") . ">Arkansas</option> 
						<option value ='CA' " . (($row[State] == 'CA') ?'selected = "selected"':"") . ">California</option> 
						<option value ='CO' " . (($row[State] == 'CO') ?'selected = "selected"':"") . ">Colorado</option> 
						<option value ='CT' " . (($row[State] == 'CT') ?'selected = "selected"':"") . ">Connecticut</option> 
						<option value ='DE' " . (($row[State] == 'DE') ?'selected = "selected"':"") . ">Delaware</option> 
						<option value ='FL' " . (($row[State] == 'FL') ?'selected = "selected"':"") . ">Florida</option> 
						<option value ='GL' " . (($row[State] == 'GL') ?'selected = "selected"':"") . ">Georgia</option> 
						<option value ='HI' " . (($row[State] == 'HI') ?'selected = "selected"':"") . ">Hawaii</option> 
						<option value ='ID' " . (($row[State] == 'ID') ?'selected = "selected"':"") . ">Idaho</option> 
						<option value ='IL' " . (($row[State] == 'IL') ?'selected = "selected"':"") . ">Illinois</option> 
						<option value ='IN' " . (($row[State] == 'IN') ?'selected = "selected"':"") . ">Indiana</option> 
						<option value ='IA' " . (($row[State] == 'IA') ?'selected = "selected"':"") . ">Iowa</option> 
						<option value ='KS' " . (($row[State] == 'KS') ?'selected = "selected"':"") . ">Kansas</option> 
						<option value ='KY' " . (($row[State] == 'KY') ?'selected = "selected"':"") . ">Kentucky</option> 
						<option value ='LA' " . (($row[State] == 'LA') ?'selected = "selected"':"") . ">Louisiana</option> 
						<option value ='ME' " . (($row[State] == 'ME') ?'selected = "selected"':"") . ">Maine</option> 
						<option value ='MD' " . (($row[State] == 'MD') ?'selected = "selected"':"") . ">Maryland</option> 
						<option value ='MA' " . (($row[State] == 'MA') ?'selected = "selected"':"") . ">Massachusetts</option> 
						<option value ='MI' " . (($row[State] == 'MI') ?'selected = "selected"':"") . ">Michigan</option> 
						<option value ='MN' " . (($row[State] == 'MN') ?'selected = "selected"':"") . ">Minnesota</option> 
						<option value ='MS' " . (($row[State] == 'MS') ?'selected = "selected"':"") . ">Mississippi</option> 
						<option value ='MO' " . (($row[State] == 'MO') ?'selected = "selected"':"") . ">Missouri</option> 
						<option value ='MT' " . (($row[State] == 'MT') ?'selected = "selected"':"") . ">Montana</option> 
						<option value ='NE' " . (($row[State] == 'NE') ?'selected = "selected"':"") . ">Nebraska</option> 
						<option value ='NV' " . (($row[State] == 'NV') ?'selected = "selected"':"") . ">Nevada</option> 
						<option value ='NH' " . (($row[State] == 'NH') ?'selected = "selected"':"") . ">New Hampshire</option> 
						<option value ='NJ' " . (($row[State] == 'NJ') ?'selected = "selected"':"") . ">New Jersey</option> 
						<option value ='NM' " . (($row[State] == 'NM') ?'selected = "selected"':"") . ">New Mexico</option> 
						<option value ='NY' " . (($row[State] == 'NY') ?'selected = "selected"':"") . ">New York</option> 
						<option value ='NC' " . (($row[State] == 'NC') ?'selected = "selected"':"") . ">North Carolina</option> 
						<option value ='ND' " . (($row[State] == 'ND') ?'selected = "selected"':"") . ">North Dakota</option> 
						<option value ='OH' " . (($row[State] == 'OH') ?'selected = "selected"':"") . ">Ohio</option> 
						<option value ='OK' " . (($row[State] == 'OK') ?'selected = "selected"':"") . ">Oklahoma</option> 
						<option value ='OR' " . (($row[State] == 'OR') ?'selected = "selected"':"") . ">Oregon</option> 
						<option value ='PA' " . (($row[State] == 'PA') ?'selected = "selected"':"") . ">Pennsylvania</option> 
						<option value ='RI' " . (($row[State] == 'RI') ?'selected = "selected"':"") . ">Rhode Island</option> 
						<option value ='SC' " . (($row[State] == 'SC') ?'selected = "selected"':"") . ">South Carolina</option> 
						<option value ='SD' " . (($row[State] == 'SD') ?'selected = "selected"':"") . ">South Dakota</option> 
						<option value ='TN' " . (($row[State] == 'TN') ?'selected = "selected"':"") . ">Tennessee</option> 
						<option value ='TX' " . (($row[State] == 'TX') ?'selected = "selected"':"") . ">Texas</option> 
						<option value ='UT' " . (($row[State] == 'UT') ?'selected = "selected"':"") . ">Utah</option> 
						<option value ='VT' " . (($row[State] == 'VT') ?'selected = "selected"':"") . ">Vermont</option> 
						<option value ='VA' " . (($row[State] == 'VA') ?'selected = "selected"':"") . ">Virginia</option> 
						<option value ='WA' " . (($row[State] == 'WA') ?'selected = "selected"':"") . ">Washington</option> 
						<option value ='WV' " . (($row[State] == 'WV') ?'selected = "selected"':"") . ">West Virginia</option> 
						<option value ='WI' " . (($row[State] == 'WI') ?'selected = "selected"':"") . ">Wisconsin</option> 
						<option value ='WY' " . (($row[State] == 'WY') ?'selected = "selected"':"") . ">Wyoming</option> 


					  </select> 
					   
					  </td>" . 
				  
				  "</tr>" . 
				  
				  
				  "<tr><th> Zip-Code: </th>" . "<td><input type='text' id='Zip'	  name='Zip'   value = '" . $row["Zip"]   . "' maxlength='5' onkeypress='return isNumberKey(event)'  onpaste='return false' maxlength='5' size='2'" . (($_GET['Mode'] == 'View') ?'readonly':"") . " ></td></tr>" . 
				  "<input type='hidden' name='CustID' id='CustID' value='" . $_GET['CustID'] . "'/>" . 
				  "<br>";
       
	    
	   echo "</table>" . 
			"<br>";
			
		if ($_GET['Mode'] != 'View')
		{
			echo "<input type='submit' name ='changes' value='"; 
			
			if ($_GET['Mode'] == 'Edit'){
				echo "Edit Customer";
			}
			else if ($_GET['Mode'] == 'Copy' || $_GET['Mode'] == 'Add'){
				echo "Add New Customer";
			}			
			echo "'>";
		}
			"</form>" .
			"</center>";
	      
	  
	  
		echo "";
   } 
    
   else 
   {
      echo "0 results";
   }
   
   $conn->close(); 
	
?>  
    <br>   
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
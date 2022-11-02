 function DeleteCustomer(Customer){
	
	var response = confirm("Are you sure you want to delete Customer #" + Customer + "? "
					 + "\nPress OK to DELETE.");
	
	if (response == true) {
		window.location = 'Scripts/deletecustrecord.php?CustID=' + Customer;
	}

	
}
 
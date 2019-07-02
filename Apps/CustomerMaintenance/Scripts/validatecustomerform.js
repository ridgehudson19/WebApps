function ValidateCustomerForm()
{  
	var customerForm = document.getElementById("CustomerForm");
		
	var companyName = customerForm.CompanyName;
	var phone1 = customerForm.Phone1;
	var phone2 = customerForm.Phone2;
	var phone3 = customerForm.Phone3;
	var tollFreePhone1 = customerForm.TollFreePhone1;
	var tollFreePhone2 = customerForm.TollFreePhone2;
	var tollFreePhone3 = customerForm.TollFreePhone3;
	var firstName = customerForm.FirstName;
	var lastName = customerForm.LastName;
	var address = customerForm.Address;
	var city = customerForm.City;
	var email = customerForm.Email;
	var emailChecked = customerForm.Email.value.search(/\w[-._\w]*\w@\w[-._\w]*\w\.\w{2,3}/); 
	var zip = customerForm.Zip;
	 
	  
    companyName.style.backgroundColor = "";
    phone1.style.backgroundColor = "";
    phone2.style.backgroundColor = "";
    phone3.style.backgroundColor = "";
    tollFreePhone1.style.backgroundColor = "";
    tollFreePhone2.style.backgroundColor = "";
    tollFreePhone3.style.backgroundColor = "";
    firstName.style.backgroundColor = "";
    lastName.style.backgroundColor = "";
    address.style.backgroundColor = "";
    city.style.backgroundColor = "";
    email.style.backgroundColor = "";
    zip.style.backgroundColor = "";
		
		
	var result = false;
	
	if (companyName.value.replace(/\s/g, '') == "") 
	{
		alert("'Company Name' cannot be blank."); 
		companyName.style.backgroundColor = "yellow";
	}
	else if (phone1.value.length == 0 && phone2.value.length == 0 && phone3.value.length == 0)
	{
		alert("'Phone Number' cannot be blank.");
		phone1.style.backgroundColor = "yellow";
		phone2.style.backgroundColor = "yellow";
		phone3.style.backgroundColor = "yellow";
	}
	
	else if (phone1.value.length < 3)
	{
		alert("'Phone Number' area code must be 3 digits.");
		phone1.style.backgroundColor = "yellow";
	}
	 
	else if (phone2.value.length < 3)
	{
		alert("'Phone Number' prefix must be 3 digits.");
		phone2.style.backgroundColor = "yellow";
	}
	
	else if (phone3.value.length < 4)
	{
		alert("'Phone Number' line number must be 4 digits.");
		phone3.style.backgroundColor = "yellow";
	}
	
	else if ((tollFreePhone1.value.length > 0 || tollFreePhone2.value.length > 0 || tollFreePhone3.value.length > 0) && tollFreePhone1.value.length != 3)
	{
		alert("'Toll-Free Phone Number' area code must be 3 digits.");
		tollFreePhone1.style.backgroundColor = "yellow"; 
	}
	 
	else if ((tollFreePhone1.value.length > 0 || tollFreePhone2.value.length > 0 || tollFreePhone3.value.length > 0) && tollFreePhone2.value.length != 3)
	{
		alert("'Toll-Free Phone Number' prefix must be 3 digits.");
		tollFreePhone2.style.backgroundColor = "yellow";
	}
	
	else if ((tollFreePhone1.value.length > 0 || tollFreePhone2.value.length > 0 || tollFreePhone3.value.length > 0) && tollFreePhone3.value.length != 4)
	{
		alert("'Toll-Free Phone Number' line number must be 4 digits.");
		tollFreePhone3.style.backgroundColor = "yellow";
	}
	
	else if (firstName.value.replace(/\s/g, '') == "")
	{
		alert("'First Name' cannot be blank.");
		firstName.style.backgroundColor = "yellow";
	}
	
	else if (lastName.value.replace(/\s/g, '') == "")
	{
		alert("'Last Name' cannot be blank.");
		lastName.style.backgroundColor = "yellow";
	}
	
	else if (address.value.replace(/\s/g, '') == "")
	{
		alert("'Address' cannot be blank.");
		address.style.backgroundColor = "yellow";
	}
	
	else if (city.value.replace(/\s/g, '') == "")
	{
		alert("'City' cannot be blank.");
		city.style.backgroundColor = "yellow";
	}
	
	else if (email.value.replace(/\s/g, '') == "")
	{
		alert("'Email' cannot be blank.");
		email.style.backgroundColor = "yellow";
	}
	
	else if (emailChecked != 0)
	{
		alert("'Email' is formatted incorrectly.");
		email.style.backgroundColor = "yellow";
	}	
	else if (zip.value.length < 5)
	{
		alert("'Zip-Code' must be 5 digits.");
		zip.style.backgroundColor = "yellow";
	}
	
	else
		result = true;
	


	return result;
}
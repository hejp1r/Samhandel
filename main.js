var submitBtn = document.getElementById('form').onsubmit = validateForm;

function validateForm()
 {
    var namn = document.getElementById("namn").value;
 	var password = document.getElementById("password").value;
 	var email = document.getElementById("email").value; 
 	var email = document.getElementById("password2").value; 

 	if (namn.trim() == "" || namn == null || email.trim() == "" || email == null || password.trim() == "" || password == null || password2.trim() == "" || password2 == null || password != password2) 
 	{
 		console.log("Felaktig input.");
 		alert("Var god fyll i alla fält");
 		return false;
 	}

 	var afound = false;
 	var dotfound = false;

 	//linn@hot.com 
 	for (var i=0; i < email.length; i++)
 	{
 		if(email[i] == '@')
 			afound = true;
 		if(email[i] == '.' && afound == true)
 			dotfound = true;
 	}
 	if(afound == false || dotfound == false)
 		return false;


 	alert("Registrering godkänd!");
 	return true; 
}

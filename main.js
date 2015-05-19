document.onload = validateForm();

    var namn;
 	var password;
 	var email;
 	var password2;
    var form;

function validateForm()
 {
    namn = document.getElementById("namn");
    password = document.getElementById("password");
 	email = document.getElementById("email"); 
 	password2 = document.getElementById("password2");
    form = document.getElementById("form");
 }


form.addEventListener("submit", function(event){ 
 	if (namn.trim() == "" || namn == null || email.trim() == "" || email == null || password.trim() == "" || password == null || password2.trim() == "" || password2 == null || password != password2) 
 	{
 		console.log("Felaktig input.");
 		alert("Var god fyll i alla fält");
 		event.preventDefault();
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
})


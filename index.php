<!DOCTYPE html>
<html>
	<head>
	<title>SamHandla mera</title>
		<link rel="stylesheet" href= "main.css">
	</head>
	
	<body>
        <?php include("reg.php"); ?>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<div id="container">
			<header>
				<h1>VÄLKOMMEN TILL SAMHANDLA MERA</h1>
				<p> Hej på dig </p>
				<div class = "loggain">
				<label for="namn">Användarnamn:</label> <br/>
			<input type="text" name="name" id="name"/>
			<br/>

			<label for="email">Lösenord: </label> <br />
			<input type="text" name="pass" id="pass"/><br/>
			<input type="submit" name="loggain" id="loggain" value="Logga in" />
			</div>
			</header>
			<div id="banner">
			</div>
			<div id="content2">
			<br/>
			<p> Välkommen att använda tjänsten "SamHandla"! </p> 
			<b/>
                <p>kom ihåg att ta bort den här kommentaren</p>
			<p>
				Tjänsten bygger på att ni, sambos eller vänner, kan skapa gemensamma shoppinglistor. Ska ni ha fest? - Ja men varför inte låta alla skriva in vad som behövs? Då glöms inget bort. 
			</p> <!-- här kommer en till -->
			<fieldset>
					<legend> Var god registrera dig</legend>
				
                <form action="index.php" method="post">
				    <label for="namn">Användarnamn:</label> <br/>
			         <input type="text" name="namn" id="namn"/><br/>
                <label for="email">Lösenord: </label> <br />
			 <input type="text" name="password" id="password"/><br/>
			
				<label for="namn">Upprepa lösenord: </label> <br/>
			<input type="text" name="password2" id="password2"/>
			<br/>

			<label for="email">E-postadress:</label> <br />
			<input type="text" name="email" id="email"/>

				<br/>
				<input type="submit" name="reg" id="reg" value="Registrera" />
				<br/>
                </form>
			</fieldset>
				</div>	
			<div id="content">	
			</div>
		</div>	

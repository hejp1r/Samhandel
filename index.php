<!DOCTYPE html>
<html>
	<head>
	<title>SamHandla mera</title>
		<link rel="stylesheet" href= "main.css">
		<script src="main.js"></script>
	</head>
	
	<body>
        <?php include("processreg.php")?>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<div id="container">
			<header>
				<h1>VÄLKOMMEN TILL SAMHANDLA MERA</h1>
				<div class = "loggain">
                    <form action="login.php" method="post" id="form1">
                        <label for="anamn">Användarnamn:</label> <br/>
                        <input type="text" name="anamn" id="anamn"/><br>
                        <label for="pass">Lösenord: </label> <br>
                        <input type="text" name="pass" id="pass"/><br>
                        <input type="submit" name="loggain" id="loggain" value="Logga in"><br>
                    </form>
			</div>
			</header>
			<div id="banner">
			</div>
			<div id="content2">
			<br/>
			<p> Välkommen att använda tjänsten "SamHandla"! </p> 
			<b/> 
			<p>
				Tjänsten bygger på att ni, sambos eller vänner, kan skapa gemensamma shoppinglistor. Ska ni ha fest? - Ja men varför inte låta alla skriva in vad som behövs? Då glöms inget bort. 
			</p>
			<form id="form" name="form" method="POST" action="">
                <fieldset>
                    <legend> Var god registrera dig</legend>
                    <label for="namn">Användarnamn:</label> <br>
                    <input type="text" name="namn" id="namn"/><br>
                    <label for="password">Lösenord: </label><br>
                    <input type="text" name="password" id="password"><br>
                    <label for="password2">Upprepa lösenord: </label> <br>
                    <input type="text" name="password2" id="password2"><br>
                    <label for="email">E-postadress:</label> <br>
                    <input type="text" name="email" id="email"><br>
				    <input type="submit" name="reg" id="reg" value="Registrera"><br>
			</fieldset>
			</form>
				</div>	
			<div id="content">	
			</div>
		</div>	
		</body>
		</html>

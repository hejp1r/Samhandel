<!DOCTYPE html>
<html>
	<head>
		<title>SamHandla mera</title>
		<link rel="stylesheet" href= "../css/main.css">
	</head>
	<body>
        <?php
		if(isset($_GET['message'])){
    		$message = $_GET['message'];
    		echo "<script>alert('$message');</script>";
		}
		?>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
			
			<header>
				<div class = "loggain">
                    <form action="../processes/login.php" method="post" id="form1">
                        <label for="anamn">Användarnamn:</label> <br/>
                        <input type="text" name="anamn" id="anamn"/><br>
                        <label for="pass">Lösenord: </label> <br>
                        <input type="password" name="pass" id="pass"/>
                        <input type="submit" name="loggain" id="loggain" value=">>">
                    </form>
				</div>

				<h1>VÄLKOMMEN TILL SAMHANDLA</h1>
				</header>
			<div id="banner">
			</div>
			<div id="content2">
				<br/>
			
			<fieldset>
				<p class='intro'>Tjänsten bygger på att ni, sambos eller vänner, <br/>kan skapa gemensamma shoppinglistor. Ska ni ha fest? <br/>- Ja men varför inte låta alla skriva in vad som behövs? <br/> Då glöms inget bort och alla blir nöjda. 
					
				</p>
			</fieldset>
		
			<form id="form" name="form" method="POST" action="../processes/processreg.php">
                <fieldset>
                    <legend> Var god registrera dig</legend>
                    <label for="namn">Användarnamn:</label> <br>
                    <input type="text" name="namn" id="namn"/><br>
                    <label for="password">Lösenord: </label><br>
                    <input type="password" name="password" id="password"><br>
                    <label for="password2">Upprepa lösenord: </label> <br>
                    <input type="password" name="password2" id="password2"><br>
                    <label for="email">E-postadress:</label> <br/>
                    <input type="text" name="email" id="email"><br/>
				    <input type="submit" name="reg" id="reg" value="Registrera">
			</fieldset>
			</form>
			</div>	
		<script src="../js/main.js"></script>	
		</body>
		</html>
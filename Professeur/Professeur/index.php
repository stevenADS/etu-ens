<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"  href="app.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>connexion</title>
    <div class="header">
    <a href="https://stev-trom-educ.alwaysdata.net" class="logo">Administration</a>
    <div class="header-right">

        <a class="active" href="#home">Home</a>
        <a href="index.php">connexion</a>
        <a href="inscription.php">Inscription</a>
 
        
    </div>
    </div>
</head>
<body>
    <div class="w3-container w3-center w3-animate-top">
    <h1>Espace connexion</h1>
    <p>Entrer vos mail et mot de passe </p>
    </div>

	<table align="center">
            <tr>		
                <td width="80%">
                    <fieldset class ="carte">
                
                        <legend><h2>Connexion</h2> </legend> 
                        <div>


	<form  method="get" action="login.php">

			<table>

			<td><br><label>Entrer votre :</label></td>
			<tr>
				<td><input placeholder="Votre email" type="text" name="email"/></td>
			</tr>

			<td><br><label>Mot de passe :</label></td>
			<tr>
				<td><input placeholder="Votre mot de passe" type="password" name="password"/></td>
				<br>
			</tr>

			</table>
			<br><br>

			<input type="submit" name="valider" value="Se connecter" id="button"/>					   
		</form>

		<br><br>
		<a href="inscription.php">S'inscrire</a>
		<br><br><br>

		</div>

	</body>
</html>


	
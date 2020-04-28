<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"  href="app.css">
    <title>connexion</title>
    <div class="header">
    <a href="#default" class="logo">Trombinoscope</a>
    <div class="header-right">
        <a class="active" href="#home">Home</a>
        <a href="connexion.php">connexion</a>
        <a href="index.php">Inscription</a>
    </div>
    </div>
</head>
<body>
 
<body>
     <h1> votre profit </h1>
        <div class="cadre">
        <p> Selectionnez votre image de profit </p>
    <form class="upload" method="post" enctype="multupart/form-data" action="profit.php">
    <input type="file" name="fichier" size="30">
    <input type="submit" name=" upload" value="Uploarder">
    </form>

    
        <?php 
			$RecupFichier=file("etu.csv");
			$tab=array();
			for ($i=0; $i < sizeof($RecupFichier) ; $i++) { 
				$List=explode(";", $RecupFichier[$i]);
				if ($_SESSION['email']== $List[2]){
					$donnes=$List;
				}
            }
      
            $_SESSION['nom']=$donnes[0];
            $_SESSION['prenom']=$donnes[1];

		?>


            <h2> fichie de renseignement de <?php echo $donnes[1]; ?> </h2>





    <form method="get" action="">  
    <table>
			<tr>
				<td><label id="labelinfo">Nom :</label></td>
				<td><input placeholder="<?php echo $donnes[0]; ?>" type="text" name="nom" id="inputinfo"/></td>
			</tr>
			<tr>
				<td><br><br><label id="labelinfo">Prénom :</label></td>
				<td><br><br><input placeholder="<?php echo $donnes[1]; ?>" type="text" name="prenom" id="inputinfo"/></td>
			</tr>
			<tr>
				<td><br><br><label id="labelinfo">E-mail :</label></td>
				<td><br><br><input placeholder="<?php echo $donnes[2]; ?>"  type="email" name="email" id="inputinfo"/></td>
			</tr>
			<tr>
				<td><br><br><label id="labelinfo">Filière :</label></td>
				<td><br><br><input placeholder="<?php echo $donnes[4]; ?>" type="password" name="password" id="inputinfo"/></td>
			</tr>
			<tr>
				<td><br><br><label id="labelinfo">Groupe :</label></td>
				<td><br><br><input placeholder="<?php echo $donnes[5]; ?>" type="password" name="password" id="inputinfo"/></td>
			</tr>	
		</table>
		<br><br><br>
		<input type="submit" value="Enregistrer" id="button"/>
    </form>
        <a href="modif.html"> cliquer pour modifier vos infos <
</body>
</html>
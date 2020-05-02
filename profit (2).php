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
        <a href="inscriptEtu.php">Inscription</a>
    </div>
    </div>
</head>
<body>
 

     <h1> votre profit </h1>
        <div class="cadre">
        <p> Selectionnez votre image de profit </p>
    <form class="upload" method="post" enctype="multupart/form-data" action="profit.php">
    <input type="file" name="fichier" size="30">
    <input type="submit" name=" upload" value="Uploarder">
		</form>
	<?php
		$fichier = "etu.csv";
	function save($fichier){
		$lines = file($fichier);
		$line_saved ='';
		for($i=0;$i<sizeof($lines);$i++){   
			$line = $lines[$i];
			$t = explode(",", $line);
			if ($t[0] != $_SESSION['login']){ 
				$line_saved = $line_saved.$line;
				$content = $line_saved;
			}
		}
		return $content;
	}
	$lines = file($fichier);
	$line_saved ='';


	for($i=0;$i<sizeof($lines);$i++){   
		$line = $lines[$i];
		# remove new line character
		//$line = str_replace("\n","",$line);
		$t = explode(",", $line);
		$new_line = $t[0].",".$t[1].",".$_POST["nom"].",".$_POST["prenom"].",".$_POST["filiere"].",".$_POST["groupe"].",".$t[6];
		if (isset($_POST["prenom"]) and isset($_POST["nom"])){
			if ($t[0] != $_SESSION['login']){ 
				$content = save($fichier);
			}
			
			elseif( $t[2] != $_POST["nom"] or $t[3] != $_POST["prenom"] or $t[4] != $_POST["filiere"] or $t[5] != $_POST["groupe"] or isset($_FILES['avatar']) AND !empty($_FILES['avatar']['name']))
				{
				if (isset($_FILES['avatar']) AND !empty($_FILES['avatar']['name']))
				{
					$tailleMax = 2097152;
					$extensionsValides = array('jpg', 'jpeg', 'gif', 'png');
					if($_FILES['avatar']['size'] <= $tailleMax)
					{
						$extensionUpload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));
						if(in_array($extensionUpload, $extensionsValides))
					{   
							$chemin = "photo/".$t[0].".".$extensionUpload;
							$resultat = move_uploaded_file($_FILES['avatar']['tmp_name'], $chemin);
							$fichier_end = fopen($fichier,"w");
							$n_line = $t[0].",".$t[1].",".$_POST["nom"].",".$_POST["prenom"].",".$_POST["filiere"].",".$_POST["groupe"].",".$chemin;
							$content=$content.$n_line;
							fwrite($fichier_end, $content);
							fclose($fichier_end);
							$_SESSION['photo']= $chemin;
							$message = "Vos modification ont bien été prise en compte";
						}
						else
						{
							$message_erreur = "Votre photo de profil doit être au format jpg, jpeg, gif ou png ";
						}
					}   
					else
					{
						$message_erreur = "Votre photo de profil ne doit pas dépasser 2Mo ";
					}
					

					?>
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
        <a href="modif.html"> cliquer pour modifier vos infos</a>
</body>
</html>
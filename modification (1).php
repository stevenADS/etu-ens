<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Modification des données</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<h1>Modification des informations personnelles</h1>
	<?php
		$fichier = fopen("etu.csv","r");
		$modif_contenu="";
		$newline = $_GET["nom"].";".$_GET["prenom"].";".$_GET["email"].";".md5($_GET["email"].$_GET["password"]).";".$_GET["filiere"].";".$_GET["groupe"]."\n";
		while (($line = fgets($fichier))!== FALSE) {
			$num_line=explode(";", $line);
			if ($_GET["email"]==$num_line[2]) {

				$modif_contenu = $modif_contenu . $newline;

			}
			else
			{
				$modif_contenu = $modif_contenu . $line;
			}
		}
		fclose($fichier);
		$modif_fichier=fopen("etu.csv", "w");
		fputs($modif_contenu,$modif_contenu);
		fclose($modif_fichier);
		echo "Vos données sont modifiés";
		exit()
	?>
</body>
</html>
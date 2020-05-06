<?php
session_start();
function logs(){
  $date = "[".date('d')."/".date('m')."/".date('y')."] ";
  $hour = "[".date('H').":".date('i').":".date('s')."] ";
  $ip = $_SERVER['REMOTE_ADDR'];
  $url = $_SERVER['PHP_SELF'];
  $answer = $date.$hour.$ip." connecte to ".$url."\n";

  $files = fopen('./data/logs/logs.txt', 'a+');
  fputs($files,$answer);
  fclose($files);
}
logs();
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Connexion</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="subpage">

		<!-- Header -->
				<header id="header">
					<div class="inner">
						<a href="index.html" class="logo"><strong>Projet</strong> Trombinoscope</a>
						<nav id="nav">
							<a href="deconnexion.php">Deconnexion</a>
							<a href="connexion.php">Connexion</a>
							<a href="inscription.php">Inscription</a>
						</nav>
						<a href="#navPanel" class="navPanelToggle"><span class="fa fa-bars"></span></a>
					</div>
				</header>
	        
	    </div>					<h2>Votre profil</h2>

   						 <div class="image round left">
						<img src="images/pic01.jpg" alt="Pic 01" />
					</div>
</head>
<body>
	 <div class="cadre">
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


            <h2> fiche de renseignement de <?php echo $donnes[1]; ?> </h2>



		


    <form method="get" action="modification.php">  
	<table align="center">
		<tr>		
			<td width="80%">
				<fieldset class ="cadre">
					<div>
    <table>

			<tr>
				<td><label>Nom :</label></td>
				<td><input value="<?php echo $donnes[0]; ?>" type="text" name="nom"/></td>
			</tr>
			<tr>
				<td><br><br><label>Prénom :</label></td>
				<td><br><br><input value="<?php echo $donnes[1]; ?>" type="text" name="prenom"/></td>
			</tr>
			<tr>
				<td><br><br><label>E-mail :</label></td>
				<td><br><br><input value="<?php echo $donnes[2]; ?>"  type="email" name="email"/></td>
			
			</tr>
			<tr>
				<td><br><br><label>mot de passe :</label></td>
				<td><br><br><input placeholder ="votre mot de passe" type="password" name="password" required /></td>
			</tr>	
			<tr>
				<td><br><br><label>Filière :</label></td>
				<td><br><br><input value="<?php echo $donnes[4]; ?>" type="text" name="filiere"/></td>
			</tr>
			<tr>
				<td><br><br><label>Groupe :</label></td>
				<td><br><br><input value="<?php echo $donnes[5]; ?>" type="text" name="groupe"/></td>
			</tr>	
		</table>
		<br><br><br>
		<input type="submit" value="Enregistrer" id="button"/>
    </form>
      		
	</div>

</fieldset>
</td>
</tr>
</table>

</form>
</div>



		<!-- Footer -->
			
			<footer id="footer">
			Tous droits réservés. Copyright © 2019-2020 <br>
			<p> Steven AD</p>
			</footer>

	

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>

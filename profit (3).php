<?php session_start();?>
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
							<a href="index.html">Accueil</a>
							<a href="Connexion.html">Connexion</a>
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
				<td><label id="labelinfo">Nom :</label></td>
				<td><input value="<?php echo $donnes[0]; ?>" type="text" name="nom" id="inputinfo"/></td>
			</tr>
			<tr>
				<td><br><br><label id="labelinfo">Prénom :</label></td>
				<td><br><br><input value="<?php echo $donnes[1]; ?>" type="text" name="prenom" id="inputinfo"/></td>
			</tr>
			<tr>
				<td><br><br><label id="labelinfo">E-mail :</label></td>
				<td><br><br><input value="<?php echo $donnes[2]; ?>"  type="email" name="email" id="inputinfo"/></td>
			</tr>
			<tr>
				<td><br><br><label id="labelinfo">Filière :</label></td>
				<td><br><br><input value="<?php echo $donnes[4]; ?>" type="text" name="filiere" id="inputinfo"/></td>
			</tr>
			<tr>
				<td><br><br><label id="labelinfo">Groupe :</label></td>
				<td><br><br><input value="<?php echo $donnes[5]; ?>" type="text" name="groupe" id="inputinfo"/></td>
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

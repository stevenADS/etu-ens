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
		<title>Inscription</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="subpage">

		<!-- Header -->
			<header id="header">
				<div class="inner">
					<a href="index.html" class="logo"><strong>propjet </strong>Trombinoscope</a>
    					<nav id="nav">
    						  <a href="index.html">Accueil</a>
                            <a href="connexion.php">Connexion</a>
                            <a href="inscription.php">Inscription</a>
					</nav>
					<a href="#navPanel" class="navPanelToggle"><span class="fa fa-bars"></span></a>
				</div>
			</header>

		<!-- Three -->
			<section id="three" class="wrapper">
				<div class="inner">
					<header class="align-center">
						<h2>Inscription</h2>
				
					</header>
					<div class="image round left">
						<img src="images/pic01.jpg" alt="Pic 01" />
					</div>
					
					 <table align="center">
            <tr>		
                <td width="80%">
                    <fieldset class ="carte">
                
                        <legend><h2>formulaire d'inscription</h2> </legend> 
                        <div>

        
                        
                        <form method="get" action="inscription.php">
                            <p>Nom:  <br/> <input required  minlength="3" type="text" name="nom"/> </p>
                            <p>Prénom:  <br/> <input required  minlength="3" type="text" name="prenom"/> </p>
                            <p>Email:  <br/> <input required  type="email" name="email"/> </p>
                            <p>Mot de passe: <br/> <input required  minlength="8" type="password" name="password"/> </p>
                            
                            <p>Filiere: <br/> </p>
                            <select name="filiere">
                                <option name ='filiere' value='L1-MIPI'>L1-MIPI</option>
                                <option name ='filiere' value='L2-MI'>L2-MI</option>
                                <option name ='filiere' value='L3-I'>L3-I</option>
                                <option name ='filiere' value='LP-RS'>LP-RS</option>
                                <option name ='filiere' value='LPI-WS'>LPI-WS</option>
                            </select>
                            <p>Groupe: <br/></p>
                            <select name="groupe">
                                <option name ='groupe' value='A1'>A1</option>
                                <option name ='groupe' value='B2'>B2</option>
                                <option name ='groupe' value='LPI-1'>LPI-1</option>
                                <option name ='groupe' value='LPI-2'>LPI-2</option>
                                <option name ='groupe' value='LPI-3'>LPI-3</option>
                            </select>
                            <br><br>
                            <input type="submit" name="valider" value="Cliquer pour afficher vos informations "/>            

                            </form>

                                  <?php
                                function inscription(){
                                if (isset($_GET['email'])){
                                $contenu=file('etu.csv');
                                $found= FALSE;
                                for ($i=0; $i < sizeof($contenu) ; $i++) { 
                                    $Clignes= explode(";", $contenu[$i]);
                                    $Clignes[1]=str_replace("\n","",$Clignes[1]);
                                    if ($_GET['email']==$Clignes[2] && md5($_GET['email'].$_GET['password'])==$Clignes[3]) {
                                        $found=TRUE;
                                    }
                                    
                                }
                                if ($found==TRUE){
                                    echo "Utilisateur déjà enregistré";
                                    
                                }
                                else{

                                    $Fecriture= fopen("etu.csv", "a");
                                    fwrite($Fecriture, $_GET['nom'].";".$_GET['prenom'].";".$_GET['email'].";".md5($_GET['email'].$_GET['password']).";".$_GET['filiere'].";".$_GET['groupe'].";"."\n");
                                    fclose($Fecriture);                                                       
                                    echo "Vous etes bien inscrit !";	  
                                    
                                } 
                            }
                                }
                            inscription();
                            
                                ?>
                                <br><br>
                 <a href="connexion.php">Se connecter</a>
                <br><br>    
                            
        

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
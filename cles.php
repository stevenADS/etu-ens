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
		<title>Clé</title>
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
						<a href="connexion.php">Connexion</a>
						<a href="inscription.php">Inscription</a>
					</nav>
					<a href="#navPanel" class="navPanelToggle"><span class="fa fa-bars"></span></a>
				</div>
			</header>
        
    </div>
    </div>
</head>
<body>
	<div class="cadre"></div>
     <h1>  Entrer votre mail pour obtenir votre Clé </h1>
    <form action="api_mail.php" method="get">
        entrer votre mail:<input type="mail" name="Mail_Api">
        <input type="submit" name="sub" value="Clés">
    </form>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>
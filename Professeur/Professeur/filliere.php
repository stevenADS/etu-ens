<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"  href="app.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Trombinoscope</title>
    <div class="header">
    <a href="https://stev-trom-educ.alwaysdata.net" class="logo">Trombinoscope</a>
    <div class="header-right">

        <a class="active" href="#home">Home</a>
        <a href="index.php">connexion</a>
        <a href="inscriptEtu.php">Inscription</a>
 
        
    </div>
<body>
<h1>Trombinoscope</h1>
<nav>
		<a href="#">L1-MIPI</a>
			
				<a href="filliere.php?filliere=L1-MIPI&groupe=A1&key=nouUouANxk">L1-MIPI-A1</a>
	  			<a href="filliere.php?filliere=L1-MIPI&groupe=B2&key=nouUouANxk">L1-MIPI-B2</a>
			

	
	  	<a href="#">LPI-WS</a>
			
				<a href="filliere.php?filliere=LPI-WS&groupe=LPI-1&key=nouUouANxk">LPI-L1</a>
				<a href="filliere.php?filliere=LPI-WS&groupe=LPI-2&key=nouUouANxk">LPI-L2</a>
				<a href="filliere.php?filliere=LPI-WS&groupe=LPI-3&key=nouUouANxk">LPI-L3</a>
		


			<a href="#">LP-RS</a>
  		
				<a href="filliere.php?filliere=LP-RS&groupe=LPI-1&key=nouUouANxk">LP-RS-LPI-1</a>
				<a href="filliere.php?filliere=LP-RS&groupe=LPI-2&key=nouUouANxk">LP-RS-LPI-2</a>
				<a href="filliere.php?filliere=LP-RS&groupe=LPI-3&key=nouUouANxk">LP-RS-LPI-3</a>
  			

		<a href="#">L2-MI</a>
  		
		  		<a href="filliere.php?filliere=L2-MI&groupe=A1&key=nouUouANxk">L2-MI-A1</a>
		  		<a href="filliere.php?filliere=L2-MI&groupe=B2&key=nouUouANxk">L2-MI-B2</a>
	
    

    	<a href="#">L3-I</a>
			
				<a href="filliere.php?filliere=L3-I&groupe=A1&key=nouUouANxk">L3-I-A1</a>
				<a href="filliere.php?filliere=L3-I&groupe=B2&key=nouUouANxk">L3-I-B2</a>
			
     

</nav>

	<h2>Les etudiants  de <?php echo $_GET['filliere']. " du " . $_GET['groupe']?></h2>
	<table align="center">
		<tr>
			<th>Nom</th>
			<th>Prenom</th>
			<th>Email</th>
		</tr>
	<?php
	//https://steven-adji.yo.fr/api.php?filliere=L1-MIPI&groupe=A1&key=O6VuXp5qOI

	if(isset($_GET['filliere'])){
		$recup_data = file_get_contents('https://steven-adji.yo.fr/api.php?filliere='.$_GET['filliere'].'&groupe='.$_GET['groupe'].'&key=nouUouANxk');
		$donnees = json_decode($recup_data,true);
		$number = count($donnees["etudiant"]);
		for ($i=0; $i <$number ; $i++) {
				echo 
				"<tr>
				<td> ".$donnees["etudiant"][$i]['nom']."  </td>
				<td> ".$donnees["etudiant"][$i]['prenom']." </td>
				<td> ".$donnees["etudiant"][$i]['email']."</td>
				</tr>
				";
		}
		
	}


?>
</table>
<style>
	nav {
	height: 100%;
  width: 300px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  padding-top: 18px;
}

nav a,nav p {
  	padding: 6px 8px 6px 16px;
  	text-decoration: none;
  	font-size: 25px;
  	color: #818181;
  	display: block;
}
nav p{
	text-decoration: none;
	margin-top: 60%;
	font-size: 15px;
}
</style>

			
</body>
</html>

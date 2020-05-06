<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"  href="app.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>connexion</title>
    <div class="header">
    <a href="https://stev-trom-educ.alwaysdata.net" class="logo">Trombinoscope</a>
    <div class="header-right">

        <a class="active" href="#home">Home</a>
        <a href="index.php">connexion</a>
        <a href="inscriptEtu.php">Inscription</a>
 
        
    </div>

<body>

<table>

   
<?php 

  $recup_data = file_get_contents('http://steven-adji.yo.fr/api.php');
  $data = json_decode($recup_data,true);
  for ($i=0; $i < 4 ; $i++) { 
  }

?>
</table>
<p> <a href="filliere.php"> Afficher le Trombinoscope </p>
</body>
</html>

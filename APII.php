<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>clé api</title>
</head>
<body>
    <h1>  Demande de clé API </h1>
    <form action="APII.php" method="get">
        entrer votre mail:<input type="mail" name="Mail_Api">
        <input type="submit" name="sub" value="valider">
    </form>
</body>
</html>

<?php
function randomCle(){
    $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $longueurMax = strlen($caracteres);
    $chaineAlea = '';
    for($i = 0; $i <$longueur; $i++){
$chaineAlea .= $caracteres[rand(0, $longueurMax - 1)];

}
return $chaineAlea;
}


function apiMail(){
    $RecupFich=file('api.csv');
    $api="";
    for($i=0; $i < sizeof($RecupFich); $i++){
        $ligne=explode(";" , $RecupFich[$i]);
        if($mail==$ligne[0]){
            $api=$ligne[1];
        }
    }
    return $api;  
}
$apiCle=random(10);
$mail='';
if(isset($_GET['Mail_Api'])){
    $mail=$_GET['Mail_Api'];
    if(apiMail($mail)){
        echo "<p> voila votre Clé: " .apiMail($mail)."</p>";
    }
    else{
        $write_ligne="$mail;$apiCle;\n";
        $fichier=fopen('api.csv' , 'a');
        fwrite($fichier, $write_ligne);
        echo"<p> voila votre clé: ".$apiCle."</p>";
    }
}

?>

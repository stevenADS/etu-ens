<!DOCTYPE HTML>
<html>
	<head>
		<title>login</title>
		<meta charset="utf-8" />
	<body>
		    <?php
function inscription(){
	if (isset($_GET['email'])){
	$contenu=file('comptes.csv');
	$found= FALSE;
	for ($i=0; $i < sizeof($contenu) ; $i++) { 
		$Clignes= explode(";", $contenu[$i]);
		$Clignes[1]=str_replace("\n","",$Clignes[1]);
		if ($_GET['email']==$Clignes[2] && md5($_GET['mail'].$_GET['password'])==$Clignes[3]) {
	        $found=TRUE;
	    }
	    
	}
	if ($found==TRUE){
	    echo "Utilisateur déjà enregistré";
	    
	}
	else{
		

        $Fecriture= fopen("comptes.csv", "a");
	fwrite($Fecriture, $_GET['nom'].";".$_GET['prenom'].";".$_GET['email'].";".md5($_GET['email'].$_GET['password']).";")

		fclose($Fecriture);	
	   	echo "Utilisateur enregistré.";	    
	        
	}
	
}	
}
inscription();

?>
	</body>
</head>
</html>


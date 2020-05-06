<?php
header('content-type:application/json');
function api($filliere,$groupe){
	$RecupFich=file('etu.csv');
	$etu['name']=$filliere."-".$groupe;
	$etu['etudiant']=array();

	for($i=0;$i <sizeof($RecupFich);$i++){
		$ligne=explode(";", $RecupFich[$i]);
		$tab=array();
		if($filliere==$ligne[4] && $groupe == $ligne[5]){
			$tab[$i]['nom']=$ligne[0];
			$tab[$i]['prenom']=$ligne[1];
			$tab[$i]['email']=$ligne[2];
			$tab[$i]['filliere']=$ligne[4];
			$tab[$i]['groupe']=$ligne[5];
		}
		else{
			continue;
		}
		array_push($etu['etudiant'],$tab[$i]);
	}
	return($etu);
}

function jason($tab){
	return json_encode($tab);
}
function ApiCle($verif){
	$RecupCle=file('api.csv');
	$found=FALSE;
	for($i=0;$i <sizeof($RecupCle);$i++){
		$ligne=explode(";", $RecupCle[$i]);
		if($verif==$ligne[1]){
			$found= TRUE;
		}
	}
		return $found;
}
$apiCle=$_GET['key'];
if(ApiCle($apiCle)){
	$data=api($_GET['filliere'], $_GET['groupe']);
	$json= jason($data);
}
else{
	$erreur="mauvaise cle";
	$json=jason($erreur);
}
echo $json;

?>
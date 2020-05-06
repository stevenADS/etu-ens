    <!DOCTYPE html>
    <html lang="fr">
        <head>
            <title>Inscription des étudiants</title>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <link rel="stylesheet"  href="app.css">
            <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        </head> 
        <div class="header">
      <a href="https://stev-trom-educ.alwaysdata.net" class="logo">Administration</a>
        <div class="header-right">
            <a href="index.php">connnexion</a>
            <a href="inscription.php">inscription</a>
           
        </div>
        </div>

    <body> 

    <div class="w3-container w3-center w3-animate-top">
    <h1>page d'inscription</h1>
    <p>Remplissez le Formulaire d'inscription</p>
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
                           
                            <input type="submit" name="valider" value="Afficher le Trombinoscope "/>            

                            </form>

                                  <?php
                                function inscription(){
                                if (isset($_GET['email'])){
                                $contenu=file('comptes.csv');
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

                                    $Fecriture= fopen("comptes.csv", "a");
                                    fwrite($Fecriture, $_GET['nom'].";".$_GET['prenom'].";".$_GET['email'].";".md5($_GET['email'].$_GET['password']).";".$_GET['filiere'].";".$_GET['groupe'].";"."\n");
                                    fclose($Fecriture);                                                       
                                    echo "Vous etes bien inscrit !";	  
                                    
                                } 
                            }
                                }
                            inscription();
                            
                                ?>
                                <br><br>
                 <a href="index.php">Se connecter</a>
                <br><br>    
                            
        

	</body>
</html>
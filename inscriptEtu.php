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
            <a href="inscriptEtu.php">inscription</a>
            <a href="documentation.html"> API</a>
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

        
                        
                        <form method="get" action="inscriptEtu.php">
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
                                    fwrite($Fecriture, $_GET['nom'].";".$_GET['prenom'].";".$_GET['email'].";".md5($_GET['email'].$_GET['password']).";".$_GET['filiere'].";".$_GET['groupe']."\n");
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
        

                    </fieldset>
                </td>
            </tr>
            </tbody>
        </table>
    </body>
    </html>
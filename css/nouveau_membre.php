<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="nouveau_membre.css"/>
    <title>Nouveau membre</title>
</head>
<body>


<img src="./image/logo_velo.jpg" title="Image Vélo" alt="image velo" id="image1"/>



<?php

include("header.php");

?>

<p id="nouveau"><strong><u>Nouveau membre :</u></strong></p>

</br>


<p id="merci">Merci de bien vouloir renseigner les informations suivantes :</br>
    <form action="premier_connexion.php" method="post">
<p>
    <div>
        <input type="text" name="pe_nom" placeholder="Nom" /></br></br>
        <input type="text" name="pe_prénom" placeholder="Prénom" /></br></br>
        <input type="text" name="pe_adresse" placeholder="Adresse" /></br></br>
        <input type="text" name="me_pseudo" placeholder="Pseudo" /></br></br> 
        <input type="text" name="pe_tel" placeholder="Numéros de téléphone" /></br></br>
        <input type="text" name="pe_mail" placeholder="Adresse mail" /></br></br>
        <input type="password" name="me_mdp" placeholder="Mot de passe"/></br></br>
        Amateur <input type="checkbox" id="Amateur" name="case1" value="Amateur"></br></br>
        Professionnel <input type="checkbox" id="Professionelle" name="case2" value="Professionnel"></br></br>
        <!--<input type="password" name="me_mdp" placeholder="Confirmation" /></br></br>-->
        <input type="submit" value="Valider" />
    </div>
</p>
</form>
</br>

    <p id="valider">Veuillez valider le <strong>consentement</strong> pour l'exploitation de vos données à caractère personnel :</p>



<?php
include("footer.php");

?>
</body>
</html>
<?php session_start();?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="Nouveau_epreuve.css"/>
    <title>Nouveau membre</title>
</head>
<body>


<img src="./image/logo_velo.jpg" title="Image Vélo" alt="image velo" id="image1"/>



<?php

include("header.php");

?>


<form action="premier_connexion_epreuve.php" method="post">
    <p id="epreuve"><strong><u>Inscription à une épreuve :</u></strong></p>

    <p id="Choix1">Veuillez choisir saisir vos nom puis saisir une epreuve <p>
    <div>
        <input type="text" name="pe_nom" placeholder="Nom" /></br></br>
        <input type="text" name="pe_prénom" placeholder="Prénom" /></br></br>
        <input type="text" name="me_pseudo" placeholder="Pseudo" /></br></br> 
    <div>

    <p id="Choix0">Veuillez choisir le type d'epreuve <p>

<div>
        <select id="sport" name="typep_nom">
            <option value="Vélo" name="Vélo"> Vélo</option>
            <option value="Course à pied"name="Course à pied"> Course à pied</option>
            <option value="Natation"name="Natation"> Natation</option>
            <option value="Bateau"name="Bateau"> Bateau</option>
        </select> </br>
</div>

<p id="Choix2">Veuillez choisir votre taille <p>

<div>
        <select id="taille" name="ins_taille_maillot">
            <option value="L" name="L"> L</option>
            <option value="M" name="M"> M</option>
            <option value="S" name="S"> S</option>
            <option value="XL" name="XL"> XL</option>
            <option value="XS" name="XS"> XS</option>
        </select> </br>
</div>


    <p id="Choix7">Veuillez choisir un parcours <p>
<div>
        <select id="parcours" name="ep_nom">
            <option value="Arkétop" name="Arkétop" value="Arkétop"> Arkétop</option>
            <option value="choix2" name="Parcours 9"> Parcours2</option>
            <option value="choix3" name="Parcours 10"> Parcours3</option>
            <option value="choix4"> Parcours4</option>
        </select></br>
</div>

<p id="Choix9">Avez-vous votre certification médical? <p>
<div>
<label for="oui">Oui</label>
    <input type="radio" id="oui" name="reponse" value="Oui">
    <br>
    <label for="non">Non</label>
    <input type="radio" id="non" name="reponse" value="Non">
    <br><br>
</div>

    <input type="submit" value="Valider" />
</form>

<?php
include("footer.php");

?>
</body>
</html>
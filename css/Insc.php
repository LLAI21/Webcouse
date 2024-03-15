<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="Incs-css.css"/>
    <title>Informations club</title>
</head>
<body>

<img src="./image/logo_velo.jpg" title="Image Vélo" alt="image velo" id="image1"/>

<?php

include("header.php");

?>

<p id="Choose"><strong><h3>Inscription à une epreuve</h3></strong>
<form action="Incs_connexion.php" method="post">
<p>
    <div>
        <select id="Information_incription"></select>
            <br>
            <input type="text" name="ins_date" placeholder="Date d'inscription"><br>
            <input type="text" name="ins_carte_licencier" placeholder="Carte Licencier"><br>
            <input type="text" name="ins_taille_maillot" placeholder="Taille du maillot"><br>
            <input type="file" name="ins_certificat_medical" placeholder="Certificat médical"><br>
            <input type="submit" value="Validez">
    </div>
</p>
</form>

    </select>
</div>

<?php
include("footer.php");

?>
</body>
</html>
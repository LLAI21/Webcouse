<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="Info_club.css"/>
    <title>Informations club</title>
</head>
<body>

<img src="./image/logo_velo.jpg" title="Image Vélo" alt="image velo" id="image1"/>

<?php

include("header.php");

?>

<strong><h1>Information club<h1><strong>
<i>Si vous voulez regarder les sport que vous êtes intéressé, veuillez trouver les infos ci-dessous: </i>

<table>
      <tr>
        <th>Date</th>
        <th>Lieu</th>
        <th>Parcours</th>
        <th>Distance</th>
        <th>Montant de<br/> l'inscription</th>
        <th>Section</th>
      </tr>
      <tr>
        <td>15/05/2020</td>
        <td>Paris</td>
        <td>Parcours 10</td>
        <td>42km</td>
        <td>50 euros</td>
        <td>Adulte</td>
      </tr>
      <tr>
        <td>06/07/2020</td>
        <td>Lyon</td>
        <td>Parcours 3</td>
        <td>12km</td>
        <td>30 euros</td>
        <td>Enfant</td>
      </tr>

    </table>

<?php 

include("footer.php");


?>





</body>
</html>
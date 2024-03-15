<?php session_start();?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="Calendrier.css"/>
    <title>Calendrier évènementiel</title>
</head>
<body>

<img src="./image/logo_velo.jpg" title="Image Vélo" alt="image velo" id="image1"/>

    <?php

    include("header.php");

    ?>

<div style="width: 50%; margin: 0 auto;">
<h1><b> Calendrier évènementiel </b></h1>
</div>

<table>
      <tr>
        <th>Date</th>
        <th>Lieu</th>
        <th>Parcours</th>
        <th>Distance</th>
        <th>Montant de<br/> l'inscription</th>
      </tr>
      <tr>
        <td>15/05/2020</td>
        <td>Paris</td>
        <td>Parcours 10</td>
        <td>42km</td>
        <td>50 euros</td>
      </tr>

    </table>



<?php 

 include("footer.php");

 ?>
    
</body>
</html>
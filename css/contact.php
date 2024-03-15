<?php session_start();?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="contact.css"/>
    <title>Contact</title>
</head>
<body>



<img src="./image/logo_velo.jpg" title="Image Vélo" alt="image velo" id="image1"/>

    <?php

    include("header.php");

    ?>
<p id="contactez"><u>Contact :</u></p>

<img src="080_HL_ANOWAK_1246515.jpg" title="Plan d'accès" alt="Image plan d'accès" id="image4"/>

<p id="adresse">
  <strong>Adresse:</strong> 11 Av. du Tremblay, 75012 Paris </br>
  <strong>Ville: </strong> Paris 12ème
</p>

<section>
  <p>Contacter les fondateurs de l'association:</p>

  <p class="coordonees">
    E-mail : <a href="mailto:jim@rock.com">jim@rock.com</a><br>
    Téléphone : <a href="tel:+33615552368">0606063228</a>
  </p>
</section>

    <?php 

    include("footer.php");

    ?>
</body>
</html>
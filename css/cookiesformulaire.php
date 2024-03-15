<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="cookies formulaire.css"/>
    <title>Nouveau membre</title>
</head>
<body>


<img src="./image/logo_velo.jpg" title="Image Vélo" alt="image velo" id="image1"/>



<?php

include("header.php");

?>
<body>
	<h1>Personnalisation des cookies</h1>
	<p>Veuillez sélectionner les types de cookies que vous souhaitez accepter :</p>
	<form action="cookies co.php" method="post">
		<input type="checkbox" name="strictement_necessaires" id="strictement_necessaires">
		<label for="strictement_necessaires">Cookies strictement nécessaires</label><br>

		<input type="checkbox" name="performance" id="performance">
		<label for="performance">Cookies de performance</label><br>

		<input type="checkbox" name="fonctionnalite" id="fonctionnalite">
		<label for="fonctionnalite">Cookies de fonctionnalité</label><br>

		<input type="checkbox" name="ciblage_marketing" id="ciblage_marketing">
		<label for="ciblage_marketing">Cookies de ciblage marketing</label><br>

		<input type="checkbox" name="autres_cookies" id="autres_cookies">
		<label for="autres_cookies">Autres cookies / Cookies inconnus</label><br>

		<input type="submit" value="Valider">
	</form>
	
	<?php
		if($_SERVER['REQUEST_METHOD'] == 'POST') {
			// Traitement du formulaire ici
			// Par exemple, on peut enregistrer les choix de l'utilisateur dans un cookie ou une base de données
			// Ici, on se contente d'afficher un message pour indiquer que le formulaire a été envoyé
			echo "<p>Vos choix de cookies ont été enregistrés.</p>";
		}
	?>
</body>
</html>
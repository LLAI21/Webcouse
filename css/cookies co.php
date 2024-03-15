<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="cookies co.css"/>
    <title>Nouveau membre</title>
</head>
<body>


<img src="./image/logo_velo.jpg" title="Image Vélo" alt="image velo" id="image1"/>



<?php

include("header.php");

?>

<p>Bienvenue sur le site webcourses</p>
<p>Pour revenir à la page d'acceuil, <a href="main.php"><p>Cliquez ici</a> </p>
<p>Veillez paramétrer vos cookies </p>
<?php
try {
    //Connexion à la base de donnée
    $bdd = new pdo('mysql:host=localhost;dbname=webcourses;charset=utf8', 'root', 'root');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo ("Connexion réussi");
}
catch(Exeption $e)
{
    die('Erreur de connexion : ' . $e->getMessage());
}

$reponse = $bdd->query('select * from consentement_cookie'); //Lecture des données
//On affiche chaque entrée obtenue
if ($reponse->rowCount() > 0) 
{
    while ($donnees = $reponse->fetch()) //Récupération des données
    {
    ?>
    <p> 
            Identifiant du cookies: <?php echo $donnees['cok_id']; ?><br />
            Type de cookies: <?php echo $donnees['cok_type_consentement']; ?><br />
            Cookies necessaire: <?php echo $donnees['cok_necessaire']?><br />
            Cpokies performance: <?php echo $donnees['cok_performance']; ?><br />
            Fonctionnalité du cookies: <?php echo $donnees['cok_fonctionnalite']; ?><br />
            Cookies marketing: <?php echo $donnees['cok_marketing']; ?><br />
            Autres cookies: <?php echo $donnees['cok_autres']; ?><br />
            Identifiant du membre: <?php echo $donnees['me_id']; ?><br />

    </p>

            <?php
    }
} 
else 
{
    header('Location: cookiesformulaire.php');
    exit();
}

    $reponse->closeCursor()
    ?>



<?php
include("footer.php");

?>
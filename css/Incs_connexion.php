<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="Incs_co.css"/>
    <title>Nouveau membre</title>
</head>
<body>


<img src="./image/logo_velo.jpg" title="Image Vélo" alt="image velo" id="image1"/>



<?php

include("header.php");

?>

<p>Bienvenue sur le site webcourses</p>
<p>Pour revenir à la page d'acceuil, <a href="main.php"><p>Cliquez ici</a> </p>
<p>Partie pour vous inscrire aux épreuves </p>
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

$reponse = $bdd->query('select * from inscrire'); //Lecture des données
//On affiche chaque entrée obtenue
if ($reponse->rowCount() > 0) 
{
    while ($donnees = $reponse->fetch()) //Récupération des données
    {
    ?>
    <p> 
            Identifiant de l'epreuve: <?php echo $donnees['ep_id']; ?><br />
            Date inscription: <?php echo $donnees['ins_date']; ?><br />
            Taille du maillot: <?php echo $donnees['ins_taille_maillot']; ?><br />
            Numéros de dossard: <?php echo $donnees['ins_dossard']; ?><br />
            Certificat médical: <?php echo $donnees['ins_certificat_medical']; ?><br />
            </p>

            <?php
    }
} 
else 
{
    header('Location: inscription.php');
    exit();
}

    $reponse->closeCursor()
    ?>



<?php
include("footer.php");

?>
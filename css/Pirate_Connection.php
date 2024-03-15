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
<p>Bonjour <strong>IDIOT!!!</strong> </p>
<p>Bienvenue sur le site webcourses avec plein de bêtise</p>
<p>Bonjour <script type="text/javascript">alert('BOOOM')</script>
<p>Pour revenir à la page d'acceuil, <a href="main.php"><p>Cliquez ici</a> </p>
<p>Partie pour se connecter à la base webcourse </p>
<?php
try {
    //Connexion à la base de donnée
    $bdd = new pdo('mysql:host=localhost;dbname=webcourses;charset=utf8', 'root', 'root');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo ("Connexion réussi ");
}
catch(Exeption $e)
{
    die('Erreur de connexion : ' . $e->getMessage());
}

if (!empty($_POST['pe_nom']) && !empty($_POST['pe_prénom']) && !empty($_POST['pe_adresse']) && !empty($_POST['pe_tel'])&& !empty($_POST['me_pseudo']))
{
    // Échapper les caractères spéciaux pour éviter l'injection SQL
    $pe_nom = htmlspecialchars($_POST['pe_nom']);
    $pe_prénom = htmlspecialchars($_POST['pe_prénom']);
    $pe_adresse = htmlspecialchars($_POST['pe_adresse']);
    $mz_adresse = htmlspecialchars($_POST['me_pseudo']);
    $pe_tel = htmlspecialchars($_POST['pe_tel']);
    $pe_ide = htmlspecialchars($_POST['pe_id']);

    // Exécuter la requête SQL
    $reponse = $bdd->prepare('INSERT INTO personne (pe_id, pe_nom, pe_prénom, pe_adresse, pe_tel, me_pseudo) VALUES (5, "'. $_POST['pe_nom'] .'", "'. $_POST['pe_prénom'] .'", "'. $_POST['pe_adresse']. '", "'. $_POST['pe_tel'] . '", "'. $_POST['me_pseudo'] . '")');

   
    $reponse->execute();

    // Afficher un message de confirmation
    echo "Le nouveau coureur a bien été enregistré.";
}
else
{
    echo("Veuillez remplir les case obligatoires.");
}


if ($reponse->rowCount() > 0) //S'il des membres dans la base de donnée cela récuppère les données 
{
   while ($donnees = $reponse->fetch()) //Récupération des données
    {
    ?>

            <p> 
            Nom du membre: <?php echo $donnees['pe_nom']; ?><br />
            Prénom du membre: <?php echo $donnees['pe_prénom'] ?><br />
            Pseudo du membre: <?php echo $donnees['me_pseudo']; ?><br />
            Adresse du membre: <?php echo $donnees['pe_adresse']; ?><br />
            Numéros téléphone du membre: <?php echo $donnees['pe_tel']; ?><br />
            Mail du membre: <?php echo $donnees['pe_id']; ?><br />
            </p>
    
    <?php
    }
}
else //Sinon cela retourne dans la page de connexion
    {
        header('Location: nouveau_membre.php');
        exit();
    }



$reponse->closeCursor()
?>



<?php
include("footer.php");
?>
</body>
</html>
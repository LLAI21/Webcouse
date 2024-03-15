<?php session_start();?>
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
<p>Bienvenue sur le site webcourses</p>
<p>Pour revenir à la page d'acceuil, <a href="main.php"><p>Cliquez ici</a> </p>
<p>Partie pour se connecter à la base webcourse </p>
<?php
try 
{
    //Connexion à la base de donnée
    $bdd = new pdo('mysql:host=localhost;dbname=webcourse;charset=utf8', 'root');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo ("Connexion réussi.<br>");
}
catch(Exeption $e)
{
    die('Erreur de connexion : ' . $e->getMessage());
}

error_reporting(E_ALL);
ini_set('display_errors', 1);

try{ 
 if (!empty($_POST['pe_nom']) && !empty($_POST['pe_prénom']) && !empty($_POST['pe_adresse']) && !empty($_POST['pe_tel']) && !empty($_POST['me_pseudo'])) 
 {
    // Échapper les caractères spéciaux pour éviter l'injection SQL
    $pe_nom = htmlspecialchars($_POST['pe_nom']);
    $pe_prénom = htmlspecialchars($_POST['pe_prénom']);
    $pe_adresse = htmlspecialchars($_POST['pe_adresse']);
    $me_pseudo = htmlspecialchars($_POST['me_pseudo']);
    $pe_tel = htmlspecialchars($_POST['pe_tel']);
    $ama_id = htmlspecialchars($_POST['case1']);
    $me_mdp = htmlspecialchars($_POST['me_mdp']);
    $pe_mail = htmlspecialchars($_POST['pe_mail']);


// Vérification si la case amateur est cochée
if(isset($_POST['case1']) && $_POST['case1'] == 'amateur') 
{
    // Récupération de la date actuelle
    $date_deb = date("Y-m-d");
    
    // Insertion dans la table amateur
    $requete_insertion = "INSERT INTO amateur (date_deb) VALUES ('$date_deb')";
    if ($connexion->query($requete_insertion) === TRUE) {
        echo "Inscription en tant qu'amateur réussie.";
    } else 
    {
        echo "Erreur lors de l'inscription en tant qu'amateur : " . $connexion->error();
    }
}

    //Faire un preg match pour donner une contrainte au numéros de tel. 
if (preg_match("#^0[1-9](([ .-]?[0-9]{2}){4})$#", $pe_tel) || preg_match("#^\+[3]{2}[ .-]?[1-9](([ .-]?[0-9]{2}){4})$#", $pe_tel)) 
{
    echo "Le numéro de téléphone est valide.<br>";
} else {
    echo "Le numéro de téléphone n'est pas valide.<br>";
    $bdd->close();
}
// Faire un pref match pour contraintre les adresses email.
if(preg_match("#^[a-zA-Z]+([.-_]?[0-9]?[a-zA-Z]+)*@[a-z]+[-_]?([0-9]?[a-z]?)+[.][a-z]{2,3}$#", $pe_mail))
{
    echo "Le mail est valide.<br>";
}
else
{
    echo "Le mail n'est pas valide.<br>";
    $bdd->close();
}
//if (preg_match("#^[1-9]{1,2}[ ]([a-zA-Z])+[ ]([a-zA-Z]?)+[ ]([a-zA-Z]?)+[ ][0-9]{5}[ ][a-zA-Z]+#", $pe_adresse))
//{
//    echo "Adresse valide.<br>";
//}
//else
//{
//    echo "Adresse invalide.<br>";
//    $bdd->close();
//}

    function generate_salt($length = 16) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $salt = '';
        for ($i = 0; $i < $length; $i++) {
            $salt .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $salt;
    }

    // Ajouté du sel dans le mot de passe
    $salt = generate_salt();

    // Cripté le mot de passe
    $me_mdp = MD5($me_mdp);

    
    echo "Valeur de pe_nom : " . $pe_nom . "<br>";
    echo "Valeur de pe_prénom : " . $pe_prénom . "<br>";
    echo $pe_adresse."<br>";
    echo $pe_tel."<br>";
    echo $me_pseudo. "<br>";
    echo $pe_mail. "<br>";
    echo $me_mdp. "<br>";



    // Haché le mot de passe pour le rendre plus petit
    $salted_password = $me_mdp . $salt;


    $hashed_password = password_hash($salted_password, PASSWORD_DEFAULT);

    
    echo $hashed_password;

    // Ajouter les données dans la table 'personne'
    $reponse = $bdd->prepare('INSERT INTO personne (pe_nom, pe_prénom, pe_adresse, pe_tel, pe_mail) VALUES (?, ?, ?, ?, ?)');
    $reponse->execute(array($pe_nom, $pe_prénom, $pe_adresse, $pe_tel, $pe_mail));

    // Récupérer l'ID auto-incrémenté de l'insertion précédente dans 'personne'
    $pe_id = $bdd->lastInsertId();

    // Insérer les données dans la table 'membre' en utilisant 'pe_id' comme clé étrangère
    $reponse_membre = $bdd->prepare('INSERT INTO membre (pe_id, me_pseudo, me_mdp) VALUES (?, ?, ?)');
    $reponse_membre->execute(array($pe_id, $me_pseudo, $hashed_password));



    if ($reponse->rowCount() > 0) {
        echo "Le nouveau coureur a bien été enregistré.<br>";
    } else {
        echo "Erreur lors de l'insertion du coureur.<br>";
    }
} 
else 
{
    echo "Veuillez remplir tous les champs obligatoires.<br>";
}
}

catch (PDOException $e) {
    echo "Erreur SQL : " . $e->getMessage();
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
            Amateur : <?php echo $donnees['ama_id']; ?><br />
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
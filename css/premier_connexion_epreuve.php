<?php session_start();?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="Connexion_epreuve.css"/>
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
    $bdd = new pdo('mysql:host=localhost;dbname=webcourse;charset=utf8', 'root', '');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo ("Connexion réussi");
}
catch(Exeption $e)
{
    die('Erreur de connexion : ' . $e->getMessage());
}

error_reporting(E_ALL);
ini_set('display_errors', 1);


$reponse = $bdd->query('select * from inscrire'); //Lecture des données
//On affiche chaque entrée obtenue
if ($reponse->rowCount() > 0) 
{
    // Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$database = "webcourse";

// Créer la connexion
$conn = new mysqli($servername, $username, $password, $database);

// Vérifier la connexion
if ($conn->connect_error) {
    die("La connexion a échoué : " . $conn->connect_error);
}

    // Si le formulaire est soumis
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $nom = $_POST['pe_nom'];
    $prenom = $_POST['pe_prénom'];
    $pseudo = $_POST['me_pseudo'];

// Requête SQL pour vérifier si le nom et le prénom existent dans la table personne
// ou si le pseudo correspond à un enregistrement dans la table membre
        //$sql = "SELECT membre_id FROM membre WHERE me_pseudo='$pseudo'";
        //$result = $conn->query($sql);

    // Vérification du résultat de la requête
    //if ($result->num_rows > 0) {
        // Les données existent dans la table personne
        // Récupérer l'ID de la personne
       // $row = $result->fetch_assoc();
        //$pe_id = $row['id'];

        // Ajouter les données dans la table d'inscription à l'événement
        // Par exemple, si votre table d'inscription à l'événement s'appelle 'inscription_evenement'
        //$sql_insert = "INSERT INTO inscription_evenement (pe_id) VALUES ($pe_id)";
        //if ($connexion->query($sql_insert) === TRUE) {
        //    echo "Inscription à l'événement réussie!";
        //} else {
        //    echo "Erreur: " . $sql_insert . "<br>" . $connexion->error();
        //}
    //} else {
        // Les données n'existent pas dans la table personne, affichage d'un message d'erreur
    //    echo "Erreur: Les données saisies ne correspondent à aucun enregistrement dans la base de données.";
    }

    // Récupérer les options disponibles à partir de la table type_epreuve
$sql_options = "SELECT typep_id, typep_nom FROM type_epreuve";
$result_options = $conn->query($sql_options);



$options = array();
if ($result_options->num_rows > 0) {
    while($row = $result_options->fetch_assoc()) {
        $options[$row["typep_id"]] = $row["typep_nom"];
    }
}

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les valeurs du formulaire
    $typep_nom = $_POST['typep_nom'];
    $ins_taille_maillot = $_POST['ins_taille_maillot'];
    $ep_nom = $_POST['ep_nom'];
    $certification = ($_POST['reponse'] == 'Oui') ? 1 : 0; // Convertir "Oui" en 1 et "Non" en 0


    
    // Récupérer l'ID de type_epreuve à partir de son nom
    $sql_typep_id = "SELECT typep_id FROM `type_epreuve` WHERE typep_nom = '$typep_nom'";
    $result_typep_id = $conn->query($sql_typep_id);
    if ($result_typep_id->num_rows > 0) {
        $row = $result_typep_id->fetch_assoc();
        $typep_id = $row["typep_id"];
    } else {
        echo "Erreur : Impossible de trouver l'ID de type_epreuve pour le nom spécifié.";
        exit();
    }

    // Récupérer l'ID d'épreuve à partir de son nom
    $sql_ep_id = "SELECT ep_id FROM epreuve WHERE ep_nom = '$ep_nom'";
    $result_ep_id = $conn->query($sql_ep_id);
    if ($result_ep_id->num_rows > 0) {
        $row = $result_ep_id->fetch_assoc();
        $ep_id = $row["ep_id"];
    } else {
        echo "Erreur : Impossible de trouver l'ID d'épreuve pour le nom spécifié.";
        exit();
    }

    // Préparer et exécuter la requête SQL pour insérer les données dans la table
    $sql = "INSERT INTO inscrire (typep_id, ins_taille_maillot, ep_id, ins_certificat_medical) VALUES ('$typep_id', '$ins_taille_maillot', '$ep_id', '$certification')";

    if ($conn->query($sql) === TRUE) {
        echo "Les données ont été insérées avec succès dans la table inscrire.<br>";
    } else {
        echo "Erreur lors de l'insertion des données dans la table inscrire : " . $conn->error . "<br>";
    }


    // Afficher les valeurs récupérées
    echo "Nom du type d'épreuve : " . $typep_nom . "<br>";
    echo "ID d'épreuve : " . $ep_id . "<br>";
    echo "Taille du maillot : " . $ins_taille_maillot . "<br>";
    echo "Nom de l'épreuve : " . $ep_nom . "<br>";
    echo "ID du type de l'épreuve : " . $typep_id . "<br>";
    echo "Certification : " . ($certification ? 'Oui' : 'Non') . "<br>"; // Afficher "Oui" si $certification est égal à 1, sinon afficher "Non"

    while ($donnees = $reponse->fetch()) //Récupération des données
    {
    ?>
    <p> 
        
            Identifiant de la personne: <?php echo $donnees['pe_id']; ?><br />
            Nom de la personne:  <?php echo $donnees['pe_nom']; ?><br />
            Prénom de la personne:  <?php echo $donnees['pe_prénom']; ?><br />
            Pseudo de la personne: <?php echo $donnees['pe_pseudo']; ?><br />
            Identifiant de l'epreuve: <?php echo $donnees['ep_id']; ?><br />
            Nom epreuve: <?php echo $donnees['ep_nom']; ?><br />
            Date début et la fin de ce championnat: <?php echo $donnees['ep_datedeb'],' ', $donnees['ep_datefin']; ?><br />
            Lieu du championnat: <?php echo $donnees['ep_lieu']; ?><br />
            </p>

            <?php
    }
}


    // Fermeture de la connexion
    $connexion->close();

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
<?php
require("connexionDB.php");

var_dump($_POST);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Vérifier que toutes les données nécessaires sont présentes
    if (isset($_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['mot_de_passe'], $_POST['mot_de_passe2'], $_POST['type_compte'])){
        // Récupérer les données du formulaire
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $mot_de_passe = $_POST['mot_de_passe'];
        $mot_de_passe2 = $_POST['mot_de_passe2'];
        $type_compte = $_POST['type_compte'];
    } else{
        echo "Veuillez remplir tous les champs du formulaire.";
    }
    
    // Vérifier que les mots de passe correspondent
    if ($mot_de_passe === $mot_de_passe2) {
        // Hacher le mot de passe
        $mot_de_passe_hache = password_hash($mot_de_passe, PASSWORD_BCRYPT);
    } else{
        echo "Les mots de passe ne correspondent pas.";
    }

    // Préparer la requête SQL d'insertion
    $sql = "INSERT INTO utilisateur (nom, prenom, email, mot_de_passe, type_compte) VALUES (:nom, :prenom, :email, :mot_de_passe, :type_compte)";
    $stmt = $pdo->prepare($sql);

    // Lier les paramètres
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':prenom', $prenom);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':mot_de_passe', $mot_de_passe_hache);
    $stmt->bindParam(':type_compte', $type_compte);

    // Exécuter la requête
    if ($stmt->execute()) {
        echo "Utilisateur inscrit avec succès!";
    } else {
        echo "Erreur lors de l'inscription.";
    }
}

//on libère le jeu d'enregistrement
$res->closeCursor(); 
// on ferme la connexion au SGBD
$connexion = null;
?>
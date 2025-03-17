<?php
	include("connexionDB.php");
	include('../class/Utilisateur.php');
	//ouverture session
	session_save_path("../session");
	session_start();


	// On récupère les données saisies dans le formulaire
	$email = $_POST["email"];
	$mot_de_passe = $_POST["password"];

	try {
		// Préparation de la requête SQL
		$sql = "SELECT id, email, mot_de_passe FROM utilisateur WHERE email = :email";
		$stmt = $connexion->prepare($sql);
		$stmt->bindParam(':email', $email, PDO::PARAM_STR);
		$stmt->execute();
	}
	catch (PDOException $e) {
		echo "Erreur de connexion : " . $e->getMessage();
	}

	// Vérifie si un utilisateur a été trouvé
	if ($stmt->rowCount() > 0) {
		// Récupère la ligne (l'utilisateur)
		$ligne = $stmt->fetch(PDO::FETCH_ASSOC);
		
		// Vérifie le mot de passe avec password_verify()
		if (password_verify($mot_de_passe, $ligne["mot_de_passe"])) {
			// Authentification réussie
			echo "Connexion réussie, bienvenue " . htmlspecialchars($ligne["email"]) . "!";
			// confirmation de connexions
			$_SESSION['loginOk'] = True;
			$_SESSION['Id_utilisateur'] = $ligne["id"];
			//direction vers la page d'accueil
			header("location:../page/accueil.php");
		}
		else {
			// Identifiant/mot de passe incorrect
			echo "Erreur : identifiant ou mot de passe incorrect, veuillez réessayer.";
		}
	}
?>

<?php //include('../includes/verificationConnexion.php');?>

<!DOCTYPE html>
<html lang="fr">
<link href="../css/style.css" rel="stylesheet" type="text/css" />

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/vnd.icon" href="../img/favicon.ico">
</head>
<body>
  
  <header>
    <div>
      <a href="../page/accueil.php">
        <img class="logo" src="../img/logo.png" alt="logo"> <!-- Logo du site -->
      </a>
    </div>
    
    <div>
      <h1><? $titrePage ?></h1>
    </div>

<!-- div utilisateur info + deco -->
    <div>
      <div class="nomUtilisateur">
        <h2>
          <?php /*
            $nomSaisi = $_SESSION['nom'];
            $hierarchie = $_SESSION['hierarchie'];
            echo "$nomSaisi  $hierarchie";*/
          ?>
        </h2>
      </div>

      <div class="fond_blanc">
        <div class="deconnexion">
          <a id="deconnexion_link"><img src="../img/bouton_deconnexion.png" class="imgTelechargement"></a>
        </div>
      </div>
    </div>


  </header>

  <div class="centrePage">
    <div class="colonneGauche">
      <div class="CheminAcces">
        <nav>
        <h2>Menu</h2>
        <ul>
          <li><a href="../page/accueil.php">Accueil</a><br></li>
          <li><a href="../page/reservation.php">Réserver une salle</a></li>
          <li><a href="../page/listeReservation.php">Liste des réservations actuelles</a></li>
        </ul>
        </nav>
      </div>
      <div class="info">
        <ul>
        <li><a href="mailto:contact.M2L@outlook.fr">Mail : contact.M2L@outlook.fr</a></li>
        <li><a href="tel:+33599999999 ">Tel : 05-99-99-99-99 </a></li>
        <li><a href="../page/conditions-utilisation.php">Conditions générales d'utilisation</a></li>
        </ul>
      </div>
    </div>
    <main>
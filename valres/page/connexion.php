<?php
include '../includes/connexionDB.php';
include '../class/Utilisateur.php';
session_save_path("../session");
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $erreur = "";
  $email = filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL);
  $mot_de_passe = $_POST['password'];

  if ($email != false) {
    $utilisateur = new Utilisateur($pdo);
    $user = $utilisateur->seConnecter($email, $mot_de_passe);
    if($user!=null){
      // confirmation de connexions
      $_SESSION['loginOk'] = True;
      $_SESSION['user_id'] = $user['id'];
      header('location:../page/accueil.php');
      exit(); 
    } 
    else {
      $erreur = "Identifiants incorrects";
    }
  }
  else {
    $erreur = "Adresse e-mail invalide!";
  }
  
}
?>



<head>
<link href="../css/style.css" rel="stylesheet" type="text/css" />
  <title>Connexion</title>
</head>

<body>
  <!-- div placement-->
  <div class="placementConnexion">

    <div class="login-container">
      <div class="align">
        <img class="logo" src="../img/logo.png" alt="logo"> <!-- Logo du site -->
        <h2>Connexion Utilisateur</h2>
      </div>
      <form action="connexion.php" method="post">
        <input type="text" name="mail" placeholder="Email" required>
        <input type="password" name="password" placeholder="Mot de passe" required>
        <input type="submit" value="Se connecter">
        <?php if (isset($erreur)): ?>
            <p class="text-red-500 mt-2"><?= htmlspecialchars($erreur) ?></p> <!-- Utilisez htmlspecialchars pour éviter les injections XSS -->
        <?php endif; ?>
      </form>
    </div>
  </div>
</body>

</html>
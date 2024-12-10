<!DOCTYPE html>
<html lang="fr">
<link href="../css/style.css" rel="stylesheet" type="text/css" />

<head>
  <title>Inscription</title>
</head>

  <form action="../includes/inserer.php" method="POST">
    <label for="type">Nom :</label>
    <input type="text" name="nom" placeholder="Nom" required><br>
    <label for="type">Prenom :</label>
    <input type="text" name="prenom" placeholder="Prénom" required><br>
    <label for="type">Email :</label>
    <input type="text" name="email" placeholder="Email" required><br>
    <label for="type">Mot de passe :</label>
    <input type="password" name="mot_de_passe" placeholder="Mot de passe" required><br>
    <label for="type">Confirmation du mot de passe :</label>
    <input type="password" name="mot_de_passe2" placeholder="Confirmer le mot de passe" required><br>
    <label for="type">Type de compte</label>

    <select name="type_compte">
      <option value="admin">Administrateur</option>
      <option value="sec">Secrétaire</option>
      <option value="resp">Responsable</option>
      <option value="user">Utilisateur</option>
    </select>

    <label for="type">Le type de votre structure</label>
    <select name="type_structure">
      <option value="club">Club sportif</option>
      <option value="association">Association</option>
    </select>
    <br>
    <input type="submit" value="S'inscrire">
  </form>
  </main>
</div>

<?php include('../includes/footer.php'); ?>
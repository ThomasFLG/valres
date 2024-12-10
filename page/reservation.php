<?php include('../includes/header.php');?>

    <form method="POST" action="../includes/reservationDB.php" id="reservation" onsubmit="return verifierFormulaire()">
        <label for="type_salle">Il me faut une salle du type :</label>
        <select name="type_salle" id="type_salle" onchange="updateSalleOptions()">
            <option value="reunion">Réunion</option>
            <option value="equipement">Avec équipement</option>
            <option value="amphi">Amphithéâtre</option>
        </select>
        <br><br>

        <label for="salle">Choisissez la salle :</label>
        <select name="salle" id="salle">
            <!-- Les options seront ajoutées dynamiquement par JavaScript -->
        </select>
        <br><br>

        <label for="type">Date début :</label>
        <?php
          $today=date("Y-m-d");
          echo '<input type="date" id="date_debut" name="date_debut_reservation" value="'.$today.'" required><br>';
        ?>
        <label for="type">Date fin :</label>
        <?php echo '<input type="date" id="date_fin" name="date_fin_reservation" value="'.$today.'" required> <br>';?>
        <br>
        <label for="type">Heure début :</label>
        <input type="time" id="heure_debut" name="heure_debut_reservation" placeholder="Heure_debut_reservation" required><br>
        <label for="type">Heure fin :</label>
        <input type="time" id="heure_fin" name="heure_fin_reservation" placeholder="Heure_fin_reservation" required><br>
        <br>
        <button type="submit">Valider la réservation</button>
    </form>

<?php include('../includes/footer.php'); ?>
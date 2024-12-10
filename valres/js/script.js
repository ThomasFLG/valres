// Fonction pour deconnecter l'utilisateur
function deconection() {
  $.ajax({
    url: '../includes/logout.php',
    type: 'POST',
    success: function() {
      console.log('Déconnexion réussie'); // Ligne de débogage
      window.location.href = '../page/connexion.php';
    },
    error: function() {
      console.log('Erreur lors de la déconnexion'); // Ligne de débogage
      alert('Erreur lors de la déconnexion.');
    }
  });
};


// Fonction pour mettre à jour la liste des salles en fonction du type de salle sélectionné
function updateSalleOptions() {
    var typeSalle = document.getElementById('type_salle').value;
    var salleSelect = document.getElementById('salle');

    // Vider les options précédentes
    salleSelect.innerHTML = '';

    // Définir les options de salles en fonction du type sélectionné
    var salles = [];

    if (typeSalle == 'reunion') {
        salles = ['Salle 1 - Daum', 'Salle 2 - Corbin', 'Salle 3 - Baccarat', 'Salle 4 - Longwy', 'Salle 7 - Lamour', 'Salle 8 - Grüber', 'Salle 9 - Majorelle', 'Salle 11 - Galerie', 'Salle 14 - Gallé'];
    } else if (typeSalle == 'equipement') {
        salles = ['Salle 5 - Multimédia', 'Salle 10 - Salle de restauration', 'Salle 12 - Salle informatique', 'Salle 13 - Hall d\'Accueil'];
    } else if (typeSalle == 'amphi') {
        salles = ['Salle 6 - Amphithéâtre'];
    }

    // Ajouter les options au select
    for (var i = 0; i < salles.length; i++) {
        var option = document.createElement('option');
        option.value = salles[i];
        option.textContent = salles[i];
        salleSelect.appendChild(option);
    }
}

// Appeler la fonction au chargement pour initialiser les options en fonction de la valeur par défaut
window.onload = updateSalleOptions;

function verifierFormulaire() {
    // Empêcher la soumission du formulaire
    event.preventDefault();

    // Recupérer les valeurs des dates et heures du formulaire
    var dateDebut = document.getElementById('date_debut').value;
    var dateFin = document.getElementById('date_fin').value;
    var heureDebut = document.getElementById('heure_debut').value;
    var heureFin = document.getElementById('heure_fin').value;

    // Vérifier la validité des dates et heures
    if (dateDebut > dateFin) {
        alert("Les dates sont incorrectes");
    } else if (dateDebut == dateFin && heureDebut > heureFin) {
        alert("Les heures sont incorrectes");
    } else {
        alert("Le formulaire a bien été envoyé");
        // Soumettre le formulaire
        document.getElementById('reservation').submit();
    }
}
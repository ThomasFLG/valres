<?php
    class Utilisateur {
        private $id;
        private $nom;
        private $prenom;
        private $email;
        private $mot_de_passe;
        private $role;
        private $structure;
        private $pdo;

        public function __construct($pdo,$id = null, $nom = null, $prenom = null, $email = null, $mot_de_passe = null, $role = null, $structure = null) {
            $this->pdo = $pdo;
            $this->id = $id;
            $this->nom = $nom;
            $this->prenom = $prenom;
            $this->email =$email;
            $this->mot_de_passe = $mot_de_passe;
            $this->role = $role;
            $this->structure = $structure;

        }

        public function seConnecter($email,$mot_de_passe) {
            $stmt = $this->pdo->prepare("SELECT * FROM utilisateur WHERE mail = :email");
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();
            $user = $stmt->fetch();

            //Si l'email existe et que le mot de passe correspond, on est loggué et redirigé avec la page index
            if ($user && password_verify($mot_de_passe,$user['pwd'])) {
                    return $user;
            }
            return null;

        }

        //pas encore fonctionnelle car role et structure sont des clés étrangères
        public function sInscrire($nom, $prenom, $email, $mot_de_passe, $role, $structure) {
            $stmt = $this->pdo->prepare("INSERT INTO utilisateur (nom, prenom, mail, pwd, role, structure) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->execute([$nom, $prenom, $email, $mot_de_passe, $role, $structure]);

            return true;
        }


    }

?>
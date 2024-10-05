<?php
// controllers/EleveController.php
require_once __DIR__ . '/../Models/elevesModel.php';

class EleveController {
    private $eleveModel;

    public function __construct($pdo) {
        $this->eleveModel = new Eleve($pdo);
    }

    public function ajouterEleve() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nom = trim($_POST['nom']);
            $prenom = trim($_POST['prenom']);
            $date_naissance = trim($_POST['date_naissance']);
            $nom_tuteur = trim($_POST['nom_tuteur']);
            $tel_tuteur = trim($_POST['tel_tuteur']);
            $email_tuteur = trim($_POST['email_tuteur']);
            $departement = trim($_POST['departement']);
            $classe = trim($_POST['classe']);
            $matricule = $this->eleveModel->generateMatricule(); // Génère le matricule

            if (!empty($nom) && !empty($prenom) && !empty($date_naissance) && !empty($nom_tuteur) && !empty($tel_tuteur) && !empty($email_tuteur) && !empty($departement) && !empty($classe)) {
                try {
                    $data = [
                        'matricule' => $matricule,
                        'nom' => $nom,
                        'prenom' => $prenom,
                        'date_naissance' => $date_naissance,
                        'nom_tuteur' => $nom_tuteur,
                        'tel_tuteur' => $tel_tuteur,
                        'email_tuteur' => $email_tuteur,
                        'departement' => $departement,
                        'classe' => $classe
                    ];

                    $this->eleveModel->ajouterEleve($data);
                    $_SESSION['message'] = 'Élève ajouté avec succès.';
                    header('Location: ../Views/Eleve/inscription_eleveView.php'); // Redirection après ajout
                    exit();
                } catch (Exception $e) {
                    $_SESSION['error'] = $e->getMessage();
                }
            } else {
                $_SESSION['error'] = 'Tous les champs doivent être remplis.';
                header('Location: ../Views/Eleve/inscription_eleveView.php'); // Redirection en cas d'erreur
                exit();
            }
        }
    }
}

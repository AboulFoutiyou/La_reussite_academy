<?php
require_once 'Models/elevesModel.php';

class EleveController {
    public $eleveModel;

    // Le constructeur reçoit  PDO et l'injecte dans le modèle
    public function __construct($pdo) {
        
        $this->eleveModel = new EleveModel($pdo);
    }

    // Méthode pour lister les élèves
    public function listEleves() {
        try {
            // Récupérer tous les élèves depuis le modèle
            $eleves = $this->eleveModel->getAllEleves();

            // Si $eleves n'est pas défini ou vide, on l'initialise comme un tableau vide
            if (empty($eleves)) {
                $eleves = [];
            }

            // Inclure la vue pour afficher les élèves
            include('Views/Eleve/eleveListView.php'); //  la vue 
        } catch (Exception $e) {
            //  l'erreur dans un fichier log
            error_log($e->getMessage(), 3, 'logs/errors.log');
        //    un message à l'utilisateur
            echo 'Une erreur est survenue. Veuillez réessayer plus tard.';
        }
    }

    // Méthode pour afficher le formulaire de création d'un élève
    public function showCreateEleveForm() {
        include('Views/Eleve/ajout_eleveView.php'); // Inclure la vue pour le formulaire de création
    }

    // Méthode pour créer un nouvel élève
    public function createEleve($eleveData) {
        try {
            $this->eleveModel->createEleve($eleveData);
            header('Location: ajout_eleveView.php?action=listEleves'); // Rediriger après la création
        } catch (Exception $e) {
            // Enregistrer l'erreur
            error_log($e->getMessage(), 3, 'logs/errors.log');
            echo 'Une erreur est survenue lors de la création de l\'élève.';
        }
    }

    // Méthode pour afficher le formulaire de mise à jour d'un élève
    public function showUpdateEleveForm($id) {
        try {
            $eleve = $this->eleveModel->getEleveById($id);
            include('Views/Eleve/updateEleveView.php'); // Inclure la vue pour le formulaire de mise à jour
        } catch (Exception $e) {
            // Enregistrer l'erreur
            error_log($e->getMessage(), 3, 'logs/errors.log');
            echo 'Une erreur est survenue lors de la récupération des informations de l\'élève.';
        }
    }

    // Méthode pour mettre à jour un élève
    public function updateEleve($id, $eleveData) {
        try {
            $this->eleveModel->updateEleve($id, $eleveData);
            header('Location: index.php?action=listEleves'); // Rediriger après la mise à jour
        } catch (Exception $e) {
            // Enregistrer l'erreur
            error_log($e->getMessage(), 3, 'logs/errors.log');
            echo 'Une erreur est survenue lors de la mise à jour de l\'élève.';
        }
    }

//     // Méthode pour supprimer un élève
//     public function deleteEleve($id) {
//         try {
//             $this->eleveModel->deleteEleve($id);
//             header('Location: index.php?action=listEleves'); // Rediriger après la suppression
//         } catch (Exception $e) {
//             // Enregistrer l'erreur
//             error_log($e->getMessage(), 3, 'logs/errors.log');
//             echo 'Une erreur est survenue lors de la suppression de l\'élève.';
//         }
//     }
 }
 ?>

<?php
// index.php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once "Config/db.php";
include_once 'Views/Eleve/inscription_eleveView.php';
include_once './Models/elevesModel.php';
include_once './Controllers/inscri_eleve_controllers.php';

// Création du contrôleur
//$eleveController = new EleveController();

// Obtenir la connexion à la base de données
//$pdo = Database::getConnection();


$controller = new EleveController($pdo);
$controller->ajouterEleve();
// Appeler la méthode addEleve si le formulaire est soumis
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action']) && $_POST['action'] === 'addEleve') {
    $eleveController->addEleve();
}

<?php
require_once 'Config/database.php';
require_once 'Controllers/UserController.php';

session_start();

try {
    if (!defined('DB_SERVER') || !defined('DB_DATABASE') || !defined('DB_USERNAME') || !defined('DB_PASSWORD')) {
        throw new Exception("Les constantes de connexion à la base de données ne sont pas définies.");
    }

    $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_DATABASE, DB_USERNAME, DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $controller = new UserController($pdo);

    // Déterminer l'action à effectuer
    $action = $_POST['action'] ?? 'listUsers';

    switch ($action) {
        case 'listUsers':
            $controller->listUsers();
            break;
        case 'updateUser':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $id = $_POST['id'] ?? null;
                $userData = [
                    'matricule' => $_POST['matricule'] ?? null,
                    'nom' => $_POST['nom'] ?? null,
                    'prenom' => $_POST['prenom'] ?? null,
                    'email' => $_POST['email'] ?? null,
                    'role_id' => $_POST['role_id'] ?? null,
                    'date_embauche' => $_POST['date_embauche'] ?? null,
                ];
                $controller->updateUser($id, $userData);
            } else {
                // Rediriger vers la liste si ce n'est pas une requête POST
                header('Location: index.php?action=listUsers');
                exit;
            }
            break;
        case 'editUser':
            $id = $_POST['id'] ?? null;
            if ($id) {
                $controller->editUser($id);
            } else {
                // Rediriger vers la liste si l'ID n'est pas fourni
                header('Location: index.php?action=listUsers');
                exit;
            }
            break;
        default:
            // Action non reconnue, rediriger vers la liste des utilisateurs
            header('Location: index.php?action=listUsers');
            exit;
    }

} catch (PDOException $e) {
    die("ERREUR : Impossible de se connecter à la base de données. " . $e->getMessage());
} catch (Exception $e) {
    die("ERREUR : " . $e->getMessage());
}
?>
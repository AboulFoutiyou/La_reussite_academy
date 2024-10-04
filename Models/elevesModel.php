<?php

class EleveModel {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    // Récupérer tous les élèves
    public function getAllEleves() {
        $sql = "SELECT id, matricule, nom, prenom, date_naissance, nom_tuteur, tel_tuteur, email_tuteur, departement, classe, date_inscription, archivage
                FROM eleves
                WHERE archivage = 0";  // On récupère uniquement les élèves non archivés

        return $this->executeQuery($sql);
    }

    // Récupérer un élève par son ID
    public function getEleveById($id) {
        $sql = "SELECT id, matricule, nom, prenom, date_naissance, nom_tuteur, tel_tuteur, email_tuteur, departement, classe, date_inscription, archivage
                FROM eleves
                WHERE id = :id";

        return $this->executeQuery($sql, [':id' => $id], true);
    }

    // Créer un nouvel élève
    public function createEleve($eleveData) {
        $sql = "INSERT INTO eleves (matricule, nom, prenom, date_naissance, nom_tuteur, tel_tuteur, email_tuteur, departement, classe, date_inscription)
                VALUES (:matricule, :nom, :prenom, :date_naissance, :nom_tuteur, :tel_tuteur, :email_tuteur, :departement, :classe, :date_inscription)";

        $params = [
            ':matricule' => $eleveData['matricule'],
            ':nom' => $eleveData['nom'],
            ':prenom' => $eleveData['prenom'],
            ':date_naissance' => $eleveData['date_naissance'],
            ':nom_tuteur' => $eleveData['nom_tuteur'],
            ':tel_tuteur' => $eleveData['tel_tuteur'],
            ':email_tuteur' => $eleveData['email_tuteur'],
            ':departement' => $eleveData['departement'],
            ':classe' => $eleveData['classe'],
            ':date_inscription' => $eleveData['date_inscription']
        ];

        return $this->executeQuery($sql, $params);
    }

    // Mettre à jour les informations d'un élève
    public function updateEleve($id, $eleveData) {
        $sql = "UPDATE eleves 
            SET matricule = :matricule, nom = :nom, prenom = :prenom, date_naissance = :date_naissance, 
                nom_tuteur = :nom_tuteur, tel_tuteur = :tel_tuteur, email_tuteur = :email_tuteur, 
                departement = :departement, classe = :classe, date_inscription = :date_inscription
            WHERE id = :id";

$params = [
    ':id' => $id,
    ':matricule' => $eleveData['matricule'],
    ':nom' => $eleveData['nom'],
    ':prenom' => $eleveData['prenom'],
    ':date_naissance' => $eleveData['date_naissance'],
    ':nom_tuteur' => $eleveData['nom_tuteur'],
    ':tel_tuteur' => $eleveData['tel_tuteur'],
    ':email_tuteur' => $eleveData['email_tuteur'],
    ':departement' => $eleveData['departement'],
    ':classe' => $eleveData['classe'],
    ':date_inscription' => $eleveData['date_inscription']
        ];

        return $this->executeQuery($sql, $params);
    }

    // Supprimer un élève
    public function deleteEleve($id) {
        $sql = "DELETE FROM eleves WHERE id = :id";
        return $this->executeQuery($sql, [':id' => $id]);
    }

    // Méthode d'exécution des requêtes
    private function executeQuery($sql, $params = [], $singleResult = false) {
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($params);


            if (stripos($sql, 'UPDATE') === 0 || stripos($sql, 'DELETE') === 0) {
                return $stmt->rowCount(); // Retourne le nombre de lignes affectées
            }

            
            if ($singleResult) {
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                return $result ?: null;
            } else {
                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $results ?: [];
            }
        } catch (PDOException $e) {
            $this->logError($e, "Erreur lors de l'exécution de la requête");
            throw new Exception("Une erreur est survenue lors de l'opération sur la base de données.");
        }
    }

    // Méthode de journalisation des erreurs
    private function logError(PDOException $e, $message) {
        error_log($message . ": " . $e->getMessage());
    }
}
?>

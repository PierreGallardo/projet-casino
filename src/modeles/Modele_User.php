<?php

require_once __DIR__ . '/../config/database.php';

function createUser(array $data){
    $pdo = getDatabaseConnection();
    if (!$pdo) {
        return false;
    }

    try {
        $sql = "UPDATE films 
                SET titre = :titre, realisateur = :realisateur, annee = :annee, 
                    duree = :duree, synopsis = :synopsis, genre_id = :genre_id, note = :note 
                WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':titre', $data['titre']);
        $stmt->bindParam(':realisateur', $data['realisateur']);
        $stmt->bindParam(':annee', $data['annee'], PDO::PARAM_INT);
        $stmt->bindParam(':duree', $data['duree'], PDO::PARAM_INT);
        $stmt->bindParam(':synopsis', $data['synopsis']);
        $stmt->bindParam(':genre_id', $data['genre_id'], PDO::PARAM_INT);
        $stmt->bindParam(':note', $data['note']);
        return $stmt->execute();
    } catch (PDOException $e) {
        error_log("Erreur lors de la mise à jour du film : " . $e->getMessage());
        return false;
    }

}
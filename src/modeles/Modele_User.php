<?php

require_once __DIR__ . '/../config/database.php';

function createUser(array $data){
    $pdo = getDatabaseConnection();
    if (!$pdo) {
        return false;
    }

    $sql = "SELECT * FROM user WHERE nom_User = :nom_User";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':nom_User', $data['nom_User']);
    $reponse = $stmt->execute(); //$reponse boolean sur l'état de la requête
    $utilisateur = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($utilisateur != null) {
        return false;
    }
    $sql = "SELECT * FROM user WHERE mail_User = :mail_User";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':mail_User', $data['mail_User']);
    $reponse = $stmt->execute(); //$reponse boolean sur l'état de la requête
    $utilisateur = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($utilisateur != null) {
        return false;
    }

    try {
        $sql = "INSERT INTO user (nom_User, mail_User, mdp_User, nbSIOPoints) VALUES (:nom_User, :mail_User, :mdp_User, 100)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nom_User', $data['nom_User']);
        $stmt->bindParam(':mail_User', $data['mail_User']);
        $stmt->bindParam(':mdp_User', $data['mdp_User']);
        return $stmt->execute();
    } catch (PDOException $e) {
        error_log("Erreur lors de la création du compte : " . $e->getMessage());
        return false;
    }

}
<?php
session_start();

require_once __DIR__ . '/../../connexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mailOrIdentifiant = isset($_POST['mail']) ? trim($_POST['mail']) : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    if (empty($mailOrIdentifiant) || empty($password)) {
        $_SESSION['message'] = "Tous les champs sont requis.";
        header("Location: connexion_client.php");
        exit;
    }

    try {
        $sql = "SELECT * FROM clients WHERE mail = :mailOrIdentifiant OR identifiant = :mailOrIdentifiant LIMIT 1";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':mailOrIdentifiant', $mailOrIdentifiant);
        $stmt->execute();

        if ($stmt->rowCount() == 0) {
            $_SESSION['message'] = "Identifiant ou mot de passe incorrect.";
            header("Location: connexion_client.php");
            exit;
        }

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (password_verify($password, $user['mdp'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['prenom'];
            header("Location: /pages/front/accueil.php");
            exit;
        } else {
            $_SESSION['message'] = "Identifiant ou mot de passe incorrect.";
            header("Location: connexion_client.php");
            exit;
        }
    } catch (PDOException $e) {
        $_SESSION['message'] = "Erreur lors de la connexion : " . $e->getMessage();
        header("Location: connexion_client.php");
        exit;
    }
} else {
    header("Location: connexion_client.php");
    exit;
}
?>
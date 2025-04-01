<?php
session_start();
require_once '../../connexion.php';
$pdo = $db;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $nom = isset($_POST['nom']) ? trim($_POST['nom']) : '';
    $prenom = isset($_POST['prenom']) ? trim($_POST['prenom']) : '';
    $identifiant = isset($_POST['identifiant']) ? trim($_POST['identifiant']) : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $password_confirm = isset($_POST['password_confirm']) ? $_POST['password_confirm'] : '';

    if ($password !== $password_confirm) {
        $_SESSION['message'] = "Les mots de passe ne correspondent pas.";
        header("Location: creation_compte_client.php");
        exit;
    }

    try {
        $sql_verif = "SELECT id_client FROM client WHERE email = :email OR identifiant = :identifiant LIMIT 1";
        $stmt_verif = $pdo->prepare($sql_verif);
        $stmt_verif->bindParam(':email', $email);
        $stmt_verif->bindParam(':identifiant', $identifiant);
        $stmt_verif->execute();

        if ($stmt_verif->rowCount() > 0) {
            $_SESSION['message'] = "Un compte avec cet e-mail ou cet identifiant existe déjà.";
            header("Location: creation_compte_client.php");
            exit;
        }
    } catch (PDOException $e) {
        $_SESSION['message'] = "Erreur lors de la vérification de l'existence du compte : " . $e->getMessage();
        header("Location: creation_compte_client.php");
        exit;
    }

    try {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql_insert = "INSERT INTO client (prenom, nom, email, identifiant, mdp)
                       VALUES (:prenom, :nom, :email, :identifiant, :mdp)";
        $stmt_insert = $pdo->prepare($sql_insert);
        $stmt_insert->bindParam(':prenom', $prenom);
        $stmt_insert->bindParam(':nom', $nom);
        $stmt_insert->bindParam(':email', $email);
        $stmt_insert->bindParam(':identifiant', $identifiant);
        $stmt_insert->bindParam(':mdp', $hashedPassword);
        $stmt_insert->execute();

        $_SESSION['message'] = "Votre compte a bien été créé !";
        header("Location: creation_compte_client.php");
        exit;
    } catch (PDOException $e) {
        $_SESSION['message'] = "Erreur lors de la création du compte : " . $e->getMessage();
        header("Location: creation_compte_client.php");
        exit;
    }
} else {
    header("Location: creation_compte_client.php");
    exit;
}
?>

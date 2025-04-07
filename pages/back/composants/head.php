<?php
$nom_utilisateur = "Administrateur";

if (isset($_SESSION['employee_id'])) {
    $employee_id = $_SESSION['employee_id'];

    $stmt_admin = $db->prepare("SELECT prenom FROM employees WHERE id = ?");
    $stmt_admin->execute([$employee_id]);
    $user = $stmt_admin->fetch(PDO::FETCH_ASSOC);
    
    if ($user) {
        $nom_utilisateur = htmlspecialchars($user['prenom']);
    }

}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/back.css">
    <title>Tableau de bord</title>
</head>

<body>
    <header>
        <h1 class="header_title">Bienvenue <?= $nom_utilisateur ?></h1>
        <img src="/img/logo-shoe.png" alt="Logo Shoe" class="header_logo">
        <a href="/logout.php" class="header_connexion">
            <svg class="header_connexion_logo" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M502.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L402.7 224 192 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l210.7 0-73.4 73.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l128-128zM160 96c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 32C43 32 0 75 0 128L0 384c0 53 43 96 96 96l64 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-64 0c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l64 0z"/></svg>
        </a>
    </header>

    <div class="alertDiv">
        <?php
            displayFlash();
        ?>
    </div>
<?php
// dashboard_employees.php

include '../../connexion.php';  // Ce fichier définit $db
include 'functionEmployees.php';
include '../../composants/back/flash.php';

// Gestion de la suppression via GET
if (isset($_GET['action']) && $_GET['action'] == 'delete' && !empty($_GET['id'])) {
    $id = $_GET['id'];
    deleteEmployee($db, $id);
    setFlash("L'employé a été supprimé avec succès", "success");
    header("Location: dashboard_employees.php");
    exit();
}

// Traitement du formulaire (ajout ou modification)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $employee_id = isset($_POST['employee_id']) ? trim($_POST['employee_id']) : '';
    $employee_nom = isset($_POST['employee_nom']) ? trim($_POST['employee_nom']) : '';
    $employee_prenom = isset($_POST['employee_prenom']) ? trim($_POST['employee_prenom']) : '';
    $employee_identifiant = isset($_POST['employee_identifiant']) ? trim($_POST['employee_identifiant']) : '';
    $employee_mdp = isset($_POST['employee_mdp']) ? trim($_POST['employee_mdp']) : '';

    if (!empty($employee_id)) {
        // Modification d'un employé existant
        if ($employee_mdp === "") {
            // Si le champ mot de passe est vide, on ne le modifie pas
            updateEmployeeWithoutPassword($db, $employee_id, $employee_nom, $employee_prenom, $employee_identifiant);
            setFlash("L'employé a été modifié avec succès (mot de passe inchangé)", "success");
        } else {
            // Sinon, on hache le nouveau mot de passe et on le met à jour
            $hashedPassword = password_hash($employee_mdp, PASSWORD_DEFAULT);
            updateEmployee($db, $employee_id, $employee_nom, $employee_prenom, $employee_identifiant, $hashedPassword);
            setFlash("L'employé a été modifié avec succès", "success");
        }
    } else {
        // Ajout d'un nouvel employé
        $hashedPassword = password_hash($employee_mdp, PASSWORD_DEFAULT);
        addEmployee($db, $employee_nom, $employee_prenom, $employee_identifiant, $hashedPassword);
        setFlash("L'employé a été ajouté avec succès", "success");
    }
    header("Location: dashboard_employees.php");
    exit();
}

// Récupération de la liste des employés
$getEmployees = getEmployees($db);
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/shoe_shop/css/back.css">
    <title>Tableau de bord - Employés</title>
</head>

<body>
    <header>
        <h1 class="header_title">Bienvenue, /USER</h1>
        <!-- Logo et autres éléments d'en-tête -->
        <svg class="header_logo" version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 300 162" width="300px"
            height="168px">
            <path class="couleur-logo"
                d="M90,85.9l29.2-78.6H99.9L86.5,41.4l3-34.1H69.2L40.1,85.9h18.8l14.3-38.1l-2.5,37.1L90,85.9z M112.7,85.9
      l29.2-78.6h-18.3L93.9,85.9H112.7z M165.6,81l-1-39.5l27.7-32.1L165.6,81z M300,53.3l-93.9,24.2l2.5-7.4h-19.8l6.4-18.8H212L217,37
      l-16.8,1l5.9-15.8h16.3l5.4-14.3H175l-19.3,22.7l9.4-23.2h-18.8l-29.2,78.6h19.3l12.4-33.6v33.6h24.7L85,109.1
      c-9.2,2.6-17.5,3.8-24.7,3.5c-7.2-0.3-12.8-2.3-16.8-5.9c-8.9-6.6-12-16.6-9.4-30.1c1.6-8.9,5.3-17.5,10.9-25.7
      C31.8,64.7,22.1,76.4,15.8,85.9C8.9,96.1,4.5,106.2,2.5,116.1S1.7,134,6,140.3c11.5,19.1,36.7,20.4,75.6,4L300,53.3z">
            </path>
        </svg>
        <a href="" class="header_connexion">
            <svg class="header_connexion_logo" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <path
                    d="M502.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L402.7 224 192 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l210.7 0-73.4 73.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l128-128zM160 96c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 32C43 32 0 75 0 128L0 384c0 53 43 96 96 96l64 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-64 0c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l64 0z" />
            </svg>
        </a>
    </header>
    <div class="alertDiv">
        <?php displayFlash(); ?>
    </div>
    <main>
        <section class="gestionnaire">
            <div class="gestionnaire_head">
                <h2 class="section_title">Gestionnaire</h2>
                <a id="stock" href="dashboard.php" class="gestionnaire_btn">Stock</a>
                <a id="employee" href="dashboard_employees.php"
                    class="gestionnaire_btn active_gestionnnaire_btn">Employés</a>
                <a id="client" href="dashboard_clients.php" class="gestionnaire_btn">Clients</a>
            </div>
            <div class="gestionnaire_main">
                <!-- Formulaire d'ajout/modification d'employé -->
                <form id="gestionnaire_employee" class="gestionnaire_form" method="POST"
                    action="dashboard_employees.php">
                    <!-- Champ caché pour stocker l'ID de l'employé -->
                    <input type="hidden" id="employee_id" name="employee_id">
                    <label for="employee_nom" class="form_label">Nom</label>
                    <input type="text" id="employee_nom" class="form_input" name="employee_nom">
                    <label for="employee_prenom" class="form_label">Prénom</label>
                    <input type="text" id="employee_prenom" class="form_input" name="employee_prenom">
                    <label for="employee_identifiant" class="form_label">Identifiant</label>
                    <input type="text" id="employee_identifiant" class="form_input" name="employee_identifiant">
                    <label for="employee_mdp" class="form_label">Mot de passe</label>
                    <input type="text" id="employee_mdp" class="form_input" name="employee_mdp"
                        placeholder="Laissez vide pour ne pas modifier">
                    <input type="submit" id="form_validation_employee" class="form_validation_btn" value="Ajouter">
                </form>
            </div>
        </section>
        <!-- Affichage de la liste des employés -->
        <section id="list" class="list">
            <div class="list_head">
                <h2 id="list_title_employee" class="list_title">Liste des employés</h2>
            </div>
            <div id="list_employee" class="list_main">
                <?php foreach ($getEmployees as $employee): ?>
                    <div class="list_item" data-id="<?= $employee['id'] ?>"
                        data-nom="<?= htmlspecialchars($employee['nom']) ?>"
                        data-prenom="<?= htmlspecialchars($employee['prenom']) ?>"
                        data-identifiant="<?= htmlspecialchars($employee['identifiant']) ?>"
                        data-mdp="<?= htmlspecialchars($employee['mdp']) ?>">
                        <p class="list_info size8"><?= htmlspecialchars($employee['nom']) ?></p>
                        <p class="size8 list_info"><?= htmlspecialchars($employee['prenom']) ?></p>
                        <p class="size8 list_info"><?= htmlspecialchars($employee['identifiant']) ?></p>
                        <!-- Lien de suppression avec confirmation -->
                        <a href="dashboard_employees.php?action=delete&id=<?= $employee['id'] ?>" class="list_delete_btn"
                            onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet employé ?');">
                            <svg class="list_icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                <path
                                    d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0L284.2 0c12.1 0 23.2 6.8 28.6 17.7L320 32l96 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 96C14.3 96 0 81.7 0 64S14.3 32 32 32l96 0 7.2-14.3zM32 128l384 0 0 320c0 35.3-28.7 64-64 64L96 512c-35.3 0-64-28.7-64-64l0-320z" />
                            </svg>
                            Supprimer
                        </a>
                        <!-- Bouton de modification -->
                        <a href="#" class="list_modify_btn">
                            <svg class="list_icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <path
                                    d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zM172.4 241.7l167.3-167.3L437.7 172.3 300.4 309.6c-6.1 6.1-13.6 10.8-21.9 13.5l-88.8 29.6c-8.6 2.9-18.1.6-24.6-5.8s-8.7-15.9-5.8-24.6l29.6-88.8c2.7-8.2 7.4-15.7 13.5-21.9z" />
                            </svg>
                            Modifier
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
    </main>
    <!-- Script pour pré-remplir le formulaire en cas de modification -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const modifyButtons = document.querySelectorAll('.list_modify_btn');
            modifyButtons.forEach(function (button) {
                button.addEventListener('click', function (e) {
                    e.preventDefault();
                    const listItem = this.closest('.list_item');
                    document.getElementById('employee_id').value = listItem.getAttribute('data-id');
                    document.getElementById('employee_nom').value = listItem.getAttribute('data-nom');
                    document.getElementById('employee_prenom').value = listItem.getAttribute('data-prenom');
                    document.getElementById('employee_identifiant').value = listItem.getAttribute('data-identifiant');
                    // Pour la sécurité, ne pas pré-remplir le mot de passe (laisser vide pour le modifier)
                    document.getElementById('employee_mdp').value = "";
                    // Change le texte du bouton en "Modifier"
                    document.getElementById('form_validation_employee').value = 'Modifier';
                });
            });
        });
    </script>
</body>

</html>
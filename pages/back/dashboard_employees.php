<?php 
    include '../../connexion.php';
    include 'functionEmployees.php';
    
    if (!empty($_POST["Ajouter"]) and !empty($_POST["nom"]) and !empty($_POST["prenom"]) and !empty($_POST["identifiant"]) and !empty($_POST["mdp"])) {
        if(createEmployees($db, $_POST["nom"], $_POST["prenom"], $_POST["identifiant"], $_POST["mdp"])) {
            setFlash("Employé ajouté avec succès", "success");
        } else {
            setFlash("Une erreur s'est produite, veuillez réessayer", "error");
        }
        header("Location: dashboard_employees.php");
        exit();
    }

    if (!empty($_POST["modifier"]) and !empty($_POST["nom"]) and !empty($_POST["prenom"]) and !empty($_POST["identifiant"]) and !empty($_POST["mdp"]) and !empty($_POST["id"])) {
        if(updateEmployees($db, $_POST["nom"], $_POST["prenom"], $_POST["identifiant"], $_POST["mdp"], $_POST["id"])) {
            setFlash("Employé modifié avec succès", "success");
        } else {
            setFlash("Une erreur s'est produite, veuillez réessayer", "error");
        }
        header("Location: dashboard_employees.php");
        exit();
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
        <h1 class="header_title">Bienvenue, /USER </h1>
        <svg class="header_logo" version="1.1" id="Calque_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 300 162" width="300px"
            height="168px" class="size-logo"><path class="couleur-logo" d="M90,85.9l29.2-78.6H99.9L86.5,41.4l3-34.1H69.2L40.1,85.9h18.8l14.3-38.1l-2.5,37.1L90,85.9z M112.7,85.9
            l29.2-78.6h-18.3L93.9,85.9H112.7z M165.6,81l-1-39.5l27.7-32.1L165.6,81z M300,53.3l-93.9,24.2l2.5-7.4h-19.8l6.4-18.8H212L217,37
            l-16.8,1l5.9-15.8h16.3l5.4-14.3H175l-19.3,22.7l9.4-23.2h-18.8l-29.2,78.6h19.3l12.4-33.6v33.6h24.7L85,109.1
            c-9.2,2.6-17.5,3.8-24.7,3.5c-7.2-0.3-12.8-2.3-16.8-5.9c-8.9-6.6-12-16.6-9.4-30.1c1.6-8.9,5.3-17.5,10.9-25.7
            C31.8,64.7,22.1,76.4,15.8,85.9C8.9,96.1,4.5,106.2,2.5,116.1S1.7,134,6,140.3c11.5,19.1,36.7,20.4,75.6,4L300,53.3z">
            </path>
        </svg>
        <a href="" class="header_connexion">
            <svg class="header_connexion_logo" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M502.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L402.7 224 192 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l210.7 0-73.4 73.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l128-128zM160 96c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 32C43 32 0 75 0 128L0 384c0 53 43 96 96 96l64 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-64 0c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l64 0z"/></svg>
        </a>
    </header>

    <div class="alertDiv">
        <?php
            displayFlash();
        ?>
    </div>

    <main>
        <!-- Interface de gestion -->
        <section class="gestionnaire">
            <div class="gestionnaire_head">
                <h2 class="section_title">Gestionnaire</h2>
                <a id="stock"  href="dashboard.php" class="gestionnaire_btn">Stock</a>
                <a id="employee" href="dashboard_employees.php" class="gestionnaire_btn active_gestionnnaire_btn">Employés</a>
                <a id="client" href="dashboard_clients.php" class="gestionnaire_btn">Clients</a>
            </div>

            <div class="gestionnaire_main">
                <form id="gestionnaire_employee" class="gestionnaire_form" method="POST">

                    <label for="employee_nom" class="form_label">Nom</label>
                    <input type="text" id="employee_nom" name="nom" class="form_input">

                    <label for="employee_prenom" class="form_label">Prénom</label>
                    <input type="text" id="employee_prenom" name="prenom" class="form_input">

                    <label for="employee_identifiant" class="form_label">Identifiant</label>
                    <input type="text" id="employee_identifiant" name="identifiant" class="form_input">

                    <label for="employee_mdp" class="form_label">Mot de passe</label>
                    <input type="password" id="employee_mdp" name="mdp" class="form_input">

                    <input type="submit" name="Ajouter" id="form_validation_employee" class="form_validation_btn" value="Enregistrer">
                </form>
            </div>

        </section>

        <!-- Interface de visualisation des listes -->
        <section id="list" class="list">

            <div class="list_head">
                <h2 id="list_title_employee" class="list_title">Liste des employés</h2>
            </div>

            <div id="list_employee" class="list_main">
    <?php 
        // Appeler la fonction getEmployees pour récupérer la liste des employés
        $getEmployees = getEmployees($db); 

        // Vérifier si des employés sont retournés
        if ($getEmployees) {
            foreach($getEmployees as $employee) {
                echo '<div class="list_item">
                        <p class="list_info size8">'. htmlspecialchars($employee['nom']) . '</p>
                        <p class="size8 list_info">'. htmlspecialchars($employee['prenom']) . '</p>
                        <p class="size8 list_info">'. htmlspecialchars($employee['identifiant']) . '</p>
                        <p class="size8 list_info">'. htmlspecialchars($employee['mdp']) . '</p>
                        <a href="edit_employee.php?id='.$employee['id'].'" class="list_modify_btn">Modifier</a>
                        <a href="delete_employee.php?id='.$employee['id'].'" class="list_delete_btn">Supprimer</a>
                    </div>'; 
            }
        } else {
            echo '<p>Aucun employé trouvé.</p>';
        }
    ?>
</div>
        </section>
    </main>

    <script src="/js/dashboard.js"></script>
</body>
</html>

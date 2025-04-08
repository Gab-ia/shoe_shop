<?php 
    include '../../connexion.php';
    include './composants/functionClients.php';
    include './composants/flash.php';

    if (!empty($_GET["id"]) and !empty($_GET["action"]) and $_GET["action"] == "Supprimer" and $_GET["id"] > 0) {
        if(deleteClients($db, $_GET["id"])) {
            setFlash("Client supprimé avec succès", "success" );
        } else {
            setFlash("Une erreur s'est produite, veuillez réessayer", "error");
        }
        header("Location: dashboard_clients.php");
        exit();
    }

    $currentSort = $_GET['sort'] ?? '';
    $currentOrder = $_GET['order'] ?? 'asc';

    $getClients = getAllClients($db, $currentSort, $currentOrder);

    function getSortLink($field, $currentSort, $currentOrder) {
        $newOrder = ($currentSort === $field && $currentOrder === 'asc') ? 'desc' : 'asc';
        return "?sort=$field&order=$newOrder";
    }

?>

<?php include './composants/head.php'; ?>

    <main>

        <section class="gestionnaire">

            <div class="gestionnaire_head">

                <h2 class="section_title">Gestionnaire</h2>

                <a href="dashboard.php" class="gestionnaire_btn">Stock</a>
                <a href="dashboard_employees.php" class="gestionnaire_btn">Employés</a>
                <a href="dashboard_clients.php" class="gestionnaire_btn active_gestionnnaire_btn">Clients</a>
            
            </div>

        </section>

        <section class="list">

            <h2 class="list_title">Liste des clients</h2>

            <div class="list_main">

                <div class="list_item_filter">
                    <?php
                        $fields = [
                            'nom' => 'Nom',
                            'prenom' => 'Prénom',
                            'mail' => 'Mail',
                            'identifiant' => 'Identifiant',
                            'id' => 'Date de création de compte'
                        ];

                        foreach ($fields as $field => $label) {
                            $link = getSortLink($field, $currentSort, $currentOrder);
                            $isActive = ($currentSort === $field) ? 'list_icon_filter_active' : '';
                            echo '<a class="size6 list_info_filter" href="' . $link . '">';
                            echo $label;
                            echo '<svg class="list_icon_filter ' . $isActive . '" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">';
                            echo '<path d="M137.4 41.4c12.5-12.5 32.8-12.5 45.3 0l128 128c9.2 9.2 11.9 22.9 6.9 34.9s-16.6 19.8-29.6 19.8L32 224c-12.9 0-24.6-7.8-29.6-19.8s-2.2-25.7 6.9-34.9l128-128zm0 429.3l-128-128c-9.2-9.2-11.9-22.9-6.9-34.9s16.6-19.8 29.6-19.8l256 0c12.9 0 24.6 7.8 29.6 19.8s2.2 25.7-6.9 34.9l-128 128c-12.5 12.5-32.8 12.5-45.3 0z"/>';
                            echo '</svg>';
                            echo '</a>';
                        }
                    ?>
                </div>

                <?php 
                    foreach($getClients as $clients) {
                        echo '<div class="list_item">
                                <p class="list_info size8">'. $clients['nom'] . '</p>
                                <p class="size6 list_info">'. $clients['prenom'] . '</p>
                                <p class="size6 list_info">'. $clients['mail'] . '</p>
                                <p class="size6 list_info">'. $clients['identifiant'] . '</p>
                                <a  class="list_delete_btn" onclick="showModal(\'modal-' . $clients['id'] . '\')"><svg class="list_icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0L284.2 0c12.1 0 23.2 6.8 28.6 17.7L320 32l96 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 96C14.3 96 0 81.7 0 64S14.3 32 32 32l96 0 7.2-14.3zM32 128l384 0 0 320c0 35.3-28.7 64-64 64L96 512c-35.3 0-64-28.7-64-64l0-320zm96 64c-8.8 0-16 7.2-16 16l0 224c0 8.8 7.2 16 16 16s16-7.2 16-16l0-224c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16l0 224c0 8.8 7.2 16 16 16s16-7.2 16-16l0-224c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16l0 224c0 8.8 7.2 16 16 16s16-7.2 16-16l0-224c0-8.8-7.2-16-16-16z"/></svg>Supprimer</a>
                                <div id="modal-' . $clients['id'] . '" class="modal" >
                                <div class="modal-content">
                                        <div class="modaltop">
                                            <span class="close" onclick="closeModal(\'modal-' . $clients['id'] . '\')">&times;</span>
                                            <h2>Confirmation</h2>
                                        </div>
                                        <p class="modaltxt" id="modalText">Êtes-vous sûr de vouloir supprimer le compte de ' . $clients["nom"] . ' ' . $clients['prenom'] . '?</p>
                                        <div class="modalconfirm">
                                            <a id="" href="dashboard_clients.php?action=Supprimer&id=' . $clients['id'] . '" class="list_delete_btn">Supprimer</a>&nbsp;
                                            <a class="list_cancel_btn" onclick="closeModal(\'modal-' . $clients['id'] . '\')">Annuler</a>
                                        </div>
                                    </div>
                                </div>
                            </div>';
                    }
                ?>
            </div>
        </section>
    </main>
<script src="/js/dashboard.js"></script>
</body>
</html>
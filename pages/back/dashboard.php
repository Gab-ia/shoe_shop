<?php 
    include '../../connexion.php';
    include './composants/functionShoes.php';
    include './composants/flash.php';
    
    if (!empty($_POST["Ajouter"]) and !empty($_POST["nom"]) and !empty($_POST["prix"]) and !empty($_POST["marque"]) and !empty($_POST["taille"]) and !empty($_POST["genre"]) and !empty($_POST["descript"]) and !empty($_FILES['image-nom']["name"]) > 0) {
        
        $imageName = $_FILES['image-nom']['name'];
        
        if(createShoes($db, $_POST["nom"], $_POST["prix"], $_POST["marque"], $_POST["taille"], $_POST["genre"], $_POST["descript"], $imageName)) {

            if (!empty($_FILES['image-nom']['name'])) {
                $imageName = $_FILES['image-nom']['name'];
                $imageTmp = imagecreatefromjpeg($_FILES['image-nom']['tmp_name']);
                $uploadDir =realpath(__DIR__ . '/../../img/shoes') . '/';
                $uploadFile = $uploadDir . $imageName;

                imagejpeg($imageTmp, $uploadFile, 90);
                imagedestroy($imageTmp);

                setFlash("Chaussures ajoutées avec succès", "success" );

            } else {
                setFlash("Erreur avec l'image, veuillez réessayer", "error");
            }

        } else {
            setFlash("Un problème est survenu, veuillez réessayer", "error");
        }

        header("Location: dashboard.php");
        exit();
    }

    if (!empty($_POST["Modifier"]) and !empty($_POST["nom"]) and !empty($_POST["prix"]) and !empty($_POST["marque"]) and !empty($_POST["taille"]) and !empty($_POST["genre"]) and !empty($_POST["descript"]) > 0 and !empty($_POST["id"])) {
        if(updateShoes($db, $_POST["nom"], $_POST["prix"], $_POST["marque"], $_POST["taille"], $_POST["genre"], $_POST["descript"], $_POST["id"])) {
            setFlash("Chaussures modifiées avec succès", "success" );
        } else {
            setFlash("Une erreur s'est produite, veuillez réessayer", "error");
        }
        header("Location: dashboard.php");
        exit();
    }

    if (!empty($_GET["id"]) and !empty($_GET["action"]) and $_GET["action"] == "Supprimer" and $_GET["id"] > 0) {
        if(deleteShoes($db, $_GET["id"])) {
            setFlash("Chaussures supprimées avec succès", "success" );
        } else {
            setFlash("Une erreur s'est produite, veuillez réessayer", "error");
        }
        header("Location: dashboard.php");
        exit();
    } else {
        $departmentData = null;
    }

    $currentSort = $_GET['sort'] ?? '';
    $currentOrder = $_GET['order'] ?? 'asc';

    $getShoes = getAllShoes($db, $currentSort, $currentOrder);

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
                
                <a href="dashboard.php" class="gestionnaire_btn active_gestionnnaire_btn">Stock</a>
                <a href="dashboard_employees.php" class="gestionnaire_btn">Employés</a>
                <a href="dashboard_clients.php" class="gestionnaire_btn">Clients</a>
            
            </div>

            <div class="gestionnaire_main">

                <form id="gestionnaire_stock" method="post" enctype="multipart/form-data" action="dashboard.php" class="gestionnaire_form active_form">

                    <?php 
                        if (!empty($_GET["action"]) and $_GET["action"] == "Modifier") {
                            $titre = "Modifier";
                            $shoesData = getShoesById($db, $_GET['id']);
                        } else {
                            $titre = "Ajouter";
                            $shoesData['nom']= "";
                            $shoesData['id']= 'none';
                            $shoesData['prix']= '';
                            $shoesData['marque']= '';
                            $shoesData['taille']= '';
                            $shoesData['descript']= '';
                            $shoesData['genre']= '';
                            $shoesData['image']= '';
                        }
                    ?>

                    <input type="hidden" name="id" value="<?php echo $shoesData['id'] ?>">

                    <label for="stock_nom" class="form_label">Nom</label>
                    <input type="text" id="stock_nom" name="nom" class="form_input" value="<?php echo $shoesData['nom'] ?>">    

                    <label for="stock_prix" class="form_label">Prix</label>
                    <input type="text" id="stock_prix" name="prix" class="form_input" value="<?php echo $shoesData['prix'] ?>">

                    <label for="stock_marque" class="form_label">Marque</label>
                    <input type="text" id="stock_marque" name="marque" class="form_input form_select" value="<?php echo $shoesData['marque'] ?>">

                    <label for="stock_genre" class="form_label">Genre</label>
                    <select id="stock_genre" name="genre" class="form_input form_select" value="<?php echo $shoesData['genre'] ?>">
                        <option value="">Choisir une catégorie</option>
                        <option value="Homme">Homme</option>
                        <option value="Femme">Femme</option>
                        <option value="Enfant">Enfant</option>
                    </select>

                    <label for="stock_taille" class="form_label">Taille</label>
                    <input type="text" id="stock_taille" name="taille" class="form_input" value="<?php echo $shoesData['taille'] ?>">

                    <label for="stock_description" class="form_label">Description</label>
                    <textarea rows="3" id="stock_description" name="descript" class="form_input" value="<?php echo $shoesData['descript'] ?>"><?php echo $shoesData['descript'] ?></textarea>

                    <div class="form_box">
                        <?php 
                            if (!empty($_GET["action"]) and $_GET["action"] == "Modifier") {

                            } else {
                                echo'
                                <div>
                                    <label for="stock_image" class="form_label">Image</label>
                                    <input type="file" id="stock_image" name="image-nom" onchange="show_image()" class="form_image_input">
                                    <input type="hidden" name="image-data" class="hidden-image-data" />
                                    <div id="image_visualizer" data-image="data-image" class="image_visualizer"></div>
                                </div>';
                            }
                        ?>

                        <input type="submit" id="form_validation_stock" class="form_validation_btn" name="<?php echo $titre ?>" value="<?php echo $titre ?>">
                    </div>

                </form>
     

            </div>

        </section>

        <section class="list">

            <h2 class="list_title">Liste du stock</h2>

            <div class="list_main active_list">

                <div class="list_item_filter">
                    <?php
                        $fields = [
                            'nom' => 'Nom',
                            'prix' => 'Prix',
                            'marque' => 'Marque',
                            'genre' => 'Genre',
                            'taille' => 'Taille',
                            'image' => 'Image',
                            'id' => 'Date d\'arrivage'
                        ];

                        foreach ($fields as $field => $label) {
                            $link = getSortLink($field, $currentSort, $currentOrder);
                            $isActive = ($currentSort === $field) ? 'list_icon_filter_active' : '';
                            echo '<a class="size8 list_info_filter" href="' . $link . '">';
                            echo $label;
                            echo '<svg class="list_icon_filter ' . $isActive . '" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">';
                            echo '<path d="M137.4 41.4c12.5-12.5 32.8-12.5 45.3 0l128 128c9.2 9.2 11.9 22.9 6.9 34.9s-16.6 19.8-29.6 19.8L32 224c-12.9 0-24.6-7.8-29.6-19.8s-2.2-25.7 6.9-34.9l128-128zm0 429.3l-128-128c-9.2-9.2-11.9-22.9-6.9-34.9s16.6-19.8 29.6-19.8l256 0c12.9 0 24.6 7.8 29.6 19.8s2.2 25.7-6.9 34.9l-128 128c-12.5 12.5-32.8 12.5-45.3 0z"/>';
                            echo '</svg>';
                            echo '</a>';
                        }
                    ?>
                </div>

                <?php 
                    foreach($getShoes as $shoes) {
                        echo '<div class="list_item">
                                <p class="list_info size8">'. $shoes['nom'] . '</p>
                                <p class="size8 list_info">'. $shoes['prix'] . ' €</p>
                                <p class="size8 list_info">'. $shoes['marque'] . '</p>
                                <p class="size8 list_info">'. $shoes['genre'] . '</p>
                                <p class="size8 list_info">'. $shoes['taille'] . '</p>
                                <p class="size8 list_info">'. $shoes['image'] . '</p>
                                <a href="dashboard.php?action=Modifier&id=' . $shoes['id'] . '" class=" list_modify_btn"><svg class="list_icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160L0 416c0 53 43 96 96 96l256 0c53 0 96-43 96-96l0-96c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 96c0 17.7-14.3 32-32 32L96 448c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l96 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 64z"/></svg>Modifier</a>
                                <a  class=" list_delete_btn" onclick="showModal(\'modal-' . $shoes['id'] . '\')"><svg class="list_icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0L284.2 0c12.1 0 23.2 6.8 28.6 17.7L320 32l96 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 96C14.3 96 0 81.7 0 64S14.3 32 32 32l96 0 7.2-14.3zM32 128l384 0 0 320c0 35.3-28.7 64-64 64L96 512c-35.3 0-64-28.7-64-64l0-320zm96 64c-8.8 0-16 7.2-16 16l0 224c0 8.8 7.2 16 16 16s16-7.2 16-16l0-224c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16l0 224c0 8.8 7.2 16 16 16s16-7.2 16-16l0-224c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16l0 224c0 8.8 7.2 16 16 16s16-7.2 16-16l0-224c0-8.8-7.2-16-16-16z"/></svg>Supprimer</a>
                                                    
                                <div id="modal-' . $shoes['id'] . '" class="modal" >
                                    <div class="modal-content">
                                        <div class="modaltop">
                                            <span class="close" onclick="closeModal(\'modal-' . $shoes['id'] . '\')">&times;</span>
                                            <h2>Confirmation</h2>
                                        </div>
                                        <p class="modaltxt" id="modalText">Êtes-vous sûr de vouloir supprimer les ' . $shoes["nom"] . '?</p>
                                        <div class="modalconfirm">
                                            <a id="" href="dashboard.php?action=Supprimer&id=' . $shoes['id'] . '" class="list_delete_btn">Supprimer</a>&nbsp;
                                            <a class="list_cancel_btn" onclick="closeModal(\'modal-' . $shoes['id'] . '\')">Annuler</a>
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
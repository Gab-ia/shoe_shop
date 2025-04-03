<?php 

function getAllShoes($db) {
    try {
        $query = $db->prepare('SELECT * FROM shoes');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        return false;
    }
}

function createShoes ($db,  $nom, $prix, $marque, $taille, $genre, $descript, $img, $id) {
    try {
        $insert = $db->prepare('INSERT INTO shoes SET nom = :nom, prix = :prix, marque = :marque, taille = :taille, genre = :genre, descript = :descript, img = :img, id = :id');
        $insert->bindValue(':nom',trim(htmlspecialchars($nom)), PDO::PARAM_STR);
        $insert->bindValue(':prix',(float)trim(htmlspecialchars($prix)), PDO::PARAM_STR);
        $insert->bindValue(':marque',trim(htmlspecialchars($marque)), PDO::PARAM_STR);
        $insert->bindValue(':taille',trim(htmlspecialchars($taille)), PDO::PARAM_INT);
        $insert->bindValue(':genre',trim(htmlspecialchars($genre)), PDO::PARAM_STR);
        $insert->bindValue(':img',trim(htmlspecialchars($img)), PDO::PARAM_STR);
        $insert->bindValue(':descript',trim(htmlspecialchars($descript)), PDO::PARAM_STR);
        $insert->bindValue(':id',trim(htmlspecialchars($id)), PDO::PARAM_INT);
        $insert->execute();
        $insert_id = $db->lastInsertId();
        return $db->lastInsertId();
    } catch (PDOException $e) {
        return false;
    }
}

function updateShoes ($db, $nom, $prix, $marque, $taille, $genre, $descript, $img, $id) {
    try {
        $update = $db->prepare('update shoes SET nom = :nom, prix = :prix, marque = :marque, taille = :taille, genre = :genre, descript = :descript, img = :img where id = :id');
        $update->bindValue(':nom',trim(htmlspecialchars($nom)), PDO::PARAM_STR);
        $update->bindValue(':prix',trim(htmlspecialchars($prix)), PDO::PARAM_FLOAT);
        $update->bindValue(':marque',trim(htmlspecialchars($marque)), PDO::PARAM_STR);
        $update->bindValue(':taille',trim(htmlspecialchars($taille)), PDO::PARAM_INT);
        $update->bindValue(':genre',trim(htmlspecialchars($genre)), PDO::PARAM_STR);
        $update->bindValue(':img',trim(htmlspecialchars($img)), PDO::PARAM_STR);
        $update->bindValue(':descript',trim(htmlspecialchars($descript)), PDO::PARAM_STR);
        $update->bindValue(':id',trim(htmlspecialchars($id)), PDO::PARAM_INT);
        return $update->execute();
    } catch (PDOException $e) {
        return false;
    }
}

function deleteShoes($db, $id) {
    try {
        $delete = $db->prepare('DELETE FROM shoes WHERE id = :id');
        $delete->bindValue(':id', $id, PDO::PARAM_INT);
        return $delete->execute();
    } catch (PDOException $e) {
        return false;
    }
}

function getShoesById($db, $id) {
    try {
        $query = $db->prepare('SELECT * FROM shoes WHERE id = :id');
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        return false;
    }
}

if (!empty($_POST["Editer"]) and !empty($_POST["name"]) > 0 and !empty($_POST["id"])) {
    if(updateDepartment($db, $_POST["id"], $_POST["name"])) {
        setFlash("Service modifié avec succès", "success" );
    } else {
        setFlash("Une erreur s'est produite, veuillez réessayer", "error");
    }
    header("Location: services.php");
    exit();
}

if (!empty($_GET["id"]) and !empty($_GET["action"]) and $_GET["action"] == "supprimer" and $_GET["id"] > 0) {
    if(deleteDepartment($db, $_GET["id"])) {
        setFlash("Service supprimé avec succès", "success" );
    } else {
        setFlash("Une erreur s'est produite, veuillez réessayer", "error");
    }
    header("Location: services.php");
    exit();
} else {
    $departmentData = null;
}

$getShoes = getAllShoes($db);
$uploadDir = "/img/shoes";
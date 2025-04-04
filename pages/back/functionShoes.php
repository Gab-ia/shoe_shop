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

function createShoes($db, $nom, $prix, $marque, $taille, $genre, $descript, $img) {
    try {
        $insert = $db->prepare('INSERT INTO shoes (nom, prix, marque, taille, genre, descript, image) VALUES (:nom, :prix, :marque, :taille, :genre, :descript, :image)');
        $insert->bindValue(':nom', trim(htmlspecialchars($nom)), PDO::PARAM_STR);
        $insert->bindValue(':prix', (float)trim(htmlspecialchars($prix)), PDO::PARAM_STR);
        $insert->bindValue(':marque', trim(htmlspecialchars($marque)), PDO::PARAM_STR);
        $insert->bindValue(':taille', trim(htmlspecialchars($taille)), PDO::PARAM_INT);
        $insert->bindValue(':genre', trim(htmlspecialchars($genre)), PDO::PARAM_STR);
        $insert->bindValue(':descript', trim(htmlspecialchars($descript)), PDO::PARAM_STR);
        $insert->bindValue(':image', trim(htmlspecialchars($img)), PDO::PARAM_STR);
        $insert->execute();
        return $db->lastInsertId();
    } catch (PDOException $e) {
        return false;
    }
}

function updateShoes($db, $nom, $prix, $marque, $taille, $genre, $descript, $img, $id) {
    try {
        $update = $db->prepare('UPDATE shoes SET nom = :nom, prix = :prix, marque = :marque, taille = :taille, genre = :genre, descript = :descript, image = :image WHERE id = :id');
        $update->bindValue(':nom', trim(htmlspecialchars($nom)), PDO::PARAM_STR);
        $update->bindValue(':prix', (float)trim(htmlspecialchars($prix)), PDO::PARAM_STR);
        $update->bindValue(':marque', trim(htmlspecialchars($marque)), PDO::PARAM_STR);
        $update->bindValue(':taille', trim(htmlspecialchars($taille)), PDO::PARAM_INT);
        $update->bindValue(':genre', trim(htmlspecialchars($genre)), PDO::PARAM_STR);
        $update->bindValue(':descript', trim(htmlspecialchars($descript)), PDO::PARAM_STR);
        $update->bindValue(':image', trim(htmlspecialchars($img)), PDO::PARAM_STR);
        $update->bindValue(':id', (int)trim(htmlspecialchars($id)), PDO::PARAM_INT);
        return $update->execute();
    } catch (PDOException $e) {
        return false;
    }
}

function deleteShoes($db, $id) {
    try {
        $delete = $db->prepare('DELETE FROM shoes WHERE id = :id');
        $delete->bindValue(':id', (int)$id, PDO::PARAM_INT);
        return $delete->execute();
    } catch (PDOException $e) {
        return false;
    }
}

function getShoesById($db, $id) {
    try {
        $query = $db->prepare('SELECT * FROM shoes WHERE id = :id');
        $query->bindValue(':id', (int)$id, PDO::PARAM_INT);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        return false;
    }
}

// Correction de l'action de suppression
if (!empty($_GET["id"]) && !empty($_GET["action"]) && $_GET["action"] == "supprimer" && $_GET["id"] > 0) {
    if (deleteShoes($db, $_GET["id"])) {  // Correction de la fonction appelée
        setFlash("Produit supprimé avec succès", "success");
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
?>

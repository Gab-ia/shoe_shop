<?php 

function getAllShoes($db) {
    try {
        $query = $db->prepare('SELECT * FROM chaussure');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        return false;
    }
}

function createShoes ($db, $id, $nom, $prix, $marque, $taille, $genre, $descript, $img) {
    try {
        $insert = $db->prepare('INSERT INTO chaussure SET prenom = :prenom, nom = :nom, prix = :prix, marque = :marque, taille = :taille, genre = :genre, descript = :descript, img = :img, id = :id');
        $insert->bindValue(':prenom',trim(htmlspecialchars($prenom)), PDO::PARAM_STR);
        $insert->bindValue(':nom',trim(htmlspecialchars($nom)), PDO::PARAM_STR);
        $insert->bindValue(':prix',trim(htmlspecialchars($prix)), PDO::PARAM_FLOAT);
        $insert->bindValue(':marque',trim(htmlspecialchars($marque)), PDO::PARAM_STR);
        $insert->bindValue(':taille',trim(htmlspecialchars($taille)), PDO::PARAM_INT);
        $insert->bindValue(':genre',trim(htmlspecialchars($genre)), PDO::PARAM_STR);
        $insert->bindValue(':img',trim(htmlspecialchars($img)), PDO::PARAM_STR);
        $insert->bindValue(':id',trim(htmlspecialchars($id)), PDO::PARAM_INT);
        $insert->execute();
        $insert_id = $db->lastInsertId();
        return $db->lastInsertId();
    } catch (PDOException $e) {
        return false;
    }
}

// function updateShoes

// function deleteShoes

// function getShoesById
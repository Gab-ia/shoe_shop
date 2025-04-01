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
        $insert = $db->prepare('INSERT INTO chaussure SET prenom = :prenom, nom = :nom, prix = :prix, marque = :marque, taille = :taille, genre = :genre, descript = :descript, img = :img');
        $insert->bindValue(':prenom',trim(htmlspecialchars($first_name)), PDO::PARAM_STR);
        $insert->bindValue(':nom',trim(htmlspecialchars($last_name)), PDO::PARAM_STR);
        $insert->bindValue(':prix',trim(htmlspecialchars($last_name)), PDO::PARAM_STR);
        $insert->bindValue(':marque',trim(htmlspecialchars($last_name)), PDO::PARAM_STR);
        $insert->bindValue(':taille',trim(htmlspecialchars($last_name)), PDO::PARAM_STR);
        $insert->bindValue(':genre',trim(htmlspecialchars($department)), PDO::PARAM_INT);
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
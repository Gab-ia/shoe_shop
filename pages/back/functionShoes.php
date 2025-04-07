<?php 

function getAllShoes($db, $sort = 'nom', $order = 'asc') {
    try {
        $validFields = ['nom', 'prix', 'marque', 'taille', 'genre', 'id'];
        if (!in_array($sort, $validFields)) {
            $sort = 'id';
        }

        if ($order !== 'asc' && $order !== 'desc') {
            $order = 'asc';
        }

        $query = $db->prepare("SELECT * FROM shoes ORDER BY $sort $order");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        return false;
    }
}

function createShoes ($db, $nom, $prix, $marque, $taille, $genre, $descript, $img) {
    try {
        $insert = $db->prepare('INSERT INTO shoes SET nom = :nom, prix = :prix, marque = :marque, taille = :taille, genre = :genre, descript = :descript, image = :image');
        $insert->bindValue(':nom',trim(htmlspecialchars($nom)), PDO::PARAM_STR);
        $insert->bindValue(':prix',(float)trim(htmlspecialchars($prix)), PDO::PARAM_STR);
        $insert->bindValue(':marque',trim(htmlspecialchars($marque)), PDO::PARAM_STR);
        $insert->bindValue(':taille',trim(htmlspecialchars($taille)), PDO::PARAM_INT);
        $insert->bindValue(':genre',trim(htmlspecialchars($genre)), PDO::PARAM_STR);
        $insert->bindValue(':descript',trim(htmlspecialchars($descript)), PDO::PARAM_STR);
        $insert->bindValue(':image',trim(htmlspecialchars($img)), PDO::PARAM_STR);
        $insert->execute();
        $insert_id = $db->lastInsertId();
        return $db->lastInsertId();
    } catch (PDOException $e) {
        return false;
    }
}

function updateShoes ($db, $nom, $prix, $marque, $taille, $genre, $descript, $id) {
    try {
        $update = $db->prepare('UPDATE shoes SET nom = :nom, prix = :prix, marque = :marque, taille = :taille, genre = :genre, descript = :descript where id = :id');
        $update->bindValue(':nom',trim(htmlspecialchars($nom)), PDO::PARAM_STR);
        $update->bindValue(':prix',(float)trim(htmlspecialchars($prix)), PDO::PARAM_STR);
        $update->bindValue(':marque',trim(htmlspecialchars($marque)), PDO::PARAM_STR);
        $update->bindValue(':taille',trim(htmlspecialchars($taille)), PDO::PARAM_INT);
        $update->bindValue(':genre',trim(htmlspecialchars($genre)), PDO::PARAM_STR);
        $update->bindValue(':descript',trim(htmlspecialchars($descript)), PDO::PARAM_STR);
        $update->bindValue(':id', trim(htmlspecialchars($id)), PDO::PARAM_INT);
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




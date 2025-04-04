<?php 

function getAllClients($db) {
    try {
        $query = $db->prepare('SELECT * FROM clients');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        return false;
    }
}


function deleteClients($db, $id) {
    try {
        $delete = $db->prepare('DELETE FROM clients WHERE id = :id');
        $delete->bindValue(':id', $id, PDO::PARAM_INT);
        return $delete->execute();
    } catch (PDOException $e) {
        return false;
    }
}

function getClientsById($db, $id) {
    try {
        $query = $db->prepare('SELECT * FROM clients WHERE id = :id');
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        return false;
    }
}

$getClients = getAllClients($db);

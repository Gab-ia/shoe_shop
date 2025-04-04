<?php 

function getAllClients($db, $sort = 'nom', $order = 'asc') {
    try {
        $validFields = ['nom', 'prenom', 'mail', 'identifiant', 'id'];
        if (!in_array($sort, $validFields)) {
            $sort = 'id';
        }

        if ($order !== 'asc' && $order !== 'desc') {
            $order = 'asc';
        }

        $query = $db->prepare("SELECT * FROM clients ORDER BY $sort $order");
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


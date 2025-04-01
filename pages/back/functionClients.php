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

$getClients = getAllClients($db);

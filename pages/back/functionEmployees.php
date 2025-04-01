<?php 

function getAllEmployees($db) {
    try {
        $query = $db->prepare('SELECT * FROM employees');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        return false;
    }
}

$getEmployees = getAllEmployees($db);

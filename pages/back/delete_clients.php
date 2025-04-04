<?php
require '../includes/connexion.php';
require '../includes/functionsClients.php';

if (isset($_GET['id'])) {
    $client_id = $_GET['id'];
    deleteClient($db, $client_id);
}

function deleteClient($db, $id) {
    try {
        $delete = $db->prepare('DELETE FROM clients WHERE id = :id');
        $delete->bindValue(':id', $id, PDO::PARAM_INT);
        $delete->execute();
        header('Location: clients.php');
        exit();
    } catch (PDOException $e) {
        return false;
    }
}
?>

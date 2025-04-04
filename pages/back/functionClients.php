<?php 

// Récupérer tous les clients
function getAllClients($db) {
    try {
        $query = $db->prepare('SELECT * FROM clients');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        return false;
    }
}

// Créer un nouveau client
function createClients($db, $prenom, $nom, $mail, $identifiant, $mdp) {
    try {
        $insert = $db->prepare('INSERT INTO clients (prenom, nom, mail, identifiant, mdp) 
                                VALUES (:prenom, :nom, :mail, :identifiant, :mdp)');
        $insert->bindValue(':prenom', trim(htmlspecialchars($prenom)), PDO::PARAM_STR);
        $insert->bindValue(':nom', trim(htmlspecialchars($nom)), PDO::PARAM_STR);
        $insert->bindValue(':mail', trim(htmlspecialchars($mail)), PDO::PARAM_STR);
        $insert->bindValue(':identifiant', trim(htmlspecialchars($identifiant)), PDO::PARAM_STR);
        $insert->bindValue(':mdp', trim(htmlspecialchars($mdp)), PDO::PARAM_STR);
        $insert->execute();
        return $db->lastInsertId();
    } catch (PDOException $e) {
        return false;
    }
}

// Mettre à jour un client
function updateClients($db, $prenom, $nom, $mail, $identifiant, $mdp, $id) {
    try {
        $update = $db->prepare('UPDATE clients 
                                SET prenom = :prenom, nom = :nom, mail = :mail, identifiant = :identifiant, mdp = :mdp 
                                WHERE id = :id');
        $update->bindValue(':prenom', trim(htmlspecialchars($prenom)), PDO::PARAM_STR);
        $update->bindValue(':nom', trim(htmlspecialchars($nom)), PDO::PARAM_STR);
        $update->bindValue(':mail', trim(htmlspecialchars($mail)), PDO::PARAM_STR);
        $update->bindValue(':identifiant', trim(htmlspecialchars($identifiant)), PDO::PARAM_STR);
        $update->bindValue(':mdp', trim(htmlspecialchars($mdp)), PDO::PARAM_STR);
        $update->bindValue(':id', trim(htmlspecialchars($id)), PDO::PARAM_INT);
        return $update->execute();
    } catch (PDOException $e) {
        return false;
    }
}

// Supprimer un client
function deleteClients($db, $id) {
    try {
        $delete = $db->prepare('DELETE FROM clients WHERE id = :id');
        $delete->bindValue(':id', $id, PDO::PARAM_INT);
        return $delete->execute();
    } catch (PDOException $e) {
        return false;
    }
}

// Récupérer un client par son ID
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

// Traitement des formulaires (création, mise à jour et suppression des clients)
if (!empty($_POST["Enregistrer"]) && !empty($_POST["prenom"]) && !empty($_POST["nom"])) {
    if (createClients($db, $_POST["prenom"], $_POST["nom"], $_POST["mail"], $_POST["identifiant"], $_POST["mdp"])) {
        setFlash("Client enregistré avec succès", "success");
    } else {
        setFlash("Une erreur s'est produite, veuillez réessayer", "error");
    }
    header("Location: clients.php");
    exit();
}

if (!empty($_POST["Editer"]) && !empty($_POST["prenom"]) && !empty($_POST["nom"]) && !empty($_POST["id"])) {
    if (updateClients($db, $_POST["prenom"], $_POST["nom"], $_POST["mail"], $_POST["identifiant"], $_POST["mdp"], $_POST["id"])) {
        setFlash("Client modifié avec succès", "success");
    } else {
        setFlash("Une erreur s'est produite, veuillez réessayer", "error");
    }
    header("Location: clients.php");
    exit();
}

if (!empty($_GET["id"]) && !empty($_GET["action"]) && $_GET["action"] == "supprimer" && $_GET["id"] > 0) {
    if (deleteClients($db, $_GET["id"])) {
        setFlash("Client supprimé avec succès", "success");
    } else {
        setFlash("Une erreur s'est produite, veuillez réessayer", "error");
    }
    header("Location: clients.php");
    exit();
} else {
    $clientData = null;
}

// Récupérer la liste des clients
$getClients = getAllClients($db);

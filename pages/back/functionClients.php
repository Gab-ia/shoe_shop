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

function createClients ($db, $prenom,  $nom, $mail, $identifiant, $mdp, $id) {
    try {
        $insert = $db->prepare('INSERT INTO clients SET prenom = :prenom, nom = :nom, mail = :mail, identifiant = :identifiant, mdp = :mdp, id = :id');
        $insert->bindValue(':prenom',trim(htmlspecialchars($prenom)), PDO::PARAM_STR);
        $insert->bindValue(':nom',trim(htmlspecialchars($nom)), PDO::PARAM_STR);
        $insert->bindValue(':mail',trim(htmlspecialchars($mail)), PDO::PARAM_STR);
        $insert->bindValue(':identifiant',trim(htmlspecialchars($identifiant)), PDO::PARAM_STR);
        $insert->bindValue(':mdp',trim(htmlspecialchars($mdp)), PDO::PARAM_STR);
        $insert->bindValue(':id',trim(htmlspecialchars($id)), PDO::PARAM_INT);
        $insert->execute();
        $insert_id = $db->lastInsertId();
        return $db->lastInsertId();
    } catch (PDOException $e) {
        return false;
    }
}

function updateClients ($db, $prenom,  $nom, $mail, $identifiant, $mdp, $id) {
    try {
        $update = $db->prepare('update clients SET prenom = :prenom, nom = :nom, mail = :mail, identifiant = :identifiant, mdp = :mdp where id = :id');
        $update->bindValue(':prenom',trim(htmlspecialchars($prenom)), PDO::PARAM_STR);
        $update->bindValue(':nom',trim(htmlspecialchars($nom)), PDO::PARAM_STR);
        $update->bindValue(':mail',trim(htmlspecialchars($mail)), PDO::PARAM_STR);
        $update->bindValue(':identifiant',trim(htmlspecialchars($identifiant)), PDO::PARAM_STR);
        $update->bindValue(':mdp',trim(htmlspecialchars($mdp)), PDO::PARAM_STR);
        $update->bindValue(':id',trim(htmlspecialchars($id)), PDO::PARAM_INT);
        return $update->execute();
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


if (!empty($_POST["Enregistrer"]) and !empty($_POST["name"]) > 0) {
    if(createDepartment($db, $_POST["name"])) {
        setFlash("Service enregistré avec succès", "success" );
    } else {
        setFlash("Une erreur s'est produite, veuillez réessayer", "error");
    }
    header("Location: services.php");
    exit();
}

if (!empty($_POST["Editer"]) and !empty($_POST["name"]) > 0 and !empty($_POST["id"])) {
    if(updateDepartment($db, $_POST["id"], $_POST["name"])) {
        setFlash("Service modifié avec succès", "success" );
    } else {
        setFlash("Une erreur s'est produite, veuillez réessayer", "error");
    }
    header("Location: services.php");
    exit();
}

if (!empty($_GET["id"]) and !empty($_GET["action"]) and $_GET["action"] == "supprimer" and $_GET["id"] > 0) {
    if(deleteDepartment($db, $_GET["id"])) {
        setFlash("Service supprimé avec succès", "success" );
    } else {
        setFlash("Une erreur s'est produite, veuillez réessayer", "error");
    }
    header("Location: services.php");
    exit();
} else {
    $departmentData = null;
}

$getClients = getAllClients($db);

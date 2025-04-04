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

function createEmployees($db, $prenom, $nom, $identifiant, $mdp) {
    try {
        $insert = $db->prepare('INSERT INTO employees SET prenom = :prenom, nom = :nom, identifiant = :identifiant, mdp = :mdp');
        $insert->bindValue(':prenom', trim(htmlspecialchars($prenom)), PDO::PARAM_STR);
        $insert->bindValue(':nom', trim(htmlspecialchars($nom)), PDO::PARAM_STR);
        $insert->bindValue(':identifiant', trim(htmlspecialchars($identifiant)), PDO::PARAM_STR);
        $insert->bindValue(':mdp', trim(htmlspecialchars($mdp)), PDO::PARAM_STR);
        $insert->execute();
        return $db->lastInsertId();
    } catch (PDOException $e) {
        return false;
    }
}

function updateEmployees($db, $prenom, $nom, $identifiant, $mdp, $id) {
    try {
        $update = $db->prepare('UPDATE employees SET prenom = :prenom, nom = :nom, identifiant = :identifiant, mdp = :mdp WHERE id = :id');
        $update->bindValue(':prenom', trim(htmlspecialchars($prenom)), PDO::PARAM_STR);
        $update->bindValue(':nom', trim(htmlspecialchars($nom)), PDO::PARAM_STR);
        $update->bindValue(':identifiant', trim(htmlspecialchars($identifiant)), PDO::PARAM_STR);
        $update->bindValue(':mdp', trim(htmlspecialchars($mdp)), PDO::PARAM_STR);
        $update->bindValue(':id', trim(htmlspecialchars($id)), PDO::PARAM_INT);
        return $update->execute();
    } catch (PDOException $e) {
        return false;
    }
}

function deleteEmployees($db, $id) {
    try {
        $delete = $db->prepare('DELETE FROM employees WHERE id = :id');
        $delete->bindValue(':id', $id, PDO::PARAM_INT);
        return $delete->execute();
    } catch (PDOException $e) {
        return false;
    }
}

function getEmployeesById($db, $id) {
    try {
        $query = $db->prepare('SELECT * FROM employees WHERE id = :id');
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        return false;
    }
}

if (!empty($_POST["Enregistrer"]) && !empty($_POST["prenom"]) && !empty($_POST["nom"])) {
    if (createEmployees($db, $_POST["prenom"], $_POST["nom"], $_POST["identifiant"], $_POST["mdp"])) {
        setFlash("Employé enregistré avec succès", "success");
    } else {
        setFlash("Une erreur s'est produite, veuillez réessayer", "error");
    }
    header("Location: employees.php");
    exit();
}

if (!empty($_POST["Editer"]) && !empty($_POST["prenom"]) && !empty($_POST["nom"]) && !empty($_POST["id"])) {
    if (updateEmployees($db, $_POST["prenom"], $_POST["nom"], $_POST["identifiant"], $_POST["mdp"], $_POST["id"])) {
        setFlash("Employé modifié avec succès", "success");
    } else {
        setFlash("Une erreur s'est produite, veuillez réessayer", "error");
    }
    header("Location: employees.php");
    exit();
}

if (!empty($_GET["id"]) && !empty($_GET["action"]) && $_GET["action"] == "supprimer" && $_GET["id"] > 0) {
    if (deleteEmployees($db, $_GET["id"])) {
        setFlash("Employé supprimé avec succès", "success");
    } else {
        setFlash("Une erreur s'est produite, veuillez réessayer", "error");
    }
    header("Location: employees.php");
    exit();
} else {
    $employeeData = null;
}

function getEmployees($db) {
    // Effectuer une requête pour récupérer tous les employés
    $sql = "SELECT * FROM employees"; // Remplacez "employees" par le nom de votre table d'employés
    $stmt = $db->query($sql); // Utilisation d'une requête simple pour récupérer les données
    
    return $stmt->fetchAll(PDO::FETCH_ASSOC); // Retourner toutes les lignes sous forme de tableau associatif
}

$getEmployees = getAllEmployees($db);

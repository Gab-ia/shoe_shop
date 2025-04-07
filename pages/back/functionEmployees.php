<?php
/**
 * Récupère la liste de tous les employés.
 *
 * @param PDO $db
 * @return array
 */
function getEmployees($db, $sort = 'nom', $order = 'asc') {
    try {
        $validFields = ['nom', 'prenom', 'identifiant', 'id'];
        if (!in_array($sort, $validFields)) {
            $sort = 'id';
        }

        if ($order !== 'asc' && $order !== 'desc') {
            $order = 'asc';
        }

        $query = $db->prepare("SELECT * FROM employees ORDER BY $sort $order");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        return false;
    }
}

/**
 * Ajoute un nouvel employé dans la base de données.
 * Le mot de passe doit être haché avant d'être passé à cette fonction.
 *
 * @param PDO    $db
 * @param string $nom
 * @param string $prenom
 * @param string $identifiant
 * @param string $mdp (haché)
 * @return bool
 */
function addEmployee($db, $nom, $prenom, $identifiant, $mdp)
{
    $stmt = $db->prepare("INSERT INTO employees (nom, prenom, identifiant, mdp) VALUES (?, ?, ?, ?)");
    return $stmt->execute([$nom, $prenom, $identifiant, $mdp]);
}

/**
 * Met à jour les informations d'un employé existant en modifiant le mot de passe.
 * Le mot de passe doit être haché avant d'être passé à cette fonction.
 *
 * @param PDO    $db
 * @param int    $id
 * @param string $nom
 * @param string $prenom
 * @param string $identifiant
 * @param string $mdp (haché)
 * @return bool
 */
function updateEmployee($db, $id, $nom, $prenom, $identifiant, $mdp)
{
    $stmt = $db->prepare("UPDATE employees SET nom = ?, prenom = ?, identifiant = ?, mdp = ? WHERE id = ?");
    return $stmt->execute([$nom, $prenom, $identifiant, $mdp, $id]);
}

/**
 * Met à jour les informations d'un employé existant sans modifier le mot de passe.
 *
 * @param PDO    $db
 * @param int    $id
 * @param string $nom
 * @param string $prenom
 * @param string $identifiant
 * @return bool
 */
function updateEmployeeWithoutPassword($db, $id, $nom, $prenom, $identifiant)
{
    $stmt = $db->prepare("UPDATE employees SET nom = ?, prenom = ?, identifiant = ? WHERE id = ?");
    return $stmt->execute([$nom, $prenom, $identifiant, $id]);
}

/**
 * Supprime un employé de la base de données.
 *
 * @param PDO $db
 * @param int $id
 * @return bool
 */
function deleteEmployee($db, $id)
{
    $stmt = $db->prepare("DELETE FROM employees WHERE id = ?");
    return $stmt->execute([$id]);
}
?>
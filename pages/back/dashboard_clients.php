<?php
require '../includes/connexion.php';
require '../includes/functionClients.php';

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

$clients = getAllClients($db);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion des clients</title>
    <link rel="stylesheet" href="../public/css/style.css">
</head>
<body>
    <?php include '../templates/nav.php'; ?>

    <h1>Liste des clients</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Prénom</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Adresse</th>
                <th>Téléphone</th>
                <th>Date d'inscription</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($clients as $client) : ?>
                <tr>
                    <td><?php echo $client['id']; ?></td>
                    <td><?php echo $client['prenom']; ?></td>
                    <td><?php echo $client['nom']; ?></td>
                    <td><?php echo $client['email']; ?></td>
                    <td><?php echo $client['adresse']; ?></td>
                    <td><?php echo $client['telephone']; ?></td>
                    <td><?php echo $client['date_inscription']; ?></td>
                    <td>
                        <a href="edit_client.php?id=<?php echo $client['id']; ?>">Éditer</a>
                        <a href="delete_client.php?id=<?php echo $client['id']; ?>">Supprimer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <a href="add_client.php">Ajouter un client</a>

    <?php include '../templates/footer.php'; ?>
</body>
</html>

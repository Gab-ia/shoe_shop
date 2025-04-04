<?php
require '../includes/connexion.php';
require '../includes/functionsClients.php';

if (isset($_GET['id'])) {
    $client_id = $_GET['id'];
    $client = getClientById($db, $client_id);
} else {
    header('Location: clients.php');
    exit();
}

// Fonction pour récupérer un client par son ID
function getClientById($db, $id) {
    try {
        $query = $db->prepare('SELECT * FROM clients WHERE id = :id');
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        return false;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $adresse = $_POST['adresse'];
    $telephone = $_POST['telephone'];

    // Mise à jour du client
    updateClient($db, $client_id, $prenom, $nom, $email, $adresse, $telephone);
    header('Location: clients.php');
    exit();
}

// Fonction pour mettre à jour un client
function updateClient($db, $id, $prenom, $nom, $email, $adresse, $telephone) {
    try {
        $update = $db->prepare('UPDATE clients SET prenom = :prenom, nom = :nom, email = :email, adresse = :adresse, telephone = :telephone WHERE id = :id');
        $update->bindValue(':prenom', $prenom);
        $update->bindValue(':nom', $nom);
        $update->bindValue(':email', $email);
        $update->bindValue(':adresse', $adresse);
        $update->bindValue(':telephone', $telephone);
        $update->bindValue(':id', $id);
        $update->execute();
        return true;
    } catch (PDOException $e) {
        return false;
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Éditer Client</title>
    <link rel="stylesheet" href="../public/css/style.css">
</head>
<body>
    <?php include '../templates/nav.php'; ?>

    <h1>Éditer le client</h1>

    <form method="POST">
        <label for="prenom">Prénom</label>
        <input type="text" id="prenom" name="prenom" value="<?php echo $client['prenom']; ?>" required>

        <label for="nom">Nom</label>
        <input type="text" id="nom" name="nom" value="<?php echo $client['nom']; ?>" required>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="<?php echo $client['email']; ?>" required>

        <label for="adresse">Adresse</label>
        <input type="text" id="adresse" name="adresse" value="<?php echo $client['adresse']; ?>">

        <label for="telephone">Téléphone</label>
        <input type="text" id="telephone" name="telephone" value="<?php echo $client['telephone']; ?>">

        <button type="submit">Mettre à jour</button>
    </form>

    <?php include '../templates/footer.php'; ?>
</body>
</html>

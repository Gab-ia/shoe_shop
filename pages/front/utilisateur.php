<?php
session_start(); // Démarre la session

// Inclure le fichier de connexion à la base de données
include "connexion.php" ;

// Vérifier si l'utilisateur est connecté
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    
    // Requête SQL pour récupérer l'utilisateur par ID
    $stmt = $pdo->prepare("SELECT * FROM clients WHERE id = ?");
    $stmt->execute([$user_id]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($user) {
        // Afficher le prénom de l'utilisateur pour le message personnalisé
        $nom_utilisateur = $user['prenom'];
    } else {
        // Si l'utilisateur n'est pas trouvé, afficher "Utilisateur"
        $nom_utilisateur = "Utilisateur";
    }
} else {
    // Si l'utilisateur n'est pas connecté, afficher "Visiteur"
    $nom_utilisateur = "Visiteur";
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mon Compte</title>
  <link rel="stylesheet" href="/css/style-utilisateur.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
  <section class="user_account_section">
    <img src="/img/logo-nike.svg" alt="">
    <h1>Mon Compte</h1>

    <!-- Message de bienvenue -->
    <p class="welcome_message">Bienvenue, <?php echo $nom_utilisateur; ?> !</p>

    <nav class="user_nav">
      <ul>
        <li><a href="/accueil.php">Accueil</a></li>
        <li><a href="#historique">Historique d'achat</a></li>
        <li><a href="#favoris">Mes favoris</a></li>
        <li><a href="/logout.php">Déconnexion</a></li>
      </ul>
    </nav>

    <section id="historique" class="user_section">
      <h2>Historique d'achat</h2>
      <ul class="purchase_history">
        <ul>Commande #12345 - Sneakers Jordan 1 - <span>Livrée</span></ul>
        <ul>Commande #67890 - Sneakers Jordan 2 - <span>En cours</span></ul>
      </ul>
    </section>

    <section id="favoris" class="user_section">
      <h2>Mes favoris</h2>
      <ul class="favorite_list">
        <?php foreach ($shoes as $shoe): ?>
            <li>
                <img src="/img/shoes/<?php echo htmlspecialchars($shoe['image']); ?>" alt="<?php echo htmlspecialchars($shoe['nom']); ?>" width="50">
                <?php echo htmlspecialchars($shoe['nom']); ?> - <?php echo htmlspecialchars($shoe['prix']); ?> €
                <button>Retirer</button>
            </li>
        <?php endforeach; ?>
      </ul>
    </section>
  </section>
</body>

</html>
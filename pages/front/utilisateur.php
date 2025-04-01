<?php
session_start(); // Démarre la session

// Inclure le fichier de connexion à la base de données
include "connexion.php";

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

    // Requête SQL pour récupérer l'historique des achats de l'utilisateur avec le nom et prix des produits
    $stmt_commandes = $pdo->prepare("
        SELECT co.id AS commande_id, s.nom, s.prix, co.statut 
        FROM commandes co
        JOIN shoes s ON co.produit_id = s.id
        WHERE co.client_id = ?
    ");
    $stmt_commandes->execute([$user_id]);
    $commandes = $stmt_commandes->fetchAll(PDO::FETCH_ASSOC);
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

    <!-- Section Historique d'achat -->
    <section id="historique" class="user_section">
      <h2>Historique d'achat</h2>
      <ul class="purchase_history">
        <?php foreach ($commandes as $commande): ?>
          <li>
            Commande #<?php echo $commande['commande_id']; ?> - 
            <?php echo htmlspecialchars($commande['nom']); ?> - 
            <?php echo htmlspecialchars($commande['prix']); ?> € - 
            <span><?php echo htmlspecialchars($commande['statut']); ?></span>
          </li>
        <?php endforeach; ?>
      </ul>
    </section>

    <!-- Section Favoris -->
    <section id="favoris" class="user_section">
      <h2>Mes favoris</h2>
      <ul class="favorite_list">
        <?php
        // Récupérer les produits favoris de l'utilisateur (exemple simple pour l'affichage)
        $stmt_favoris = $pdo->prepare("SELECT * FROM shoes WHERE id IN (SELECT produit_id FROM favoris WHERE client_id = ?)");
        $stmt_favoris->execute([$user_id]);
        $shoes = $stmt_favoris->fetchAll(PDO::FETCH_ASSOC);
        
        foreach ($shoes as $shoe):
        ?>
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

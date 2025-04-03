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

  <header>
    <div class="logo">
      <!-- Remplacer le logo SVG par une image -->
      <img src="/img/logo-shoe.png" alt="Logo Shoe" class="size-logo">
    </div>

    <nav class="user_nav">
      <ul>
        <li><a href="/pages/front/accueil.php">Accueil</a></li>
        <li><a href="#nouveauté">Nouveaux Arrivages</a></li>
        <li><a href="/logout.php">Déconnexion</a></li>
      </ul>
    </nav>
  </header>

  <section class="user_account_section">

    <!-- Message de bienvenue -->
    <p class="welcome-message">Bienvenue sur votre profil, Isaac <?php echo htmlspecialchars($nom_utilisateur); ?> !</p>

    <!-- Section Historique d'achat -->
    <section id="historique" class="user_section">
      <h2>Historique d'achat</h2>
      <ul class="purchase_history">
        <?php if (!empty($commandes)): ?>
          <?php foreach ($commandes as $commande): ?>
            <li>
              Commande #<?php echo htmlspecialchars($commande['commande_id']); ?> -
              <?php echo htmlspecialchars($commande['nom']); ?> -
              <?php echo htmlspecialchars($commande['prix']); ?> € -
              <span><?php echo htmlspecialchars($commande['statut']); ?></span>
            </li>
          <?php endforeach; ?>
        <?php else: ?>
          <ul>Aucune commande trouvée.</ul>
        <?php endif; ?>
      </ul>
    </section>

    <!-- Section Favoris -->
    <section id="favoris" class="user_section">
      <h2>Mes favoris</h2>
      <ul class="favorite_list">
        <?php if (!empty($shoes)): ?>
          <?php foreach ($shoes as $shoe): ?>
            <li>
              <img src="/img/shoes/<?php echo htmlspecialchars($shoe['image']); ?>" alt="<?php echo htmlspecialchars($shoe['nom']); ?>" width="50">
              <?php echo htmlspecialchars($shoe['nom']); ?> - <?php echo htmlspecialchars($shoe['prix']); ?> €
              <button>Retirer</button>
            </li>
          <?php endforeach; ?>
        <?php else: ?>
          <ul>Aucun favori enregistré.</ul>
        <?php endif; ?>
      </ul>
    </section>
  </section>

  <!-- Bandeau des avantages membres -->
  <section class="avantages-membres">
    <div class="avantages-wrapper">
      <div class="avantage-item">
        <i class="fas fa-gift"></i> <!-- Icône cadeau -->
        <p>Produits réservés</p>
      </div>
      <div class="avantage-item">
        <i class="fas fa-truck"></i> <!-- Icône de camion de livraison -->
        <p>Livraison gratuite</p>
      </div>
      <div class="avantage-item">
        <i class="fas fa-star"></i> <!-- Icône d'étoile -->
        <p>Offres exclusives</p>
      </div>
      <div class="avantage-item">
        <i class="fas fa-calendar"></i> <!-- Icône calendrier -->
        <p>Accès anticipé aux ventes</p>
      </div>
      <div class="avantage-item">
        <i class="fa-solid fa-crown"></i> <!-- Icône couronne -->
        <p>Vente privée</p>
      </div>
      <div class="avantage-item">
        <i class="fa-solid fa-gift"></i> <!-- Icône cadeau -->
        <p>Précommande</p>
      </div>
    </div>
  </section>

  <footer>

<div class="copyright">

<div class="logo">
      <!-- Remplacer le logo SVG par une image -->
      <img src="/img/logo-shoe.png" alt="Logo Shoe" class="size-logo">
    </div>
    <p> <svg xmlns="http://www.w3.org/2000/svg" width="12px" height="12px" viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License 
- https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
            <path d="M256 48a208 208 0 1 1 0 416 208 208 0 1 1 0-416zm0 464A256 256 0 1 0 256 0a256 
256 0 1 0 0 512zM199.4 312.6c-31.2-31.2-31.2-81.9 0-113.1s81.9-31.2 113.1 0c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9c-50-50-131-50-181 0s-50 131 0 181s131 
50 181 0c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0c-31.2 31.2-81.9 31.2-113.1 0z" />
        </svg> Shoe-Shop 2025</p>
</div>

<div class="conditions">
    <ul>
        <li><a href="" style="text-decoration:none; color:var(--couleur-1);">Conditions</a></li>
        <li><a href="" style="text-decoration:none; color:var(--couleur-1);">A propos</a></li>
        <li><a href="" style="text-decoration:none; color:var(--couleur-1);">Newsletter</a></li>
    </ul>
</div>

</footer>

</body>

</html>

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

    <div>
        <ul>
            <li><a href="" class="lien" style="text-decoration:none; color:var(--couleur-1);" onclick="afficheMenu()">HOMME</a></li>
            <li><a href="" class="lien" style="text-decoration:none; color:var(--couleur-1);" onclick="afficheMenu()">FEMME</a></li>
            <li><a href="" class="lien" style="text-decoration:none; color:var(--couleur-1);" onclick="afficheMenu()">ENFANT</a></li>
        </ul>
    </div>

    <div class="icones">
        <a href=""> <i class="fa-regular fa-heart icone"></i> </a>
        <a href=""> <i class="fa-solid fa-user icone"></i> </a>
    </div>
</header>


  <section class="user_account_section">
    <h1>Mon Compte</h1>

    <!-- Message de bienvenue -->
    <p class="welcome_message">Bienvenue, <?php echo htmlspecialchars($nom_utilisateur); ?> !</p>

    <nav class="user_nav">
      <ul>
        <li><a href="/pages/front/accueil.php">Accueil</a></li>
        <li><a href="#historique">Historique d'achat</a></li>
        <li><a href="#favoris">Mes favoris</a></li>
        <li><a href="/logout.php">Déconnexion</a></li>
      </ul>
    </nav>

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
          <li>Aucune commande trouvée.</li>
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
          <li>Aucun favori enregistré.</li>
        <?php endif; ?>
      </ul>
    </section>
  </section>
</body>

</html>
<?php
session_start();
$message = "";
if (isset($_SESSION['message'])) {
  $message = $_SESSION['message'];
  unset($_SESSION['message']);
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Créer un compte</title>
  <link rel="stylesheet" href="/shoe_shop/css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
  <section class="connexion_client_section">
    <img src="/img/logo-nike.svg" alt="Logo Nike">
    <h1>Créer mon compte</h1>

    <?php if (!empty($message)): ?>
      <p style="color: red;"><?php echo htmlspecialchars($message); ?></p>
    <?php endif; ?>

    <form class="connexion_client_form" method="post" action="traitement_inscription.php">

      <div>
        <input type="email" id="email" name="email" placeholder="E-mail" required>
      </div>

      <div style="padding: 10px 0; display: flex; gap: 10px;">
        <div>
          <input class="nom" type="text" id="nom" name="nom" placeholder="Nom" required>
        </div>

        <div>
          <input class="prenom" type="text" id="prenom" name="prenom" placeholder="Prénom" required>
        </div>
      </div>

      <div>
        <input class="identifiant" type="text" id="identifiant" name="identifiant" placeholder="Identifiant" required>
      </div>

      <div class="connexion_client_password" style="position: relative;">
        <input class="password" type="password" id="password" name="password" placeholder="Mot de passe" required>
        <span class="toggle-password" onclick="togglePasswordVisibility()"
          style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer;">
          <i class="fa fa-eye" id="toggleIcon"></i>
        </span>
      </div>

      <div class="connexion_client_password" style="position: relative;">
        <input class="password" type="password" id="password_confirm" name="password_confirm" placeholder="Confirmer le mot de passe"
          required>
      </div>

      <p class="connexion_client_creercompte">J'ai déjà un compte, <a href="/">se connecter</a></p>

      <p>
        En t'inscrivant, tu acceptes les <a href="">conditions d’utilisation</a> et tu confirmes avoir lu la <a
          href="#">politique de confidentialité</a>.
      </p>

      <button type="submit" class="connexion_client_button">Créer mon compte</button>

    </form>
  </section>

  <script src="/js/script_password.js"></script>
</body>

</html>
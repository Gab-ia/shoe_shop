<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="/css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
  <section class="connexion_client_section">
    <img src="/img/logo-nike.svg" alt="">

    <h1>Saisis ton identifiant ou ton adresse e-mail et ton mot de passe pour te connecter</h1>

    <form class="connexion_client_form">
      <div>
        <input type="email" id="email" name="email" placeholder="Email" required>
      </div>

      <div class="connexion_client_password">
        <input type="password" id="password" name="password" placeholder="Mot de passe" required>
        <span class="toggle-password" onclick="togglePasswordVisibility()"
          style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer;">
          <i class="fa fa-eye" id="toggleIcon"></i>
        </span>
      </div>
      <p>
        En continuant, tu acceptes les <a href="#">conditions d’utilisation</a> et tu confirmes avoir lu la <a
          href="#">politique de confidentialité</a>.
      </p>
      <button type="submit" class="connexion_client_button">Continuer</button>
    </form>
  </section>

  <script src="/js/script_password.js"></script>
</body>

</html>
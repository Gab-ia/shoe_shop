<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/back.css">
    <title>Tableau de bord</title>
</head>
<body>
    <header>
        <h1 class="header_title">Bienvenue, /USER </h1>
        <img class="header_logo" src="/img/logo-nike.svg">
        <a href="" class="header_connexion">
            <svg class="header_connexion_logo" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M502.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L402.7 224 192 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l210.7 0-73.4 73.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l128-128zM160 96c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 32C43 32 0 75 0 128L0 384c0 53 43 96 96 96l64 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-64 0c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l64 0z"/></svg>
        </a>
    </header>

    <main>
        <!-- Interface de gestion -->
        <section class="gestionnaire">

            <div class="gestionnaire_head">
                <h1 class="section_title">Gestionnaire</h1>
                <button id="stock_btn" class="gestionnaire_btn">Stock</button>
                <button id="employee_btn" class="gestionnaire_btn">Employés</button>
                <button id="client_btn" class="gestionnaire_btn">Clients</button>
            </div>

            <div class="gestionnaire_main">
                <form id="gestionnaire_stock" class="gestionnaire_form active_form">
                    <label for="stock_nom" class="form_label">Nom</label>
                    <input type="text" id="stock_nom" class="form_input">

                    <label for="" class="form_label">Prix</label>
                    <input type="text" id="" class="form_input">

                    <label for="" class="form_label">Marque</label>
                    <select id="" class="form_input">
                        <option value="">marque1</option>
                        <option value="">marque2</option>
                        <option value="" >marque3</option>
                    </select>

                    <label for="" class="form_label">Genre</label>
                    <select id="" class="form_input">
                        <option value="">Homme</option>
                        <option value="">Femme</option>
                        <option value="" >Enfant</option>
                    </select>

                    <label for="" class="form_label">Taille</label>
                    <input type="text" id="" class="form_input">

                    <label for="" class="form_label">Image</label>
                    <input type="file" id="" class="form_input">

                    <input type="submit" id="" value="/SAVE /MODIFY">
                </form>

            </div>

            <form id="gestionnaire_employee" class="gestionnaire_form">
            </form>

            <form id="gestionnaire_client" class="gestionnaire_form">
            </form>

        </section>

        <!-- Interface de visualisation STOCK -->
        <section id="list_stock" class="list active_list">

        </section>

        <!-- Interface de visualisation EMPLOYES -->
        <section id="list_employee" class="list">

        </section>

        <!-- Interface de visualisation CLIENTS -->
        <section id="list_client" class="list">

        </section>

    </main>
</body>
</html>
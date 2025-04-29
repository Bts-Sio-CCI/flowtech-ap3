<title>Profil - Flowtech</title>

<style>
    .profile-image {
        max-width: 100%;
        max-height: 150px;
        width: 150px;
    }
</style>
</head>

<body class="bg-dark">
    <header class="header-shop">
        <div class="px-4 pt-5 my-5 text-center">
            <h1 class="display-4 fw-bold text-flowtech">Profile</h1>
            <div class="col-lg-6 mx-auto">
                <p class="lead mb-4 text-light">Votre profile pour gérer vos informations</p>
            </div>
            <h1 class="display-1 text-light">
                <?php echo "Bienvenue " . session()->get('Prenom') . " " . session()->get('Nom'); ?>
            </h1>
            <div>
                <img src="/script/imgUser/<?php echo $imgProfil; ?>" alt="Photo de profil" class="img-fluid rounded-circle profile-image">
            </div>

        </div>
    </header>

    <ul class="lead mb-4 text-light">
        <!-- J'affiche les variables -->
        <li>Nom:
            <?php echo $Nom ?>
        </li>
        <li>Prenom:
            <?php echo $Prenom ?>
        </li>
        <li>Pseudonyme:
            <?php echo $NomUtilisateur ?>
        </li>
        <li>Email:
            <?php echo $email ?>
        </li>
        <li>Téléphone:
            <?php echo $telephone ?>
        </li>
        <li>Adresse:
            <?php echo $adresse ?>
        </li>
        <!-- Affichage du sexe -->
        <li>Sexe:
            <?php echo ($sexe == 0) ? "Homme" : "Femme"; ?>
        </li>

        <div class="w-50 mt-2">
            <form action="/script/imgProfil.php" method="post" enctype="multipart/form-data">
                <div class="w-50">
                    <label for="photo" class="form-label text-light">Modifier la photo de profil :</label>
                    <input type="file" class="form-control" id="photo" name="photo">
                </div>
                <button type="submit" class="btn btn-primary mt-2">Envoyer</button>
            </form>
        </div>
    </ul>

    <div class="container mt-5">
        <h1 class="text-light mb-4">Liste des commandes</h1>
        <?php if (!empty($commandes) && count($commandes) > 0): ?>
            <table class="table table-light table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Date</th>
                        <th scope="col">Produit</th>
                        <th scope="col">Quantité</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($commandes as $commande): ?>
                        <tr>
                            <td><?= $commande['id'] ?></td>
                            <td><?= $commande['date'] ?></td>
                            <td><?= $commande['produit'] ?></td>
                            <td><?= $commande['quantite'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
        <p>Aucune commande trouvée.</p>
    <?php endif; ?>

    </div>

    <a href="/evenement" class="btn btn-primary mt-2">Accéder au evenement</a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
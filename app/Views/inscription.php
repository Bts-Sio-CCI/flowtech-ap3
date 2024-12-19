<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>FlowTech - Inscription</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>

<body>
<div class="container mt-5">
    <div class="register-form">
        <form action="<?= base_url('register/register') ?>" method="post">
            <h2 class="text-center">Créer un compte</h2>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Prénom" name="Prenom" value="<?= old('Prenom') ?>">
                <small class="text-danger"><?= session('validation.Prenom') ?></small>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Nom" name="Nom" value="<?= old('Nom') ?>">
                <small class="text-danger"><?= session('validation.Nom') ?></small>
            </div>
            <div class="form-group">
                <input type="date" class="form-control" name="dateNaissance" value="<?= old('dateNaissance') ?>">
                <small class="text-danger"><?= session('validation.dateNaissance') ?></small>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Adresse" name="Adresse" value="<?= old('Adresse') ?>">
                <small class="text-danger"><?= session('validation.Adresse') ?></small>
            </div>
            <div class="form-group">
                <input type="tel" class="form-control" placeholder="Numéro de téléphone" name="numTelephone" value="<?= old('numTelephone') ?>">
                <small class="text-danger"><?= session('validation.numTelephone') ?></small>
            </div>
            <div class="form-group">
                <input type="email" class="form-control" placeholder="Email" name="email" value="<?= old('email') ?>">
                <small class="text-danger"><?= session('validation.email') ?></small>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Username" name="login" value="<?= old('login') ?>">
                <small class="text-danger"><?= session('validation.login') ?></small>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" placeholder="Password" name="pwd">
                <small class="text-danger"><?= session('validation.pwd') ?></small>
            </div>
            <div class="form-group">
                <label for="sexe">Sexe:</label>
                <select class="form-control" id="sexe" name="sexe">
                    <option value="0" <?= old('sexe') == '0' ? 'selected' : '' ?>>Homme</option>
                    <option value="1" <?= old('sexe') == '1' ? 'selected' : '' ?>>Femme</option>
                </select>
                <small class="text-danger"><?= session('validation.sexe') ?></small>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Créer</button>
            </div>
            <div class="clearfix text-center">
                <a href="/" class="btn btn-secondary">Retour à l'accueil</a>
            </div>
        </form>
    </div>
</div>
</body>

</html>

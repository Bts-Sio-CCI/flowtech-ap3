<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>FlowTech - Inscription</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <meta name="description" content="FlowTech, surement les meilleurs PC du marché!" />
    <link rel="icon" type="image/x-icon" href="../img/logos/logo-min-rounded.png" />
    <!-- CSS CUSTOM + BOOTSTRAP -->
    <link href="/assets/css/main.css" rel="stylesheet" />
</head>

<body>
<div class="register-form">
    <form action="<?= base_url('register/register') ?>" method="get">
        <h2 class="text-center">Créer un compte</h2>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Prénom" name="Prenom" value="<?= set_value('Prenom') ?>" required="required">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Nom" name="Nom" value="<?= set_value('Nom') ?>" required="required">
        </div>
        <div class="form-group">
            <input type="date" class="form-control" placeholder="Date de naissance" name="dateNaissance" value="<?= set_value('dateNaissance') ?>" required="required">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Adresse" name="Adresse" value="<?= set_value('Adresse') ?>" required="required">
        </div>
        <div class="form-group">
            <input type="tel" class="form-control" placeholder="Numéro de téléphone" name="numTelephone" value="<?= set_value('numTelephone') ?>" required="required">
        </div>
        <div class="form-group">
            <input type="email" class="form-control" placeholder="Email" name="email" value="<?= set_value('email') ?>" required="required">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Username" name="login" value="<?= set_value('login') ?>" required="required">
            <?php if ($this->session->flashdata('errorMessage')): ?>
                <p class="text-danger"><?= $this->session->flashdata('errorMessage') ?></p>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <input type="password" id="pass" class="form-control" placeholder="Password" name="pwd" required>
        </div>
        <div class="form-group">
            <label for="sexe">Sexe:</label>
            <select class="form-control" id="sexe" name="sexe">
                <option value="0">Homme</option>
                <option value="1">Femme</option>
            </select>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-flowtech btn-block">Créer</button>
        </div>
        <div class="clearfix text-center">
            <a href="/" class="btn-close-hover btn-danger">Retour à l'accueil</a>
        </div>
    </form>
</div>
<!--======================VERIFICATOR=================================-->
<div id="message" class="message-form">
    <form action="register-actions.php" method="post">
        <h3>Le mot de passe doit contenir les éléments suivants</h3>
        <div>
            <p id="letter" class="invalid">Une lettre minuscule</p>
            <p id="capital" class="invalid">Une lettre majuscule</p>
            <p id="number" class="invalid">Un chiffre minimum</p>
            <p id="length" class="invalid">8 caractères minimum</p>
        </div>
    </form>
</div>

<!--======================SCRIPT=================================-->
<script src="/script/script-login.js"></script>
</body>

</html>

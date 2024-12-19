<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>FlowTech, Connexions</title>
    <meta name="description" content="FlowTech, surement les meilleurs PC du marché!" />
    <link rel="icon" type="image/x-icon" href="/assets/img/logos/logo-min-rounded.png" />
    <!-- CSS CUSTOM + BOOTSTRAP -->
    <link rel="stylesheet" href="/assets/css/main.css">
</head>

<body>
<div class="login-form">

    <?php if ($this->session->flashdata('errorMessage')): ?>
        <p class="text-center text-danger">
            <?php echo $this->session->flashdata('errorMessage'); ?>
        </p>
    <?php endif; ?>

    <form action="<?php echo base_url('login/authenticate'); ?>" method="post">
        <h2 class="text-center">Connexion</h2>
        <div class="form-group">
            <input type="text" class="form-control border-flowtech" placeholder="Username" name="login" required="required">
        </div>
        <div class="form-group">
            <input type="password" class="form-control border-flowtech" placeholder="Password" name="pass" required="required">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-flowtech btn-block">Se connecter</button>
        </div>
        <div class="text-center">
            <a href="/" class="btn-close-hover btn-danger">Retour à l'accueil</a>
        </div>
    </form>
    <a href="/inscription" class="btn-dark">Créer un compte</a>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>

<!-- views/events_view.php -->
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>FlowTech, Evenements</title>
    <meta name="description" content="FlowTech, surement les meilleurs PC du marché!" />
    <link rel="icon" type="image/x-icon" href="/assets/img/logos/logo-min-rounded.png" />
    <!-- CSS CUSTOM + BOOTSTRAP -->
    <link rel="stylesheet" href="/assets/css/main.css">
</head>

<body>

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">FlowTech</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/profil">Profil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/events">Evenements</a>
                    </li>
                    <?php if(session()->get('isLoggedIn')): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/logout">Déconnexion</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h1 class="mb-4">Evenements</h1>

        <!-- Liste des événements -->
        <div class="card">
            <div class="card-body">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Nom de l'événement</th>
                            <th>Date</th>
                            <th>Lieu</th>
                            <th>Heure Début</th>
                            <th>Heure Fin</th>
                            <th>Participants</th>
                            <th>Organisateur / Animateur</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php if(!empty($events)): ?>
                            <?php foreach($events as $event): ?>
                                <tr>
                                    <td><?= esc($event['nomEvenement']); ?></td>
                                    <td><?= date('d-m-Y', strtotime($event['dateEvenement'])); ?></td>
                                    <td><?= esc($event['Lieu']); ?></td>
                                    <td><?= date('H:i', strtotime($event['heureDebut'])); ?></td>
                                    <td><?= date('H:i', strtotime($event['heureFin'])); ?></td>
                                    <td>
                                        <?= esc($event['utilisateurPrenom'] . ' ' . $event['utilisateurNom']); ?>
                                    </td>
                                    <td><?= esc($event['animateur'] == 1 ? 'Animateur' : 'Participant'); ?></td>                                
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" class="text-center">Aucun événement trouvé</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
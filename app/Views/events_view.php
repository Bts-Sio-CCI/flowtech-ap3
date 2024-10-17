<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Événements et Personnes Présentes</title>
</head>

<body>

    <h1>Événements et Personnes Présentes</h1>

    <?php if (!empty($events)): ?>
        <table border="1">
            <thead>
                <tr>
                    <th>Nom de l'événement</th>
                    <th>Date</th>
                    <th>Lieu</th>
                    <th>Heure Début</th>
                    <th>Heure Fin</th>
                    <th>Nom de l'Utilisateur</th>
                    <th>Prénom de l'Utilisateur</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($events as $event): ?>
                    <tr>
                        <td><?= $event['nomEvenement']; ?></td>
                        <td><?= $event['dateEvenement']; ?></td>
                        <td><?= $event['Lieu']; ?></td>
                        <td><?= $event['heureDebut']; ?></td>
                        <td><?= $event['heureFin']; ?></td>
                        <td><?= $event['utilisateurNom']; ?></td>
                        <td><?= $event['utilisateurPrenom']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Aucun événement ou participant trouvé.</p>
    <?php endif; ?>

</body>

</html>
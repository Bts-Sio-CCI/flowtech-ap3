<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistiques des Utilisateurs</title>
    <link href="/assets/css/main.css" rel="stylesheet" />
</head>
<body>
    <div class="container">
        <h1 class="text-center">Statistiques des Utilisateurs</h1>

        <div class="stat-section">
            <h2>Moyenne d'âge des utilisateurs</h2>
            <div id="moyenneAge"></div>
        </div>

        <div class="stat-section">
            <h2>Nombre d'utilisateurs par année</h2>
            <input type="number" id="anneeChoisit" placeholder="Entrez une année">
            <button onclick="getNbUtilisateurAnnee()">Voir</button>
            <div id="nbUtilisateurAnnee"></div>
        </div>

        <div class="stat-section">
            <h2>Nombre d'administrateurs</h2>
            <div id="nbAdmin"></div>
        </div>

        <div class="stat-section">
            <h2>Nombre d'hommes et de femmes</h2>
            <div id="nbHommesFemmes"></div>
        </div>

        <div class="stat-section">
            <h2>Liste des utilisateurs avec commande</h2>
            <div id="utilisateursAvecCommande"></div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            fetch('/adminStats/moyenneAge')
                .then(response => response.json())
                .then(data => {
                    document.getElementById('moyenneAge').innerText = data.moyenneAge || data.error;
                });

            fetch('/adminStats/nbAdmin')
                .then(response => response.json())
                .then(data => {
                    document.getElementById('nbAdmin').innerText = data.NbAdmin;
                });

            fetch('/adminStats/nombreHommesFemmes')
                .then(response => response.json())
                .then(data => {
                    document.getElementById('nbHommesFemmes').innerText = `Hommes: ${data.Hommes}, Femmes: ${data.Femmes}`;
                });

            fetch('/adminStats/listerUtilisateursAvecCommande')
                .then(response => response.json())
                .then(data => {
                    const container = document.getElementById('utilisateursAvecCommande');
                    data.forEach(item => {
                        const div = document.createElement('div');
                        div.innerText = `${item.nom} ${item.prenom} - ${item.nomArticle} (Quantité: ${item.quantite})`;
                        container.appendChild(div);
                    });
                });
        });

        function getNbUtilisateurAnnee() {
            const annee = document.getElementById('anneeChoisit').value;
            fetch(`/adminStats/nbUtilisateurAnnee/${annee}`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('nbUtilisateurAnnee').innerText = data.NbUtilisateur;
                });
        }
    </script>
</body>
</html>
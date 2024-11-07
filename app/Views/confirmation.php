<!-- session_start() ;-->

<title>Confirmation - FlowTech</title>

<body class="bg-dark">
    <header class="header-shop">
        <div class="px-4 pt-5 my-5 text-center">
            <h1 class="display-4 fw-bold text-flowtech">Confirmations</h1>
            <div class="col-lg-6 mx-auto">
                <p class="lead mb-4 text-light">Merci d'avoir commandé!</p>
                <!-- BOUTON LIST ACHAT-->
                <section class="container my-5">
                    <h2 class="fw-bold mb-4 text-light">Détails de la Commande</h2>
                    <div class="table-responsive">
                        <table class="table table-dark border-flowtech table-striped">
                            <thead>
                                <tr>
                                    <th>Article</th>
                                    <th>Prix</th>
                                    <th>Quantité</th>
                                </tr>
                            </thead>
                            <tbody id="confirmation-tablebody">
                                <!-- Le contenu du tableau de confirmation sera ajouté dynamiquement ici -->
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-end">
                        <p class="lead text-light">Sous-total: <span id="confirmation-subtotal"></span> €</p>
                    </div>
                </section>
            </div>
        </div>
    </header>

    <!-- FOOTER -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/script/js/panier.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            afficherDetailsCommande();
        });
    </script>
</body>

</html>
<Title>Panier - Flowtech</Title>

<body class="bg-dark">
    <div class="container pb-5">
        <table class="table table-dark border-flowtech table-striped">
            <thead>
                <tr>
                    <th>Article</th>
                    <th>Prix</th>
                    <th>Quantité</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="cart-tablebody"></tbody>
            <tfoot>
                <tr>
                    <td class="border-danger">Totals :</td>
                    <th class="border-danger" id="subTotal"></th>
                    <td class="border-danger"></td>
                    <td class="border-danger"></td>
                </tr>
            </tfoot>
        </table>
        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center mb-5">
            <a href="confirmation.php" class="btn btn-success btn-lg px-4" onclick="confirmerCommande()">Confirmer la commande</a>
        </div>
    </div>
    <!-- FOOTER -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/script/js/panier.js"></script>
</body>

</html>
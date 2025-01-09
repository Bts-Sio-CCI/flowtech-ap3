<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class AdminStats extends Controller
{
    private $db;


    public function __construct()
    {
        // Connexion à la base de données
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        return view('admin');
    }

    public function moyenneAge()
    {
        $query = $this->db->query("SELECT dateNaissance FROM Utilisateur");
        $datesNaissance = $query->getResultArray();

        if (!empty($datesNaissance)) {
            $ages = [];
            foreach ($datesNaissance as $row) {
                $age = date_diff(date_create($row['dateNaissance']), date_create('today'))->y;
                $ages[] = $age;
            }
            $moyenneAge = array_sum($ages) / count($ages);
            return $this->response->setJSON(['moyenneAge' => $moyenneAge]);
        }
        return $this->response->setJSON(['error' => 'No users found']);
    }

    public function nbUtilisateurAnnee($anneeChoisit)
    {
        $query = $this->db->query(
            "SELECT COUNT(*) as NbUtilisateur 
             FROM Utilisateur 
             WHERE YEAR(dateNaissance) >= ?",
            [$anneeChoisit]
        );
        $result = $query->getRowArray();
        return $this->response->setJSON($result);
    }

    public function nbAdmin()
    {
        $query = $this->db->query("SELECT COUNT(*) as NbAdmin FROM Utilisateur WHERE Admin = 1");
        $result = $query->getRowArray();
        return $this->response->setJSON($result);
    }

    public function chiffreAffairesTotal($nomArticle)
    {
        // Récupérer le prix de l'article
        $query1 = $this->db->query("SELECT prix FROM Pc WHERE nomArticle = ?", [$nomArticle]);
        $prix = $query1->getRow()->prix ?? 0;

        // Récupérer la quantité vendue
        $query2 = $this->db->query(
            "SELECT SUM(Quantite) AS total_quantite 
             FROM AssociationPanier 
             WHERE idPc IN (SELECT idPc FROM Pc WHERE nomArticle = ?)",
            [$nomArticle]
        );
        $total_quantite = $query2->getRow()->total_quantite ?? 0;

        // Calcul du chiffre d'affaires
        $chiffreAffaires = $prix * $total_quantite;

        return $this->response->setJSON(['chiffreAffaires' => $chiffreAffaires]);
    }

    public function listerUtilisateursAvecCommande()
    {
        $query = $this->db->query(
            "SELECT Pc.nomArticle, Utilisateur.nom, Utilisateur.prenom, AssociationPanier.quantite
             FROM Utilisateur 
             INNER JOIN Commande ON Utilisateur.idUtilisateur = Commande.idUtilisateur
             INNER JOIN AssociationPanier ON Commande.idCommande = AssociationPanier.idCommande
             INNER JOIN Pc ON AssociationPanier.idPc = Pc.idPc"
        );
        $result = $query->getResultArray();
        return $this->response->setJSON($result);
    }

    public function nombrePersonnesParTrancheAge($trancheMin, $trancheMax)
    {
        $query = $this->db->query(
            "SELECT COUNT(*) as NbPersonnes 
             FROM Utilisateur 
             WHERE YEAR(CURRENT_DATE) - YEAR(dateNaissance) BETWEEN ? AND ?",
            [$trancheMin, $trancheMax]
        );
        $result = $query->getRowArray();
        return $this->response->setJSON($result);
    }

    public function nombreHommesFemmes()
    {
        $query = $this->db->query(
            "SELECT SUM(Sexe = 0) AS Hommes, SUM(Sexe = 1) AS Femmes 
             FROM Utilisateur"
        );
        $result = $query->getRowArray();
        return $this->response->setJSON($result);
    }

    public function nombrePcVendu()
    {
        $query = $this->db->query(
            "SELECT Pc.nomArticle, SUM(AssociationPanier.quantite) AS total_pc_vendus
             FROM Pc
             INNER JOIN AssociationPanier ON Pc.idPc = AssociationPanier.idPc
             GROUP BY Pc.nomArticle"
        );
        $result = $query->getResultArray();
        return $this->response->setJSON($result);
    }
}

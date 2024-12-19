<?php

namespace App\Models;

use CodeIgniter\Model;

class CommandeModel extends Model
{
    protected $table = 'Commande'; // Le nom de votre table
    protected $primaryKey = 'id'; // Clé primaire de la table
    protected $allowedFields = ['date', 'produit', 'quantite']; // Colonnes autorisées
}

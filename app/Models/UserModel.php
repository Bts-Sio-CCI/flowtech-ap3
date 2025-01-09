<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'Utilisateur';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'Prenom', 'Nom', 'dateNaissance', 'Adresse', 'email',
        'numTelephone', 'NomUtilisateur', 'MotsDePasse', 'Sexe'
    ];

    /**
     * Récupérer un utilisateur par son login
     *
     * @param string $NomUtilisateur
     * @return array|null
     */
    public function getUserByNomUtilisateur(string $NomUtilisateur)
    {
        return $this->where('NomUtilisateur', $NomUtilisateur)->first();
    }

    /**
     * Insérer un nouvel utilisateur
     *
     * @param array $data
     * @return bool
     */
    public function insertUser(array $data)
    {
        return $this->insert($data) !== false;
    }
}
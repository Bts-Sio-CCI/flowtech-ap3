<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'Utilisateur';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'Prenom', 'Nom', 'dateNaissance', 'Adresse',
        'numTelephone', 'email', 'login', 'pwd', 'Sexe'
    ];

    public function insert_user(array $data)
    {
        return $this->insert($data);
    }
}

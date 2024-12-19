<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'Utilisateur';
    protected $primaryKey = 'id';
    protected $allowedFields = [
<<<<<<< Updated upstream
        'Prenom', 'Nom', 'dateNaissance', 'Adresse',
        'numTelephone', 'email', 'login', 'pwd', 'Sexe'
    ];

    public function insert_user(array $data)
    {
        return $this->insert($data);
=======
        'Prenom', 'Nom', 'dateNaissance', 'Adresse', 
        'numTelephone', 'email', 'login', 'pwd', 'Sexe'
    ];

    /**
     * Récupérer un utilisateur par son login
     *
     * @param string $login
     * @return array|null
     */
    public function getUserByLogin(string $login)
    {
        return $this->where('login', $login)->first();
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
>>>>>>> Stashed changes
    }
}

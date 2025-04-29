<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use Config\Database;

class TestDb extends Controller
{
    public function index()
    {
        try {
            // Charger la configuration de la base de données
            $db = Database::connect();

            // Si la connexion réussit
            return "Connexion réussie à la base de données.";
        } catch (\Exception $e) {
            // Si une erreur survient
            return "Échec de connexion à la base de données : " . $e->getMessage();
        }
    }
}

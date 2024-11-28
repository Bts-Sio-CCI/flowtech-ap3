<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class TestDb extends Controller
{
    public function index()
    {
        // Test de la connexion
        $db = \Config\Database::connect();

        if ($db->connect()) {
            return "Connexion réussie à la base de données.";
        } else {
            return "Échec de connexion à la base de données.";
        }
    }
}
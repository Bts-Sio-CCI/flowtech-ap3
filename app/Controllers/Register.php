<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class Register extends Controller
{
    public function inscription()
    {
        $Nom = $this->request->getPost('Nom');
        
        // Validation côté contrôleur
        if (empty($Nom)) {
            // Utilisez la session pour stocker les erreurs
            $session = session();
            $session->setFlashdata('errors', ['Nom' => 'Le nom est requis.']);
            return redirect()->to('/inscription')->withInput();
        }
    
        // Transmettez la donnée à la vue
        return view('inscription', ['Nom' => $Nom]);
    }
    

    public function register()
    {
        // Charger le modèle UserModel
        $userModel = new UserModel();

        // Validation des données d'inscription
        $validation = \Config\Services::validation();
        
        // Retourner les erreurs de validation si nécessaire
        if (!$this->validate([
            'NomUtilisateur' => 'required|min_length[3]|max_length[20]',
            'MotsDePasse' => 'required|min_length[6]|max_length[255]',
        ])) {
            // Retourne les erreurs de validation au formulaire
            $session = session();
            $session->setFlashdata('errors', $validation->getErrors());
            return redirect()->to('/inscription')->withInput();
        }

        // Vérifier si le NomUtilisateur existe déjà
        $NomUtilisateur = $this->request->getPost('NomUtilisateur');
        $user = $userModel->getUserByNomUtilisateur($NomUtilisateur);
        
        // Déboguer pour vérifier si l'utilisateur existe
        log_message('debug', 'Utilisateur trouvé : ' . json_encode($user));

        if ($user) {
            $session = session();
            $session->setFlashdata('errors', ['NomUtilisateur' => 'Ce nom d\'utilisateur existe déjà.']);
            return redirect()->to('/inscription')->withInput();
        }

        // Insertion dans la base de données
        $data = [
            'Prenom' => $this->request->getPost('Prenom'),
            'Nom' => $this->request->getPost('Nom'),
            'NomUtilisateur' => $NomUtilisateur,
            'dateNaissance' => $this->request->getPost('dateNaissance'),
            'Adresse' => $this->request->getPost('Adresse'),
            'MotsDePasse' => password_hash($this->request->getPost('MotsDePasse'), PASSWORD_DEFAULT),
        ];

        if ($userModel->insertUser($data)) {
            $session = session();
            $session->set('user', $NomUtilisateur);
            return redirect()->to('/profil');
        } else {
            log_message('error', 'Erreur lors de l\'insertion de l\'utilisateur.');
            $session = session();
            $session->setFlashdata('errors', ['database' => 'Une erreur est survenue lors de l\'enregistrement.']);
            return redirect()->to('/inscription')->withInput();
        }
    }
}

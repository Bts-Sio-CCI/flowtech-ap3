<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

class Register extends Controller
{
public function index()
{
    helper('form'); // Assurez-vous que ce helper est chargé

    $data = [
        'session' => \Config\Services::session(),
    ];
    return view('inscription', $data);
}


    public function register()
    {
        $session = session();
        $validation = \Config\Services::validation();

        // Règles de validation
        $rules = [
            'Prenom'         => 'required|alpha_space',
            'Nom'            => 'required|alpha_space',
            'dateNaissance'  => 'required|valid_date[Y-m-d]',
            'Adresse'        => 'required|string',
            'numTelephone'   => 'required|regex_match[/^[0-9]{10}$/]',
            'NomUtilisateur'          => 'required|alpha_numeric',
            'MotsDePasse' => 'required|min_length[8]|regex_match[/^(?=.*[A-Za-z])(?=.*\d).{8,}$/]',
            'sexe'           => 'required|in_list[0,1]',
        ];

        if (!$this->validate($rules)) {
            // Retourne les erreurs de validation au formulaire
            $session->setFlashdata('errors', $validation->getErrors());
            return redirect()->to('/inscription')->withInput();
        }

        // Charger le modèle
        $userModel = new UserModel();

        // Vérifier si le NomUtilisateur existe déjà
        $NomUtilisateur = $this->request->getPost('NomUtilisateur');
        if ($userModel->getUserByNomUtilisateur($NomUtilisateur)) {
            $session->setFlashdata('errors', ['NomUtilisateur' => 'Ce nom d\'utilisateur existe déjà.']);
            return redirect()->to('/inscription')->withInput();
        }
        

        // Préparer les données pour l'insertion
        $data = [
            'Prenom'         => $this->request->getPost('Prenom'),
            'Nom'            => $this->request->getPost('Nom'),
            'dateNaissance'  => $this->request->getPost('dateNaissance'),
            'Adresse'        => $this->request->getPost('Adresse'),
            'numTelephone'   => $this->request->getPost('numTelephone'),
            'NomUtilisateur'          => $NomUtilisateur,
            'MotsDePasse'            => password_hash($this->request->getPost('MotsDePasse'), PASSWORD_DEFAULT),
            'Sexe'           => $this->request->getPost('sexe'),
        ];

        // Insertion dans la base de données
        if ($userModel->insertUser($data)) {
            $session->set('user', $NomUtilisateur);
            return redirect()->to('/profil');
        } else {
            $session->setFlashdata('errors', ['database' => 'Une erreur est survenue lors de l\'enregistrement.']);
            log_message('error', 'Erreur lors de l\'insertion de l\'utilisateur : ' . json_encode($data));
            return redirect()->to('/inscription')->withInput();
        }
    }
}

<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

class Login extends Controller
{

    public function index() {
        helper(['form', 'session']);

        $data = [
            'session' => \Config\Services::session(),
        ];

        return view('connexion', $data);
    }

    public function deconnexion() {
        // Détruit les données de session
        session()->destroy();

        // Redirection après déconnexion
        return redirect()->to('/');
    }

    public function authenticate() {
        $userModel = new \App\Models\UserModel();
        $user = $this->request->getPost('login');
        $mdp = $this->request->getPost('pass');
    
        var_dump($user, $mdp);


        if (empty($user) || empty($mdp)) {
            session()->setFlashdata('errorMessage', 'Veuillez saisir un login et un mot de passe.');
            return redirect()->to('/login');
        }
    
        // Recherche de l'utilisateur par nom d'utilisateur
        $user_data = $userModel->getUserByNomUtilisateur($user);
    
        if ($user_data) {
            // Vérifie le mot de passe avec password_verify
            if (password_verify($mdp, $user_data['MotsDePasse'])) {
                // Connexion réussie
                session()->set([
                    'id' => $user_data['idUtilisateur'],
                    'Prenom' => $user_data['Prenom'],
                    'Nom' => $user_data['Nom'],
                    'NomUtilisateur' => $user_data['NomUtilisateur'],
                    'email' => $user_data['email'],
                    'telephone' => $user_data['numTelephone'],
                    'adresse' => $user_data['Adresse'],
                    'sexe' => $user_data['Sexe'],
                    'imgProfil' => $user_data['imgProfil'],
                    'isLoggedIn' => true,
                ]);
    
                // Redirection basée sur les droits
                return ($user_data['Admin'] == 1)
                    ? redirect()->to('/admin/userlist')
                    : redirect()->to('/profil');
            }
        }
    
        // En cas d'erreur (utilisateur ou mot de passe incorrect)
        session()->setFlashdata('errorMessage', 'Nom d\'utilisateur ou mot de passe incorrect.');
        return redirect()->to('/login');
    }
}

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

    public function authenticate() {
        // Utilisation de la méthode correcte pour récupérer les données POST
        $user = $this->request->getPost('login');
        $mdp = $this->request->getPost('pass');
    
        // Vérification si les champs sont vides
        if (empty($user) || empty($mdp)) {
            session()->setFlashdata('errorMessage', 'Veuillez saisir un login et un mot de passe.');
            return redirect()->to('/login');
        } else {
            // Recherche de l'utilisateur dans la base de données
            $user_data = $this->UserModel->getUserByNomUtilisateur($user);
    
            // Vérification du mot de passe
            if ($user_data && password_verify($mdp, $user_data['MotsDePasse'])) {
                session()->set('user_data', $user_data);
    
                // Redirection en fonction du rôle
                if ($user_data['Admin'] == 1) {
                    return redirect()->to('/admin/userlist');
                } else {
                    return redirect()->to('/profil');
                }
            } else {
                session()->setFlashdata('errorMessage', 'Nom d\'utilisateur ou mot de passe incorrect.');
                return redirect()->to('/login');
            }
        }
    }
    
}

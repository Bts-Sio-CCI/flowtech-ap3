<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class Register extends Controller
{
    protected $userModel;
    protected $session;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->session = \Config\Services::session(); // Initialisation de la session
    }

    public function index()
    {
        return view('inscription');
    }

    public function register()
    {
        $validation = \Config\Services::validation();

        $validation->setRules([
            'Prenom' => 'required',
            'Nom' => 'required',
            'dateNaissance' => 'required|valid_date',
            'Adresse' => 'required',
            'numTelephone' => 'required|regex_match[/^[0-9]{10,15}$/]',
            'email' => 'required|valid_email',
            'login' => 'required|is_unique[Utilisateur.login]',
            'pwd' => 'required|min_length[8]|regex_match[/[0-9]/]|regex_match[/[a-zA-Z]/]',
            'sexe' => 'required|in_list[0,1]',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return view('inscription', [
                'validation' => $validation
            ]);
        } else {
            $data = [
                'Prenom' => $this->request->getPost('Prenom'),
                'Nom' => $this->request->getPost('Nom'),
                'dateNaissance' => $this->request->getPost('dateNaissance'),
                'Adresse' => $this->request->getPost('Adresse'),
                'numTelephone' => $this->request->getPost('numTelephone'),
                'email' => $this->request->getPost('email'),
                'login' => $this->request->getPost('login'),
                'pwd' => password_hash($this->request->getPost('pwd'), PASSWORD_DEFAULT),
                'Sexe' => $this->request->getPost('sexe'),
            ];

            if ($this->userModel->insert_user($data)) {
                $this->session->set('user', $data['login']);
                return redirect()->to('profil');
            } else {
                $this->session->setFlashdata('errorMessage', 'Une erreur est survenue lors de l\'inscription.');
                return redirect()->to('inscription');
            }
        }
    }
}

<?php

namespace App\Controllers;

<<<<<<< Updated upstream
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
=======
use CodeIgniter\Controller;
use App\Models\User_model;

class Register extends Controller
{
    public function index()
    {
        helper('form');

        $data = [
            'session' => \Config\Services::session(),
        ];
        // Affiche le formulaire d'inscription
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
            'email'          => 'required|valid_email',
            'login'          => 'required|alpha_numeric',
            'pwd' => 'required|min_length[8]|regex_match[/^(?=.*[A-Za-z])(?=.*\d).{8,}$/]',
            'sexe'           => 'required|in_list[0,1]',
        ];

        if (!$this->validate($rules)) {
            // Retourne les erreurs de validation au formulaire
            $session->setFlashdata('errors', $validation->getErrors());
            return redirect()->to('/inscription')->withInput();
        }

        // Charger le modèle
        $userModel = new UserModel();

        // Vérifier si le login existe déjà
        $login = $this->request->getPost('login');
        if ($userModel->getUserByLogin($login)) {
            $session->setFlashdata('errors', ['login' => 'Ce nom d\'utilisateur existe déjà.']);
            return redirect()->to('/inscription')->withInput();
        }

        // Préparer les données pour l'insertion
        $data = [
            'Prenom'         => $this->request->getPost('Prenom'),
            'Nom'            => $this->request->getPost('Nom'),
            'dateNaissance'  => $this->request->getPost('dateNaissance'),
            'Adresse'        => $this->request->getPost('Adresse'),
            'numTelephone'   => $this->request->getPost('numTelephone'),
            'email'          => $this->request->getPost('email'),
            'login'          => $login,
            'pwd'            => password_hash($this->request->getPost('pwd'), PASSWORD_DEFAULT),
            'Sexe'           => $this->request->getPost('sexe'),
        ];

        // Insertion dans la base de données
        if ($userModel->insertUser($data)) {
            $session->set('user', $login);
            return redirect()->to('/profil');
        } else {
            $session->setFlashdata('errors', ['database' => 'Une erreur est survenue lors de l\'enregistrement.']);
            log_message('error', 'Erreur lors de l\'insertion de l\'utilisateur : ' . json_encode($data));
            return redirect()->to('/inscription')->withInput();
>>>>>>> Stashed changes
        }
    }
}

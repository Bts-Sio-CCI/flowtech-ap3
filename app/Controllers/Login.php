<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('session');
    }

    public function index() {
        $this->load->view('connexion');
    }

    public function authenticate() {
        $user = $this->input->post('login', TRUE);
        $mdp = $this->input->post('pass', TRUE);

        if (empty($user) || empty($mdp)) {
            $this->session->set_flashdata('errorMessage', 'Veuillez saisir un login et un mot de passe.');
            redirect('login');
        } else {
            $user_data = $this->User_model->get_user_by_login($user);

            if ($user_data && password_verify($mdp, $user_data['pwd'])) {
                $this->session->set_userdata('user_data', $user_data);

                if ($user_data['Admin'] == 1) {
                    redirect('admin/userlist');
                } else {
                    redirect('profil');
                }
            } else {
                $this->session->set_flashdata('errorMessage', 'Nom d\'utilisateur ou mot de passe incorrect.');
                redirect('login');
            }
        }
    }
}

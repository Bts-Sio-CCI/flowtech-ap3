<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('session');
//        $this->load->library('form_validation');
    }

    public function index() {
        $this->load->view('inscription');
    }

    public function register() {
        $this->form_validation->set_rules([
            'Prenom' => 'required',
            'Nom' => 'required',
            'dateNaissance' => 'required',
            'Adresse' => 'required',
            'numTelephone' => 'required',
            'email' => 'required|valid_email',
            'login' => 'required|is_unique[Utilisateur.login]',
            'pwd' => 'required|min_length[8]|regex_match[/[0-9]/]|regex_match[/[a-zA-Z]/]',
            'sexe' => 'required'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('inscription');
        } else {
            $data = [
                'Prenom' => $this->input->post('Prenom'),
                'Nom' => $this->input->post('Nom'),
                'dateNaissance' => $this->input->post('dateNaissance'),
                'Adresse' => $this->input->post('Adresse'),
                'numTelephone' => $this->input->post('numTelephone'),
                'email' => $this->input->post('email'),
                'login' => $this->input->post('login'),
                'pwd' => password_hash($this->input->post('pwd'), PASSWORD_DEFAULT),
                'Sexe' => $this->input->post('sexe')
            ];

            if ($this->User_model->insert_user($data)) {
                $this->session->set_userdata('user', $data['login']);
                redirect('profil');
            } else {
                $this->session->set_flashdata('errorMessage', 'Une erreur est survenue lors de l\'inscription.');
                redirect('inscription');
            }
        }
    }
}

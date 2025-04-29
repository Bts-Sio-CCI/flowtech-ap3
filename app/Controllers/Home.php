<?php

namespace App\Controllers;
use App\Models\CommandeModel;


class Home extends BaseController
{
    public function index(): string
    {
        $session = session();
    
        // Transmettre les données nécessaires à la navbar
        $data = [
            'user_data' => $session->get('user_data'), // Transmettre les infos utilisateur si connecté
        ];
    
        return view('/components/header') .
            view('/components/navbar', $data) . // Transmettre $data ici
            view('accueil') .
            view('/components/footer');
    }

    public function boutique(): string
    {
        return view('/components/header') .
            view('/components/navbar') .
            view('shop') .
            view('/components/footer');
    }

    public function configurateur(): string
    {
        return view('/components/header') .
            view('components/navbar') .
            view('configurateur') .
            view('/components/footer');
    }

    public function faq(): string
    {
        return view('/components/header') .
            view('components/navbar') .
            view('faq') .
            view('/components/footer');
    }
    public function profil(): string
    {
        // Obtenir la session
        $session = session();

        // Créez une instance du modèle CommandeModel
        $commandeModel = new CommandeModel();

        // Récupérez toutes les commandes de l'utilisateur
        // Vous pouvez filtrer les commandes en fonction de l'utilisateur si nécessaire
        $commandes = $commandeModel->findAll(); 

        // Passer les données utilisateur et les commandes à la vue
        $data = [
            'Prenom' => $session->get('Prenom'),
            'Nom' => $session->get('Nom'),
            'NomUtilisateur' => $session->get('NomUtilisateur'),
            'email' => $session->get('email'),
            'telephone' => $session->get('telephone'),
            'adresse' => $session->get('adresse'),
            'sexe' => $session->get('sexe'),
            'imgProfil' => $session->get('imgProfil'),
            'Commande' => $commandes // Ajouter les commandes
        ];

        // Retourner la vue avec les données
        return view('/components/header') .
            view('components/navbar') .
            view('profil', $data) .
            view('/components/footer');
    }
    
    public function cookies(): string
    {
        return view('/components/header') .
            view('components/navbar') .
            view('politique-cookies') .
            view('/components/footer');
    }

    public function clause(): string
    {
        return view('/components/header') .
            view('components/navbar') .
            view('clause') .
            view('/components/footer');
    }

    public function legal(): string
    {
        return view('/components/header') .
            view('components/navbar') .
            view('legal') .
            view('/components/footer');
    }

    public function inscription(): string
    {
        return view('inscription');
    }

    public function login(): string
    {
        return view('connexion');
    }

    public function panier(): string
    {
        return view('/components/header') .
            view('components/navbar') .
            view('panier') .
            view('/components/footer');
    }

    public function confirm(): string
    {
        return view('/components/header') .
            view('components/navbar') .
            view('confirmation') .
            view('/components/footer');

    }
}

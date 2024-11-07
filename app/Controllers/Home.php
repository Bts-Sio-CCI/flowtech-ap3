<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('/components/header') .
            view('/components/navbar') .
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
}

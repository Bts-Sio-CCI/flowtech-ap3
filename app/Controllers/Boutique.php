<?php

namespace App\Controllers;

class Boutique extends BaseController
{
    public function index(): string
    {
        return view('/components/header') .
            view('/components/navbar') .
            view('shop') .
            view('/components/footer');
    }
}

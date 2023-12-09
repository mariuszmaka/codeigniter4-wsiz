<?php

namespace App\Controllers;

class HomeController extends BaseController
{
    public function index()
    {
        echo view('header');
        echo view('home');
        echo view('footer');
    }
}

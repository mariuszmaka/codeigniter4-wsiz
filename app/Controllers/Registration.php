<?php

namespace App\Controllers;
use \App\Models\UserModel;


class Registration extends BaseController
{
    public function index()
    {
        echo view('header');
        echo view('registration');
        echo view('footer');
    }

    public function do_register(){

        $userModel = new UserModel();

        $name = $this->request->getPost('name');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        #HASH PASS
        $password = password_hash($password, PASSWORD_BCRYPT);

        $data = [
            'name' => $name, 
            'email' => $email, 
            'password' => $password          
        ];

        $r = $userModel->insert($data);

        if($r){
            echo view('header');
            echo 'Rejestracja OK';
            echo view('footer');
        }else{
            echo view('header');
            echo 'Błąd w trakcie rejestracji';
            echo view('footer');
        }

    }
}

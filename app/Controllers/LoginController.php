<?php

namespace App\Controllers;
use \App\Models\UserModel;

class LoginController extends BaseController
{
    public function index()
    {
        echo view('header');
        echo view('login');
        echo view('footer');
    }

    public function do_login()
    {
        $userModel = new UserModel();

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $result = $userModel->where('email', $email)->first();

        if($result->id > 0)
        {
            if (password_verify($password, $result->password)) {
                
                $this->session->set('user', $result);
                return redirect()->to('');
                # 'Password is valid!';

            } else {
                echo 'Błędna nazwa użytkownika lub hasło.';
            }
        }
        else
        {
            echo 'Błędna nazwa użytkownika lub hasło.'; 
        }

    }

    public function logout(){
        session_destroy();
        return redirect()->to(site_url());
    }
}



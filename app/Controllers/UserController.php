<?php

namespace App\Controllers;
use \App\Models\UserModel;


class UserController extends BaseController
{
    public function index()
    {
        #nowy model z danymi
        $userModel = new UserModel();
        
        #wybieramy uzytkownika z id
        $data['user'] = $userModel->where('id', session('user')->id)->first();

        #generowanie widoków
        echo view('header');
        echo view('user', $data);
        echo view('footer');
    }

    public function update(){
        $userModel = new UserModel();
        
        #id dla ktorego zmieniamy dane
        $id = $this->request->getVar('id');
        
        #ktore pola zmieniamy
        $data = [
            'name' =>       $this->request->getVar('name'),
            'surname' =>    $this->request->getVar('surname'),
            'email'  =>     $this->request->getVar('email'),
            'password' =>   password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
            'adres' =>      $this->request->getVar('adres'),
            'phone' =>      $this->request->getVar('telefon')
        ];
        
        #aktualizacja
        $userModel->update($id, $data);
        
        #powrot na stronę
        return $this->response->redirect(base_url('/user'));
    }

}

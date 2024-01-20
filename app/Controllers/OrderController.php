<?php

namespace App\Controllers;

use App\Models\OrderModel;

class OrderController extends BaseController
{
    public function index()
    {
        echo view('header');
        echo view('order');
        echo view('footer');
    }

    // insert data
    public function store() {
        $userModel = new OrderModel();
        $data = [
            'user_id'   => $this->request->getVar('user_id'),
            'book_id'   => $this->request->getVar('book_id'),
            'date'      => date("Y-m-d H:i:s"),
            'status'    => 'nowe'
        ];
        $userModel->insert($data);

        $message['status'] = true;
        echo view('header');
        echo view('order', $message);
        echo view('footer');
    }


}

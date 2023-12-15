<?php

namespace App\Controllers;

use App\Models\BookModel;
use App\Models\OrderModel;
use App\Models\UserModel;

class AdminController extends BaseController
{
    private $perPages = 10;
    public function __construct(){
        if(session()->get('user')->role == 'user'){
            $data['msg'] = "Brak autoryzacji";
            echo view('header');
            echo view('message', $data);
            echo view('footer');
            die();
        }
    }
    public function index()
    {
        echo view('admin/headerAdmin');
        echo view('admin/admin');
        echo view('footer');
    }

    public function users()
    {
        $userList =  new UserModel();
        $data = [
            'data' => $userList->paginate($this->perPages),
            'pager' => $userList->pager,
            ];

        echo view('admin/headerAdmin');
        echo view('admin/user', $data);
        echo view('footer');
    }

    public function books()
    {
        $bookList =  new BookModel();
        $data = [
            'data' => $bookList
                ->orderBy('book_id', 'DESC')
                ->paginate($this->perPages),
            'pager' => $bookList->pager,
        ];

        echo view('admin/headerAdmin');
        echo view('admin/book', $data);
        echo view('footer');
    }

    public function orders()
    {
        $orderList =  new OrderModel();
        $data = [
            'data' => $orderList
                ->join('books', 'books.book_id = orders.book_id', 'left')
                ->join('users', 'users.id = orders.user_id','left')
                ->orderBy('id_order', 'DESC')
                ->paginate($this->perPages),
            'pager' => $orderList->pager,
            ];

        echo view('admin/headerAdmin');
        echo view('admin/order', $data);
        echo view('footer');
    }
}

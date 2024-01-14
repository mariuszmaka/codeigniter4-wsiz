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

    public function users($msg = null)
    {
        $userList =  new UserModel();
        $data = [
            'data'  => $userList->paginate($this->perPages),
            'pager' => $userList->pager,
            'msg'   => $msg,
            ];

        echo view('admin/headerAdmin');
        echo view('admin/user', $data);
        echo view('footer');
    }

    public function usersEdit()
    {
        $model =  new UserModel();
        $id = $this->request->getVar('id');
        $data = [
            'name'      => $this->request->getVar('name'),
            'surname'   => $this->request->getVar('surname'),
            'email'     => $this->request->getVar('email'),
            'password'  => $this->request->getVar('password'),
            'adres'     => $this->request->getVar('adres'),
            'phone'     => $this->request->getVar('phone'),
            'role'      => $this->request->getVar('role'),
        ];

        $model->update($id, $data);
        $this->users('Zaktualizowano dane.');
    }

    public function usersDelete()
    {
        $model =  new UserModel();
        $id = $this->request->getVar('id');
        $model->where('id', $id)->delete($id);
        $this->users('Usunięto użytkownika.');

    }

    public function books($msg = null)
    {
        $bookList =  new BookModel();
        $data = [
            'data'  => $bookList
                ->orderBy('book_id', 'DESC')
                ->paginate($this->perPages),
            'pager' => $bookList->pager,
            'msg'   => $msg,
        ];

        echo view('admin/headerAdmin');
        echo view('admin/book', $data);
        echo view('footer');
    }

    public function booksEdit()
    {
        $model =  new BookModel();
        $id = $this->request->getVar('book_id');
        $data = [
            'title'     => $this->request->getVar('title'),
            'pages'     => $this->request->getVar('pages'),
            'isbn'      => $this->request->getVar('isbn'),
            'description'  => $this->request->getVar('description'),
            'img'       => $this->request->getVar('img'),
            'type'      => $this->request->getVar('type'),
            'amount'    => $this->request->getVar('amount'),
            'url'       => $this->request->getVar('url'),
        ];

        $model->update($id, $data);
        $this->books($id.'Zaktualizowano dane.');
    }

    public function booksDelete()
    {
        $model =  new BookModel();
        $id = $this->request->getVar('book_id');
        $model->where('book_id', $id)->delete($id);
        $this->books('Usunięto książkę.');
    }

    public function orders($msg = null)
    {
        $orderList =  new OrderModel();
        $data = [
            'data' => $orderList
                ->join('books', 'books.book_id = orders.book_id', 'left')
                ->join('users', 'users.id = orders.user_id','left')
                ->orderBy('id_order', 'DESC')
                ->paginate($this->perPages),
            'pager' => $orderList->pager,
            'msg' => $msg,
            ];

        echo view('admin/headerAdmin');
        echo view('admin/order', $data);
        echo view('footer');
    }

    public function ordersEdit()
    {
        $model =  new OrderModel();
        $id = $this->request->getVar('id_order');
        $data = [
            'status'     => $this->request->getVar('status'),
        ];

        $model->update($id, $data);
        $this->orders('Zaktualizowano dane.');
    }

    public function ordersDelete()
    {
        $model =  new OrderModel();
        $id = $this->request->getVar('id_order');
        $model->where('id_order', $id)->delete($id);
        $this->orders('Usunięto zamówienie.');
    }
}

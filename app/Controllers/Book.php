<?php

namespace App\Controllers;
use \App\Models\BookModel;

class Book extends BaseController
{
    public function index()
    {

        $model = new BookModel();
        $data['title'] = $model->getBooks();

        return view('header')
            . view('bookList', $data)
            . view('footer');
    }




}



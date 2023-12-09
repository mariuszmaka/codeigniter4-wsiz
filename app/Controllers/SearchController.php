<?php

namespace App\Controllers;

use \App\Models\BookModel;


class SearchController extends BaseController
{
    public function index()
    {
        $model = new BookModel();
        $data = array();

        if($this->request->getGet('search')){
            $search_string = $this->request->getGet('search');
            $data['data'] = $model->like('title',$search_string)->getAllBooks();
        }

        echo view('header');
        echo view('search', $data);
        echo view('footer');
    }


}
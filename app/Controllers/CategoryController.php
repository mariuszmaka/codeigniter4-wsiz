<?php

namespace App\Controllers;

use App\Models\CategoryModel;

class CategoryController extends BaseController
{
    public function index()
    {
        $model = new CategoryModel();
        $data['data'] = $model->findAll();

        echo view('header');
        echo view('category', $data);
        echo view('footer');
    }
}

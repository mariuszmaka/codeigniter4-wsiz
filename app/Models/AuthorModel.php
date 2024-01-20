<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthorModel extends Model
{
    protected $table = 'authors';
    protected $returnType = 'object';


    public function getAllAuthors()
    {

        /*$this->builder()
            ->select()
            ->join('authors', 'books.author_id = authors.id');
         */
        
         $authorModel = new AuthorModel(); 
         
        return [
            'data' => $authorModel->paginate(10),//findAll(),
            'pager'=> $authorModel->pager,
        ];
    }
}
?>
<?php

namespace App\Models;

use CodeIgniter\Model;

class BookModel extends Model
{
    protected $table = 'books';
    protected $returnType = 'object';


    public function getAllBooks()
    {

        $this->builder()
            ->select()
            ->join('authors', 'books.author_id = authors.id');
            
        return [
            'data' => $this->paginate(10),//findAll(),
            'pager'=> $this->pager,
        ];
    }


}

?>
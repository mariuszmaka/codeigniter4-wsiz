<?php

namespace App\Models;
use CodeIgniter\Model;

class BookModel extends Model
{
    protected $table = 'books';
    protected $primaryKey   =   'book_id';
    protected $returnType = 'object';
    protected $allowedFields = [
        'book_id',
        'title',
        'pages',
        'isbn',
        'description',
        'img',
        'type',
        'amount',
        'url',
        /* All other fields */
    ];
    public function getAllBooks()
    {
        $bookModel = new BookModel();

        $bookModel
            ->join('book_author', 'books.book_id = book_author.book_id', 'INNER')
            ->join('authors', 'authors.author_id = book_author.author_id', 'INNER')
            ->groupBy(array('books.book_id', "books.title"))
            ->findAll();

        return [
            'data' => $bookModel->paginate(10),
            'pager'=> $bookModel->pager,
        ];
    }

    public function getBook($id){
        $bookModel = new BookModel();
        return $bookModel->where('book_id',$id)->first();
    }


}

?>
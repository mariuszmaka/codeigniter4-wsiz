<?php

namespace App\Models;
use CodeIgniter\Model;

class BookModel extends Model
{
    protected $table = 'books';
    protected $primaryKey   =   'book_id';
    protected $returnType = 'object';
    protected $allowedFields = [
        'books.book_id',
        'books.img',
        /* All other fields */
    ];
    public function getAllBooks()
    {
        $bookModel = new BookModel();

        $bookModel
            /*->select('books.book_id,
                            books.title, 
                            books.description, 
                            books.isbn, 
                            books.img, 
                            books.pages, 
                            books.publish_date,
                            books.amount, 
                            GROUP_CONCAT(authors.name,\' \', authors.surname ORDER BY authors.name SEPARATOR \', \') as authorss')
            */->join('book_author', 'books.book_id = book_author.book_id', 'INNER')
            ->join('authors', 'authors.author_id = book_author.author_id', 'INNER')
            ->groupBy(array('books.book_id', "books.title"))
            ->findAll();


        return [
            'data' => $bookModel->paginate(10),
            'pager'=> $bookModel->pager,

        ];
    }


}

?>
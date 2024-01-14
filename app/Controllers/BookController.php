<?php

namespace App\Controllers;

use App\Models\BookModel;
use Tigo\Recommendation\Recommend;
use setasign\Fpdi;
class BookController extends BaseController
{
    public function index($categories = null):string
    {
        $perPage = 10;

        //$pager = service('pager');
        //$page = (@$_GET['page']) ? $_GET['page'] : 1;
        //$offset = ($page-1) * $perPage;

        //$db = db_connect();
        $model = new BookModel();
        //$builder = $db->table('books');
        $model->select('books.book_id,
                 books.title, 
                 books.description, 
                 books.isbn, 
                 books.img, 
                 books.pages, 
                 books.publish_date,
                 books.amount, 
                 GROUP_CONCAT(authors.name,\' \', authors.surname ORDER BY authors.name SEPARATOR \', \') as authors')
                ->join('book_author', 'books.book_id = book_author.book_id', 'LEFT')
                ->join('authors', 'authors.author_id = book_author.author_id', 'LEFT')
                ->join('book_categories', 'books.book_id = book_categories.book_id', 'LEFT')
                ->groupBy(array('books.book_id', 'books.title'))
                ->orderBy('book_id','DESC')

        ;
        if(isset($categories))
            $model->where('book_categories.category_id', $categories);



        //$query = $builder->get($perPage,$offset);
        //$total = $builder->countAll();
        //print_r($total);
        // Call makeLinks() to make pagination links.
        //$pager_links = $pager->makeLinks($page, $perPage, $total);

        $data = [
            'data' => $model->paginate(10),
            'pager' => $model->pager,

        ];

        return view('header')
            . view('bookList', $data)
            . view('footer');
    }

    public function getBook($param = null):string
    {

        //Show one book 
        $db = db_connect();
        $builder = $db->table('books');
        $builder->select('books.book_id,
                 books.title, 
                 books.description, 
                 books.isbn, 
                 books.img, 
                 books.pages,
                 books.type, 
                 books.publish_date,
                 books.amount, 
                 GROUP_CONCAT(authors.name,\' \', authors.surname ORDER BY authors.name SEPARATOR \', \') as authors');
        $builder->join('book_author', 'books.book_id = book_author.book_id', 'LEFT');
        $builder->join('authors', 'authors.author_id = book_author.author_id', 'LEFT');
        $builder->groupBy(array('books.book_id', "books.title"));
        $builder->where('books.book_id', $param);

        $query = $builder->get();

        $data = [
            'data' => $query->getFirstRow(),
        ];
        return view('header')
            . view('book', $data)
            . view('footer');
    }

    public function getBookPDF($id = null):string
    {
        $dompdf = new \Dompdf\Dompdf();
        //$pdf = new \Fpdi\Fpdi();

        return view('pdfView');
    }


}

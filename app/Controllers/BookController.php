<?php

namespace App\Controllers;
use App\ThirdParty\FPDF;


class BookController extends BaseController
{
    public function index($perPage = 10)
    {
  
        $pager = service('pager');
        $page = (@$_GET['page']) ? $_GET['page'] : 1;
        $offset = ($page-1) * $perPage;

        $db = db_connect();
        $builder = $db->table('books');
        $builder->select('books.book_id,
                 books.title, 
                 books.description, 
                 books.isbn, 
                 books.img, 
                 books.pages, 
                 books.publish_date,
                 books.amount, 
                 GROUP_CONCAT(authors.name,\' \', authors.surname ORDER BY authors.name SEPARATOR \', \') as authors');
        $builder->join('book_author', 'books.book_id = book_author.book_id', 'LEFT');
        $builder->join('authors', 'authors.author_id = book_author.author_id', 'LEFT');
        $builder->groupBy(array('books.book_id', "books.title"));

        $query = $builder->get($perPage,$offset);
        $total = $builder->countAllResults();     

        // Call makeLinks() to make pagination links.
        $pager_links = $pager->makeLinks($page, $perPage, $total);

        $data = [
            'pager_links' => $pager->makeLinks($page,$perPage,$total),
            'data' => $query->getResult(),
        ];

        return view('header')
            . view('bookList', $data)
            . view('footer');
    }

    public function getBook($param = null){

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

    public function getBookPDF($id = null)
    {
        $dompdf = new \Dompdf\Dompdf();
        $dompdf->loadHtml(view('pdfView'));
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream();

        return view('pdfView');
    }


}

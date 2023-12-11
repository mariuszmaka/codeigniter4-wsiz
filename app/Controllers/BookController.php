<?php

namespace App\Controllers;
use \App\Models\BookModel;

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
/*
    public function doWaterMark()
    {
        $currentFile = $this->file;
        //$currentFile = put here your file;
        $Username = "UserName";
        $this->pdf = new FPDI();

        $pagecount = $this->pdf->setSourceFile($currentFile);

        for ($i = 1; $i <= $pagecount; $i++) {
            $this->pdf->addPage(); //<- moved from outside loop
            $tplidx = $this->pdf->importPage($i);
            $this->pdf->useTemplate($tplidx, 10, 10, 100);
            // now write some text above the imported page
            $this->pdf->SetFont('Arial', 'I', 40);
            $this->pdf->SetTextColor(255, 0, 0);
            $this->pdf->SetXY(25, 135);
            $this->_rotate(55);
            $this->pdf->Write(0, $Username);
            $this->_rotate(0); //<-added
        }

        $this->pdf->Output('New File Name', 'F');
    }
*/

}

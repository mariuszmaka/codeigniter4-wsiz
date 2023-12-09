<?php

namespace App\Controllers;
use \App\Models\BookModel;

class BookController extends BaseController
{
    public function index()//$perPage = 10)
    {
  
       /* $pager = service('pager');
        $page = (@$_GET['page']) ? $_GET['page'] : 1;
        $offset = ($page-1) * $perPage;

        $db = db_connect();
        $builder = $db->table('books');
        $builder->select('
                        books.id as id,
                        books.img as img,
                        books.title as title,
                        books.isbn as isbn,
                        books.description as description,
                        books.pages as pages,
                        books.publish_date as publish_date,
                        authors.name as name,
                        authors.surname as surname,
                        books.amount as amount
                        ');
        $builder->join('authors', 'books.author_id = authors.id');
   
        $query = $builder->get($perPage,$offset);
        $total = $builder->countAllResults();     

        // Call makeLinks() to make pagination links.
        $pager_links = $pager->makeLinks($page, $perPage, $total);

        $data = [
            // ...
            'pager_links' => $pager->makeLinks($page,$perPage,$total),
            'data' => $query->getResult(),
        ];
        */
  /*      $model = new BookModel();
        $data = [
                'data' => $model
                        ->join('authors', 'books.author_id = authors.id', 'LEFT')
                        ->findAll(),
                'pager' => $model->pager,
        ];
*/      


        $model = new BookModel();
        $data = [ 
            'data'  => $model->getAllBooks(),
            'pager' => $model->pager,
        ];
        $data = $model->getAllBooks();

        return view('header')
            . view('bookList', $data)
            . view('footer');
    }

    public function getBook($param = null){

        //Show one book 
        
        $model = new BookModel();
        $data['data'] = $model
                    ->join('authors', 'books.author_id = authors.id', 'LEFT')
                    ->where('books.id', $param)
                    ->first();

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



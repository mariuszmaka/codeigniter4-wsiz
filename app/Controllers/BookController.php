<?php

namespace App\Controllers;


use App\Models\BookModel;
use Dompdf\Dompdf;


class BookController extends BaseController
{
    public function index($categories = null):string
    {
        $perPage = 10;
        $model = new BookModel();
 
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

        $dompdf = new Dompdf();
        $dompdf->loadHtml('
            <style>
            .container {
                page-break-before: always;
            }
            .container:first-of-type {
                page-break-before: auto;
            }
            </style>

            <div class="container"><h1>Chapter One</h1></div> 
            <div class="container"><h1>Chapter Two</h1></div> 
            <div class="container"><h1>Chapter Three</h1></div>
            <div class="container">Kopia przeznaczona dla: '. session('user')->name .' '. session('user')->surname .'</div>
        '
        );
        $add = 'YAHOO';

        $dompdf->render();

     
        $canvas = $dompdf->getCanvas();
        $canvas->page_script(function ($pageNumber, $pageCount, $canvas, $fontMetrics) {
            
            $text = "Page $pageNumber of $pageCount";
            $font = $fontMetrics->getFont('times');
            $pageWidth = $canvas->get_width();
            $pageHeight = $canvas->get_height();
            $size = 10;
            $width = $fontMetrics->getTextWidth($text, $font, $size);
            $canvas->text($pageWidth - $width - 20, $pageHeight - 20, $text, $font, $size);
        });
        $dompdf->stream('document.pdf', array("Attachment" => 0));
  

        return view('pdfView');
    }


}

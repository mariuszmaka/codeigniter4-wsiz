<?php

namespace App\Controllers;

use \App\Models\BookModel;


class SearchController extends BaseController
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

        if($this->request->getVar('search'))
            $builder->like('books.title', $this->request->getVar('search'));
        $builder->groupBy(array('books.book_id', "books.title"));
        $builder->orderBy('book_id','DESC');

        $query = $builder->get($perPage,$offset);
        $total = $builder->countAllResults();

        // Call makeLinks() to make pagination links.
        $pager_links = $pager->makeLinks($page, $perPage, $total);

        $data = [
            'pager_links' => $pager->makeLinks($page,$perPage,$total),
            'data' => $query->getResult(),
        ];




        echo view('header');
        echo view('search', $data);
        echo view('footer');
    }


}
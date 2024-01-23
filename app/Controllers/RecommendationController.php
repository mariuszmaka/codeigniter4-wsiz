<?php

namespace App\Controllers;

use App\Models\RatingModel;
use App\Models\BookModel;
use OpenCF\RecommenderService;
use function PHPUnit\Framework\isEmpty;

class RecommendationController extends BaseController
{


    /*
     * Pobrac liste książek ocenionych prze uzytkownika
     * Mamy np tablicę - 4,3,2
     * Dla kazdego elementu przewidujemy co się podoba np wyjdzie
     * że dla elementu 4 (id książki) polecane to 5 - 20%, 6-30%, 7-40%...
     * i tak dla kazdego elementu
     * pózniej generujemy kolejną tablicę dwuelementową gdzie skłądowymi 
     * są obiekt książka oraz wartość 'polecania' np 20%
     * i ta tablica leci do widoku
     * 
     */

    public function index(){
        $model = new RatingModel();
        $results = $model->where('user_id',4)->findAll();
        $data['data'] = $results;
        

        $book_list = array();
        //tablica z ksiazkami które ocenil uzytkownik - dla kazdej zwracamy predyckje co się podoba
        foreach($results as $row){
            
            foreach($this->getPredict($row['book_id'],$row['score']) as $key => $value){
                $b = new BookModel();
                 array_push($book_list, 
                            array( 'book'  => $b->getBook($key),
                                   'score' => $value)
                            );
            };
        }
        //ksiazki się powielają ponieważ dla każdej z osobna system wyswietla jakby powiązania 
        // z jedną pozycją moga się łaczyc bardziej z inną mniej, niemnjiej jednaj pewna korelacja występuje
        

        //mozna posortowac tablice po wartosci score i usunac najmniejsze duble (wyswietlą się  większe)
        ksort($book_list);
        $book_list = $this->unique_multidim_array($book_list, 'book');
        
        
        $data['data'] = $book_list;
        return view('header')
            . view('recommendation', $data)
            . view('footer');


        }

        //usuwa z tablicy duble po przekazanym kluczu
        function unique_multidim_array($array, $key) {
            $temp_array = array();
            $i = 0;        
            $key_array = array();   
        
            foreach($array as $val) {
                if (!in_array($val[$key], $key_array)) {
                    $key_array[$i] = $val[$key];
                    $temp_array[$i] = $val;
                }
                $i++;
            }
            return $temp_array;
        }

    public function getPredict($book_id, $score_val)
    {
        #https://github.com/phpjuice/opencf

        # TRANSFORM OBJECT TO SUPPORTED ARRAY FOR OPEN CF
        $rating = new RatingModel();

        //get book title from ratings
        $books = $rating
            //->select('books.title, books.book_id')
           // ->join('books','books.book_id=ratings.book_id')
            ->groupBy('book_id')
            ->findAll();

        $dataset = array();

        foreach ($books as  $value) {

            //get score for each users
            $model = new RatingModel();
            $result = $model->select('user_id, score')->where('book_id', $value['book_id'])->findAll();

            $tmp = array();

            foreach($result as $row){

                if(isset($row['user_id']) & isset($row['score']))
                $tmp[strval($row['user_id'])] = $row['score'];
            }

            $dataset[strval($value['book_id'])] = $tmp;
            unset($tmp);
        }


        # POBIERA DANE O OCENACH
        # NOWY UZYTKOWNIK DLA ZADANEJ KSIAZKI -
        # NA STRONIE Z KSIAZKA DLA ZALOGOWANEGO POPRZEZ PODANIE ID - KSIAZKI - SYSTEM PODA REKOMENDACJE
        # predict - id_ksiazki


        //Create a recommender service instance
        $recommenderService = new RecommenderService($dataset);

        // Retrieve a recommender (Weighted Slopeone)
        $recommender = $recommenderService->weightedSlopeone();

        // Predict future ratings
        // z bazy pobrać rekomendację użytkownika dla danej książki (jeśli jest)
        // wtedy system pokaże co rekomenduje


        $results = $recommender->predict([
            $book_id => $score_val
        ]);
        // zwraca tablicę gdzie indeksy tablicy to id książek a wartości to na ile się powinna podobać

        return $results;
    }

    /**
     * get score of book (id)
     *
     * @param int $id
     * @return array
     */



    /**
     * @throws \ReflectionException
     */
    public function store()
    {
        $model = new RatingModel();
        $data = [
            'user_id'   => $this->request->getVar('user_id'),
            'book_id'   => $this->request->getVar('book_id'),
            'score'     => $this->request->getVar('score')
        ];

   
        $model->insert($data);
        return redirect()->to(base_url('book/'.$this->request->getVar('book_id')));

    }


}

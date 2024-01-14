<?php

namespace App\Controllers;

use Tigo\Recommendation\Recommend;
use App\Models\RatingModel;
use OpenCF\RecommenderService;
use function PHPUnit\Framework\isEmpty;

class RecommendationController extends BaseController
{


    public function index($book_id = 1)
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
            //var_dump($value);

            foreach($result as $row){

                if(isset($row['user_id']) & isset($row['score']))
                $tmp[strval($row['user_id'])] = $row['score'];

                //var_dump($tmp);
            }

            $dataset[strval($value['book_id'])] = $tmp;
            unset($tmp);
        }
        var_dump($dataset);

 #Training Dataset
        /*
        $dataset = [
            "squid" => [
                "user1" => 1,
                "user2" => 1,
                "user3" => 0.2,
            ],
            "cuttlefish" => [
                "user1" => 0.5,
                "user3" => 0.4,
                "user4" => 0.9,
            ],
            "octopus" => [
                "user1" => 0.8,
                "user2" => 0.5,
                "user3" => 1,
                "user4" => 0.4,
            ],
            "nautilus" => [
                "user2" => 0.2,
                "user3" => 0.4,
                "user4" => 0.5,
            ],
        ];
*/

        # POBIERA DANE O OCENACH
        # NOWY UZYTKOWNIK DLA ZADANEJ KSIAZKI -
        # NA STRONIE Z KSIAZKA DLA ZALOGOWANEGO POPRZEZ PODANIE ID - KSIAZKI - SYSTEM PODA REKOMENDACJE
        # predict - id_ksiazki


        //Create a recommender service instance
        $recommenderService = new RecommenderService($dataset);

        // Retrieve a recommender (Weighted Slopeone)
        $recommender = $recommenderService->weightedSlopeone();

        // Predict future ratings
        $results = $recommender->predict([
            $book_id => 0.4
        ]);

        $data['data'] = $results;
        return view('header')
            . view('recommendation', $data)
            . view('footer');
    }
}

<?php

namespace App\Controllers;

use Tigo\Recommendation\Recommend;
use App\Models\RatingModel;
use OpenCF\RecommenderService;

class RecommendationController extends BaseController
{


    public function index()
    {

        $rating = new RatingModel();

        //get all books
        $books = $rating->select('book_id')->groupBy('book_id')->findAll();

        $dataset = array();

        foreach ($books as $key => $value) {
            $dataset[$key] = $rating->select('user_id')->where('book_id', $value)->findAll();
        }

/* Training Dataset
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
                "user1" => 0.2,
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

        //Create a recommender service instance
        $recommenderService = new RecommenderService($dataset);

        // Retrieve a recommender (Weighted Slopeone)
        $recommender = $recommenderService->weightedSlopeone();

        // Predict future ratings
        $results = $recommender->predict([
            "squid" => 0.4
        ]);
*/
        $data['data'] = $dataset;
        return view('header')
            . view('recommendation', $data)
            . view('footer');
    }
}

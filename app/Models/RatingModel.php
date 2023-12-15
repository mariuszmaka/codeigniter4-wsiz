<?php

namespace App\Models;

use CodeIgniter\Model;

class RatingModel extends Model
{
    protected $table = 'ratings';
    protected $returnType = 'array';

    protected $allowedFields = ['score', 'book_id', 'user_id'];

}

?>
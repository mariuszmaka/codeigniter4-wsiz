<?php

namespace App\Models;
use CodeIgniter\Model;

class CategoryModel extends Model
{
    protected $table = 'categories';
    protected $primaryKey   =   'category_id';
    protected $returnType = 'object';
    protected $allowedFields = [
        'category_id', 'name',
    ];

}

?>
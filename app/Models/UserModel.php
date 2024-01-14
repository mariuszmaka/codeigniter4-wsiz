<?php

namespace App\Models;
use CodeIgniter\Model;

class UserModel extends Model 
{
    protected $table        =   'users';
    protected $primaryKey   =   'id';

    protected $useAutoIncrement = true;
    protected $returnType   = 'object';
     protected $allowedFields = ['id', 'name', 'surname', 'email', 'password', 'adres', 'phone','role', 'created_at', 'updated_at'];
    



}

?>
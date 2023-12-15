<?php
namespace App\Models;
use CodeIgniter\Model;
class OrderModel extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'order_id';
    protected $allowedFields = ['user_id', 'book_id', 'book_id', 'date', 'status'];

}
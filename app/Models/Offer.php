<?php 
namespace App\Models;
use CodeIgniter\Model;

class Offer extends Model
{
    protected $table = 'offers';
    protected $primaryKey = 'id';
    protected $allowedFields = ['title', 'coupon', 'expiry_date'];
}
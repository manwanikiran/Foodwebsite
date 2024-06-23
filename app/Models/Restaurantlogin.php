<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurantlogin extends Model
{
    protected $table = 'tbl_restaurant';

    protected $primaryKey = 'res_id';
    
    use HasFactory;
}

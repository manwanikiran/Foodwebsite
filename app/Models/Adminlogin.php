<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adminlogin extends Model
{
    protected $table = 'tbl_admin';

    protected $primaryKey = 'admin_id';

    use HasFactory;
}

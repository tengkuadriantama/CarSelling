<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;
// use Illuminate\Database\Eloquent\Model;

class Motor extends Model
{
    use HasFactory;
    protected $fillable = [
        'mesin', 'suspensi', 'transmisi','stok'
    ];
    protected $collection = 'motors';
    protected $primaryKey = '_id';
    protected $connection = 'mongodb'; 
}

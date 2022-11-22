<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;


class Mobil extends Model
{
    use HasFactory;
    protected $fillable = [
        'mesin', 'kapasitas_penumpang', 'tipe','stok'
    ];
    protected $collection = 'mobils';
    protected $primaryKey = '_id';
    protected $connection = 'mongodb'; 
}

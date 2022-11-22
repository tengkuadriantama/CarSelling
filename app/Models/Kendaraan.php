<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;



class Kendaraan extends Model
{
    use HasFactory;
    protected $collection = 'kendaraans';
    protected $primaryKey = '_id';
    protected $connection = 'mongodb'; 
    protected $fillable = [
        'tahun_keluaran', 'warna', 'harga','jenis_kendaraan','status','id_kendaraan_motor', 'id_kendaraan_mobil'
    ];

    public function idmotor()
    {
        return $this->belongsTo(Motor::class, 'id_kendaraan_motor', '_id');
    }

    public function idmobil()
    {
        return $this->belongsTo(Mobil::class, 'id_kendaraan_mobil', '_id');
    }
}

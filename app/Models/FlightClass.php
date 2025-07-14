<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class FlightClass extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'flight_id',
        'class_type',
        'price',
        'total_seats',
    ];

    public function flight()
    {
        return $this->belongsTo(Flight::class); //Relasi Eloquent: Many to One, Kelas penerbangan ini milik satu penerbangan
    }

    public function facilities()
    {
        return $this->belongsToMany(Facility::class, 'flight_class_facility', 'flight_class_id', 'facility_id');  //Relasi Eloquent: Many to Many, Satu kelas bisa punya banyak fasilitas dan sebaliknya
    }
     public function transactions()
    {
        return $this->hasMany(Transaction::class); //Relasi: One to Many, Kelas ini bisa digunakan dalam banyak transaksi
    }

}

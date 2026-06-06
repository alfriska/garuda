<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'code',
        'flight_id',
        'flight_class_id',
        'name',
        'email',
        'phone',
        'number_of_passengers',
        'promo_code_id',
        'payment_status',
        'subtotal',
        'grandtotal',
    ];

    public function flight()
    {
        return $this->belongsTo(Flight::class);  //Relasi: Many to One, Transaksi ini terkait ke satu penerbangan
    }

    public function Class()
    {
        return $this->belongsTo(FlightClass::class, 'flight_class_id'); //Relasi: Many to One, Transaksi ini milik satu kelas penerbangan
    }
    public function promo()
    {
        return $this->belongsTo(PromoCode::class); //Relasi: Many to One, Promo yang digunakan dalam transaksi (bisa null)
    }
    public function passengers()
    {
        return $this->hasMany(TransactionPassenger::class); //Relasi: One to Many, Transaksi bisa punya banyak penumpang
    }

}

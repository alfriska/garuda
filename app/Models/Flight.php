<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; 
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'flight_number',
        'airline_id',
    ];  

    public function airline()
    {
        return $this->belongsTo(Airline::class); //Relasi Eloquent: Many to One, Satu penerbangan dimiliki oleh satu maskapai
    }
    public function segments()
    {
        return $this->hasMany(FlightSegment::class); //Relasi: One to Many, Satu penerbangan bisa punya banyak segmen (asal–tujuan)
    }
    public function classes()
    {
        return $this->hasMany(FlightClass::class); //Relasi: One to Many, Satu penerbangan bisa punya banyak kelas (economy, business)
    }
    public function seats()
    {
        return $this->hasMany(FlightSeat::class); //Relasi: One to Many, Satu penerbangan punya banyak kursi
    }
    public function transactions()
    {
        return $this->hasMany(Transaction::class); //Relasi: One to Many, Satu penerbangan bisa memiliki banyak transaksi pemesanan
    }
    public function generateSeats()
    {
        $classes = $this->classes; //Ambil semua kelas penerbangan dari flight ini

        foreach ($classes as $class) {
            $totalSeats = $class->total_seats;  //Jumlah kursi untuk kelas ini
            $seatsPerRow = $this->getSeatsPerRow($class->class_type); //Jumlah kursi per baris berdasarkan tipe kelas
            $rows = ceil($totalSeats / $seatsPerRow); //Jumlah baris

            $existingSeats = FlightSeat::where('flight_id', $this->id)
                ->where('class_type', $class->class_type)
                ->get();

            $existingRows = $existingSeats->pluck('row')->toArray();

            $seatCounter = 1;

            for ($row = 1; $row <= $rows; $row++) {
                if (!in_array($row, $existingRows)) {
                    for ($column = 1; $column <= $seatsPerRow; $column++) {
                        if ($seatCounter > $totalSeats) {
                            break;
                        }

                        $seatCode = $this->generateSeatCode($row, $column);

                        FlightSeat::create([
                            'flight_id' => $this->id,
                            'name' => $seatCode,
                            'row' => $row,
                            'column' => $column,
                            'is_available' => true,
                            'class_type' => $class->class_type,
                        ]);

                        $seatCounter++;
                    }
                }
            }

            foreach ($existingSeats as $existingSeat) {
                if ($existingSeat->column > $seatsPerRow || $existingSeat->row > $rows) {
                    $existingSeat->is_available = false;
                    $existingSeat->save();
                }
            }
        }
    }

    protected function getSeatsPerRow($classType)
    {
        switch ($classType) {
            case 'business':
                return 4;
            case 'economy':
                return 6;
            default:
                return 4;
        }
    }

    private function generateSeatCode($row, $column)
    {
        $rowLetter = chr(64 + $row);

        return $rowLetter . $column;
    }
}



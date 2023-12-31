<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    use HasFactory;

    protected $fillable = ['number', 'status', 'guest_number', 'location'];

    protected $cast = [
        'status' => TableStatus::class,
        'location' => TableLocation::class,
    ];


    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}

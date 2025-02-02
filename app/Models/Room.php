<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_kamar',
        'gambar',
        'deskripsi',
        'harga',
        'wifi',
        'type_kamar',
    ];  

    public function booking(){
        return $this->hasMany(Booking::class);
    }
}

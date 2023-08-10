<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //Mengisikan Mass Assigment
    // 1. Fillable
    // 2. Guarded

    // Fillable = Data Yang Boleh/Ditampilkan
    protected $fillable = ['nama_produk', 'stok', 'harga'];

    // Guarded = Kebalikan dari Fillable
    //protected $guarded = ['id', 'created'];
}

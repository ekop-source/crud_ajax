<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenjualanModel extends Model
{
    protected $table = "penjualan"; //protected $table untuk konvensi penamaan tabel karna laravel default mengharuskan pakai akhiran s, seperti penjualans
    protected $guarded = ['id']; // Semua kolom yang kita tambahkan ke $guarded akan diabaikan
}
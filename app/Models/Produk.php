<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $timestamps = false;
    protected $table = 'produk';

    public function kategori()
    {
        return $this->belongsTo(KategoriProduk::class, 'kategori_produk_id', 'id');
    }
}

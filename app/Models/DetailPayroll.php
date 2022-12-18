<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPayroll extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $guarded = [];
    protected $table = 'detail_payroll';

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'produk_id');
    }
}

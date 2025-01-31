<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $fillable = ['penjualan_id', 'payment_date', 'amount_paid', 'payment_method', 'status', 'status'];

    // Relasi dengan Penjualan
    public function penjualan()
    {
        return $this->belongsTo(Penjualan::class);
    }
}

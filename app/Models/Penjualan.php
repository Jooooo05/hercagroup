<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    protected $fillable = ['marketing_id', 'grand_total'];

    // Relasi dengan Marketing
    public function marketing()
    {
        return $this->belongsTo(Marketing::class);
    }
}

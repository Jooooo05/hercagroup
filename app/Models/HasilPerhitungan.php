<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HasilPerhitungan extends Model
{
    protected $fillable = [
        'nama_marketing',
        'bulan',
        'omset',
        'komisi_percent',
        'komisi_nominal',
        ];
    public $timestamps = true;
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Marketing extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    // Relasi dengan Penjualan
    public function penjualans()
    {
        return $this->hasMany(Penjualan::class, 'marketing_id');
    }

    // Fungsi untuk mendapatkan total omset
    public function getTotalOmsetAttribute()
    {
        return $this->penjualans()->sum('grand_total');
    }

    // Fungsi untuk menghitung komisi berdasarkan total omset
    public function getKomisiAttribute()
    {
        $omset = $this->getTotalOmsetAttribute();

        if ($omset < 100000000) {
            return 0;
        } elseif ($omset < 200000000) {
            return $omset * 0.025;
        } elseif ($omset < 500000000) {
            return $omset * 0.05;
        } else {
            return $omset * 0.10;
        }
    }
}

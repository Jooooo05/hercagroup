<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HasilPerhitungan;

class HasilPerhitunganController extends Controller
{
    public function index()
    {
        $hasil_perhitungan = HasilPerhitungan::all();
        return response()->json([
            'status' => 'success',
            'data' => $hasil_perhitungan
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use Illuminate\Http\Request;
use App\Models\HasilPerhitungan;

class PenjualanController extends Controller
{
    public function index()
    {
        $penjualan = Penjualan::with('marketing')->get();
        return response()->json($penjualan);
    }

    public function getKomisiByMarketing($marketingId)
    {
        $tanggal_penjualan = Penjualan::where('marketing_id', $marketingId)->get()->pluck('date')->unique()->last();
        $totalOmset = Penjualan::where('marketing_id', $marketingId)->sum('grand_total');

        $komisi = 0;
        $komisiPercent = 0;
        if ($totalOmset >= 100000000 && $totalOmset < 200000000) {
            $komisiPercent = 2.5;
        } elseif ($totalOmset >= 200000000 && $totalOmset < 500000000) {
            $komisiPercent = 5;
        } elseif ($totalOmset >= 500000000) {
            $komisiPercent = 10;
        }

        $komisi = $totalOmset * ($komisiPercent / 100);

        $marketing = Penjualan::with('marketing')->where('marketing_id', $marketingId)->first()->marketing;

        // dd($marketing);
        $bulan = \Carbon\Carbon::parse($tanggal_penjualan)->format('F Y'); // Example: 'January 2025'

        // Insert the calculated data into the hasil_perhitungans table
        // Check if the record already exists
        $existingRecord = HasilPerhitungan::where('nama_marketing', $marketing->name)
            ->where('bulan', $bulan)
            ->first();

        if ($existingRecord) {
            return response()->json(['message' => 'Perhitungan sudah pernah dilakukan']);
        } else {
            // Insert the calculated data into the hasil_perhitungans table
            HasilPerhitungan::create([
            'nama_marketing' => $marketing->name,  // Assuming 'nama' is a property of marketing model
            'bulan' => $bulan,
            'omset' => $totalOmset,
            'komisi_percent' => $komisiPercent,
            'komisi_nominal' => $komisi,
            'created_at' => now(),
            'updated_at' => now(),
            ]);
        }

        return response()->json([
            'tanggal_penjualan' => $tanggal_penjualan,
            'marketing_id' => $marketingId,
            'total_omset' => $totalOmset,
            'komisi' => $komisi,
            'komisi_percent' => $komisiPercent,
            'marketing' => $marketing
        ]);
    }



}

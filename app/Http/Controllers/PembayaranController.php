<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembayaran;
use App\Models\Penjualan;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\JsonResponse;

class PembayaranController extends Controller
{
    public function index(): JsonResponse
    {
        $pembayaran = Pembayaran::with('penjualan')->get();
        return response()->json($pembayaran);
    }
    public function store(Request $request)
    {
        $request->validate([
            'penjualan_id' => 'required',
            'payment_date' => 'required|date',
            'amount_paid' => 'required|numeric|min:1',
            'payment_method' => 'nullable|string',
            'status' => 'nullable|string|max:50',
        ]);

        $pembayaran = Pembayaran::create([
            'penjualan_id' => $request->penjualan_id,
            'payment_date' => $request->payment_date,
            'amount_paid' => $request->amount_paid,
            'payment_method' => $request->payment_method,
            'status' => $request->status ?? 'pending',
        ]);

        return response()->json([
            'message' => 'Pembayaran berhasil ditambahkan',
            'data' => $pembayaran,
        ], 201);
    }
}

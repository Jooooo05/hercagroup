<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Marketing;
use App\Models\Penjualan;
use Illuminate\Http\Request;

class MarketingController extends Controller
{

    public function index()
    {
        return response()->json(Marketing::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $marketing = Marketing::create($request->all());

        return response()->json($marketing, 201);
    }

    public function getAllMarketingWithKomisi()
    {
        $marketings = Marketing::with('penjualans')->get();

        $data = $marketings->map(function ($marketing) {
            return [
                'id' => $marketing->id,
                'name' => $marketing->name,
                'total_omset' => $marketing->getTotalOmsetAttribute(),
                'komisi' => $marketing->getKomisiAttribute()
            ];
        });

        return response()->json($data);
    }

    public function destroy($id)
    {
        $marketing = Marketing::find($id);
        $marketing->delete();

        return response()->json(null, 204);
    }
}

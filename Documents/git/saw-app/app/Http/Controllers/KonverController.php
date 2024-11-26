<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dataalternatif;
use App\Models\Data;
use App\Models\Datakonver;
use Illuminate\Support\Facades\DB;

class KonverController extends Controller
{
    
    
public function truncateData()
{
    try {
        // Truncate tables
        DB::table('bobot')->truncate();
        DB::table('data')->truncate();
        DB::table('datakonver')->truncate();

        return redirect()->back()->with('success', 'Semua data perhitungan berhasil dihapus.');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus data: ' . $e->getMessage());
    }
}
    
    
    public function index(){
        $data= Dataalternatif::all();
        return view('pemilihan',compact('data'));
    }

public function post(Request $request)
{
    if (count($request->alternatives) < 3) {
        return redirect()->back()->with('error', 'Minimal harus memilih 3 data alternatif.');
    }

    Data::truncate();
    Datakonver::truncate();

    $selectedAlternatives = Dataalternatif::whereIn('id', $request->alternatives)->get();
    foreach ($selectedAlternatives as $alternative) {
        $datakonver = $this->convertToDatakonver($alternative);
        Datakonver::create($datakonver);
        Data::create($datakonver);
    }

    return redirect()->route('bobot')->with('success', 'Data Alternatif Berhasil Disimpan.');
}

private function convertToDatakonver($alternative)
{
    return [
        'alternatif' => $alternative->alternatif,
        'c1' => $this->convertC1($alternative->c1),
        'c2' => $this->convertC2($alternative->c2),
        'c3' => $this->convertC3($alternative->c3),
        'c4' => $this->convertC4($alternative->c4),
        'c5' => $this->convertC5($alternative->c5),
        'c6' => $this->convertC6($alternative->c6),
    ];
}

    private function convertC1($c1)
    {
        if ($c1 >= 25000000) return 1;
        if ($c1 >= 2100000 && $c1 <= 2400000) return 2;
        if ($c1 >= 1700000 && $c1 <= 2000000) return 3;
        if ($c1 >= 1300000 && $c1 <= 1600000) return 4;
        if ($c1 <= 800000 && $c1 <= 1200000) return 5;
    }

    private function convertC2($c2)
    {
        switch ($c2) {
            case 'Sangat Buruk': return 1;
            case 'Buruk': return 2;
            case 'Biasa': return 3;
            case 'Bagus': return 4;
            case 'Sangat Bagus': return 5;
        }
    }

    private function convertC3($c3)
    {
        switch ($c3) {
            case 'Jari-Jari': return 1;
            case 'Bintang Racing': return 2;
            case 'Palang Racing': return 3;
            case 'Palang CNC': return 4;
            case 'Bintang CNC': return 5;
        }
    }

  private function convertC4($c4)
    {
        switch ($c4) {
            case 'Aluminium': return 1;
            case 'Magnesium': return 2;
            case 'Karbon': return 3;
            case 'Besi': return 4;
            case '': return 5;
        }
    }

private function convertC5($c5)
{
    switch ($c5) {
        case 'Ring 17': return 1;
        case 'Ring 12': return 2;
        case 'Ring 13': return 3;
        case 'Ring 16': return 4;
        case 'Ring 14': return 5;
    }
}

private function convertC6($c6)
{
    switch ($c6) {
        case 'Sangat Berat': return 1;
        case 'Cukup Berat': return 2;
        case 'Berat': return 3;
        case 'Ringan': return 4;
        case 'Sangat Ringan': return 5;
    }
}

}

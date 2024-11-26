<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bobot;
use App\Models\Data;
use App\Models\Datakonver;

class PerhitunganController extends Controller
{
    public function bobot_index(){
        return view('bobot');
    }

public function bobot(Request $request)
{
    $request->validate([
        'harga' => 'required|numeric|integer|min:0',
        'ketahanan' => 'required|numeric|integer|min:0',
        'desain' => 'required|numeric|integer|min:0',
        'bahan' => 'required|numeric|integer|min:0',
        'ukuran' => 'required|numeric|integer|min:0',
        'berat' => 'required|numeric|integer|min:0'
    ]);

    $totalBobot = $request->input('harga') +
                  $request->input('ketahanan') +
                  $request->input('desain') +
                  $request->input('bahan') +
                  $request->input('ukuran') +
                  $request->input('berat');

    if ($totalBobot != 100) {
        return redirect()->back()->withErrors(['total_bobot' => 'Total bobot semua kriteria harus 100.']);
    }

    Bobot::truncate();
    $criterias = ['harga', 'ukuran', 'berat'];

    // Bobot::create([
    //     'kriteria' => 'harga',
    //     'tipe' => 'cost',
    //     'bobot' => $request->harga,
    //     'w' => $request->harga / 100
    // ]);

    foreach ($criterias as $kriterias) {
        Bobot::create([
            'kriteria' => $kriterias,
            'tipe' => 'cost',
            'bobot' => $request->$kriterias,
            'w' => $request->$kriterias / 100
        ]);
    }

    $criteria = ['ketahanan', 'desain', 'bahan'];
    foreach ($criteria as $kriteria) {
        Bobot::create([
            'kriteria' => $kriteria,
            'tipe' => 'benefit',
            'bobot' => $request->$kriteria,
            'w' => $request->$kriteria / 100
        ]);
    }

    return redirect()->route('perhitungan')->with('success', 'Bobot berhasil ditambahkan.');
}

    public function index(){
        $this->hitung();
        $bobot = Bobot::all();
        $pure = Data::all();
        $data = Datakonver::all(); 
        $rank = Datakonver::orderBy('v', 'desc')->get();
        $normal = $this->normalizeData($data);
        return view('perhitungan', compact('bobot','normal','data','pure','rank'));
    }

   private function normalizeData($data)
    {
    $criteria = ['c1', 'c2', 'c3', 'c4', 'c5','c6'];
        $benefitCriteria = ['c2', 'c3', 'c4']; // C2, C3, C4, dan C5 adalah kriteria benefit
        $costCriteria = ['c1','c5','c6']; // C1 adalah kriteria cost

        $normalizedData = [];

        $dataCopy = $data->map(function($item) {
            return $item->replicate();
        });

        foreach ($criteria as $criterion) {
            if (in_array($criterion, $benefitCriteria)) {
                $maxValue = $dataCopy->max($criterion);
                foreach ($dataCopy as $item) {
                    $item->$criterion = $item->$criterion / $maxValue;
                }
            } elseif (in_array($criterion, $costCriteria)) {
                $minValue = $dataCopy->min($criterion);
                foreach ($dataCopy as $item) {
                    $item->$criterion = $minValue / $item->$criterion;
                }
            }
        }

        foreach ($dataCopy as $item) {
            $normalizedData[] = [
                'alternatif' => $item->alternatif,
                'c1' => round($item->c1, 4),
                'c2' => round($item->c2, 4),
                'c3' => round($item->c3, 4),
                'c4' => round($item->c4, 4),
                'c5' => round($item->c5, 4),
                'c6' => round($item->c6, 4),
            ];
        }

        return $normalizedData;
   }

   public function hitung()
    {
        $data = Datakonver::all();
        $data2 = Data::all();
        $bobot = Bobot::pluck('w')->toArray();
        if (count($bobot) !== 6) {
            return "Jumlah bobot harus 6.";
        }
        $normalizedData = $this->normalizeData($data);
        foreach ($normalizedData as $key => $row) {
            $v = 0;
            for ($i = 1; $i <= 6; $i++) {
                $v += $bobot[$i - 1] * $row['c' . $i];
            }

            $data[$key]->v = $v;
            $data[$key]->save();
            $data2[$key]->v = $v;
            $data2[$key]->save();
        }
    }

}

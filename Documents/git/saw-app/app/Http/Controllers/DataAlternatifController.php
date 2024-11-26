<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dataalternatif;

class DataAlternatifController extends Controller
{
        public function index()
    {
        $dataalternatifs = Dataalternatif::all();
        return view('dataalternatif', compact('dataalternatifs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'alternatif' => 'required',
            'c1' => 'required|numeric',
            'c2' => 'required',
            'c3' => 'required',
            'c4' => 'required',
            'c5' => 'required',
            'c6' => 'required',
        ]);

        Dataalternatif::create($request->all());
        return redirect()->route('dataalternatif.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function destroy($id)
    {
        $dataalternatif = Dataalternatif::findOrFail($id);
        $dataalternatif->delete();
        return redirect()->route('dataalternatif.index')->with('success', 'Data berhasil dihapus');
    }
}

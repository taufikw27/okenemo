<?php

namespace App\Http\Controllers;

use App\Models\barang;
use App\Models\masuk;
use Illuminate\Http\Request;

class BarangInController extends Controller
{
    public function index(){
        $barang = barang::with('kategori')->get();
        $bi = masuk::all();
        return view('barangIN', ['barang' => $barang,'bi' => $bi]);
    }
    public function create(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'qty' => 'required|numeric',
            'barang' => 'required|exists:tabel_barang,id', // Validation to ensure the selected item exists
        ]);

        $barangNI = new masuk();
        $barangNI->tanggal_masuk = $request->input('date');
        $barangNI->jumlah = $request->input('qty');
        $barangNI->id_barang = $request->input('barang');
        $barangNI->save();
        $barang = barang::where('id',$barangNI->id_barang)->first();
        $barang->qty =$barang->qty + $request->input('qty');
        $barang->save();

        return redirect()->route('barangIN.index')->with('success', 'Record added successfully.');
    }
}

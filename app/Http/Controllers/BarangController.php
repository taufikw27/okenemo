<?php

namespace App\Http\Controllers;

use App\Models\barang;
use App\Models\kategori;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index(){
        $barang = barang::with('kategori')->get();
        $kategori = kategori::all();
        return view('barang', ['barang' => $barang,'kategori' => $kategori]);
    }
    public function create(Request $request)
    {
        $request->validate([
            'barang' => 'required|string|max:255',
            'qty' => 'required|numeric', // Validation to ensure the selected category exists
        ]);

        $barang = new Barang();
        $barang->nama = $request->input('barang');
        $barang->qty = $request->input('qty');
        $barang->kategori_id = $request->input('kategori');
        $barang->save();

        return redirect()->route('barang.index')->with('success', 'Item added successfully.');
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'barang' => 'required|string|max:255',
            'qty' => 'required|numeric',
             // Validation to ensure the selected category exists
        ]);

        $barang = Barang::find($id);

        if (!$barang) {
            return redirect()->route('barang.index')->with('error', 'Item not found.');
        }

        $barang->nama = $request->input('barang');
        $barang->qty = $request->input('qty');
        $barang->kategori_id = $request->input('kategori');
        $barang->save();

        return redirect()->route('barang.index')->with('success', 'Item updated successfully.');
    }
    public function destroy($id)
    {
        $barang = Barang::find($id);

        if (!$barang) {
            return redirect()->route('barang.index')->with('error', 'Item not found.');
        }

        $barang->delete();

        return redirect()->route('barang.index')->with('success', 'Item deleted successfully.');
    }
}

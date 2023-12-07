<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index(){
        $kategori = kategori::all();
        return view('kategori', ['kategori' => $kategori]);
    }
    public function create(Request $request){
       
        $kategori = new kategori();
        $kategori->kategori = $request->input('category');
        $kategori->save();
            // Send email
        // Mail::to($user->email)->send(new \App\Mail\UserRegistered());
       
        // Redirect to the login page after registration
        return redirect()->route('kategori.index')->with('success', 'Registration successful. Please log in.');
    }
    public function update(Request $request, $id)
        {
            $request->validate([
                'category' => 'required|string|max:255|unique:tabel_kategori,kategori,' . $id,
            ]);

            $kategori = kategori::find($id);

            if (!$kategori) {
                return redirect()->route('kategori.index')->with('error', 'Category not found.');
            }

            $kategori->kategori = $request->input('category');
            $kategori->save();

            return redirect()->route('kategori.index')->with('success', 'Category updated successfully.');

        }
        public function destroy($id)
            {
                $kategori = kategori::find($id);

                if (!$kategori) {
                    return redirect()->route('kategori.index')->with('error', 'Category not found.');
                }

                $kategori->delete();

                return redirect()->route('kategori.index')->with('success', 'Category deleted successfully.');
            }
}

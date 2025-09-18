<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PenggunaController extends Controller
{
    public function index()
    {
        $pengguna = Pengguna::all();
        return view('pengguna.index', compact('pengguna')); 
    }

    public function create()
    {
        return view('pengguna.create'); 
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:100',
            'username' => 'required|string|max:100|unique:pengguna,username',
            'password' => 'required|min:6',
        ]);

        $data['password'] = Hash::make($data['password']);
        Pengguna::create($data);

        return redirect()->route('pengguna.index')->with('success', 'Pengguna berhasil ditambahkan!');
    }

    public function update(Request $request, Pengguna $pengguna)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:100',
            'username' => 'required|string|max:100|unique:pengguna,username,' . $pengguna->id,
            'password' => 'nullable|min:6',
        ]);

        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        $pengguna->update($data);

        return redirect()->route('pengguna.index')->with('success', 'Pengguna berhasil diperbarui!');
    }


    public function show(Pengguna $pengguna)
    {
        return view('pengguna.show', compact('pengguna'));
    }

    public function edit(Pengguna $pengguna)
    {
        return view('pengguna.edit', compact('pengguna'));
    }

    public function destroy($id)
{
    try {
        $pengguna = Pengguna::findOrFail($id);
        $pengguna->delete();

        return redirect()
        ->route('pengguna.index')
        ->with('success', 'Pengguna berhasil dihapus!');
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Gagal menghapus pengguna!'
        ], 500);
    }
}


}

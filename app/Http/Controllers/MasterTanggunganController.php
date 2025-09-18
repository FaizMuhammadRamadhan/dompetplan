<?php

namespace App\Http\Controllers;

use App\Models\MasterTanggungan;
use Illuminate\Http\Request;

class MasterTanggunganController extends Controller
{
    public function index()
    {
        $tanggungan = MasterTanggungan::all();
        return view('master_tanggungan.index', compact('tanggungan')); 
    }

    public function create()
    {
        return view('master_tanggungan.create'); 
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_tanggungan' => 'required|string|max:100|unique:master_tanggungan,nama_tanggungan',
            'tagihan_perbulan' => 'required|integer|min:0',
            'lama_cicilan' => 'required|integer|min:0',
            'tanggal_mulai' => 'required|date',
            'tanggal_jatuh_tempo_perbulan' => 'required|integer|min:1',
        ]);

        MasterTanggungan::create($data);

        return redirect()->route('master-tanggungan.index')->with('success', 'Tanggungan berhasil ditambahkan!');
    }

    public function show(MasterTanggungan $master_tanggungan)
    {
        return view('master_tanggungan.show', compact('master_tanggungan'));
    }

    public function edit(MasterTanggungan $master_tanggungan)
    {
        return view('master_tanggungan.edit', compact('master_tanggungan'));
    }

    public function update(Request $request, MasterTanggungan $master_tanggungan)
    {
        $data = $request->validate([
            'nama_tanggungan' => 'required|string|max:100|unique:master_tanggungan,nama_tanggungan,' . $master_tanggungan->id,
            'tagihan_perbulan' => 'required|integer|min:0',
            'lama_cicilan' => 'required|integer|min:1',
            'tanggal_mulai' => 'required|date',
            'tanggal_jatuh_tempo_perbulan' => 'required|integer|min:1',
        ]);

        $master_tanggungan->update($data);

        return redirect()->route('master-tanggungan.index')->with('success', 'Tanggungan berhasil diperbarui!');
    }

    public function destroy($id)
    {
        try {
            $dompet = MasterTanggungan::findOrFail($id);
            $dompet->delete();

            return redirect()
                ->route('master-tanggungan.index')
                ->with('success', 'Tanggungan berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()
                ->route('master-tanggungan.index')
                ->with('error', 'Gagal menghapus tanggungan!');
        }
    }
}

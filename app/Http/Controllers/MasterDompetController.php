<?php

namespace App\Http\Controllers;

use App\Models\MasterDompet;
use Illuminate\Http\Request;

class MasterDompetController extends Controller
{
    public function index()
    {
        $dompet = MasterDompet::all();
        return view('master_dompet.index', compact('dompet')); 
    }

    public function create()
    {
        return view('master_dompet.create'); 
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_dompet' => 'required|string|max:50|unique:master_dompet,nama_dompet',
        ]);

        MasterDompet::create($data);

        return redirect()->route('master-dompet.index')->with('success', 'Dompet berhasil ditambahkan!');
    }

    public function show(MasterDompet $master_dompet)
    {
        return view('master_dompet.show', compact('master_dompet'));
    }

    public function edit(MasterDompet $master_dompet)
    {
        return view('master_dompet.edit', compact('master_dompet'));
    }

    public function update(Request $request, MasterDompet $master_dompet)
    {
        $data = $request->validate([
            'nama_dompet' => 'required|string|max:50|unique:master_dompet,nama_dompet,' . $master_dompet->id,
        ]);

        $master_dompet->update($data);

        return redirect()->route('master-dompet.index')->with('success', 'Dompet berhasil diperbarui!');
    }

    public function destroy($id)
    {
        try {
            $dompet = MasterDompet::findOrFail($id);
            $dompet->delete();

            return redirect()
                ->route('master-dompet.index')
                ->with('success', 'Dompet berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()
                ->route('master-dompet.index')
                ->with('error', 'Gagal menghapus dompet!');
        }
    }
}

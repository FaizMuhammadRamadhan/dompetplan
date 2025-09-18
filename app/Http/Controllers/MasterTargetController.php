<?php

namespace App\Http\Controllers;

use App\Models\MasterTarget;
use Illuminate\Http\Request;

class MasterTargetController extends Controller
{
    public function index()
    {
        $target = MasterTarget::all();
        return view('master_target.index', compact('target')); 
    }

    public function create()
    {
        return view('master_target.create'); 
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_target' => 'required|string|max:30|unique:master_target,nama_target',
            'nominal_target' => 'required|integer|min:0',
            'tanggal_mulai' => 'required|date',
            'tanggal_berakhir' => 'required|date',
        ]);

        MasterTarget::create($data);

        return redirect()->route('master-target.index')->with('success', 'Target berhasil ditambahkan!');
    }

    public function show(MasterTarget $master_target)
    {
        return view('master_target.show', compact('master_target'));
    }

    public function edit(MasterTarget $master_target)
    {
        return view('master_target.edit', compact('master_target'));
    }

    public function update(Request $request, MasterTarget $master_target)
    {
        $data = $request->validate([
            'nama_target' => 'required|string|max:50|unique:master_target,nama_target,' . $master_target->id,
            'nominal_target' => 'required|integer|min:0',
            'tanggal_mulai' => 'required|date',
            'tanggal_berakhir' => 'required|date',
        ]);

        $master_target->update($data);

        return redirect()->route('master-target.index')->with('success', 'Target berhasil diperbarui!');
    }

    public function destroy($id)
    {
        try {
            $target = MasterTarget::findOrFail($id);
            $target->delete();

            return redirect()
                ->route('master-target.index')
                ->with('success', 'Target berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()
                ->route('master-target.index')
                ->with('error', 'Gagal menghapus target!');
        }
    }
}

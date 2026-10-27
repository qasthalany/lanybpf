<?php

namespace App\Http\Controllers;

use App\Models\Hobi;
use App\Models\Biodata;
use Illuminate\Http\Request;

class HobiController extends Controller
{
    public function index(Request $request)
{
    $query = Hobi::with('biodata');

    if ($request->filled('biodata_id')) {
        $query->where('biodata_id', $request->biodata_id);
    }

    $hobi = $query->get();

    return view('hobi.index', compact('hobi'));
}

    public function create()
{
    $mahasiswa = Biodata::all();

    return view('hobi.create', compact('mahasiswa'));
}

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_hobi' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
            'biodata_id' => 'required|exists:Biodata_1159,id',
        ]);

        Hobi::create($data);

        return redirect()->route('hobi.index')
            ->with('success', 'Hobi berhasil ditambahkan');
    }

    public function show(Hobi $hobi)
    {
        return redirect()->route('hobi.edit', $hobi->id);
    }

    public function edit(Hobi $hobi)
    {
        $mahasiswa = Biodata::all();

    return view('hobi.edit', compact('hobi', 'mahasiswa'));
    }

    public function update(Request $request, Hobi $hobi)
    {
        $data = $request->validate([
        'biodata_id' => 'required|exists:Biodata_1159,id',
        'nama_hobi' => 'required|string|max:255',
        'kategori' => 'required|string|max:255',
        'keterangan' => 'nullable|string',
    ]);

    $hobi->update($data);

    return redirect()->route('hobi.index')
        ->with('success', 'Hobi berhasil diperbarui');
    }

    public function destroy(Hobi $hobi)
    {
        $hobi->delete();

        return redirect()->route('hobi.index')
            ->with('success', 'Hobi berhasil dihapus');
    }
}

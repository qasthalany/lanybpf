<?php

namespace App\Http\Controllers;

use App\Models\Biodata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BiodataController extends Controller
{
    // Menampilkan seluruh biodata
    public function index()
    {
        $biodata = Biodata::all();
        return view('biodata.index', compact('biodata'));
    }

    // Menampilkan form tambah
    public function create()
    {
        return view('biodata.create');
    }

    // Menyimpan biodata baru
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:30',
            'jurusan' => 'required|string|max:255',
            'alamat' => 'required|string',
            'foto_profil' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('foto_profil')) {
            $data['foto_profil'] = $request
                ->file('foto_profil')
                ->store('foto_profil', 'public');
        }

        Biodata::create($data);

        return redirect()->route('biodata.index')
            ->with('success', 'Biodata berhasil ditambahkan');
    }

    // Menampilkan detail biodata
    public function show(Biodata $biodatum)
    {
        return redirect()->route('biodata.edit', $biodatum->id);
    }

    // Menampilkan form edit
    public function edit(Biodata $biodatum)
    {
        return view('biodata.edit', [
            'biodata' => $biodatum
        ]);
    }

    // Memperbarui biodata
    public function update(Request $request, Biodata $biodatum)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:30',
            'jurusan' => 'required|string|max:255',
            'alamat' => 'required|string',
            'foto_profil' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('foto_profil')) {
            if ($biodatum->foto_profil) {
                Storage::disk('public')->delete($biodatum->foto_profil);
            }

            $data['foto_profil'] = $request
                ->file('foto_profil')
                ->store('foto_profil', 'public');
        }

        $biodatum->update($data);

        return redirect()->route('biodata.index')
            ->with('success', 'Biodata berhasil diperbarui');
    }

    // Menghapus biodata
    public function destroy(Biodata $biodatum)
    {
        if ($biodatum->foto_profil) {
            Storage::disk('public')->delete($biodatum->foto_profil);
        }

        $biodatum->delete();

        return redirect()->route('biodata.index')
            ->with('success', 'Biodata berhasil dihapus');
    }
}

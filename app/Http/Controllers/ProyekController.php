<?php
namespace App\Http\Controllers;

use App\Models\Portofolio;
use App\Models\Proyek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProyekController extends Controller
{
    // READ - Menampilkan seluruh proyek
    public function index()
    {
        $dataProyek = Proyek::with('portofolio')
            ->latest()
            ->get();

        return view('admin.proyek.index', compact('dataProyek'));
    }

    // CREATE - Menampilkan form tambah proyek
    public function create()
    {
        $dataPortofolio = Portofolio::all();

        return view('admin.proyek.create', compact('dataPortofolio'));
    }

    // STORE - Menyimpan proyek baru
    public function store(Request $request)
    {
        $data = $request->validate([
            'portofolio_id'  => 'required|exists:Portofolio_1159,id',
            'nama_proyek'    => 'required|string|max:255',
            'kategori'       => 'required|string|max:255',
            'deskripsi'      => 'nullable|string',
            'teknologi'      => 'nullable|string|max:255',
            'tanggal_proyek' => 'nullable|date',
            'gambar'         => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'link_proyek'    => 'nullable|url|max:255',
        ]);

        // Upload gambar jika ada
        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')
                ->store('proyek', 'public');
        }

        Proyek::create($data);

        return redirect()->route('proyek.index')
            ->with('success', 'Data proyek berhasil ditambahkan.');
    }

    // SHOW - Menampilkan detail proyek
    public function show(Proyek $proyek)
    {
        $proyek->load('portofolio');

        return view('admin.proyek.show', compact('proyek'));
    }

    // EDIT - Menampilkan form edit proyek
    public function edit(Proyek $proyek)
    {
        $dataPortofolio = Portofolio::all();

        return view('admin.proyek.edit', compact(
            'proyek',
            'dataPortofolio'
        ));
    }

    // UPDATE - Memperbarui data proyek
    public function update(Request $request, Proyek $proyek)
    {
        $data = $request->validate([
            'portofolio_id'  => 'required|exists:Portofolio_1159,id',
            'nama_proyek'    => 'required|string|max:255',
            'kategori'       => 'required|string|max:255',
            'deskripsi'      => 'nullable|string',
            'teknologi'      => 'nullable|string|max:255',
            'tanggal_proyek' => 'nullable|date',
            'gambar'         => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'link_proyek'    => 'nullable|url|max:255',
            'hapus_gambar'   => 'nullable|boolean',
        ]);

        // Jika pengguna memilih hapus gambar
        if ($request->boolean('hapus_gambar')
            && ! $request->hasFile('gambar')) {

            if ($proyek->gambar) {
                Storage::disk('public')->delete($proyek->gambar);
            }

            $data['gambar'] = null;
        }

        // Jika pengguna mengunggah gambar baru
        if ($request->hasFile('gambar')) {

            $gambarBaru = $request->file('gambar')
                ->store('proyek', 'public');

            if ($proyek->gambar) {
                Storage::disk('public')->delete($proyek->gambar);
            }

            $data['gambar'] = $gambarBaru;
        }

        $proyek->update($data);

        return redirect()->route('proyek.index')
            ->with('success', 'Data proyek berhasil diperbarui.');
    }

    // DELETE - Menghapus proyek
    public function destroy(Proyek $proyek)
    {
        $gambar = $proyek->gambar;

        $proyek->delete();

        // Hapus gambar dari storage
        if ($gambar) {
            Storage::disk('public')->delete($gambar);
        }

        return redirect()->route('proyek.index')
            ->with('success', 'Data proyek berhasil dihapus.');
    }
}

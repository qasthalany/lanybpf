<?php
namespace App\Http\Controllers;

use App\Models\Portofolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PortofolioController extends Controller
{
    // READ - Menampilkan seluruh data CV
    public function index()
    {
        $dataPortofolio = Portofolio::latest()->get();

        return view('admin.portofolio.index', compact('dataPortofolio'));
    }

    // CREATE - Menampilkan form tambah CV
    public function create()
    {
        return view('admin.portofolio.create');
    }

    // STORE - Menyimpan data CV baru
    public function store(Request $request)
    {
        $data = $this->validasi($request);

        // Upload foto jika ada
        if ($request->hasFile('foto_profil')) {
            $data['foto_profil'] = $request->file('foto_profil')
                ->store('portofolio', 'public');
        }

        Portofolio::create($data);

        return redirect()->route('portofolio.index')
            ->with('success', 'Data portofolio berhasil ditambahkan.');
    }

    // SHOW - Menampilkan detail CV
    public function show(Portofolio $portofolio)
    {
        return view('admin.portofolio.show', compact('portofolio'));
    }

    // EDIT - Menampilkan form edit CV
    public function edit(Portofolio $portofolio)
    {
        return view('admin.portofolio.edit', compact('portofolio'));
    }

    // UPDATE - Memperbarui data CV
    public function update(Request $request, Portofolio $portofolio)
    {
        $data = $this->validasi($request);

        // Jika pengguna memilih hapus foto
        if ($request->boolean('hapus_foto')
            && ! $request->hasFile('foto_profil')) {

            if ($portofolio->foto_profil) {
                Storage::disk('public')->delete($portofolio->foto_profil);
            }

            $data['foto_profil'] = null;
        }

        // Jika pengguna mengunggah foto baru
        if ($request->hasFile('foto_profil')) {

            if ($portofolio->foto_profil) {
                Storage::disk('public')->delete($portofolio->foto_profil);
            }

            $data['foto_profil'] = $request->file('foto_profil')
                ->store('portofolio', 'public');
        }

        $portofolio->update($data);

        return redirect()->route('portofolio.index')
            ->with('success', 'Data portofolio berhasil diperbarui.');
    }

    // DELETE - Menghapus CV dan gambar terkait
    public function destroy(Portofolio $portofolio)
    {
        // Ambil semua path gambar sebelum menghapus data
        $gambarProyek = $portofolio->proyeks
            ->pluck('gambar')
            ->filter()
            ->all();

        $fotoProfil = $portofolio->foto_profil;

        // Hapus data CV
        // Proyek terkait terhapus melalui cascade pada database
        $portofolio->delete();

        // Hapus file foto profil
        if ($fotoProfil) {
            Storage::disk('public')->delete($fotoProfil);
        }

        // Hapus semua gambar proyek terkait
        foreach ($gambarProyek as $gambar) {
            Storage::disk('public')->delete($gambar);
        }

        return redirect()->route('portofolio.index')
            ->with('success', 'Data portofolio berhasil dihapus.');
    }

    // Menampilkan CV publik sesuai desain referensi
    // Menampilkan CV publik
    // Menampilkan CV publik berdasarkan ID
    public function cv($id)
    {
        $portofolio = Portofolio::with('proyeks')->findOrFail($id);

        return view('admin.cv.index', compact('portofolio'));
    }

    // Validasi form tambah dan edit
    private function validasi(Request $request)
    {
        return $request->validate([
            'nama'                 => 'required|string|max:255',
            'profesi'              => 'required|string|max:255',
            'tentang_saya'         => 'nullable|string',
            'tempat_tanggal_lahir' => 'nullable|string|max:255',
            'jenis_kelamin'        => 'nullable|string|max:255',
            'status'               => 'nullable|string|max:255',
            'kewarganegaraan'      => 'nullable|string|max:255',
            'alamat'               => 'nullable|string',
            'email'                => 'nullable|email|max:255',
            'no_hp'                => 'nullable|string|max:255',
            'sosial_media'         => 'nullable|string|max:255',
            'pendidikan'           => 'nullable|string',
            'pengalaman_kerja'     => 'nullable|string',
            'kemampuan'            => 'nullable|string',
            'foto_profil'          => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'hapus_foto'           => 'nullable|boolean',
        ]);
    }
}

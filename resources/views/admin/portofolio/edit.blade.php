
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Portofolio - 1159</title>

    @include('layouts.admin.css')
</head>

<body>

    <!-- NAVBAR MOBILE -->
    <nav class="navbar navbar-dark navbar-theme-primary px-4 col-12 d-lg-none">
        <a class="navbar-brand text-white fw-bold" href="{{ route('portofolio.index') }}">
            CV PORTOFOLIO
        </a>

        <button class="navbar-toggler collapsed" type="button"
            data-bs-toggle="collapse" data-bs-target="#sidebarMenu"
            aria-controls="sidebarMenu" aria-expanded="false">
            <span class="navbar-toggler-icon"></span>
        </button>
    </nav>

    <!-- SIDEBAR -->
    <nav id="sidebarMenu" class="sidebar d-lg-block bg-gray-800 text-white collapse" data-simplebar>

        <div class="sidebar-inner px-4 pt-3">
            <ul class="nav flex-column pt-3 pt-md-0">

                <li class="nav-item mb-4">
                    <a href="{{ route('dashboard') }}" class="nav-link">
                        <span class="sidebar-text fw-bold">
                            CV PORTOFOLIO
                        </span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link">
                        <span class="sidebar-text">Dashboard</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('pelanggan.index') }}" class="nav-link">
                        <span class="sidebar-text">Pelanggan</span>
                    </a>
                </li>

                <li class="nav-item active">
                    <a href="{{ route('portofolio.index') }}" class="nav-link">
                        <span class="sidebar-text">Portofolio</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('proyek.index') }}" class="nav-link">
                        <span class="sidebar-text">Proyek</span>
                    </a>
                </li>

                <!-- CV BERDASARKAN ID -->
                <li class="nav-item">
                    <a href="{{ route('cv.public', ['id' => $portofolio->id]) }}"
                        class="nav-link" target="_blank" rel="noopener noreferrer">
                        <span class="sidebar-text">Lihat CV Publik</span>
                    </a>
                </li>

            </ul>
        </div>
    </nav>

    <!-- KONTEN UTAMA -->
    <main class="content">

        <div class="py-4">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">

                    <li class="breadcrumb-item">
                        <a href="{{ route('dashboard') }}">Dashboard</a>
                    </li>

                    <li class="breadcrumb-item">
                        <a href="{{ route('portofolio.index') }}">
                            Portofolio
                        </a>
                    </li>

                    <li class="breadcrumb-item active">
                        Edit CV
                    </li>

                </ol>
            </nav>

            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                <div>
                    <h1 class="h4">Edit CV Portofolio</h1>
                    <p class="mb-0">
                        Perbarui informasi CV dan foto profil.
                    </p>
                </div>

                <div class="d-flex gap-2 flex-wrap">

                    <!-- LIHAT CV YANG SEDANG DIEDIT -->
                    <a href="{{ route('cv.public', ['id' => $portofolio->id]) }}"
                        class="btn btn-primary" target="_blank" rel="noopener noreferrer">
                        Lihat CV
                    </a>

                    <a href="{{ route('portofolio.index') }}" class="btn btn-secondary">
                        Kembali
                    </a>

                </div>
            </div>
        </div>

        <!-- FORM EDIT -->
        <div class="card border-0 shadow mb-4">
            <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Data belum berhasil diperbarui.</strong>
                        <ul class="mb-0 mt-2">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('portofolio.update', $portofolio->id) }}"
                    method="POST" enctype="multipart/form-data">

                    @csrf
                    @method('PUT')

                    <!-- DATA DIRI -->
                    <h5 class="mb-3">Data Diri</h5>

                    <div class="row">

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" name="nama" class="form-control"
                                value="{{ old('nama', $portofolio->nama) }}" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Profesi / Status</label>
                            <input type="text" name="profesi" class="form-control"
                                value="{{ old('profesi', $portofolio->profesi) }}" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Tempat / Tanggal Lahir</label>
                            <input type="text" name="tempat_tanggal_lahir" class="form-control"
                                value="{{ old('tempat_tanggal_lahir', $portofolio->tempat_tanggal_lahir) }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Jenis Kelamin</label>

                            <select name="jenis_kelamin" class="form-select">
                                <option value="">Pilih Jenis Kelamin</option>

                                <option value="Laki-Laki"
                                    @selected(old('jenis_kelamin', $portofolio->jenis_kelamin) == 'Laki-Laki')>
                                    Laki-Laki
                                </option>

                                <option value="Perempuan"
                                    @selected(old('jenis_kelamin', $portofolio->jenis_kelamin) == 'Perempuan')>
                                    Perempuan
                                </option>
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Status Perkawinan</label>

                            <select name="status" class="form-select">
                                <option value="">Pilih Status</option>

                                <option value="Belum Menikah"
                                    @selected(old('status', $portofolio->status) == 'Belum Menikah')>
                                    Belum Menikah
                                </option>

                                <option value="Menikah"
                                    @selected(old('status', $portofolio->status) == 'Menikah')>
                                    Menikah
                                </option>
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Kewarganegaraan</label>
                            <input type="text" name="kewarganegaraan" class="form-control"
                                value="{{ old('kewarganegaraan', $portofolio->kewarganegaraan) }}">
                        </div>

                        <div class="col-12 mb-3">
                            <label class="form-label">Alamat</label>
                            <textarea name="alamat" class="form-control" rows="3">{{ old('alamat', $portofolio->alamat) }}</textarea>
                        </div>

                    </div>

                    <hr class="my-4">

                    <!-- KONTAK -->
                    <h5 class="mb-3">Kontak dan Sosial Media</h5>

                    <div class="row">

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control"
                                value="{{ old('email', $portofolio->email) }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Nomor HP</label>
                            <input type="text" name="no_hp" class="form-control"
                                value="{{ old('no_hp', $portofolio->no_hp) }}">
                        </div>

                        <div class="col-12 mb-3">
                            <label class="form-label">Sosial Media</label>
                            <input type="text" name="sosial_media" class="form-control"
                                value="{{ old('sosial_media', $portofolio->sosial_media) }}">
                        </div>

                    </div>

                    <hr class="my-4">

                    <!-- PROFIL DAN RIWAYAT -->
                    <h5 class="mb-3">Profil dan Riwayat</h5>

                    <div class="mb-3">
                        <label class="form-label">Tentang Saya</label>
                        <textarea name="tentang_saya" class="form-control" rows="4">{{ old('tentang_saya', $portofolio->tentang_saya) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Pendidikan</label>
                        <textarea name="pendidikan" class="form-control" rows="4">{{ old('pendidikan', $portofolio->pendidikan) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Pengalaman Kerja</label>
                        <textarea name="pengalaman_kerja" class="form-control" rows="4">{{ old('pengalaman_kerja', $portofolio->pengalaman_kerja) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Kemampuan</label>
                        <textarea name="kemampuan" class="form-control" rows="4">{{ old('kemampuan', $portofolio->kemampuan) }}</textarea>
                    </div>

                    <hr class="my-4">

                    <!-- FOTO PROFIL -->
                    <h5 class="mb-3">Foto Profil</h5>

                    @if ($portofolio->foto_profil)
                        <div class="mb-3">
                            <label class="form-label">Foto Saat Ini</label>

                            <div>
                                <img src="{{ asset('storage/' . $portofolio->foto_profil) }}"
                                    alt="Foto Profil"
                                    width="130"
                                    height="130"
                                    class="rounded-circle"
                                    style="object-fit:cover;">
                            </div>
                        </div>

                        <div class="form-check mb-3">
                            <input type="checkbox"
                                class="form-check-input"
                                name="hapus_foto"
                                id="hapus_foto"
                                value="1"
                                @checked(old('hapus_foto'))>

                            <label class="form-check-label" for="hapus_foto">
                                Hapus foto profil
                            </label>
                        </div>
                    @else
                        <p class="text-muted">
                            Belum ada foto profil.
                        </p>
                    @endif

                    <div class="mb-3">
                        <label class="form-label">
                            Ganti / Tambah Foto (Opsional)
                        </label>

                        <input type="file"
                            name="foto_profil"
                            id="foto_profil"
                            class="form-control"
                            accept=".jpg,.jpeg,.png,.webp">

                        <small class="text-muted">
                            Kosongkan jika tidak ingin mengganti foto.
                            Maksimal 2 MB.
                        </small>
                    </div>

                    <!-- PREVIEW FOTO BARU -->
                    <div class="mb-4" id="preview-container" style="display:none;">

                        <label class="form-label">
                            Preview Foto Baru
                        </label>

                        <div>
                            <img id="preview-foto"
                                alt="Preview Foto"
                                width="130"
                                height="130"
                                class="rounded-circle"
                                style="object-fit:cover;">
                        </div>
                    </div>

                    <!-- TOMBOL -->
                    <div class="d-flex gap-2 flex-wrap">

                        <button type="submit" class="btn btn-success text-white">
                            Simpan Perubahan
                        </button>

                        <a href="{{ route('portofolio.index') }}" class="btn btn-secondary">
                            Batal
                        </a>

                    </div>

                </form>
            </div>
        </div>

        <!-- FOOTER -->
        <footer class="bg-white rounded shadow p-4 mb-4">
            <div class="d-flex justify-content-between flex-wrap">
                <span>CV & Portofolio 1159</span>
                <span>Laravel - Volt Bootstrap 5</span>
            </div>
        </footer>

    </main>

    <!-- JAVASCRIPT VOLT -->
    <script src="{{ asset('assets-admin/vendor/@popperjs/core/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('assets-admin/vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets-admin/js/volt.js') }}"></script>

    <!-- PREVIEW FOTO -->
    <script>
        const inputFoto = document.getElementById('foto_profil');
        const preview = document.getElementById('preview-foto');
        const container = document.getElementById('preview-container');

        let previewUrl = null;

        inputFoto.addEventListener('change', function(event) {
            const file = event.target.files[0];

            if (previewUrl) {
                URL.revokeObjectURL(previewUrl);
                previewUrl = null;
            }

            if (file) {
                previewUrl = URL.createObjectURL(file);
                preview.src = previewUrl;
                container.style.display = 'block';
            } else {
                preview.removeAttribute('src');
                container.style.display = 'none';
            }
        });
    </script>

</body>
</html>

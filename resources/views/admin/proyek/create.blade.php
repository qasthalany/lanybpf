
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah Proyek - 1159</title>

    @include('layouts.admin.css')
</head>

<body>

    <!-- NAVBAR MOBILE -->
    <nav class="navbar navbar-dark navbar-theme-primary px-4 col-12 d-lg-none">
        <a class="navbar-brand text-white fw-bold" href="{{ route('proyek.index') }}">
            CV PORTOFOLIO
        </a>

        <button class="navbar-toggler collapsed"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#sidebarMenu"
            aria-controls="sidebarMenu"
            aria-expanded="false">
            <span class="navbar-toggler-icon"></span>
        </button>
    </nav>

    <!-- SIDEBAR -->
    <nav id="sidebarMenu"
        class="sidebar d-lg-block bg-gray-800 text-white collapse"
        data-simplebar>

        <div class="sidebar-inner px-4 pt-3">
            <ul class="nav flex-column pt-3 pt-md-0">

                <!-- JUDUL -->
                <li class="nav-item mb-4">
                    <a href="{{ route('dashboard') }}" class="nav-link">
                        <span class="sidebar-text fw-bold">
                            CV PORTOFOLIO
                        </span>
                    </a>
                </li>

                <!-- DASHBOARD -->
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link">
                        <span class="sidebar-text">Dashboard</span>
                    </a>
                </li>

                <!-- PELANGGAN -->
                <li class="nav-item">
                    <a href="{{ route('pelanggan.index') }}" class="nav-link">
                        <span class="sidebar-text">Pelanggan</span>
                    </a>
                </li>

                <!-- PORTOFOLIO -->
                <li class="nav-item">
                    <a href="{{ route('portofolio.index') }}" class="nav-link">
                        <span class="sidebar-text">Portofolio</span>
                    </a>
                </li>

                <!-- PROYEK -->
                <li class="nav-item active">
                    <a href="{{ route('proyek.index') }}" class="nav-link">
                        <span class="sidebar-text">Proyek</span>
                    </a>
                </li>

                <!-- DAFTAR CV -->
                <li class="nav-item">
                    <a href="{{ route('portofolio.index') }}" class="nav-link">
                        <span class="sidebar-text">Daftar CV</span>
                    </a>
                </li>

            </ul>
        </div>
    </nav>

    <!-- KONTEN UTAMA -->
    <main class="content">

        <!-- HEADER -->
        <div class="py-4">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">

                    <li class="breadcrumb-item">
                        <a href="{{ route('dashboard') }}">
                            Dashboard
                        </a>
                    </li>

                    <li class="breadcrumb-item">
                        <a href="{{ route('proyek.index') }}">
                            Proyek
                        </a>
                    </li>

                    <li class="breadcrumb-item active">
                        Tambah Proyek
                    </li>

                </ol>
            </nav>

            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">

                <div>
                    <h1 class="h4">Tambah Proyek</h1>
                    <p class="mb-0">
                        Masukkan informasi proyek atau hasil karya.
                    </p>
                </div>

                <a href="{{ route('proyek.index') }}" class="btn btn-secondary">
                    Kembali
                </a>

            </div>
        </div>

        <!-- FORM TAMBAH PROYEK -->
        <div class="card border-0 shadow mb-4">

            <div class="card-body">

                <!-- VALIDASI ERROR -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Data belum berhasil disimpan.</strong>

                        <ul class="mb-0 mt-2">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('proyek.store') }}"
                    method="POST"
                    enctype="multipart/form-data">

                    @csrf

                    <h5 class="mb-3">Informasi Proyek</h5>

                    <div class="row">

                        <!-- PEMILIK PORTOFOLIO -->
                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Pemilik Portofolio
                                <span class="text-danger">*</span>
                            </label>

                            <select name="portofolio_id"
                                class="form-select"
                                required>

                                <option value="">
                                    Pilih Pemilik CV
                                </option>

                                @foreach ($dataPortofolio as $item)
                                    <option value="{{ $item->id }}"
                                        @selected(old('portofolio_id') == $item->id)>
                                        {{ $item->nama }}
                                    </option>
                                @endforeach

                            </select>

                            <small class="text-muted">
                                Pilih CV yang memiliki proyek ini.
                            </small>

                        </div>

                        <!-- NAMA PROYEK -->
                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Nama Proyek
                                <span class="text-danger">*</span>
                            </label>

                            <input type="text"
                                name="nama_proyek"
                                class="form-control"
                                value="{{ old('nama_proyek') }}"
                                placeholder="Contoh: Website Petshop"
                                required>

                        </div>

                        <!-- KATEGORI -->
                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Kategori Proyek
                                <span class="text-danger">*</span>
                            </label>

                            <select name="kategori"
                                class="form-select"
                                required>

                                <option value="">
                                    Pilih Kategori
                                </option>

                                <option value="Website"
                                    @selected(old('kategori') == 'Website')>
                                    Website
                                </option>

                                <option value="Aplikasi"
                                    @selected(old('kategori') == 'Aplikasi')>
                                    Aplikasi
                                </option>

                                <option value="Desain"
                                    @selected(old('kategori') == 'Desain')>
                                    Desain
                                </option>

                                <option value="Animasi 3D"
                                    @selected(old('kategori') == 'Animasi 3D')>
                                    Animasi 3D
                                </option>

                                <option value="Lainnya"
                                    @selected(old('kategori') == 'Lainnya')>
                                    Lainnya
                                </option>

                            </select>
                        </div>

                        <!-- TANGGAL PROYEK -->
                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Tanggal Proyek
                            </label>

                            <input type="date"
                                name="tanggal_proyek"
                                class="form-control"
                                value="{{ old('tanggal_proyek') }}">

                        </div>

                        <!-- DESKRIPSI -->
                        <div class="col-12 mb-3">

                            <label class="form-label">
                                Deskripsi Proyek
                            </label>

                            <textarea name="deskripsi"
                                class="form-control"
                                rows="4"
                                placeholder="Jelaskan tujuan, fungsi, atau hasil proyek yang dibuat">{{ old('deskripsi') }}</textarea>

                        </div>

                        <!-- TEKNOLOGI -->
                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Teknologi yang Digunakan
                            </label>

                            <input type="text"
                                name="teknologi"
                                class="form-control"
                                value="{{ old('teknologi') }}"
                                placeholder="Contoh: Laravel, MySQL, Bootstrap">

                        </div>

                        <!-- LINK PROYEK -->
                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Link Proyek
                            </label>

                            <input type="url"
                                name="link_proyek"
                                class="form-control"
                                value="{{ old('link_proyek') }}"
                                placeholder="https://github.com/...">

                            <small class="text-muted">
                                Opsional. Bisa diisi link GitHub atau website proyek.
                            </small>

                        </div>

                    </div>

                    <hr class="my-4">

                    <!-- GAMBAR PROYEK -->
                    <h5 class="mb-3">Dokumentasi Proyek</h5>

                    <div class="mb-3">

                        <label class="form-label">
                            Upload Gambar Proyek (Opsional)
                        </label>

                        <input type="file"
                            name="gambar"
                            id="gambar"
                            class="form-control"
                            accept=".jpg,.jpeg,.png,.webp">

                        <small class="text-muted">
                            Gambar boleh dikosongkan.
                            Format JPG, JPEG, PNG, atau WEBP.
                            Maksimal 2 MB.
                        </small>

                    </div>

                    <!-- PREVIEW GAMBAR -->
                    <div class="mb-4"
                        id="preview-container"
                        style="display:none;">

                        <label class="form-label">
                            Preview Gambar Proyek
                        </label>

                        <div>
                            <img id="preview-gambar"
                                alt="Preview Gambar"
                                width="220"
                                class="rounded"
                                style="max-height:160px; object-fit:cover;">
                        </div>

                    </div>

                    <!-- TOMBOL -->
                    <div class="d-flex gap-2 flex-wrap">

                        <button type="submit"
                            class="btn btn-success text-white">
                            Simpan Proyek
                        </button>

                        <a href="{{ route('proyek.index') }}"
                            class="btn btn-secondary">
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

    <!-- PREVIEW GAMBAR -->
    <script>
        const inputGambar = document.getElementById('gambar');
        const previewGambar = document.getElementById('preview-gambar');
        const previewContainer = document.getElementById('preview-container');

        let gambarUrl = null;

        inputGambar.addEventListener('change', function(event) {

            const file = event.target.files[0];

            if (gambarUrl) {
                URL.revokeObjectURL(gambarUrl);
                gambarUrl = null;
            }

            if (file) {
                gambarUrl = URL.createObjectURL(file);
                previewGambar.src = gambarUrl;
                previewContainer.style.display = 'block';
            } else {
                previewGambar.removeAttribute('src');
                previewContainer.style.display = 'none';
            }

        });
    </script>

</body>
</html>

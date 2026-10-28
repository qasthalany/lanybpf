
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Portofolio - 1159</title>

    @include('layouts.admin.css')
</head>

<body>

    <!-- NAVBAR MOBILE -->
    <nav class="navbar navbar-dark navbar-theme-primary px-4 col-12 d-lg-none">
        <a class="navbar-brand text-white fw-bold"
            href="{{ route('portofolio.index') }}">
            CV PORTOFOLIO
        </a>

        <button class="navbar-toggler d-lg-none collapsed"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#sidebarMenu"
            aria-controls="sidebarMenu"
            aria-expanded="false"
            aria-label="Toggle navigation">
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
                <li class="nav-item active">
                    <a href="{{ route('portofolio.index') }}" class="nav-link">
                        <span class="sidebar-text">Portofolio</span>
                    </a>
                </li>

                <!-- PROYEK -->
                <li class="nav-item">
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
                        <a href="{{ route('portofolio.index') }}">
                            Portofolio
                        </a>
                    </li>

                    <li class="breadcrumb-item active">
                        Tambah CV
                    </li>

                </ol>
            </nav>

            <div class="d-flex justify-content-between
                        align-items-center flex-wrap gap-3">

                <div>
                    <h1 class="h4">Tambah CV Portofolio</h1>
                    <p class="mb-0">
                        Lengkapi informasi CV sesuai data pribadi.
                    </p>
                </div>

                <a href="{{ route('portofolio.index') }}"
                    class="btn btn-secondary">
                    Kembali
                </a>

            </div>
        </div>

        <!-- FORM -->
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

                <form action="{{ route('portofolio.store') }}"
                    method="POST"
                    enctype="multipart/form-data">

                    @csrf

                    <!-- DATA DIRI -->
                    <h5 class="mb-3">Data Diri</h5>

                    <div class="row">

                        <!-- NAMA -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">
                                Nama Lengkap
                            </label>

                            <input type="text"
                                name="nama"
                                class="form-control"
                                value="{{ old('nama') }}"
                                placeholder="Masukkan nama lengkap"
                                required>
                        </div>

                        <!-- PROFESI -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">
                                Profesi / Status
                            </label>

                            <input type="text"
                                name="profesi"
                                class="form-control"
                                value="{{ old('profesi') }}"
                                placeholder="Contoh: Lulusan Baru"
                                required>
                        </div>

                        <!-- TEMPAT TANGGAL LAHIR -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">
                                Tempat / Tanggal Lahir
                            </label>

                            <input type="text"
                                name="tempat_tanggal_lahir"
                                class="form-control"
                                value="{{ old('tempat_tanggal_lahir') }}"
                                placeholder="Contoh: Rengat, 12 Mei 2005">
                        </div>

                        <!-- JENIS KELAMIN -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">
                                Jenis Kelamin
                            </label>

                            <select name="jenis_kelamin"
                                class="form-select">

                                <option value="">
                                    Pilih Jenis Kelamin
                                </option>

                                <option value="Laki-Laki"
                                    @selected(old('jenis_kelamin') == 'Laki-Laki')>
                                    Laki-Laki
                                </option>

                                <option value="Perempuan"
                                    @selected(old('jenis_kelamin') == 'Perempuan')>
                                    Perempuan
                                </option>

                            </select>
                        </div>

                        <!-- STATUS PERKAWINAN -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">
                                Status Perkawinan
                            </label>

                            <select name="status"
                                class="form-select">

                                <option value="">
                                    Pilih Status
                                </option>

                                <option value="Belum Menikah"
                                    @selected(old('status') == 'Belum Menikah')>
                                    Belum Menikah
                                </option>

                                <option value="Menikah"
                                    @selected(old('status') == 'Menikah')>
                                    Menikah
                                </option>

                            </select>
                        </div>

                        <!-- KEWARGANEGARAAN -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">
                                Kewarganegaraan
                            </label>

                            <input type="text"
                                name="kewarganegaraan"
                                class="form-control"
                                value="{{ old('kewarganegaraan', 'Indonesia') }}">
                        </div>

                        <!-- ALAMAT -->
                        <div class="col-12 mb-3">
                            <label class="form-label">
                                Alamat
                            </label>

                            <textarea name="alamat"
                                class="form-control"
                                rows="3"
                                placeholder="Masukkan alamat">{{ old('alamat') }}</textarea>
                        </div>

                    </div>

                    <hr class="my-4">

                    <!-- KONTAK -->
                    <h5 class="mb-3">
                        Kontak dan Sosial Media
                    </h5>

                    <div class="row">

                        <!-- EMAIL -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">
                                Email
                            </label>

                            <input type="email"
                                name="email"
                                class="form-control"
                                value="{{ old('email') }}"
                                placeholder="contoh@gmail.com">
                        </div>

                        <!-- NOMOR HP -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">
                                Nomor HP
                            </label>

                            <input type="text"
                                name="no_hp"
                                class="form-control"
                                value="{{ old('no_hp') }}"
                                placeholder="08xxxxxxxxxx">
                        </div>

                        <!-- SOSIAL MEDIA -->
                        <div class="col-12 mb-3">
                            <label class="form-label">
                                Sosial Media
                            </label>

                            <input type="text"
                                name="sosial_media"
                                class="form-control"
                                value="{{ old('sosial_media') }}"
                                placeholder="Instagram / LinkedIn / GitHub">
                        </div>

                    </div>

                    <hr class="my-4">

                    <!-- PROFIL DAN RIWAYAT -->
                    <h5 class="mb-3">
                        Profil dan Riwayat
                    </h5>

                    <!-- TENTANG SAYA -->
                    <div class="mb-3">
                        <label class="form-label">
                            Tentang Saya
                        </label>

                        <textarea name="tentang_saya"
                            class="form-control"
                            rows="4"
                            placeholder="Tuliskan deskripsi singkat tentang diri">{{ old('tentang_saya') }}</textarea>
                    </div>

                    <!-- PENDIDIKAN -->
                    <div class="mb-3">
                        <label class="form-label">
                            Pendidikan
                        </label>

                        <textarea name="pendidikan"
                            class="form-control"
                            rows="4"
                            placeholder="Contoh: S1 Arsitektur Universitas Fauget">{{ old('pendidikan') }}</textarea>
                    </div>

                    <!-- PENGALAMAN KERJA -->
                    <div class="mb-3">
                        <label class="form-label">
                            Pengalaman Kerja
                        </label>

                        <textarea name="pengalaman_kerja"
                            class="form-control"
                            rows="4"
                            placeholder="Tuliskan pengalaman kerja atau organisasi">{{ old('pengalaman_kerja') }}</textarea>
                    </div>

                    <!-- KEMAMPUAN -->
                    <div class="mb-3">
                        <label class="form-label">
                            Kemampuan
                        </label>

                        <textarea name="kemampuan"
                            class="form-control"
                            rows="4"
                            placeholder="Contoh: Desain, komunikasi, pemrograman">{{ old('kemampuan') }}</textarea>
                    </div>

                    <hr class="my-4">

                    <!-- FOTO -->
                    <h5 class="mb-3">
                        Foto Profil
                    </h5>

                    <div class="mb-3">
                        <label class="form-label">
                            Upload Foto (Opsional)
                        </label>

                        <input type="file"
                            name="foto_profil"
                            id="foto_profil"
                            class="form-control"
                            accept=".jpg,.jpeg,.png,.webp">

                        <small class="text-muted">
                            Foto boleh dikosongkan. Format JPG, PNG,
                            atau WEBP. Maksimal 2 MB.
                        </small>
                    </div>

                    <!-- PREVIEW FOTO -->
                    <div class="mb-4"
                        id="preview-container"
                        style="display:none;">

                        <label class="form-label">
                            Preview Foto
                        </label>

                        <div>
                            <img id="preview-foto"
                                alt="Preview Foto"
                                class="rounded-circle"
                                width="130"
                                height="130"
                                style="object-fit:cover;">
                        </div>
                    </div>

                    <!-- TOMBOL -->
                    <div class="d-flex gap-2">

                        <button type="submit"
                            class="btn btn-success text-white">
                            Simpan CV
                        </button>

                        <a href="{{ route('portofolio.index') }}"
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

    <!-- PREVIEW FOTO -->
    <script>
        const inputFoto = document.getElementById('foto_profil');
        const previewFoto = document.getElementById('preview-foto');
        const previewContainer = document.getElementById('preview-container');

        let fotoUrl = null;

        inputFoto.addEventListener('change', function(event) {

            const file = event.target.files[0];

            if (fotoUrl) {
                URL.revokeObjectURL(fotoUrl);
                fotoUrl = null;
            }

            if (file) {
                fotoUrl = URL.createObjectURL(file);
                previewFoto.src = fotoUrl;
                previewContainer.style.display = 'block';
            } else {
                previewFoto.removeAttribute('src');
                previewContainer.style.display = 'none';
            }

        });
    </script>

</body>
</html>


<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Proyek - 1159</title>

    @include('layouts.admin.css')
</head>

<body>

    <!-- NAVBAR MOBILE -->
    <nav class="navbar navbar-dark navbar-theme-primary px-4 col-12 d-lg-none">
        <a class="navbar-brand text-white fw-bold"
            href="{{ route('proyek.index') }}">
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
                    <a href="{{ route('dashboard') }}"
                        class="nav-link d-flex align-items-center">

                        <span class="sidebar-icon">
                            <img
                                src="{{ asset('assets-admin/img/brand/light.svg') }}"
                                height="25"
                                width="25"
                                alt="Logo">
                        </span>

                        <span class="sidebar-text fw-bold ms-2">
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

                <!-- LIHAT CV PEMILIK PROYEK -->
                <li class="nav-item">
                    <a href="{{ route('cv.public', ['id' => $proyek->portofolio_id]) }}"
                        class="nav-link"
                        target="_blank"
                        rel="noopener noreferrer">
                        <span class="sidebar-text">Lihat CV Publik</span>
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
                        Edit Proyek
                    </li>

                </ol>
            </nav>

            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">

                <div>
                    <h1 class="h4">Edit Proyek</h1>

                    <p class="mb-0">
                        Perbarui informasi dan dokumentasi proyek.
                    </p>
                </div>

                <div class="d-flex gap-2 flex-wrap">

                    <!-- LIHAT CV PEMILIK -->
                    <a href="{{ route('cv.public', ['id' => $proyek->portofolio_id]) }}"
                        class="btn btn-primary"
                        target="_blank"
                        rel="noopener noreferrer">
                        Lihat CV
                    </a>

                    <a href="{{ route('proyek.index') }}"
                        class="btn btn-secondary">
                        Kembali
                    </a>

                </div>

            </div>
        </div>

        <!-- FORM EDIT PROYEK -->
        <div class="card border-0 shadow mb-4">

            <div class="card-body">

                <!-- VALIDASI ERROR -->
                @if ($errors->any())
                    <div class="alert alert-danger">

                        <strong>
                            Data belum berhasil diperbarui.
                        </strong>

                        <ul class="mb-0 mt-2">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>

                    </div>
                @endif

                <form action="{{ route('proyek.update', $proyek->id) }}"
                    method="POST"
                    enctype="multipart/form-data">

                    @csrf
                    @method('PUT')

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
                                        @selected(old('portofolio_id', $proyek->portofolio_id) == $item->id)>
                                        {{ $item->nama }}
                                    </option>

                                @endforeach

                            </select>

                            <small class="text-muted">
                                Proyek akan ditampilkan pada CV pemilik yang dipilih.
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
                                value="{{ old('nama_proyek', $proyek->nama_proyek) }}"
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

                                @foreach (['Website', 'Aplikasi', 'Desain', 'Animasi 3D', 'Lainnya'] as $kategori)

                                    <option value="{{ $kategori }}"
                                        @selected(old('kategori', $proyek->kategori) == $kategori)>
                                        {{ $kategori }}
                                    </option>

                                @endforeach

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
                                value="{{ old('tanggal_proyek', $proyek->tanggal_proyek ? \Carbon\Carbon::parse($proyek->tanggal_proyek)->format('Y-m-d') : '') }}">

                        </div>

                        <!-- DESKRIPSI -->
                        <div class="col-12 mb-3">

                            <label class="form-label">
                                Deskripsi Proyek
                            </label>

                            <textarea name="deskripsi"
                                class="form-control"
                                rows="4">{{ old('deskripsi', $proyek->deskripsi) }}</textarea>

                        </div>

                        <!-- TEKNOLOGI -->
                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Teknologi yang Digunakan
                            </label>

                            <input type="text"
                                name="teknologi"
                                class="form-control"
                                value="{{ old('teknologi', $proyek->teknologi) }}">

                        </div>

                        <!-- LINK PROYEK -->
                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Link Proyek
                            </label>

                            <input type="url"
                                name="link_proyek"
                                class="form-control"
                                value="{{ old('link_proyek', $proyek->link_proyek) }}"
                                placeholder="https://github.com/...">

                        </div>

                    </div>

                    <hr class="my-4">

                    <!-- GAMBAR PROYEK -->
                    <h5 class="mb-3">
                        Dokumentasi Proyek
                    </h5>

                    <!-- GAMBAR LAMA -->
                    @if ($proyek->gambar)

                        <div class="mb-3">

                            <label class="form-label">
                                Gambar Saat Ini
                            </label>

                            <div class="mb-3">

                                <img
                                    src="{{ asset('storage/' . $proyek->gambar) }}"
                                    alt="{{ $proyek->nama_proyek }}"
                                    width="220"
                                    class="rounded"
                                    style="max-height:160px; object-fit:cover;">

                            </div>

                            <!-- HAPUS GAMBAR -->
                            <div class="form-check">

                                <input type="checkbox"
                                    name="hapus_gambar"
                                    id="hapus_gambar"
                                    value="1"
                                    class="form-check-input"
                                    @checked(old('hapus_gambar'))>

                                <label for="hapus_gambar"
                                    class="form-check-label">
                                    Hapus gambar proyek
                                </label>

                            </div>

                        </div>

                    @else

                        <p class="text-muted">
                            Proyek ini belum memiliki gambar.
                        </p>

                    @endif

                    <!-- UPLOAD GAMBAR BARU -->
                    <div class="mb-3">

                        <label class="form-label">
                            Ganti / Tambah Gambar (Opsional)
                        </label>

                        <input type="file"
                            name="gambar"
                            id="gambar"
                            class="form-control"
                            accept=".jpg,.jpeg,.png,.webp">

                        <small class="text-muted">
                            Kosongkan jika tidak ingin mengganti gambar.
                            Maksimal 2 MB.
                        </small>

                    </div>

                    <!-- PREVIEW GAMBAR BARU -->
                    <div class="mb-4"
                        id="preview-container"
                        style="display:none;">

                        <label class="form-label">
                            Preview Gambar Baru
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
                            Simpan Perubahan
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

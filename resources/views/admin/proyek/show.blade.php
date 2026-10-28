
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Detail Proyek - 1159</title>

    <!-- CSS Volt Bootstrap -->
    @include('layouts.admin.css')
</head>

<body>

    <!-- NAVBAR MOBILE -->
    <nav class="navbar navbar-dark navbar-theme-primary px-4 col-12 d-lg-none">
        <a class="navbar-brand text-white fw-bold" href="{{ route('dashboard') }}">
            CV PORTOFOLIO
        </a>

        <button class="navbar-toggler collapsed" type="button"
            data-bs-toggle="collapse" data-bs-target="#sidebarMenu"
            aria-controls="sidebarMenu" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </nav>

    <!-- SIDEBAR -->
    <nav id="sidebarMenu" class="sidebar d-lg-block bg-gray-800 text-white collapse" data-simplebar>

        <div class="sidebar-inner px-4 pt-3">

            <ul class="nav flex-column pt-3 pt-md-0">

                <!-- JUDUL -->
                <li class="nav-item mb-4">
                    <a href="{{ route('dashboard') }}" class="nav-link d-flex align-items-center">

                        <span class="sidebar-icon">
                            <img src="{{ asset('assets-admin/img/brand/light.svg') }}"
                                height="25" width="25" alt="Logo">
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

                <!-- PROYEK AKTIF -->
                <li class="nav-item active">
                    <a href="{{ route('proyek.index') }}" class="nav-link">
                        <span class="sidebar-text">Proyek</span>
                    </a>
                </li>

                <!-- CV PUBLIK BERDASARKAN PEMILIK -->
                <li class="nav-item">
                    @if ($proyek->portofolio)
                        <a href="{{ route('cv.public', ['id' => $proyek->portofolio_id]) }}"
                            class="nav-link"
                            target="_blank"
                            rel="noopener noreferrer">
                            <span class="sidebar-text">Lihat CV Publik</span>
                        </a>
                    @else
                        <a href="{{ route('portofolio.index') }}" class="nav-link">
                            <span class="sidebar-text">Daftar CV</span>
                        </a>
                    @endif
                </li>

            </ul>
        </div>
    </nav>

    <!-- KONTEN UTAMA -->
    <main class="content">

        <!-- HEADER -->
        <nav class="navbar navbar-top navbar-expand navbar-dashboard navbar-dark ps-0 pe-2 pb-0">

            <div class="container-fluid px-0">

                <div class="d-flex justify-content-between align-items-center w-100">

                    <h5 class="mb-0">
                        Dashboard Proyek
                    </h5>

                    <span class="text-gray-700">
                        Portofolio 1159
                    </span>

                </div>
            </div>
        </nav>

        <!-- BREADCRUMB DAN JUDUL -->
        <div class="py-4">

            <nav aria-label="breadcrumb" class="d-none d-md-inline-block">

                <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">

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
                        Detail Proyek
                    </li>

                </ol>
            </nav>

            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">

                <div>
                    <h1 class="h4">
                        Detail Proyek
                    </h1>

                    <p class="mb-0">
                        Informasi lengkap proyek yang telah dibuat.
                    </p>
                </div>

                <div class="d-flex gap-2 flex-wrap">

                    <!-- LIHAT CV PEMILIK -->
                    @if ($proyek->portofolio)
                        <a href="{{ route('cv.public', ['id' => $proyek->portofolio_id]) }}"
                            class="btn btn-primary"
                            target="_blank"
                            rel="noopener noreferrer">
                            Lihat CV Pemilik
                        </a>
                    @endif

                    <!-- EDIT PROYEK -->
                    <a href="{{ route('proyek.edit', $proyek->id) }}" class="btn btn-info">
                        Edit Proyek
                    </a>

                    <!-- KEMBALI -->
                    <a href="{{ route('proyek.index') }}" class="btn btn-secondary">
                        Kembali
                    </a>

                </div>
            </div>
        </div>

        <!-- CARD DETAIL PROYEK -->
        <div class="row">

            <div class="col-12 mb-4">

                <div class="card border-0 shadow">

                    <div class="card-header bg-white">
                        <h5 class="mb-0">
                            Informasi Proyek
                        </h5>
                    </div>

                    <div class="card-body">

                        <!-- NAMA PROYEK -->
                        <div class="mb-4">

                            <h3 class="fw-bold mb-2">
                                {{ $proyek->nama_proyek }}
                            </h3>

                            <span class="badge bg-primary">
                                {{ $proyek->kategori }}
                            </span>

                        </div>

                        <!-- GAMBAR PROYEK -->
                        <div class="mb-4">

                            <h6 class="fw-bold mb-3">
                                Dokumentasi Proyek
                            </h6>

                            @if ($proyek->gambar)
                                <img
                                    src="{{ asset('storage/' . $proyek->gambar) }}"
                                    alt="{{ $proyek->nama_proyek }}"
                                    class="img-fluid rounded shadow-sm"
                                    style="max-height:400px; object-fit:contain;">
                            @else
                                <div class="bg-gray-100 rounded p-5 text-center">
                                    <p class="text-muted mb-0">
                                        Proyek ini belum memiliki gambar.
                                    </p>
                                </div>
                            @endif

                        </div>

                        <!-- TABEL INFORMASI -->
                        <div class="table-responsive">

                            <table class="table table-bordered">

                                <tbody>

                                    <!-- NAMA PROYEK -->
                                    <tr>
                                        <th style="width:30%;">
                                            Nama Proyek
                                        </th>
                                        <td>
                                            {{ $proyek->nama_proyek }}
                                        </td>
                                    </tr>

                                    <!-- PEMILIK PORTOFOLIO -->
                                    <tr>
                                        <th>
                                            Pemilik Portofolio
                                        </th>

                                        <td>
                                            @if ($proyek->portofolio)
                                                {{ $proyek->portofolio->nama }}

                                                <div class="mt-2">
                                                    <a href="{{ route('cv.public', ['id' => $proyek->portofolio_id]) }}"
                                                        target="_blank"
                                                        rel="noopener noreferrer"
                                                        class="btn btn-sm btn-outline-primary">
                                                        Lihat CV
                                                    </a>
                                                </div>
                                            @else
                                                -
                                            @endif
                                        </td>
                                    </tr>

                                    <!-- KATEGORI -->
                                    <tr>
                                        <th>
                                            Kategori
                                        </th>
                                        <td>
                                            {{ $proyek->kategori }}
                                        </td>
                                    </tr>

                                    <!-- DESKRIPSI -->
                                    <tr>
                                        <th>
                                            Deskripsi Proyek
                                        </th>

                                        <td style="white-space:pre-line;">{{ $proyek->deskripsi ?: '-' }}</td>
                                    </tr>

                                    <!-- TEKNOLOGI -->
                                    <tr>
                                        <th>
                                            Teknologi
                                        </th>

                                        <td>
                                            {{ $proyek->teknologi ?: '-' }}
                                        </td>
                                    </tr>

                                    <!-- TANGGAL PROYEK -->
                                    <tr>
                                        <th>
                                            Tanggal Proyek
                                        </th>

                                        <td>
                                            {{ $proyek->tanggal_proyek ? \Carbon\Carbon::parse($proyek->tanggal_proyek)->format('d-m-Y') : '-' }}
                                        </td>
                                    </tr>

                                    <!-- LINK PROYEK -->
                                    <tr>
                                        <th>
                                            Link Proyek
                                        </th>

                                        <td>
                                            @if ($proyek->link_proyek)
                                                <a href="{{ $proyek->link_proyek }}"
                                                    target="_blank"
                                                    rel="noopener noreferrer">
                                                    Lihat Proyek
                                                </a>
                                            @else
                                                -
                                            @endif
                                        </td>
                                    </tr>

                                </tbody>

                            </table>

                        </div>

                        <!-- TOMBOL AKSI -->
                        <div class="d-flex gap-2 flex-wrap mt-4">

                            <a href="{{ route('proyek.edit', $proyek->id) }}"
                                class="btn btn-info">
                                Edit Proyek
                            </a>

                            @if ($proyek->portofolio)
                                <a href="{{ route('cv.public', ['id' => $proyek->portofolio_id]) }}"
                                    class="btn btn-primary"
                                    target="_blank"
                                    rel="noopener noreferrer">
                                    Lihat CV Pemilik
                                </a>
                            @endif

                            <a href="{{ route('proyek.index') }}"
                                class="btn btn-secondary">
                                Kembali ke Daftar Proyek
                            </a>

                        </div>

                    </div>
                </div>

            </div>
        </div>

        <!-- FOOTER -->
        <footer class="bg-white rounded shadow p-4 mb-4 mt-4">

            <div class="row align-items-center">

                <div class="col-12 col-md-6">
                    <p class="mb-0 text-center text-md-start">
                        CV & Portofolio 1159
                    </p>
                </div>

                <div class="col-12 col-md-6">
                    <p class="mb-0 text-center text-md-end">
                        Laravel - Volt Bootstrap 5
                    </p>
                </div>

            </div>
        </footer>

    </main>

    <!-- JAVASCRIPT VOLT -->
    <script src="{{ asset('assets-admin/vendor/@popperjs/core/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('assets-admin/vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets-admin/js/volt.js') }}"></script>

</body>
</html>

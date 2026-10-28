
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Data Portofolio - 1159</title>

    <!-- CSS Volt Bootstrap -->
    @include('layouts.admin.css')
</head>

<body>

    <!-- NAVBAR MOBILE -->
    <nav class="navbar navbar-dark navbar-theme-primary px-4 col-12 d-lg-none">
        <a class="navbar-brand text-white fw-bold"
            href="{{ route('dashboard') }}">
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
                    <a href="{{ route('dashboard') }}"
                        class="nav-link d-flex align-items-center">

                        <span class="sidebar-icon">
                            <img src="{{ asset('assets-admin/img/brand/light.svg') }}"
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

                        <span class="sidebar-icon">
                            <svg class="icon icon-xs me-2"
                                fill="currentColor"
                                viewBox="0 0 20 20">
                                <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                                <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                            </svg>
                        </span>

                        <span class="sidebar-text">
                            Dashboard
                        </span>
                    </a>
                </li>

                <!-- PELANGGAN -->
                <li class="nav-item">
                    <a href="{{ route('pelanggan.index') }}"
                        class="nav-link">

                        <span class="sidebar-icon">
                            <svg class="icon icon-xs me-2"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                viewBox="0 0 24 24">
                                <path d="M16 21v-2a4 4 0 00-4-4H6a4 4 0 00-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M22 21v-2a4 4 0 00-3-3.87"></path>
                            </svg>
                        </span>

                        <span class="sidebar-text">
                            Pelanggan
                        </span>
                    </a>
                </li>

                <!-- PORTOFOLIO -->
                <li class="nav-item active">
                    <a href="{{ route('portofolio.index') }}"
                        class="nav-link">

                        <span class="sidebar-icon">
                            <svg class="icon icon-xs me-2"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                viewBox="0 0 24 24">
                                <rect x="4" y="3"
                                    width="16"
                                    height="18"
                                    rx="2"></rect>
                                <path d="M8 8h8M8 12h8M8 16h5"></path>
                            </svg>
                        </span>

                        <span class="sidebar-text">
                            Portofolio
                        </span>
                    </a>
                </li>

                <!-- PROYEK -->
                <li class="nav-item">
                    <a href="{{ route('proyek.index') }}"
                        class="nav-link">

                        <span class="sidebar-icon">
                            <svg class="icon icon-xs me-2"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                viewBox="0 0 24 24">
                                <path d="M3 7h18v13H3z"></path>
                                <path d="M3 7l4-4h6l4 4"></path>
                            </svg>
                        </span>

                        <span class="sidebar-text">
                            Proyek
                        </span>
                    </a>
                </li>

                <!-- DAFTAR CV -->
                <li class="nav-item">
                    <a href="{{ route('portofolio.index') }}"
                        class="nav-link">

                        <span class="sidebar-icon">
                            <svg class="icon icon-xs me-2"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                viewBox="0 0 24 24">
                                <circle cx="12" cy="12" r="9"></circle>
                                <path d="M3 12h18M12 3a15 15 0 010 18M12 3a15 15 0 000 18"></path>
                            </svg>
                        </span>

                        <span class="sidebar-text">
                            Daftar CV
                        </span>
                    </a>
                </li>

            </ul>
        </div>
    </nav>

    <!-- KONTEN UTAMA -->
    <main class="content">

        <!-- HEADER -->
        <nav class="navbar navbar-top navbar-expand navbar-dashboard
                    navbar-dark ps-0 pe-2 pb-0">

            <div class="container-fluid px-0">

                <div class="d-flex justify-content-between
                            align-items-center w-100">

                    <h5 class="mb-0">
                        Dashboard Portofolio
                    </h5>

                    <span class="text-gray-700">
                        Portofolio 1159
                    </span>

                </div>
            </div>
        </nav>

        <!-- BREADCRUMB DAN JUDUL -->
        <div class="py-4">

            <nav aria-label="breadcrumb"
                class="d-none d-md-inline-block">

                <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">

                    <li class="breadcrumb-item">
                        <a href="{{ route('dashboard') }}">
                            Dashboard
                        </a>
                    </li>

                    <li class="breadcrumb-item active">
                        Portofolio
                    </li>

                </ol>
            </nav>

            <div class="d-flex justify-content-between
                        align-items-center flex-wrap gap-3">

                <div>
                    <h1 class="h4">
                        Data Portofolio
                    </h1>

                    <p class="mb-0">
                        Kelola data CV dan informasi pribadi.
                    </p>
                </div>

                <div class="d-flex gap-2 flex-wrap">

                    <!-- PILIH CV DARI TABEL -->
                    <a href="#table-portofolio"
                        class="btn btn-secondary">
                        Pilih CV
                    </a>

                    <!-- KELOLA PROYEK -->
                    <a href="{{ route('proyek.index') }}"
                        class="btn btn-primary">
                        Kelola Proyek
                    </a>

                    <!-- TAMBAH CV -->
                    <a href="{{ route('portofolio.create') }}"
                        class="btn btn-success text-white">
                        + Tambah Portofolio
                    </a>

                </div>

            </div>
        </div>

        <!-- NOTIFIKASI -->
        @if(session('success'))

            <div class="alert alert-success alert-dismissible fade show"
                role="alert">

                {{ session('success') }}

                <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert"
                    aria-label="Close">
                </button>

            </div>

        @endif

        <!-- PESAN VALIDASI -->
        @if($errors->any())

            <div class="alert alert-danger">

                <ul class="mb-0">

                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach

                </ul>

            </div>

        @endif

        <!-- CARD TABEL -->
        <div class="row">

            <div class="col-12 mb-4">

                <div class="card border-0 shadow mb-4">

                    <div class="card-header bg-white">

                        <div class="d-flex justify-content-between
                                    align-items-center flex-wrap">

                            <h5 class="mb-0">
                                Daftar CV Portofolio
                            </h5>

                            <span class="badge bg-primary">
                                Total: {{ $dataPortofolio->count() }} CV
                            </span>

                        </div>

                    </div>

                    <div class="card-body">

                        <div class="table-responsive">

                            <table id="table-portofolio"
                                class="table table-centered table-nowrap mb-0 rounded">

                                <!-- HEADER TABEL -->
                                <thead class="thead-light">

                                    <tr>
                                        <th class="border-0">No</th>
                                        <th class="border-0">Foto</th>
                                        <th class="border-0">Nama</th>
                                        <th class="border-0">Profesi</th>
                                        <th class="border-0">Email</th>
                                        <th class="border-0">No HP</th>
                                        <th class="border-0 rounded-end">
                                            Aksi
                                        </th>
                                    </tr>

                                </thead>

                                <!-- ISI TABEL -->
                                <tbody>

                                    @forelse($dataPortofolio as $item)

                                        <tr>

                                            <!-- NOMOR -->
                                            <td>
                                                {{ $loop->iteration }}
                                            </td>

                                            <!-- FOTO -->
                                            <td>

                                                @if($item->foto_profil)

                                                    <img
                                                        src="{{ asset('storage/' . $item->foto_profil) }}"
                                                        alt="Foto {{ $item->nama }}"
                                                        width="55"
                                                        height="55"
                                                        class="rounded-circle"
                                                        style="object-fit: cover;">

                                                @else

                                                    <span class="badge bg-gray-200 text-gray-700">
                                                        Tanpa Foto
                                                    </span>

                                                @endif

                                            </td>

                                            <!-- NAMA -->
                                            <td>
                                                <span class="fw-bold">
                                                    {{ $item->nama }}
                                                </span>
                                            </td>

                                            <!-- PROFESI -->
                                            <td>
                                                {{ $item->profesi }}
                                            </td>

                                            <!-- EMAIL -->
                                            <td>
                                                {{ $item->email ?? '-' }}
                                            </td>

                                            <!-- NOMOR HP -->
                                            <td>
                                                {{ $item->no_hp ?? '-' }}
                                            </td>

                                            <!-- TOMBOL AKSI -->
                                            <td>

                                                <div class="d-flex gap-2">

                                                    <!-- DETAIL -->
                                                    <a href="{{ route('portofolio.show', $item->id) }}"
                                                        class="btn btn-primary btn-sm">
                                                        Detail
                                                    </a>

                                                    <!-- EDIT -->
                                                    <a href="{{ route('portofolio.edit', $item->id) }}"
                                                        class="btn btn-info btn-sm">
                                                        Edit
                                                    </a>

                                                    <!-- HAPUS -->
                                                    <form
                                                        action="{{ route('portofolio.destroy', $item->id) }}"
                                                        method="POST"
                                                        onsubmit="return confirm('Yakin ingin menghapus CV ini beserta proyek terkait?')">

                                                        @csrf
                                                        @method('DELETE')

                                                        <button type="submit"
                                                            class="btn btn-danger btn-sm">
                                                            Hapus
                                                        </button>

                                                    </form>

                                                    <!-- LIHAT CV BERDASARKAN ID -->
                                                    <a href="{{ route('cv.public', ['id' => $item->id]) }}"
                                                        class="btn btn-primary btn-sm"
                                                        target="_blank"
                                                        rel="noopener noreferrer">
                                                        Lihat CV
                                                    </a>

                                                </div>

                                            </td>

                                        </tr>

                                    @empty

                                        <tr>
                                            <td colspan="7"
                                                class="text-center py-5">

                                                <h6 class="text-gray-700">
                                                    Belum ada data portofolio
                                                </h6>

                                                <p class="text-muted mb-3">
                                                    Silakan tambahkan CV terlebih dahulu.
                                                </p>

                                                <a href="{{ route('portofolio.create') }}"
                                                    class="btn btn-success text-white">
                                                    + Tambah CV
                                                </a>

                                            </td>
                                        </tr>

                                    @endforelse

                                </tbody>

                            </table>

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

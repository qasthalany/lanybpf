
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Detail CV - 1159</title>

    @include('layouts.admin.css')
</head>

<body>

    <!-- NAVBAR MOBILE -->
    <nav class="navbar navbar-dark navbar-theme-primary px-4 col-12 d-lg-none">
        <a class="navbar-brand text-white fw-bold"
            href="{{ route('portofolio.index') }}">
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

                <!-- LIHAT CV PUBLIK BERDASARKAN ID -->
                <li class="nav-item">
                    <a href="{{ route('cv.public', ['id' => $portofolio->id]) }}"
                        class="nav-link"
                        target="_blank"
                        rel="noopener noreferrer">
                        <span class="sidebar-text">
                            Lihat CV Publik
                        </span>
                    </a>
                </li>

            </ul>
        </div>
    </nav>

    <!-- KONTEN -->
    <main class="content">

        <div class="py-4">

            <h1 class="h4">Detail CV Portofolio</h1>

            <p class="mb-3">
                Informasi lengkap CV dan data pribadi.
            </p>

            <div class="d-flex gap-2 flex-wrap">

                <!-- KEMBALI -->
                <a href="{{ route('portofolio.index') }}"
                    class="btn btn-secondary">
                    Kembali
                </a>

                <!-- EDIT CV -->
                <a href="{{ route('portofolio.edit', $portofolio->id) }}"
                    class="btn btn-info">
                    Edit CV
                </a>

                <!-- LIHAT CV BERDASARKAN ID -->
                <a href="{{ route('cv.public', ['id' => $portofolio->id]) }}"
                    class="btn btn-primary"
                    target="_blank"
                    rel="noopener noreferrer">
                    Lihat CV
                </a>

            </div>

        </div>

        <!-- CARD DETAIL -->
        <div class="card border-0 shadow mb-4">

            <div class="card-body">

                <!-- PROFIL -->
                <div class="text-center mb-4">

                    @if ($portofolio->foto_profil)

                        <img
                            src="{{ asset('storage/' . $portofolio->foto_profil) }}"
                            width="150"
                            height="150"
                            class="rounded-circle mb-3"
                            style="object-fit: cover;"
                            alt="Foto Profil">

                    @else

                        <div class="text-muted mb-3">
                            Tanpa Foto Profil
                        </div>

                    @endif

                    <h3>{{ $portofolio->nama }}</h3>

                    <p class="text-muted">
                        {{ $portofolio->profesi }}
                    </p>

                </div>

                <hr>

                <!-- DATA DIRI -->
                <h5 class="mb-3">Data Diri</h5>

                <div class="table-responsive">

                    <table class="table table-bordered">

                        <tr>
                            <th width="30%">Nama Lengkap</th>
                            <td>{{ $portofolio->nama }}</td>
                        </tr>

                        <tr>
                            <th>Profesi</th>
                            <td>{{ $portofolio->profesi }}</td>
                        </tr>

                        <tr>
                            <th>Tempat / Tanggal Lahir</th>
                            <td>{{ $portofolio->tempat_tanggal_lahir ?: '-' }}</td>
                        </tr>

                        <tr>
                            <th>Jenis Kelamin</th>
                            <td>{{ $portofolio->jenis_kelamin ?: '-' }}</td>
                        </tr>

                        <tr>
                            <th>Status</th>
                            <td>{{ $portofolio->status ?: '-' }}</td>
                        </tr>

                        <tr>
                            <th>Kewarganegaraan</th>
                            <td>{{ $portofolio->kewarganegaraan ?: '-' }}</td>
                        </tr>

                        <tr>
                            <th>Alamat</th>
                            <td style="white-space: pre-line;">{{ $portofolio->alamat ?: '-' }}</td>
                        </tr>

                    </table>

                </div>

                <hr>

                <!-- KONTAK -->
                <h5 class="mb-3">Kontak dan Sosial Media</h5>

                <div class="table-responsive">

                    <table class="table table-bordered">

                        <tr>
                            <th width="30%">Email</th>
                            <td>{{ $portofolio->email ?: '-' }}</td>
                        </tr>

                        <tr>
                            <th>Nomor HP</th>
                            <td>{{ $portofolio->no_hp ?: '-' }}</td>
                        </tr>

                        <tr>
                            <th>Sosial Media</th>
                            <td>{{ $portofolio->sosial_media ?: '-' }}</td>
                        </tr>

                    </table>

                </div>

                <hr>

                <!-- RIWAYAT -->
                <h5 class="mb-3">Tentang Saya</h5>

                <p style="white-space: pre-line;">{{ $portofolio->tentang_saya ?: '-' }}</p>

                <hr>

                <h5 class="mb-3">Pendidikan</h5>

                <p style="white-space: pre-line;">{{ $portofolio->pendidikan ?: '-' }}</p>

                <hr>

                <h5 class="mb-3">Pengalaman Kerja</h5>

                <p style="white-space: pre-line;">{{ $portofolio->pengalaman_kerja ?: '-' }}</p>

                <hr>

                <h5 class="mb-3">Kemampuan</h5>

                <p style="white-space: pre-line;">{{ $portofolio->kemampuan ?: '-' }}</p>

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

</body>
</html>

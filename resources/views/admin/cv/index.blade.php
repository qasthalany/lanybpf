<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>CV & Portofolio - {{ $portofolio?->nama ?? '1159' }}</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 35px 15px;
            font-family: 'Segoe UI', Arial, sans-serif;
            background: #e9edf2;
            color: #293241;
            line-height: 1.7;
        }

        .cv-container {
            display: grid;
            grid-template-columns: 32% 68%;
            max-width: 1050px;
            margin: 0 auto;
            background: #ffffff;
            box-shadow: 0 12px 35px rgba(0, 0, 0, .12);
            overflow: hidden;
        }

        /* SIDEBAR CV */
        .cv-sidebar {
            background: #182b42;
            color: #ffffff;
            padding: 45px 30px;
        }

        .profile-photo {
            width: 175px;
            height: 175px;
            border-radius: 50%;
            object-fit: cover;
            border: 5px solid #c8a66a;
            display: block;
            margin: 0 auto 25px;
        }

        .photo-placeholder {
            width: 175px;
            height: 175px;
            border-radius: 50%;
            background: #304761;
            border: 5px solid #c8a66a;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0 auto 25px;
            font-size: 60px;
            font-weight: bold;
        }

        .sidebar-title {
            color: #e3bd7c;
            font-size: 15px;
            text-transform: uppercase;
            letter-spacing: 2px;
            border-bottom: 1px solid #c8a66a;
            padding-bottom: 9px;
            margin: 35px 0 18px;
        }

        .info-item {
            margin-bottom: 16px;
            overflow-wrap: anywhere;
        }

        .info-label {
            color: #d4b47f;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: bold;
        }

        .info-value {
            font-size: 13px;
            color: #f1f4f8;
            margin-top: 3px;
        }

        .cv-sidebar a {
            color: #f1f4f8;
            text-decoration: none;
            overflow-wrap: anywhere;
        }

        .cv-sidebar a:hover {
            color: #e3bd7c;
        }

        /* KONTEN KANAN */
        .cv-content {
            padding: 55px 50px;
            min-width: 0;
        }

        .main-name {
            font-size: 39px;
            line-height: 1.2;
            color: #182b42;
            margin: 0;
            text-transform: uppercase;
            letter-spacing: 1px;
            overflow-wrap: anywhere;
        }

        .main-profession {
            font-size: 17px;
            color: #a78348;
            letter-spacing: 3px;
            text-transform: uppercase;
            margin: 13px 0 20px;
        }

        .gold-line {
            width: 85px;
            height: 4px;
            background: #c8a66a;
            margin-bottom: 35px;
        }

        .section {
            margin-bottom: 36px;
        }

        .section-title {
            color: #182b42;
            font-size: 19px;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            border-bottom: 2px solid #c8a66a;
            padding-bottom: 9px;
            margin-bottom: 17px;
        }

        .section-text {
            white-space: pre-line;
            font-size: 14px;
            color: #475569;
            overflow-wrap: anywhere;
        }

        /* KEMAMPUAN */
        .skills-list {
            display: flex;
            flex-wrap: wrap;
            gap: 9px;
        }

        .skill {
            background: #edf1f5;
            color: #182b42;
            border-left: 3px solid #c8a66a;
            padding: 7px 13px;
            font-size: 13px;
            border-radius: 3px;
        }

        /* PROYEK */
        .project-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 18px;
        }

        .project-card {
            border: 1px solid #e1e6ed;
            border-radius: 7px;
            overflow: hidden;
            background: #ffffff;
        }

        .project-image {
            width: 100%;
            height: 160px;
            object-fit: cover;
            display: block;
        }

        .project-placeholder {
            height: 160px;
            background: #edf1f5;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #718096;
            font-size: 13px;
        }

        .project-body {
            padding: 17px;
        }

        .project-name {
            font-size: 15px;
            color: #182b42;
            margin: 0 0 7px;
            overflow-wrap: anywhere;
        }

        .project-category {
            display: inline-block;
            background: #f6eddc;
            color: #856633;
            padding: 3px 9px;
            border-radius: 4px;
            font-size: 11px;
            margin-bottom: 10px;
        }

        .project-description {
            font-size: 12px;
            color: #64748b;
            white-space: pre-line;
            overflow-wrap: anywhere;
        }

        .project-tech {
            font-size: 12px;
            color: #475569;
            margin-top: 12px;
        }

        .project-link {
            display: inline-block;
            margin-top: 12px;
            font-size: 12px;
            font-weight: bold;
            color: #a78348;
            text-decoration: none;
            overflow-wrap: anywhere;
        }

        /* TOMBOL */
        .cv-actions {
            max-width: 1050px;
            margin: 0 auto 20px;
            display: flex;
            justify-content: space-between;
            gap: 10px;
        }

        .btn {
            display: inline-block;
            background: #182b42;
            color: white;
            padding: 10px 18px;
            border-radius: 5px;
            text-decoration: none;
            border: none;
            font-size: 13px;
            font-family: inherit;
            cursor: pointer;
        }

        .btn-gold {
            background: #a78348;
        }

        /* RESPONSIVE */
        @media (max-width: 768px) {
            body {
                padding: 12px;
            }

            .cv-container {
                grid-template-columns: 1fr;
            }

            .cv-sidebar {
                padding: 35px 25px;
            }

            .cv-content {
                padding: 35px 25px;
            }

            .main-name {
                font-size: 30px;
            }

            .project-grid {
                grid-template-columns: 1fr;
            }

            .cv-actions {
                flex-wrap: wrap;
            }
        }

        /* CETAK PDF */
        @media print {
            @page {
                size: A4;
                margin: 0;
            }

            body {
                padding: 0;
                background: white;
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }

            .cv-actions {
                display: none;
            }

            .cv-container {
                width: 100%;
                max-width: none;
                box-shadow: none;
            }

            .cv-sidebar,
            .cv-content {
                print-color-adjust: exact;
                -webkit-print-color-adjust: exact;
            }

            .section,
            .project-card {
                break-inside: avoid;
            }
        }
    </style>
</head>

<body>

    @if ($portofolio)

        <!-- TOMBOL NAVIGASI -->
        <div class="cv-actions">

            <a href="{{ route('portofolio.index') }}" class="btn">
                Kembali ke Dashboard
            </a>

            <button type="button" onclick="window.print()" class="btn btn-gold">
                Cetak / Simpan PDF
            </button>

        </div>

        <!-- CV -->
        <div class="cv-container">

            <!-- BAGIAN KIRI -->
            <aside class="cv-sidebar">

                <!-- FOTO PROFIL -->
                @if ($portofolio->foto_profil)
                    <img src="{{ asset('storage/' . $portofolio->foto_profil) }}" alt="Foto {{ $portofolio->nama }}"
                        class="profile-photo">
                @else
                    <div class="photo-placeholder">
                        {{ strtoupper(substr($portofolio->nama, 0, 1)) }}
                    </div>
                @endif

                <!-- INFORMASI PRIBADI -->
                <h3 class="sidebar-title">
                    Informasi Pribadi
                </h3>

                @if ($portofolio->tempat_tanggal_lahir)
                    <div class="info-item">
                        <div class="info-label">
                            Tempat, Tanggal Lahir
                        </div>
                        <div class="info-value">
                            {{ $portofolio->tempat_tanggal_lahir }}
                        </div>
                    </div>
                @endif

                @if ($portofolio->jenis_kelamin)
                    <div class="info-item">
                        <div class="info-label">
                            Jenis Kelamin
                        </div>
                        <div class="info-value">
                            {{ $portofolio->jenis_kelamin }}
                        </div>
                    </div>
                @endif

                @if ($portofolio->status)
                    <div class="info-item">
                        <div class="info-label">Status</div>
                        <div class="info-value">
                            {{ $portofolio->status }}
                        </div>
                    </div>
                @endif

                @if ($portofolio->kewarganegaraan)
                    <div class="info-item">
                        <div class="info-label">
                            Kewarganegaraan
                        </div>
                        <div class="info-value">
                            {{ $portofolio->kewarganegaraan }}
                        </div>
                    </div>
                @endif

                <!-- KONTAK -->
                <h3 class="sidebar-title">
                    Kontak
                </h3>

                @if ($portofolio->email)
                    <div class="info-item">
                        <div class="info-label">Email</div>
                        <div class="info-value">
                            <a href="mailto:{{ $portofolio->email }}">
                                {{ $portofolio->email }}
                            </a>
                        </div>
                    </div>
                @endif

                @if ($portofolio->no_hp)
                    <div class="info-item">
                        <div class="info-label">Telepon</div>
                        <div class="info-value">
                            {{ $portofolio->no_hp }}
                        </div>
                    </div>
                @endif

                @if ($portofolio->alamat)
                    <div class="info-item">
                        <div class="info-label">Alamat</div>
                        <div class="info-value">
                            {{ $portofolio->alamat }}
                        </div>
                    </div>
                @endif

                <!-- MEDIA SOSIAL -->
                @if ($portofolio->sosial_media)
                    <h3 class="sidebar-title">
                        Media Sosial
                    </h3>

                    <div class="info-item">
                        <div class="info-value">

                            @if (filter_var($portofolio->sosial_media, FILTER_VALIDATE_URL))
                                <a href="{{ $portofolio->sosial_media }}" target="_blank" rel="noopener noreferrer">
                                    {{ $portofolio->sosial_media }}
                                </a>
                            @else
                                {{ $portofolio->sosial_media }}
                            @endif

                        </div>
                    </div>
                @endif

            </aside>

            <!-- BAGIAN KANAN -->
            <main class="cv-content">

                <!-- NAMA DAN PROFESI -->
                <header>

                    <h1 class="main-name">
                        {{ $portofolio->nama }}
                    </h1>

                    <p class="main-profession">
                        {{ $portofolio->profesi }}
                    </p>

                    <div class="gold-line"></div>

                </header>

                <!-- TENTANG SAYA -->
                @if ($portofolio->tentang_saya)
                    <section class="section">

                        <h2 class="section-title">
                            Tentang Saya
                        </h2>

                        <div class="section-text">{{ $portofolio->tentang_saya }}</div>

                    </section>
                @endif

                <!-- PENDIDIKAN -->
                @if ($portofolio->pendidikan)
                    <section class="section">

                        <h2 class="section-title">
                            Pendidikan
                        </h2>

                        <div class="section-text">{{ $portofolio->pendidikan }}</div>

                    </section>
                @endif

                <!-- PENGALAMAN KERJA -->
                @if ($portofolio->pengalaman_kerja)
                    <section class="section">

                        <h2 class="section-title">
                            Pengalaman Kerja
                        </h2>

                        <div class="section-text">{{ $portofolio->pengalaman_kerja }}</div>

                    </section>
                @endif

                <!-- KEMAMPUAN -->
                @if ($portofolio->kemampuan)
                    <section class="section">

                        <h2 class="section-title">
                            Kemampuan
                        </h2>

                        <div class="skills-list">

                            @foreach (preg_split('/[,\r\n]+/', $portofolio->kemampuan) as $skill)
                                @if (trim($skill) !== '')
                                    <span class="skill">
                                        {{ trim($skill) }}
                                    </span>
                                @endif
                            @endforeach

                        </div>
                    </section>
                @endif

                <!-- DAFTAR PROYEK -->
                @if ($portofolio->proyeks->count() > 0)

                    <section class="section">

                        <h2 class="section-title">
                            Proyek & Portofolio
                        </h2>

                        <div class="project-grid">

                            @foreach ($portofolio->proyeks as $proyek)
                                <article class="project-card">

                                    <!-- GAMBAR -->
                                    @if ($proyek->gambar)
                                        <img src="{{ asset('storage/' . $proyek->gambar) }}"
                                            alt="{{ $proyek->nama_proyek }}" class="project-image">
                                    @else
                                        <div class="project-placeholder">
                                            Tanpa Gambar
                                        </div>
                                    @endif

                                    <div class="project-body">

                                        <!-- NAMA PROYEK -->
                                        <h3 class="project-name">
                                            {{ $proyek->nama_proyek }}
                                        </h3>

                                        <!-- KATEGORI -->
                                        <span class="project-category">
                                            {{ $proyek->kategori }}
                                        </span>

                                        <!-- DESKRIPSI -->
                                        @if ($proyek->deskripsi)
                                            <div class="project-description">{{ $proyek->deskripsi }}</div>
                                        @endif

                                        <!-- TEKNOLOGI -->
                                        @if ($proyek->teknologi)
                                            <div class="project-tech">
                                                <strong>Teknologi:</strong>
                                                {{ $proyek->teknologi }}
                                            </div>
                                        @endif

                                        <!-- TANGGAL -->
                                        @if ($proyek->tanggal_proyek)
                                            <div class="project-tech">
                                                <strong>Tanggal:</strong>
                                                {{ \Carbon\Carbon::parse($proyek->tanggal_proyek)->format('d M Y') }}
                                            </div>
                                        @endif

                                        <!-- LINK PROYEK -->
                                        @if ($proyek->link_proyek)
                                            <a href="{{ $proyek->link_proyek }}" target="_blank"
                                                rel="noopener noreferrer" class="project-link">
                                                Lihat Proyek
                                            </a>
                                        @endif

                                    </div>
                                </article>
                            @endforeach

                        </div>
                    </section>

                @endif

            </main>

        </div>
    @else
        <!-- BELUM ADA DATA -->
        <div
            style="max-width:650px; margin:80px auto; padding:40px; background:white; text-align:center; border-radius:10px;">

            <h2>CV Belum Tersedia</h2>

            <p>
                Belum ada data portofolio yang bisa ditampilkan.
                Silakan tambahkan data CV terlebih dahulu.
            </p>

            <a href="{{ route('portofolio.create') }}" class="btn">
                Tambah Portofolio
            </a>

        </div>

    @endif

</body>

</html>

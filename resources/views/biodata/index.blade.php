<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Biodata Mahasiswa</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5 mb-5">
    <div class="card shadow">

        <!-- Judul Halaman -->
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Data Biodata Mahasiswa</h4>
        </div>

        <div class="card-body">

            <!-- Pesan Berhasil -->
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Tombol Navigasi -->
            <div class="mb-3">
                <a href="{{ route('biodata.create') }}"
                   class="btn btn-success">
                    + Tambah Biodata
                </a>

                <a href="{{ route('hobi.index') }}"
                   class="btn btn-primary">
                    Lihat Semua Hobi
                </a>
            </div>

            <!-- Tabel Biodata -->
            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle">

                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Foto Profil</th>
                            <th>Nama</th>
                            <th>NIM</th>
                            <th>Jurusan</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($biodata as $item)
                            <tr>
                                <!-- Nomor -->
                                <td>{{ $loop->iteration }}</td>

                                <!-- Foto Profil -->
                                <td>
                                    @if ($item->foto_profil)
                                        <img
                                            src="{{ asset('storage/' . $item->foto_profil) }}"
                                            alt="Foto {{ $item->nama }}"
                                            width="70"
                                            height="70"
                                            style="object-fit: cover; border-radius: 50%;">
                                    @else
                                        <span class="text-muted">
                                            Tidak ada foto
                                        </span>
                                    @endif
                                </td>

                                <!-- Data Mahasiswa -->
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->nim }}</td>
                                <td>{{ $item->jurusan }}</td>
                                <td>{{ $item->alamat }}</td>

                                <!-- Tombol Aksi -->
                                <td>
                                    <div class="d-flex gap-2 flex-wrap">

                                        <!-- Lihat Hobi Mahasiswa -->
                                        <a href="{{ route('hobi.index', ['biodata_id' => $item->id]) }}"
                                           class="btn btn-info btn-sm">
                                            Lihat Hobi
                                        </a>

                                        <!-- Edit Biodata -->
                                        <a href="{{ route('biodata.edit', $item->id) }}"
                                           class="btn btn-warning btn-sm">
                                            Edit
                                        </a>

                                        <!-- Hapus Biodata -->
                                        <form
                                            action="{{ route('biodata.destroy', $item->id) }}"
                                            method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus biodata ini?')">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="btn btn-danger btn-sm">
                                                Hapus
                                            </button>
                                        </form>

                                    </div>
                                </td>
                            </tr>

                        @empty
                            <tr>
                                <td colspan="7" class="text-center text-muted">
                                    Belum ada data biodata
                                </td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>

        </div>
    </div>
</div>

</body>
</html>

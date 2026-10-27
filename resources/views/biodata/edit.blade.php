
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Biodata</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-warning">
            <h4 class="mb-0">Edit Biodata Mahasiswa</h4>
        </div>

        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('biodata.update', $biodata->id) }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label>Nama</label>
                    <input type="text" name="nama"
                           class="form-control"
                           value="{{ old('nama', $biodata->nama) }}" required>
                </div>

                <div class="mb-3">
                    <label>NIM</label>
                    <input type="text" name="nim"
                           class="form-control"
                           value="{{ old('nim', $biodata->nim) }}" required>
                </div>

                <div class="mb-3">
                    <label>Jurusan</label>
                    <input type="text" name="jurusan"
                           class="form-control"
                           value="{{ old('jurusan', $biodata->jurusan) }}" required>
                </div>

                <div class="mb-3">
                    <label>Alamat</label>
                    <textarea name="alamat"
                              class="form-control"
                              required>{{ old('alamat', $biodata->alamat) }}</textarea>
                </div>

                <div class="mb-3">
                    <label>Foto Profil Saat Ini</label>
                    <div>
                        @if ($biodata->foto_profil)
                            <img src="{{ asset('storage/' . $biodata->foto_profil) }}"
                                 width="100"
                                 height="100"
                                 style="object-fit: cover; border-radius: 50%;">
                        @else
                            <p>Belum ada foto</p>
                        @endif
                    </div>
                </div>

                <div class="mb-3">
                    <label>Ganti Foto Profil</label>
                    <input type="file"
                           name="foto_profil"
                           class="form-control"
                           accept="image/*">
                    <small class="text-muted">
                        Kosongkan jika tidak ingin mengganti foto.
                    </small>
                </div>

                <button type="submit" class="btn btn-success">
                    Simpan Perubahan
                </button>

                <a href="{{ route('biodata.index') }}"
                   class="btn btn-secondary">
                    Kembali
                </a>
            </form>

        </div>
    </div>
</div>

</body>
</html>

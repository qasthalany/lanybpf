
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Biodata</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4>Tambah Biodata Mahasiswa</h4>
        </div>

        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('biodata.store') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                <div class="mb-3">
                    <label>Nama</label>
                    <input type="text" name="nama"
                           class="form-control"
                           value="{{ old('nama') }}" required>
                </div>

                <div class="mb-3">
                    <label>NIM</label>
                    <input type="text" name="nim"
                           class="form-control"
                           value="{{ old('nim') }}" required>
                </div>

                <div class="mb-3">
                    <label>Jurusan</label>
                    <input type="text" name="jurusan"
                           class="form-control"
                           value="{{ old('jurusan') }}" required>
                </div>

                <div class="mb-3">
                    <label>Alamat</label>
                    <textarea name="alamat"
                              class="form-control" required>{{ old('alamat') }}</textarea>
                </div>

                <div class="mb-3">
                    <label>Foto Profil</label>
                    <input type="file"
                           name="foto_profil"
                           class="form-control"
                           accept="image/*">
                </div>

                <button type="submit" class="btn btn-success">
                    Simpan
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

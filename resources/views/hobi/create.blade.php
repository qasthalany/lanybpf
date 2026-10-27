<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Hobi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4>Tambah Hobi</h4>
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

            <form action="{{ route('hobi.store') }}" method="POST">
                @csrf

<div class="mb-3">
    <label class="form-label">Nama Mahasiswa</label>

    <select name="biodata_id" class="form-select" required>
        <option value="">-- Pilih Mahasiswa --</option>

        @foreach ($mahasiswa as $item)
            <option value="{{ $item->id }}"
                {{ old('biodata_id', request('biodata_id')) == $item->id ? 'selected' : '' }}>
                {{ $item->nama }} - {{ $item->nim }}
            </option>
        @endforeach
    </select>
</div>

                <div class="mb-3">
                    <label>Nama Hobi</label>
                    <input type="text" name="nama_hobi"
                           class="form-control"
                           value="{{ old('nama_hobi') }}" required>
                </div>

                <div class="mb-3">
                    <label>Kategori</label>
                    <select name="kategori" class="form-select" required>
                        <option value="">Pilih Kategori</option>
                        <option value="Olahraga" {{ old('kategori') == 'Olahraga' ? 'selected' : '' }}>Olahraga</option>
                        <option value="Seni" {{ old('kategori') == 'Seni' ? 'selected' : '' }}>Seni</option>
                        <option value="Akademik" {{ old('kategori') == 'Akademik' ? 'selected' : '' }}>Akademik</option>
                        <option value="Lainnya" {{ old('kategori') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label>Keterangan</label>
                    <textarea name="keterangan"
                              class="form-control">{{ old('keterangan') }}</textarea>
                </div>

                <button type="submit" class="btn btn-success">
                    Simpan
                </button>

                <a href="{{ route('hobi.index') }}"
                   class="btn btn-secondary">
                    Kembali
                </a>
            </form>
        </div>
    </div>
</div>

</body>
</html>

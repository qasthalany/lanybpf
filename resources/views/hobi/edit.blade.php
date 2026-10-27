<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Hobi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-warning">
            <h4>Edit Hobi</h4>
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

            <form action="{{ route('hobi.update', $hobi->id) }}"
                  method="POST">
                @csrf
                @method('PUT')
<div class="mb-3">
    <label class="form-label">Nama Mahasiswa</label>

    <select name="biodata_id" class="form-select" required>
        <option value="">-- Pilih Mahasiswa --</option>

        @foreach ($mahasiswa as $item)
            <option value="{{ $item->id }}"
                {{ old('biodata_id', $hobi->biodata_id) == $item->id ? 'selected' : '' }}>
                {{ $item->nama }} - {{ $item->nim }}
            </option>
        @endforeach
    </select>
</div>
                <div class="mb-3">
                    <label>Nama Hobi</label>
                    <input type="text" name="nama_hobi"
                           class="form-control"
                           value="{{ old('nama_hobi', $hobi->nama_hobi) }}" required>
                </div>

                <div class="mb-3">
                    <label>Kategori</label>
                    <select name="kategori" class="form-select" required>
                        @foreach (['Olahraga', 'Seni', 'Akademik', 'Lainnya'] as $kategori)
                            <option value="{{ $kategori }}"
                                {{ old('kategori', $hobi->kategori) == $kategori ? 'selected' : '' }}>
                                {{ $kategori }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label>Keterangan</label>
                    <textarea name="keterangan"
                              class="form-control">{{ old('keterangan', $hobi->keterangan) }}</textarea>
                </div>

                <button type="submit" class="btn btn-success">
                    Simpan Perubahan
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

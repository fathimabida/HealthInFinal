<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Hasil MCU</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
<<<<<<< HEAD
        <div class="card p-4">
            <h2 class="mb-4">Edit Hasil MCU</h2>
            <form action="{{ route('Employee.HasilMcu.update', $hasil->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nama_pemeriksaan">Nama Pasien</label>
                    <input type="text" class="form-control" id="nama_pasien" name="nama_pasien" value="{{ $hasil->nama_pasien }}" required>
                </div>
                <div class="form-group">
                    <label for="nama_pemeriksaan">Nama Pemeriksaan</label>
                    <input type="text" class="form-control" id="nama_pemeriksaan" name="nama_pemeriksaan" value="{{ $hasil->nama_pemeriksaan }}" required>
                </div>
                <div class="form-group">
                    <label for="hasil">Hasil</label>
                    <select class="form-control" id="hasil" name="hasil" required>
                        <option value="Negatif" {{ $hasil->hasil == 'Negatif' ? 'selected' : '' }}>Negatif</option>
                        <option value="Positif" {{ $hasil->hasil == 'Positif' ? 'selected' : '' }}>Positif</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary"><i class="fas fa-edit mr-2"></i> Update</button>
            </form>
        </div>
=======
        <h2>Edit Hasil MCU</h2>
        <form action="{{ route('hasil_mcu.update', $hasil->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nama_pasien">Nama Pasien:</label>
                <input type="text" class="form-control" id="nama_pasien" name="nama_pasien" value="{{ $hasil->nama_pasien }}" required>
            </div>
            <div class="form-group">
                <label for="nama_pemeriksaan">Nama Pemeriksaan:</label>
                <input type="text" class="form-control" id="nama_pemeriksaan" name="nama_pemeriksaan" value="{{ $hasil->nama_pemeriksaan }}" required>
            </div>
            <div class="form-group">
                <label for="hasil">Hasil:</label>
                <select class="form-control" id="hasil" name="hasil" required>
                    <option value="Negatif" {{ $hasil->hasil == 'Negatif' ? 'selected' : '' }}>Negatif</option>
                    <option value="Positif" {{ $hasil->hasil == 'Positif' ? 'selected' : '' }}>Positif</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
>>>>>>> 9ea61cba467d24a9720bc089d806cc0a6a2c065e
    </div>
</body>
</html>

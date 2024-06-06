<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Hasil MCU</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Tambah Hasil MCU</h2>
        <form action="{{ route('hasil_mcu.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nama_pasien">Nama Pasien:</label>
                <input type="text" class="form-control" id="nama_pasien" name="nama_pasien" required>
            </div>
            <div class="form-group">
                <label for="nama_pemeriksaan">Nama Pemeriksaan:</label>
                <input type="text" class="form-control" id="nama_pemeriksaan" name="nama_pemeriksaan" required>
            </div>
            <div class="form-group">
                <label for="hasil">Hasil:</label>
                <select class="form-control" id="hasil" name="hasil" required>
                    <option value="Negatif">Negatif</option>
                    <option value="Positif">Positif</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
    </div>
</body>
</html>

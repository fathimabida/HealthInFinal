<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Hasil MCU</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
<<<<<<< HEAD
        <h2 class="mb-4">List Hasil MCU</h2>
        <a href="{{ route('Employee.HasilMcu.create') }}" class="btn btn-primary mb-3"><i class="fas fa-plus"></i> Tambah Hasil MCU</a>
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">Nama Pasien</th>
                        <th scope="col">Nama Pemeriksaan</th>
                        <th scope="col">Hasil</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($hasil_mcu as $hasil)
                    <tr>
                        <td>{{ $hasil->nama_pasien }}</td>
                        <td>{{ $hasil->nama_pemeriksaan }}</td>
                        <td>{{ $hasil->hasil }}</td>
                        <td>
                            <a href="{{ route('Employee.HasilMcu.edit', $hasil->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i> Edit</a>
                            <form action="{{ route('Employee.HasilMcu.destroy', $hasil->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i> Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
=======
        <h2>List Hasil MCU</h2>
        <a href="{{ route('hasil_mcu.create') }}" class="btn btn-primary mb-3">Tambah Hasil MCU</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nama Pasien</th>
                    <th scope="col">Nama Pemeriksaan</th>
                    <th scope="col">Hasil</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($hasil_mcu as $hasil)
                <tr>
                    <th scope="row">{{ $hasil->id }}</th>
                    <td>{{ $hasil->nama_pasien }}</td>
                    <td>{{ $hasil->nama_pemeriksaan }}</td>
                    <td>{{ $hasil->hasil }}</td>
                    <td>
                        <a href="{{ route('hasil_mcu.edit', $hasil->id) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{ route('hasil_mcu.destroy', $hasil->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
>>>>>>> 9ea61cba467d24a9720bc089d806cc0a6a2c065e
    </div>
</body>
</html>
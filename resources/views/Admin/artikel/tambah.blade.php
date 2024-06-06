@extends('layouts.layout')


@section('addStyle')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.bootstrap5.css">
@endsection


@section('content')
    <div class="container mt-5 mb-5">

        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif


        <a class="btn btn-danger mb-2" href="{{ route('admin.artikel') }}">
        <span class="fas fa-arrow-left"></span>
            Kembali
        </a>

        <div class="card">

           

            <div class="card-header d-flex justify-content-between align-items-center">
                <h3>Tambah Artikel</h3>

            </div>
            <div class="card-body">

                <form action="{{ route('admin.tambah-artikel') }}" method="POST" enctype="multipart/form-data">

                    @csrf
                    <div class="mb-3">
                        <img src="https://alppetro.co.id/dist/assets/images/default.jpg" alt="" id="preview_img"
                            width="100%" height="500">
                    </div>
    
                    <div class="mb-3">
                        <label for="cover" class="form-label">Cover</label>
                        <input type="file" class="form-control" id="cover" name="cover"
                            accept="image/jpeg, image/png, image/gif" required>
    
                    </div>
    
    
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul Artikel</label>
                        <input type="text" class="form-control" id="judul" name="judul"
                            placeholder="Masukkan judul artikel" required>
    
                    </div>
    
    
                    <div class="mb-3">
                        <label for="isi" class="form-label">
                            Isi
                        </label>
                        <textarea name="isi" id="isi"></textarea>
    
                    </div>
    
                    <center>
                        <button class="btn btn-primary w-100" type="submit">Submit Artikel</button>
                    </center>
    
                </form>
    

            </div>
        </div>
    </div>
@endsection

@section('addScript')
<script src="https://cdn.tiny.cloud/1/9nf544vakjr5ojrlp1lawpnd13s2xks8hk05c3xnu0t67qhq/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>

<script>
tinymce.init({
    selector: 'textarea',
    plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
    height: 600,

});

// tinymce.activeEditor.setContent("Isi yang ingin Anda masukkan ke dalam TinyMCE");
</script>

<script>
$(document).ready(function() {
    $('#cover').on('change', function() {
        var input = this;
        var maxFileSize = 5 * 1024 * 1024; // Batas maksimum adalah 5MB (dalam byte).

        if (input.files && input.files[0]) {
            var fileSize = input.files[0].size;

            if (fileSize > maxFileSize) {
                Swal.fire({
                    icon: 'error',
                    title: 'Ukuran gambar terlalu besar',
                    text: 'Maksimum 5MB diizinkan.',
                });

                // Reset input file
                $(this).val('');
            } else {
                var input = this;
                var previewImg = $('#preview_img');

                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        // Mengatur atribut src dari elemen img untuk menampilkan gambar yang dipilih
                        previewImg.attr('src', e.target.result);
                    };

                    // Membaca gambar yang dipilih sebagai URL data
                    reader.readAsDataURL(input.files[0]);
                } else {
                    // Menghapus gambar yang ada di preview jika tidak ada gambar yang dipilih
                    previewImg.attr('src', '');
                }
            }
        }

    });
});
</script>
@endsection

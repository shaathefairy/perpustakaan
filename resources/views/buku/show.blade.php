<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-4 mb-5">
    <div class="card shadow-sm">
        <div class="card-header bg-info text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0"><i class="bi bi-book"></i> Detail Buku</h4>
            <a href="{{ route('buku.index') }}" class="btn btn-light btn-sm">Kembali</a>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <tr><th width="200">Kode Buku</th><td>{{ $buku->kode_buku }}</td></tr>
                <tr><th>ISBN</th><td>{{ $buku->isbn ?? '-' }}</td></tr>
                <tr><th>Judul</th><td><strong>{{ $buku->judul }}</strong></td></tr>
                <tr><th>Pengarang</th><td>{{ $buku->pengarang }}</td></tr>
                <tr><th>Penerbit</th><td>{{ $buku->penerbit }}</td></tr>
                <tr><th>Tahun Terbit</th><td>{{ $buku->tahun_terbit }}</td></tr>
                <tr><th>Kategori</th><td>{{ $buku->kategori }}</td></tr>
                <tr><th>Bahasa</th><td>{{ $buku->bahasa }}</td></tr>
                <tr><th>Jumlah Halaman</th><td>{{ $buku->jumlah_halaman }}</td></tr>
                <tr><th>Stok</th><td>{{ $buku->stok }}</td></tr>
                <tr><th>Status</th><td>{{ $buku->status }}</td></tr>
                <tr><th>Rak</th><td>{{ $buku->rak ?? '-' }}</td></tr>
                <tr><th>Sinopsis</th><td>{{ $buku->sinopsis ?? '-' }}</td></tr>
                <tr><th>Dibuat</th><td>{{ $buku->created_at->format('d-m-Y H:i') }}</td></tr>
                <tr><th>Diperbarui</th><td>{{ $buku->updated_at->format('d-m-Y H:i') }}</td></tr>
            </table>
            <a href="{{ route('buku.edit', $buku->id) }}" class="btn btn-warning"><i class="bi bi-pencil"></i> Edit</a>
        </div>
    </div>
</div>
</body>
</html>
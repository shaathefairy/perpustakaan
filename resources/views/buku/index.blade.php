<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Buku Perpustakaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body { background: #f4f6f9; }
        .table th { white-space: nowrap; font-size: .85rem; }
        .table td { font-size: .875rem; vertical-align: middle; }
    </style>
</head>
<body>
<div class="container-fluid mt-4 px-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2><i class="bi bi-book"></i> Data Buku Perpustakaan</h2>
        <a href="{{ route('buku.create') }}" class="btn btn-success">
            <i class="bi bi-plus-circle"></i> Tambah Buku
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card mb-3">
        <div class="card-body">
            <form action="{{ route('buku.index') }}" method="GET" class="row g-2 align-items-end">
                <div class="col-md-5">
                    <label class="form-label small mb-1">Pencarian</label>
                    <input type="text" name="cari" class="form-control"
                           placeholder="Cari Judul / Pengarang / Kode Buku..."
                           value="{{ $keyword }}">
                </div>
                <div class="col-md-2">
                    <label class="form-label small mb-1">Kategori</label>
                    <select name="kategori" class="form-select">
                        <option value="">-- Semua --</option>
                        @foreach($kategoris as $k)
                            <option value="{{ $k }}" {{ $kategori == $k ? 'selected' : '' }}>{{ $k }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="form-label small mb-1">Status</label>
                    <select name="status" class="form-select">
                        <option value="">-- Semua --</option>
                        @foreach(['Tersedia','Dipinjam','Rusak','Hilang'] as $s)
                            <option value="{{ $s }}" {{ $status == $s ? 'selected' : '' }}>{{ $s }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <button class="btn btn-primary"><i class="bi bi-search"></i> Cari</button>
                    <a href="{{ route('buku.index') }}" class="btn btn-secondary">Reset</a>
                </div>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-body table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>ISBN</th>
                        <th>Judul</th>
                        <th>Pengarang</th>
                        <th>Penerbit</th>
                        <th>Tahun</th>
                        <th>Kategori</th>
                        <th>Bahasa</th>
                        <th>Halaman</th>
                        <th>Stok</th>
                        <th>Status</th>
                        <th>Rak</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @forelse($buku as $i => $b)
                    <tr>
                        <td>{{ $buku->firstItem() + $i }}</td>
                        <td><span class="badge bg-secondary">{{ $b->kode_buku }}</span></td>
                        <td>{{ $b->isbn ?? '-' }}</td>
                        <td><strong>{{ $b->judul }}</strong></td>
                        <td>{{ $b->pengarang }}</td>
                        <td>{{ $b->penerbit }}</td>
                        <td>{{ $b->tahun_terbit }}</td>
                        <td>{{ $b->kategori }}</td>
                        <td>{{ $b->bahasa }}</td>
                        <td>{{ $b->jumlah_halaman }}</td>
                        <td>{{ $b->stok }}</td>
                        <td>
                            @php
                                $warna = ['Tersedia'=>'success','Dipinjam'=>'warning','Rusak'=>'danger','Hilang'=>'dark'][$b->status] ?? 'secondary';
                            @endphp
                            <span class="badge bg-{{ $warna }}">{{ $b->status }}</span>
                        </td>
                        <td>{{ $b->rak ?? '-' }}</td>
                        <td class="text-nowrap">
                            <a href="{{ route('buku.show', $b->id) }}" class="btn btn-info btn-sm text-white"><i class="bi bi-eye"></i></a>
                            <a href="{{ route('buku.edit', $b->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i></a>
                            <form action="{{ route('buku.destroy', $b->id) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('Yakin hapus data buku ini?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="14" class="text-center text-muted py-4">
                        <i class="bi bi-inbox fs-2 d-block mb-2"></i> Data buku tidak ditemukan.
                    </td></tr>
                @endforelse
                </tbody>
            </table>
            <div class="mt-3">{{ $buku->links() }}</div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
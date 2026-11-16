<div class="row">
    <div class="col-md-4 mb-3">
        <label class="form-label">Kode Buku <span class="text-danger">*</span></label>
        <input type="text" name="kode_buku" class="form-control"
               value="{{ old('kode_buku', $buku->kode_buku ?? '') }}" required>
    </div>
    <div class="col-md-4 mb-3">
        <label class="form-label">ISBN</label>
        <input type="text" name="isbn" class="form-control" value="{{ old('isbn', $buku->isbn ?? '') }}">
    </div>
    <div class="col-md-4 mb-3">
        <label class="form-label">Kategori <span class="text-danger">*</span></label>
        <input type="text" name="kategori" class="form-control"
               value="{{ old('kategori', $buku->kategori ?? '') }}" required>
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Judul <span class="text-danger">*</span></label>
        <input type="text" name="judul" class="form-control" value="{{ old('judul', $buku->judul ?? '') }}" required>
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Pengarang <span class="text-danger">*</span></label>
        <input type="text" name="pengarang" class="form-control" value="{{ old('pengarang', $buku->pengarang ?? '') }}" required>
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Penerbit <span class="text-danger">*</span></label>
        <input type="text" name="penerbit" class="form-control" value="{{ old('penerbit', $buku->penerbit ?? '') }}" required>
    </div>
    <div class="col-md-3 mb-3">
        <label class="form-label">Tahun Terbit <span class="text-danger">*</span></label>
        <input type="number" name="tahun_terbit" class="form-control" min="1900" max="{{ date('Y') }}"
               value="{{ old('tahun_terbit', $buku->tahun_terbit ?? '') }}" required>
    </div>
    <div class="col-md-3 mb-3">
        <label class="form-label">Bahasa <span class="text-danger">*</span></label>
        <select name="bahasa" class="form-select" required>
            @foreach(['Indonesia','Inggris','Arab','Lainnya'] as $lang)
                <option value="{{ $lang }}" {{ old('bahasa', $buku->bahasa ?? 'Indonesia') == $lang ? 'selected' : '' }}>{{ $lang }}</option>
            @endforeach
        </select>
    </div>

    <div class="col-md-3 mb-3">
        <label class="form-label">Jumlah Halaman <span class="text-danger">*</span></label>
        <input type="number" name="jumlah_halaman" class="form-control" min="1"
               value="{{ old('jumlah_halaman', $buku->jumlah_halaman ?? 1) }}" required>
    </div>
    <div class="col-md-3 mb-3">
        <label class="form-label">Stok <span class="text-danger">*</span></label>
        <input type="number" name="stok" class="form-control" min="0"
               value="{{ old('stok', $buku->stok ?? 1) }}" required>
    </div>
    <div class="col-md-3 mb-3">
        <label class="form-label">Status <span class="text-danger">*</span></label>
        <select name="status" class="form-select" required>
            @foreach(['Tersedia','Dipinjam','Rusak','Hilang'] as $s)
                <option value="{{ $s }}" {{ old('status', $buku->status ?? 'Tersedia') == $s ? 'selected' : '' }}>{{ $s }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-3 mb-3">
        <label class="form-label">Rak</label>
        <input type="text" name="rak" class="form-control" value="{{ old('rak', $buku->rak ?? '') }}">
    </div>

    <div class="col-12 mb-3">
        <label class="form-label">Sinopsis</label>
        <textarea name="sinopsis" class="form-control" rows="4">{{ old('sinopsis', $buku->sinopsis ?? '') }}</textarea>
    </div>
</div>
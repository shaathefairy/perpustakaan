<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index(Request $request)
    {
        $keyword  = $request->input('cari');
        $kategori = $request->input('kategori');
        $status   = $request->input('status');

        $buku = Buku::when($keyword, function ($query, $keyword) {
                return $query->where('judul', 'like', '%' . $keyword . '%')
                             ->orWhere('pengarang', 'like', '%' . $keyword . '%')
                             ->orWhere('kode_buku', 'like', '%' . $keyword . '%');
            })
            ->when($kategori, fn ($q, $k) => $q->where('kategori', $k))
            ->when($status,   fn ($q, $s) => $q->where('status', $s))
            ->orderBy('id', 'desc')
            ->paginate(10)
            ->withQueryString();

        $kategoris = Buku::select('kategori')->distinct()->pluck('kategori');

        return view('buku.index', compact('buku', 'keyword', 'kategori', 'status', 'kategoris'));
    }

    public function create()
    {
        return view('buku.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate($this->rules());
        Buku::create($validated);
        return redirect()->route('buku.index')->with('success', 'Buku berhasil ditambahkan.');
    }

    public function show(Buku $buku)
    {
        return view('buku.show', compact('buku'));
    }

    public function edit(Buku $buku)
    {
        return view('buku.edit', compact('buku'));
    }

    public function update(Request $request, Buku $buku)
    {
        $validated = $request->validate($this->rules($buku->id));
        $buku->update($validated);
        return redirect()->route('buku.index')->with('success', 'Buku berhasil diperbarui.');
    }

    public function destroy(Buku $buku)
    {
        $buku->delete();
        return redirect()->route('buku.index')->with('success', 'Buku berhasil dihapus.');
    }

    private function rules(?int $id = null): array
    {
        return [
            'kode_buku'      => 'required|max:20|unique:bukus,kode_buku' . ($id ? ",$id" : ''),
            'isbn'           => 'nullable|max:20',
            'judul'          => 'required|max:255',
            'pengarang'      => 'required|max:255',
            'penerbit'       => 'required|max:255',
            'tahun_terbit'   => 'required|integer|min:1900|max:' . date('Y'),
            'kategori'       => 'required|max:100',
            'bahasa'         => 'required|max:50',
            'jumlah_halaman' => 'required|integer|min:1',
            'stok'           => 'required|integer|min:0',
            'sinopsis'       => 'nullable|string',
            'status'         => 'required|in:Tersedia,Dipinjam,Rusak,Hilang',
            'rak'            => 'nullable|max:20',
        ];
    }
}
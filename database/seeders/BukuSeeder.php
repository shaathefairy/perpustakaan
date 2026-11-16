<?php

namespace Database\Seeders;

use App\Models\Buku;
use Illuminate\Database\Seeder;

class BukuSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'kode_buku' => 'BK-001',
                'isbn' => '978-602-01-1234-5',
                'judul' => 'Laskar Pelangi',
                'pengarang' => 'Andrea Hirata',
                'penerbit' => 'Bentang Pustaka',
                'tahun_terbit' => 2005,
                'kategori' => 'Novel',
                'bahasa' => 'Indonesia',
                'jumlah_halaman' => 529,
                'stok' => 5,
                'sinopsis' => 'Kisah anak-anak Belitung yang bersekolah di SD Muhammadiyah.',
                'status' => 'Tersedia',
                'rak' => 'A-01',
            ],
            [
                'kode_buku' => 'BK-002',
                'isbn' => '978-602-03-1234-6',
                'judul' => 'Bumi Manusia',
                'pengarang' => 'Pramoedya Ananta Toer',
                'penerbit' => 'Lentera Dipantara',
                'tahun_terbit' => 1980,
                'kategori' => 'Novel',
                'bahasa' => 'Indonesia',
                'jumlah_halaman' => 535,
                'stok' => 3,
                'sinopsis' => 'Kisah Minke di masa kolonial Hindia Belanda.',
                'status' => 'Tersedia',
                'rak' => 'A-02',
            ],
            [
                'kode_buku' => 'BK-003',
                'isbn' => '978-623-01-1234-7',
                'judul' => 'Filosofi Teras',
                'pengarang' => 'Henry Manampiring',
                'penerbit' => 'Kompas',
                'tahun_terbit' => 2018,
                'kategori' => 'Non-Fiksi',
                'bahasa' => 'Indonesia',
                'jumlah_halaman' => 320,
                'stok' => 4,
                'sinopsis' => 'Pengenalan filsafat Stoisisme untuk kehidupan modern.',
                'status' => 'Tersedia',
                'rak' => 'B-01',
            ],
            [
                'kode_buku' => 'BK-004',
                'isbn' => '978-623-02-1234-8',
                'judul' => 'Si Kancil dan Buaya',
                'pengarang' => 'Tim Edukasi',
                'penerbit' => 'Erlangga',
                'tahun_terbit' => 2015,
                'kategori' => 'Cerita Anak',
                'bahasa' => 'Indonesia',
                'jumlah_halaman' => 40,
                'stok' => 10,
                'sinopsis' => 'Cerita rakyat tentang kecerdikan Si Kancil.',
                'status' => 'Tersedia',
                'rak' => 'C-01',
            ],
            [
                'kode_buku' => 'BK-005',
                'isbn' => '978-623-04-1234-9',
                'judul' => 'Algoritma dan Pemrograman',
                'pengarang' => 'Rinaldi Munir',
                'penerbit' => 'Informatika',
                'tahun_terbit' => 2019,
                'kategori' => 'Pelajaran',
                'bahasa' => 'Indonesia',
                'jumlah_halaman' => 450,
                'stok' => 2,
                'sinopsis' => 'Buku dasar algoritma dan pemrograman untuk mahasiswa.',
                'status' => 'Dipinjam',
                'rak' => 'D-01',
            ],
        ];

        foreach ($data as $item) {
            Buku::create($item);
        }
    }
}
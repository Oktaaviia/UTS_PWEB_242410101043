<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
class PageController extends Controller
{
    public function tampilLogin()
    {
        return view('pages.login');
    }

    public function prosesLogin(Request $request)
    {
        $request->validate([
            'username' => 'required|min:2|max:50',
        ], [
            'username.required' => 'Username tidak boleh kosong.',
            'username.min'      => 'Username minimal 2 karakter.',
            'username.max'      => 'Username maksimal 50 karakter.',
        ]);

        $request->session()->put('username', $request->input('username'));

        return redirect()->route('dashboard');
    }

    // HALAMAN DASHBOARD

    public function tampilDashboard(Request $request)
    {
        if (! $request->session()->has('username')) {
            return redirect()->route('login')
                ->with('pesan_error', 'Silakan login terlebih dahulu.');
        }

        $username = $request->session()->get('username');

        // Data kartu statistik di controller, bukan di view
        $ringkasan = [
            ['ikon' => '🧶', 'label' => 'Total Produk',     'jumlah' => 12],
            ['ikon' => '📦', 'label' => 'Kategori',          'jumlah' => 4 ],
            ['ikon' => '⭐', 'label' => 'Produk Unggulan',   'jumlah' => 3 ],
            ['ikon' => '🛒', 'label' => 'Pesanan Bulan Ini', 'jumlah' => 27],
        ];

        return view('pages.dashboard', compact('username', 'ringkasan'));
    }

    // HALAMAN PROFILE

    public function tampilProfile(Request $request)
    {
        if (! $request->session()->has('username')) {
            return redirect()->route('login')
                ->with('pesan_error', 'Silakan login terlebih dahulu.');
        }

        $username = $request->session()->get('username');

        // Data profil di controller
        $profil = [
            'username'  => $username,
            'nama_toko' => 'Oaeari Rajut',
            'role'      => 'Admin Toko',
            'email'     => strtolower($username) . '@oaearirajut.id',
            'bergabung' => 'Januari 2024',
            'kota'      => 'Jember, Jawa Timur',
        ];

        return view('pages.profile', compact('username', 'profil'));
    }

    // HALAMAN PENGELOLAAN PRODUK

    public function tampilPengelolaan(Request $request)
    {
        if (! $request->session()->has('username')) {
            return redirect()->route('login')
                ->with('pesan_error', 'Silakan login terlebih dahulu.');
        }

        $username = $request->session()->get('username');

        $daftarProduk = [
            [
                'id'        => 1,
                'nama'      => 'Tas Rajut Mini Oval',
                'kategori'  => 'Tas',
                'deskripsi' => 'Tas mungil berbentuk oval dengan anyaman rapat. Cocok untuk kegiatan sehari-hari atau jalan santai.',
                'harga'     => 85000,
                'stok'      => 8,
                'warna'     => 'Krem & Coklat',
                'status'    => 'Tersedia',
            ],
            [
                'id'        => 2,
                'nama'      => 'Bucket Hat Rajut Pastel',
                'kategori'  => 'Aksesori',
                'deskripsi' => 'Topi rajut bergaya bucket dengan warna pastel lembut. Ringan, nyaman, dan kekinian.',
                'harga'     => 65000,
                'stok'      => 5,
                'warna'     => 'Lavender',
                'status'    => 'Tersedia',
            ],
            [
                'id'        => 3,
                'nama'      => 'Tote Bag Rajut Jumbo',
                'kategori'  => 'Tas',
                'deskripsi' => 'Tote bag berukuran besar dengan kapasitas luas. Ideal untuk belanja, pantai, atau kampus.',
                'harga'     => 120000,
                'stok'      => 3,
                'warna'     => 'Sage Green',
                'status'    => 'Tersedia',
            ],
            [
                'id'        => 4,
                'nama'      => 'Cardigan Rajut Oversize',
                'kategori'  => 'Pakaian',
                'deskripsi' => 'Cardigan oversize dengan rajutan lembut dan hangat. Potongan longgar yang stylish dan nyaman dipakai.',
                'harga'     => 275000,
                'stok'      => 2,
                'warna'     => 'Cream Off-White',
                'status'    => 'Stok Terbatas',
            ],
            [
                'id'        => 5,
                'nama'      => 'Scrunchie Set Rajut',
                'kategori'  => 'Aksesori',
                'deskripsi' => 'Set 3 scrunchie rajut dengan warna pastel berbeda. Lembut di rambut dan tampilan yang imut.',
                'harga'     => 35000,
                'stok'      => 15,
                'warna'     => 'Mix Pastel',
                'status'    => 'Tersedia',
            ],
            [
                'id'        => 6,
                'nama'      => 'Dompet Rajut Kecil',
                'kategori'  => 'Dompet',
                'deskripsi' => 'Dompet mini rajut dengan resleting kokoh. Cukup untuk uang, kartu, dan koin penting.',
                'harga'     => 55000,
                'stok'      => 0,
                'warna'     => 'Terracotta',
                'status'    => 'Habis',
            ],
            [
                'id'        => 7,
                'nama'      => 'Bando Rajut Lebar',
                'kategori'  => 'Aksesori',
                'deskripsi' => 'Bando lebar rajut yang elastis dan nyaman dipakai seharian. Tampilan feminin yang hangat.',
                'harga'     => 45000,
                'stok'      => 10,
                'warna'     => 'Dusty Pink',
                'status'    => 'Tersedia',
            ],
            [
                'id'        => 8,
                'nama'      => 'Pouch Rajut Oval',
                'kategori'  => 'Dompet',
                'deskripsi' => 'Pouch oval dengan resleting dan lapisan kain dalam. Pas untuk kosmetik atau alat tulis.',
                'harga'     => 70000,
                'stok'      => 6,
                'warna'     => 'Biru Muda',
                'status'    => 'Tersedia',
            ],
            [
                'id'        => 9,
                'nama'      => 'Beanie Rajut Tebal',
                'kategori'  => 'Aksesori',
                'deskripsi' => 'Topi beanie rajut tebal dengan benang premium. Hangat dan cocok untuk cuaca dingin.',
                'harga'     => 90000,
                'stok'      => 4,
                'warna'     => 'Mustard Yellow',
                'status'    => 'Stok Terbatas',
            ],
            [
                'id'        => 10,
                'nama'      => 'Tas Rajut Selempang',
                'kategori'  => 'Tas',
                'deskripsi' => 'Tas selempang rajut dengan tali panjang yang bisa disesuaikan. Praktis untuk bepergian.',
                'harga'     => 145000,
                'stok'      => 7,
                'warna'     => 'Chocolate Brown',
                'status'    => 'Tersedia',
            ],
            [
                'id'        => 11,
                'nama'      => 'Kaus Kaki Rajut Motif',
                'kategori'  => 'Pakaian',
                'deskripsi' => 'Kaus kaki rajut dengan motif garis warna-warni pastel. Hangat, tebal, dan lucu dipakai.',
                'harga'     => 30000,
                'stok'      => 20,
                'warna'     => 'Stripe Pastel',
                'status'    => 'Tersedia',
            ],
            [
                'id'        => 12,
                'nama'      => 'Gantungan Kunci Rajut',
                'kategori'  => 'Aksesori',
                'deskripsi' => 'Gantungan kunci berbentuk bola benang rajut mini. Hadiah yang unik dan lucu untuk siapa saja.',
                'harga'     => 25000,
                'stok'      => 0,
                'warna'     => 'Beige & White',
                'status'    => 'Habis',
            ],
        ];

        return view('pages.pengelolaan', compact('username', 'daftarProduk'));
    }

    // LOGOUT
    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('login')
            ->with('pesan_sukses', 'Berhasil logout. Sampai jumpa! 👋');
    }
}

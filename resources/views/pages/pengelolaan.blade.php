@extends('layouts.app')
@section('judul', 'Kelola Produk')
@section('gaya')
<style>
/* Header Halaman */
.header-halaman {
    display: flex; align-items: flex-end;
    justify-content: space-between; flex-wrap: wrap;
    gap: 1rem; margin-bottom: 1.75rem;
    padding-bottom: 1.25rem; border-bottom: 1px solid var(--pasir);
}
.header-kecil {
    font-size: .75rem; font-weight: 700;
    text-transform: uppercase; letter-spacing: .1em; color: var(--tan);
}
.header-judul {
    font-family: var(--font-display);
    font-size: 1.9rem; color: var(--gelap); font-weight: 600; margin-top: .3rem;
}
.badge-jumlah {
    background: var(--gradasi-coklat);
    color: #fff; font-size: .78rem; font-weight: 700;
    padding: .3rem .9rem; border-radius: 99px;
    box-shadow: 0 2px 8px rgba(140,106,63,.25);
}

/* Panel Filter */
.panel-filter {
    background: var(--gradasi-kartu);
    border: 1px solid var(--pasir);
    border-radius: var(--radius-sedang);
    padding: 1.25rem 1.5rem;
    margin-bottom: 1.75rem;
    display: flex; flex-wrap: wrap; gap: 1.25rem;
    align-items: flex-end;
    box-shadow: var(--bayangan-kecil);
}
.grup-filter { display: flex; flex-direction: column; gap: .4rem; }
.label-filter {
    font-size: .72rem; font-weight: 700;
    text-transform: uppercase; letter-spacing: .08em; color: var(--coklat);
}
.tombol-kategori {
    display: flex; gap: .4rem; flex-wrap: wrap;
}
.btn-kat {
    padding: .35rem .85rem;
    border-radius: 99px;
    border: 1.5px solid var(--tan);
    background: transparent;
    color: var(--redup);
    font-family: var(--font-tubuh);
    font-size: .8rem; font-weight: 600; cursor: pointer;
    transition: all .2s;
}
.btn-kat:hover { border-color: var(--coklat); color: var(--coklat); }
.btn-kat.aktif-kat {
    background: var(--gradasi-coklat);
    border-color: var(--coklat-tua); color: #fff;
}

/* Select harga */
.select-harga {
    padding: .38rem .85rem;
    border: 1.5px solid var(--tan);
    border-radius: var(--radius-kecil);
    background: var(--krem);
    font-family: var(--font-tubuh);
    font-size: .82rem; color: var(--gelap);
    cursor: pointer; outline: none;
    transition: border-color .2s;
}
.select-harga:focus { border-color: var(--coklat); }

/* Search box */
.wrap-search {
    position: relative;
    flex: 1; min-width: 200px; max-width: 320px;
}
.ikon-search {
    position: absolute; left: .75rem; top: 50%; transform: translateY(-50%);
    color: var(--tan); font-size: .9rem; pointer-events: none;
}
.input-search {
    width: 100%;
    padding: .42rem 1rem .42rem 2.1rem;
    border: 1.5px solid var(--tan);
    border-radius: var(--radius-kecil);
    background: var(--krem);
    font-family: var(--font-tubuh);
    font-size: .875rem; color: var(--gelap);
    outline: none;
    transition: border-color .2s, box-shadow .2s;
}
.input-search::placeholder { color: var(--tan); }
.input-search:focus {
    border-color: var(--coklat);
    box-shadow: 0 0 0 3px rgba(140,106,63,.1);
    background: var(--putih);
}
/* Tombol reset filter */
.btn-reset {
    padding: .35rem .85rem;
    border-radius: var(--radius-kecil);
    border: 1.5px solid var(--pasir);
    background: transparent;
    color: var(--redup);
    font-family: var(--font-tubuh);
    font-size: .78rem; font-weight: 600; cursor: pointer;
    transition: all .2s; white-space: nowrap;
    align-self: flex-end;
}
.btn-reset:hover { border-color: var(--merah); color: var(--merah); }

/* Highlight teks pencarian */
mark {
    background: rgba(196,154,46,.3);
    color: var(--gelap);
    border-radius: 2px;
    padding: 0 1px;
}

/* Info hasil filter */
.info-filter {
    font-size: .8rem; color: var(--redup);
    margin-left: auto; align-self: flex-end; white-space: nowrap;
}

/* Grid Produk */
.grid-produk {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(230px, 1fr));
    gap: 1.25rem;
}

/* Kartu produk tunggal */
.kartu-produk {
    background: var(--gradasi-kartu);
    border: 1px solid var(--pasir);
    border-radius: var(--radius-sedang);
    overflow: hidden;
    box-shadow: var(--bayangan-kecil);
    transition: transform .22s, box-shadow .22s;
    display: flex; flex-direction: column;
}
.kartu-produk:hover {
    transform: translateY(-5px);
    box-shadow: var(--bayangan-besar);
}

/* Area gambar SVG */
.kartu-gambar {
    aspect-ratio: 4/3;
    background: var(--gradasi-hangat);
    display: flex; align-items: center; justify-content: center;
    position: relative; overflow: hidden;
    border-bottom: 1px solid var(--pasir);
}
.kartu-gambar img {
    width: 100%; height: 100%;
    object-fit: cover;
    object-position: center;
    transition: transform .4s ease;
}
.kartu-produk:hover .kartu-gambar img {
    transform: scale(1.06);
}

/* Badge status di atas gambar */
.badge-status {
    position: absolute; top: .65rem; right: .65rem;
    font-size: .68rem; font-weight: 700;
    padding: .2rem .6rem; border-radius: 99px;
}
.status-tersedia { background:#E8F5E9; color:#276129; }
.status-terbatas { background:#FFF3E0; color:#9E6A00; }
.status-habis    { background:#FAECEC; color:#8B2B26; }

/* Badge kategori */
.badge-kategori {
    position: absolute; top: .65rem; left: .65rem;
    font-size: .68rem; font-weight: 700;
    background: rgba(42,31,15,.65); color: #fff;
    padding: .2rem .6rem; border-radius: 99px;
    backdrop-filter: blur(4px);
}

/* Isi kartu */
.kartu-isi { padding: 1rem 1rem .9rem; flex: 1; display: flex; flex-direction: column; gap: .35rem; }

.produk-nama {
    font-family: var(--font-display);
    font-size: 1.05rem; font-weight: 600; color: var(--gelap);
    line-height: 1.3;
}

.produk-deskripsi {
    font-size: .78rem; color: var(--redup);
    line-height: 1.5; flex: 1;
}

.produk-warna {
    font-size: .75rem; color: var(--tan);
    display: flex; align-items: center; gap: .3rem;
}

.kartu-bawah {
    display: flex; align-items: center; justify-content: space-between;
    padding-top: .6rem; border-top: 1px solid var(--pasir);
    margin-top: .35rem;
}
.produk-harga {
    font-family: var(--font-display);
    font-size: 1.05rem; font-weight: 600; color: var(--coklat);
}
.produk-stok {
    font-size: .75rem; color: var(--redup);
}
.stok-habis { color: var(--merah); font-weight: 700; }

/* Pesan kosong */
.kosong {
    text-align: center; padding: 3.5rem; color: var(--redup);
    grid-column: 1 / -1;
}
.kosong-ikon { font-size: 3rem; margin-bottom: .75rem; }

@media(max-width:600px){ .grid-produk{grid-template-columns:repeat(2,1fr)} }
@media(max-width:420px){ .grid-produk{grid-template-columns:1fr} }
</style>
@endsection

@section('konten')

{{-- Header --}}
<div class="header-halaman">
    <div>
        <p class="header-kecil">✦ Inventaris Toko</p>
        <h1 class="header-judul">Daftar Produk Rajut</h1>
    </div>
    <span class="badge-jumlah">{{ count($daftarProduk) }} Produk</span>
</div>

{{-- Panel Filter --}}
<div class="panel-filter">

    {{-- SEARCH: cari berdasarkan nama, kategori, atau warna --}}
    <div class="grup-filter" style="flex:1;min-width:200px;max-width:320px">
        <span class="label-filter">Cari Produk</span>
        <div class="wrap-search">
            <span class="ikon-search">🔍</span>
            <input
                type="text"
                id="inputSearch"
                class="input-search"
                placeholder="Nama, kategori, warna..."
                oninput="tampilkanProduk()"
                autocomplete="off"
            >
        </div>
    </div>

    {{-- Filter Kategori --}}
    <div class="grup-filter">
        <span class="label-filter">Kategori</span>
        <div class="tombol-kategori">
            <button class="btn-kat aktif-kat" onclick="filterKategori('semua', this)">Semua</button>
            @php
                $kategoriUnik = array_unique(array_column($daftarProduk, 'kategori'));
                sort($kategoriUnik);
            @endphp
            @foreach($kategoriUnik as $kat)
                <button class="btn-kat" onclick="filterKategori('{{ $kat }}', this)">
                    {{ $kat }}
                </button>
            @endforeach
        </div>
    </div>

    {{-- Urutkan Harga --}}
    <div class="grup-filter">
        <span class="label-filter">Urutkan Harga</span>
        <select class="select-harga" onchange="urutHarga(this.value)">
            <option value="default">— Pilih —</option>
            <option value="murah">Termurah dahulu</option>
            <option value="mahal">Termahal dahulu</option>
        </select>
    </div>

    {{-- Tombol reset semua filter --}}
    <button class="btn-reset" onclick="resetSemua()">✕ Reset</button>

    <span class="info-filter" id="infoFilter">
        Menampilkan {{ count($daftarProduk) }} produk
    </span>
</div>

{{-- Grid Kartu Produk --}}
<div class="grid-produk" id="gridProduk">

    @foreach($daftarProduk as $produk)
    <div class="kartu-produk"
         data-kategori="{{ $produk['kategori'] }}"
         data-harga="{{ $produk['harga'] }}"
         data-nama="{{ strtolower($produk['nama']) }}"
         data-warna="{{ strtolower($produk['warna']) }}"
         data-deskripsi="{{ strtolower($produk['deskripsi']) }}">

        {{-- Gambar --}}
        <div class="kartu-gambar">

            {{-- Badge status (pojok kanan atas) --}}
            <span class="badge-status
                @if($produk['status'] === 'Tersedia') status-tersedia
                @elseif($produk['status'] === 'Stok Terbatas') status-terbatas
                @else status-habis
                @endif">
                @if($produk['status'] === 'Tersedia') ✓
                @elseif($produk['status'] === 'Stok Terbatas') ⚠
                @else ✕
                @endif
                {{ $produk['status'] }}
            </span>

            {{-- Badge kategori (pojok kiri atas) --}}
            <span class="badge-kategori">{{ $produk['kategori'] }}</span>

            @php
                $fotoMap = [
                    1  => 'https://images.unsplash.com/photo-1641934823403-e87435bdfd13?q=80&w=805&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                    2  => 'https://images.unsplash.com/photo-1737053589279-9fb61d8781c3?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                    3  => 'https://images.unsplash.com/photo-1588532777541-a7f725dbc449?q=80&w=880&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                    4  => 'https://images.unsplash.com/photo-1434389677669-e08b4cac3105?w=500&q=80',
                    5  => 'https://images.unsplash.com/photo-1636039805398-1934cad278dc?q=80&w=880&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                    6  => 'https://images.unsplash.com/photo-1669039168021-f3fe6dc3c020?q=80&w=881&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                    7  => 'https://plus.unsplash.com/premium_photo-1727427850218-0085f4d8c92d?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1yZWxhdGVkfDh8fHxlbnwwfHx8fHw%3D',
                    8  => 'https://images.unsplash.com/photo-1704690729156-c2c2318556aa?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1yZWxhdGVkfDN8fHxlbnwwfHx8fHw%3D',
                    9  => 'https://images.unsplash.com/photo-1737053595796-635717e57a37?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1yZWxhdGVkfDJ8fHxlbnwwfHx8fHw%3D',
                    10 => 'https://images.unsplash.com/photo-1630071168464-c2e006dd9789?q=80&w=880&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                    11 => 'https://images.unsplash.com/photo-1670402691822-13ee94f5ca76?q=80&w=879&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                    12 => 'https://images.unsplash.com/photo-1679847069429-6511e0f137c1?q=80&w=880&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                ];
                $fotoUrl = $fotoMap[$produk['id']] ?? 'https://images.unsplash.com/photo-1591660363497-4482d0cedd31?q=80&w=1332&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D';
            @endphp
            <img
                src="{{ $fotoUrl }}"
                alt="{{ $produk['nama'] }}"
                loading="lazy"
            >
        </div>{{-- /kartu-gambar --}}

        {{-- Isi Kartu Teks --}}
        <div class="kartu-isi">
            <div class="produk-nama">{{ $produk['nama'] }}</div>
            <div class="produk-deskripsi">{{ $produk['deskripsi'] }}</div>
            <div class="produk-warna">🎨 {{ $produk['warna'] }}</div>

            <div class="kartu-bawah">
                <div>
                    <div class="produk-harga">Rp {{ number_format($produk['harga'], 0, ',', '.') }}</div>
                    <div class="produk-stok
                        @if($produk['stok'] === 0) stok-habis @endif">
                        @if($produk['stok'] > 0)
                            Stok: {{ $produk['stok'] }} pcs
                        @else
                            Stok habis
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>{{-- /kartu-produk --}}
    @endforeach

    <div class="kosong" id="pesanKosong" style="display:none">
        <div class="kosong-ikon">📦</div>
        <p>Tidak ada produk yang cocok dengan filter ini.</p>
    </div>

</div>{{-- /grid-produk --}}

@endsection
@push('skrip')
@endpush

<script>

let filterAktif = 'semua';
let urutanAktif = 'default';

/* Pilih kategori */
function filterKategori(kategori, tombol) {
    filterAktif = kategori;
    document.querySelectorAll('.btn-kat').forEach(b => b.classList.remove('aktif-kat'));
    tombol.classList.add('aktif-kat');
    tampilkanProduk();
}

/* Urutan harga */
function urutHarga(urutan) {
    urutanAktif = urutan;
    tampilkanProduk();
}

/* Reset semua filter */
function resetSemua() {
    // Kosongkan search
    document.getElementById('inputSearch').value = '';

    // Reset kategori ke "Semua"
    filterAktif = 'semua';
    document.querySelectorAll('.btn-kat').forEach(b => b.classList.remove('aktif-kat'));
    document.querySelector('.btn-kat').classList.add('aktif-kat');

    // Reset urutan harga
    urutanAktif = 'default';
    document.querySelector('.select-harga').value = 'default';

    tampilkanProduk();
}

/* Fungsi utama: jalankan semua filter sekaligus */
function tampilkanProduk() {
    const grid     = document.getElementById('gridProduk');
    const kosong   = document.getElementById('pesanKosong');
    const kartuEl  = Array.from(grid.querySelectorAll('.kartu-produk'));

    // Ambil kata kunci search, ubah ke lowercase agar case-insensitive
    const kataCari = document.getElementById('inputSearch').value.trim().toLowerCase();

    // ── Urutan harga: sort DOM sebelum filter ──
    if (urutanAktif !== 'default') {
        kartuEl.sort((a, b) => {
            const ha = parseInt(a.dataset.harga);
            const hb = parseInt(b.dataset.harga);
            return urutanAktif === 'murah' ? ha - hb : hb - ha;
        });
        // Re-append mengubah urutan tampilan di DOM
        kartuEl.forEach(k => grid.insertBefore(k, kosong));
    }

    // Filter + highlight 
    let tampil = 0;
    kartuEl.forEach(kartu => {

        // Cek filter kategori
        const cocokKategori = filterAktif === 'semua'
            || kartu.dataset.kategori === filterAktif;

        // Cek search: kata kunci dicari di nama, kategori, warna, deskripsi
        let cocokSearch = true;
        if (kataCari !== '') {
            const gabung = [
                kartu.dataset.nama      || '',
                kartu.dataset.kategori  ? kartu.dataset.kategori.toLowerCase() : '',
                kartu.dataset.warna     || '',
                kartu.dataset.deskripsi || '',
            ].join(' ');
            cocokSearch = gabung.includes(kataCari);
        }

        const tampilKartu = cocokKategori && cocokSearch;
        kartu.style.display = tampilKartu ? '' : 'none';

        // Highlight teks yang cocok di nama sama deskripsi
        if (tampilKartu) {
            const elNama  = kartu.querySelector('.produk-nama');
            const elDesc  = kartu.querySelector('.produk-deskripsi');

            // Kembalikan teks asli dulu (hilangkan highlight lama)
            if (elNama._teksAsli  === undefined) elNama._teksAsli  = elNama.textContent;
            if (elDesc._teksAsli  === undefined) elDesc._teksAsli  = elDesc.textContent;

            if (kataCari) {
                elNama.innerHTML = highlight(elNama._teksAsli, kataCari);
                elDesc.innerHTML = highlight(elDesc._teksAsli, kataCari);
            } else {
                elNama.textContent = elNama._teksAsli;
                elDesc.textContent = elDesc._teksAsli;
            }

            tampil++;
        }
    });

    // Tampilkan pesan jika tidak ada hasil
    kosong.style.display = tampil === 0 ? 'block' : 'none';

    // Update counter
    const info = document.getElementById('infoFilter');
    if (kataCari) {
        info.innerHTML = `<strong>${tampil}</strong> hasil untuk "<em>${kataCari}</em>"`;
    } else {
        info.textContent = 'Menampilkan ' + tampil + ' produk';
    }
}

function highlight(teks, kata) {
    if (!kata) return teks;
    // Escape karakter regex khusus dari input user
    const escaped = kata.replace(/[.*+?^${}()|[\]\\]/g, '\\$&');
    const regex   = new RegExp(`(${escaped})`, 'gi');
    return teks.replace(regex, '<mark>$1</mark>');
}
</script>
@extends('layouts.app')
@section('judul', 'Dashboard')
@section('gaya')

<style>
/* Hero Section */
.hero {
    position: relative;
    background: var(--gradasi-hero);
    border: 1px solid var(--pasir);
    border-radius: var(--radius-besar);
    padding: 2.75rem 2.5rem;
    margin-bottom: 2rem;
    overflow: hidden;
    box-shadow: var(--bayangan-sedang);
}

/* Gradasi overlay kiri */
.hero::before {
    content: '';
    position: absolute; inset: 0;
    background: linear-gradient(90deg, rgba(249,245,239,1) 55%, rgba(249,245,239,0) 100%);
    z-index: 1;
}

/* Foto rajutan di sisi kanan hero */
.hero-foto {
    position: absolute;
    right: 0; top: 0; bottom: 0;
    width: 45%;
    object-fit: cover;
    object-position: center;
    opacity: .55;
    z-index: 0;
    border-radius: 0 var(--radius-besar) var(--radius-besar) 0;
}

/* Konten hero di atas overlay */
.hero-konten { position: relative; z-index: 2; }

.hero-kecil {
    font-size: .75rem; font-weight: 700;
    text-transform: uppercase; letter-spacing: .12em;
    color: var(--tan); margin-bottom: .5rem;
}

.hero-judul {
    font-family: var(--font-display);
    font-size: clamp(1.8rem, 4vw, 2.8rem);
    font-weight: 600; line-height: 1.15;
    color: var(--gelap); margin-bottom: .5rem;
}
.hero-judul span {
    color: var(--coklat); font-style: italic;
}

.hero-sub { font-size: .9rem; color: var(--redup); max-width: 420px; }

/* Tombol cepat di hero */
.hero-tombol {
    display: inline-flex; align-items: center; gap: .4rem;
    margin-top: 1.5rem;
    padding: .65rem 1.4rem;
    background: var(--gradasi-coklat);
    color: #fff; border-radius: var(--radius-kecil);
    font-size: .875rem; font-weight: 700;
    box-shadow: 0 4px 10px rgba(140,106,63,.3);
    transition: opacity .2s;
}
.hero-tombol:hover { opacity: .50; color: #fff; }

/* Grid Statistik */
.grid-statistik {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(190px, 1fr));
    gap: 1rem;
    margin-bottom: 2rem;
}

.kartu-statistik {
    background: var(--gradasi-kartu);
    border: 1px solid var(--pasir);
    border-radius: var(--radius-sedang);
    padding: 1.4rem 1.5rem;
    box-shadow: var(--bayangan-kecil);
    transition: transform .2s, box-shadow .2s;
    position: relative; overflow: hidden;
}
.kartu-statistik::after {
    content: '';
    position: absolute; bottom: 0; left: 0; right: 0; height: 3px;
    background: var(--gradasi-coklat);
    opacity: 0; transition: opacity .2s;
}
.kartu-statistik:hover { transform: translateY(-3px); box-shadow: var(--bayangan-sedang); }
.kartu-statistik:hover::after { opacity: 1; }

.stat-ikon  { font-size: 1.75rem; margin-bottom: .4rem; }
.stat-nilai { font-family: var(--font-display); font-size: 2.2rem; font-weight: 600; color: var(--coklat); line-height: 1; }
.stat-label { font-size: .78rem; text-transform: uppercase; letter-spacing: .06em; color: var(--redup); margin-top: .25rem; }

/* Menu Cepat */
.judul-seksi {
    font-family: var(--font-display);
    font-size: 1.3rem; font-weight: 600;
    color: var(--gelap); margin-bottom: 1rem;
}

.grid-menu {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap: 1rem;
}

.kartu-menu {
    background: var(--gradasi-kartu);
    border: 1.5px solid var(--pasir);
    border-radius: var(--radius-sedang);
    padding: 1.5rem 1.25rem;
    display: flex; flex-direction: column; gap: .4rem;
    color: var(--gelap);
    transition: border-color .2s, box-shadow .2s, transform .2s;
}
.kartu-menu:hover {
    border-color: var(--coklat);
    box-shadow: var(--bayangan-sedang);
    transform: translateY(-3px);
    color: var(--gelap);
}
.menu-ikon  { font-size: 1.5rem; }
.menu-judul { font-weight: 700; font-size: .95rem; }
.menu-desc  { font-size: .82rem; color: var(--redup); }
.menu-panah { color: var(--coklat); font-size: .82rem; margin-top: auto; font-weight: 700; }
</style>
@endsection

@section('konten')

{{-- HERO SECTION --}}
<div class="hero">

    <img
        class="hero-foto"
        src="https://images.unsplash.com/photo-1591660363497-4482d0cedd31?q=80&w=1332&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
        alt="Produk rajut handmade"
        loading="eager"
    >

    <div class="hero-konten">
        <p class="hero-kecil">✦ Selamat Datang Kembali</p>
        <h1 class="hero-judul">Halo, <span>{{ $username }}</span></h1>
        <p class="hero-sub">Kelola produk rajutmu dengan mudah dari sini. Semua ada dalam satu tempat.</p>
        <a href="{{ route('pengelolaan') }}" class="hero-tombol">
            🧶 Lihat Semua Produk
        </a>
    </div>
</div>

{{-- KARTU STATISTIK --}}
<div class="grid-statistik">
    @foreach($ringkasan as $item)
        <div class="kartu-statistik">
            <div class="stat-ikon">{{ $item['ikon'] }}</div>
            <div class="stat-nilai">{{ $item['jumlah'] }}</div>
            <div class="stat-label">{{ $item['label'] }}</div>
        </div>
    @endforeach
</div>

{{-- MENU CEPAT --}}
<h2 class="judul-seksi">Menu Cepat</h2>
<div class="grid-menu">
    <a href="{{ route('pengelolaan') }}" class="kartu-menu">
        <span class="menu-ikon">📦</span>
        <span class="menu-judul">Kelola Produk</span>
        <span class="menu-desc">Lihat dan filter seluruh daftar produk rajut</span>
        <span class="menu-panah">Buka →</span>
    </a>
    <a href="{{ route('profile') }}" class="kartu-menu">
        <span class="menu-ikon">👤</span>
        <span class="menu-judul">Profil Saya</span>
        <span class="menu-desc">Lihat dan kelola informasi akun toko</span>
        <span class="menu-panah">Buka →</span>
    </a>
</div>

@endsection
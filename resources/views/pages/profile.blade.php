@extends('layouts.app')
@section('judul', 'Profil')
@section('gaya')
<style>
/* Header halaman */
.header-halaman {
    margin-bottom: 1.75rem;
    padding-bottom: 1.25rem;
    border-bottom: 1px solid var(--pasir);
}
.header-kecil {
    font-size: .75rem; font-weight: 700;
    text-transform: uppercase; letter-spacing: .1em; color: var(--tan);
}
.header-judul {
    font-family: var(--font-display);
    font-size: 1.9rem; color: var(--gelap); font-weight: 600; margin-top: .3rem;
}
.header-judul span { color: var(--coklat); font-style: italic; }

/* Layout 2 kolom */
.profil-layout {
    display: grid;
    grid-template-columns: 260px 1fr;
    gap: 1.5rem;
    align-items: start;
}

/* Kartu kiri */
.kartu-avatar {
    background: var(--gradasi-kartu);
    border: 1px solid var(--pasir);
    border-radius: var(--radius-besar);
    padding: 2rem 1.5rem;
    text-align: center;
    box-shadow: var(--bayangan-kecil);
    position: relative; overflow: hidden;
}
.kartu-avatar::before {
    content: '';
    position: absolute; top: 0; left: 0; right: 0; height: 80px;
    background: var(--gradasi-coklat); opacity: .12;
}
.avatar-lingkaran {
    width: 88px; height: 88px;
    background: var(--gradasi-coklat);
    border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    font-size: 2.2rem;
    margin: .5rem auto 1rem;
    border: 3px solid var(--putih);
    box-shadow: 0 4px 14px rgba(140,106,63,.3);
    position: relative; z-index: 1;
}
.profil-nama {
    font-family: var(--font-display);
    font-size: 1.3rem; font-weight: 600; color: var(--gelap);
}
.profil-role {
    font-size: .78rem; color: var(--redup);
    text-transform: uppercase; letter-spacing: .06em; margin: .3rem 0 .8rem;
}
.profil-badge {
    display: inline-block;
    background: var(--gradasi-coklat);
    color: #fff;
    font-size: .75rem; font-weight: 700;
    padding: .3rem .85rem; border-radius: 99px;
    box-shadow: 0 2px 8px rgba(140,106,63,.3);
}

/* Kartu kanan: detail */
.kartu-detail {
    background: var(--gradasi-kartu);
    border: 1px solid var(--pasir);
    border-radius: var(--radius-besar);
    padding: 2rem;
    box-shadow: var(--bayangan-kecil);
}
.detail-judul {
    font-family: var(--font-display);
    font-size: 1.15rem; color: var(--gelap);
    margin-bottom: 1.25rem; padding-bottom: .75rem;
    border-bottom: 1px solid var(--pasir);
    font-weight: 600;
}
.baris-info {
    display: grid;
    grid-template-columns: 130px 1fr;
    gap: .75rem 1rem;
    align-items: baseline;
    padding: .85rem 0;
    border-bottom: 1px solid var(--pasir);
}
.baris-info:last-child { border-bottom: none; }
.info-kunci {
    font-size: .75rem; font-weight: 700;
    text-transform: uppercase; letter-spacing: .07em; color: var(--tan);
}
.info-nilai {
    font-size: .95rem; color: var(--gelap); font-weight: 500;
}

@media(max-width:700px){
    .profil-layout{grid-template-columns:1fr}
    .baris-info{grid-template-columns:1fr;gap:.2rem}
}
</style>
@endsection

@section('konten')

<div class="header-halaman">
    <p class="header-kecil">✦ Akun Saya</p>
    <h1 class="header-judul">Profil <span>{{ $username }}</span></h1>
</div>

<div class="profil-layout">

    {{-- Kolom kiri: Avatar --}}
    <div class="kartu-avatar">
        <div class="avatar-lingkaran">👤</div>
        <p class="profil-nama">{{ $profil['username'] }}</p>
        <p class="profil-role">{{ $profil['role'] }}</p>
        <span class="profil-badge">🧶 {{ $profil['nama_toko'] }}</span>
    </div>

    {{-- Kolom kanan: Informasi detail --}}
    <div class="kartu-detail">
        <h2 class="detail-judul">Informasi Akun</h2>
        <div class="baris-info">
            <span class="info-kunci">Username</span>
            <span class="info-nilai">{{ $profil['username'] }}</span>
        </div>
        <div class="baris-info">
            <span class="info-kunci">Role</span>
            <span class="info-nilai">{{ $profil['role'] }}</span>
        </div>
        <div class="baris-info">
            <span class="info-kunci">Nama Toko</span>
            <span class="info-nilai">{{ $profil['nama_toko'] }}</span>
        </div>
        <div class="baris-info">
            <span class="info-kunci">Email</span>
            <span class="info-nilai">{{ $profil['email'] }}</span>
        </div>
        <div class="baris-info">
            <span class="info-kunci">Kota</span>
            <span class="info-nilai">{{ $profil['kota'] }}</span>
        </div>
        <div class="baris-info">
            <span class="info-kunci">Bergabung Sejak</span>
            <span class="info-nilai">{{ $profil['bergabung'] }}</span>
        </div>
    </div>

</div>
@endsection
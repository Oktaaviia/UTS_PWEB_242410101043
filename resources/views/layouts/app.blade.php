<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('judul', 'Beranda') | Oaeari Rajut 🧶</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,600;1,400&family=Nunito:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --krem:#F9F5EF; --putih:#FDFCF9; --pasir:#EBE4D8; --tan:#D4C5AE;
            --coklat:#8C6A3F; --coklat-tua:#5C4020; --gelap:#2A1F0F;
            --redup:#9B8C78; --hijau:#6B9E6E; --merah:#B85C50; --kuning:#C49A2E;
            --gradasi-hero:linear-gradient(135deg,#F9F5EF 0%,#EDE4D5 50%,#E0D2BC 100%);
            --gradasi-coklat:linear-gradient(135deg,#8C6A3F 0%,#5C4020 100%);
            --gradasi-hangat:linear-gradient(135deg,#FAF3E8 0%,#F2E6D0 100%);
            --gradasi-kartu:linear-gradient(160deg,#FDFCF9 0%,#F5EFE5 100%);
            --font-display:'Cormorant Garamond',Georgia,serif;
            --font-tubuh:'Nunito',system-ui,sans-serif;
            --radius-kecil:6px; --radius-sedang:14px; --radius-besar:24px;
            --bayangan-kecil:0 1px 4px rgba(42,31,15,.07);
            --bayangan-sedang:0 4px 20px rgba(42,31,15,.11);
            --bayangan-besar:0 10px 40px rgba(42,31,15,.15);
        }
        *,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
        html{scroll-behavior:smooth}
        body{font-family:var(--font-tubuh);font-size:15px;line-height:1.7;color:var(--gelap);background:var(--krem);min-height:100vh;display:flex;flex-direction:column}
        a{color:var(--coklat);text-decoration:none;transition:color .2s}
        a:hover{color:var(--gelap)}
        .pembungkus{flex:1;display:flex;flex-direction:column}
        main{flex:1;padding:2.5rem 1.5rem}
        .kontainer{max-width:1080px;margin:0 auto}
        .notif{padding:.8rem 1rem .8rem 1.25rem;border-radius:var(--radius-kecil);font-size:.875rem;margin-bottom:1.25rem;border-left:3px solid;display:flex;align-items:center;gap:.6rem}
        .notif-sukses{background:#EEF6EE;border-color:var(--hijau);color:#275929}
        .notif-error{background:#FAECEC;border-color:var(--merah);color:#7A2B26}
        .notif-ikon{font-weight:700;flex-shrink:0}
        .notif-tutup{margin-left:auto;background:transparent;border:none;font-size:1.1rem;cursor:pointer;color:inherit;opacity:.5;line-height:1}
        .notif-tutup:hover{opacity:1}
        .teks-redup{color:var(--redup)} .teks-coklat{color:var(--coklat)}
        .teks-hijau{color:var(--hijau)} .teks-merah{color:var(--merah)}
        .tebal{font-weight:600}
        @media(max-width:640px){main{padding:1.5rem 1rem}}
    </style>
    @yield('gaya')
</head>
<body>
<div class="pembungkus">

    {{-- ① Komponen Navbar (x-component) --}}
    <x-navbar />

    <main>
        <div class="kontainer">
            @include('partials._pesan')
            @yield('konten')
        </div>
    </main>

    {{-- ④ Komponen Footer (x-component) --}}
    <x-footer />

</div>
</body>
</html>

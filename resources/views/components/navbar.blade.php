<nav class="navbar">
    <div class="navbar-dalam">

        {{-- Logo --}}
        <a href="{{ route('dashboard') }}" class="navbar-brand">
            <span>🧶</span>
            <span class="brand-nama">Oaeari <em>Rajut</em></span>
        </a>

        @if(session('username'))
            {{-- TENGAH: Menu --}}
            <ul class="navbar-menu" id="navMenu">
                <li><a href="{{ route('dashboard') }}"   class="tautan-nav {{ request()->routeIs('dashboard')   ? 'aktif' : '' }}">Beranda</a></li>
                <li><a href="{{ route('pengelolaan') }}" class="tautan-nav {{ request()->routeIs('pengelolaan') ? 'aktif' : '' }}">Produk</a></li>
                <li><a href="{{ route('profile') }}"     class="tautan-nav {{ request()->routeIs('profile')     ? 'aktif' : '' }}">Profil</a></li>
            </ul>

            {{-- KANAN: User + logout --}}
            <div class="navbar-kanan">
                <span class="salam-user"><span class="titik-online"></span>{{ session('username') }}</span>
                <form action="{{ route('logout') }}" method="POST" style="display:inline">
                    @csrf
                    <button type="submit" class="tombol-keluar">Keluar</button>
                </form>
            </div>

            {{-- Hamburger mobile --}}
            <button class="hamburger" onclick="toggleNavMenu()" aria-label="Menu">
                <span></span><span></span><span></span>
            </button>
        @else
            <span class="tagline-brand">✦ Handmade dengan Cinta ✦</span>
        @endif
    </div>

    @if(session('username'))
    <div class="menu-mobile" id="menuMobile">
        <a href="{{ route('dashboard') }}"   class="link-mob {{ request()->routeIs('dashboard')   ? 'aktif' : '' }}">Beranda</a>
        <a href="{{ route('pengelolaan') }}" class="link-mob {{ request()->routeIs('pengelolaan') ? 'aktif' : '' }}">Produk</a>
        <a href="{{ route('profile') }}"     class="link-mob {{ request()->routeIs('profile')     ? 'aktif' : '' }}">Profil</a>
        <div class="mob-bawah">
            <span style="font-size:.82rem;font-weight:600;color:var(--coklat)">👋 {{ session('username') }}</span>
            <form action="{{ route('logout') }}" method="POST">@csrf
                <button type="submit" class="tombol-keluar" style="font-size:.8rem;padding:.3rem .8rem">Keluar</button>
            </form>
        </div>
    </div>
    @endif
</nav>

<style>
.navbar {
    background: var(--putih);
    border-bottom: 1px solid var(--pasir);
    position: sticky; top: 0; z-index: 300;
    box-shadow: var(--bayangan-kecil);
}
.navbar-dalam {
    max-width: 1080px; margin: 0 auto;
    padding: .9rem 1.5rem;
    display: flex; align-items: center;
    position: relative; min-height: 56px;
}

/* Brand */
.navbar-brand {
    display:flex; align-items:center; gap:.45rem;
    color:var(--gelap) !important;
    font-family:var(--font-display); font-size:1.2rem; font-weight:600;
    letter-spacing:-.01em; flex-shrink:0; z-index:1;
}
.navbar-brand em { font-style:italic; color:var(--coklat); }
.brand-nama { display:inline; }

/* Menu TENGAH */
.navbar-menu {
    position:absolute; left:50%; transform:translateX(-50%);
    display:flex; list-style:none; gap:.15rem; z-index:1;
}
.tautan-nav {
    display:inline-block; padding:.42rem 1rem;
    border-radius:var(--radius-kecil);
    font-size:.875rem; font-weight:500; color:var(--redup);
    transition:background .2s, color .2s; white-space:nowrap;
}
.tautan-nav:hover { background:var(--pasir); color:var(--gelap); }
.tautan-nav.aktif { background:var(--pasir); color:var(--gelap); font-weight:700; }

/* Kanan */
.navbar-kanan {
    display:flex; align-items:center; gap:.75rem;
    margin-left:auto; z-index:1;
}
.salam-user {
    display:flex; align-items:center; gap:.4rem;
    font-size:.82rem; font-weight:600; color:var(--coklat); white-space:nowrap;
}
.titik-online {
    width:7px; height:7px; background:var(--hijau);
    border-radius:50%; flex-shrink:0;
    box-shadow:0 0 0 2px rgba(107,158,110,.3);
}
.tombol-keluar {
    background:transparent; border:1.5px solid var(--tan); color:var(--coklat);
    padding:.32rem .85rem; border-radius:var(--radius-kecil);
    font-family:var(--font-tubuh); font-size:.8rem; font-weight:600;
    cursor:pointer; transition:all .2s;
}
.tombol-keluar:hover { background:var(--gradasi-coklat); color:#fff; border-color:var(--coklat-tua); }

.tagline-brand { font-size:.82rem; font-style:italic; color:var(--redup); margin-left:auto; }

.hamburger {
    display:none; flex-direction:column; gap:5px;
    background:transparent; border:none; cursor:pointer; padding:4px; z-index:2;
}
.hamburger span { display:block; width:22px; height:2px; background:var(--gelap); border-radius:2px; }

.menu-mobile { display:none; flex-direction:column; background:var(--putih); border-top:1px solid var(--pasir); padding:.5rem 1.5rem 1rem; }
.menu-mobile.buka { display:flex; }
.link-mob { padding:.6rem .5rem; font-size:.9rem; font-weight:500; color:var(--redup); border-bottom:1px solid var(--pasir); }
.link-mob:hover,.link-mob.aktif { color:var(--gelap); font-weight:700; }
.mob-bawah { display:flex; align-items:center; justify-content:space-between; margin-top:.75rem; padding-top:.75rem; border-top:1px solid var(--pasir); }

@media(max-width:768px){
    .navbar-menu,.navbar-kanan{display:none}
    .hamburger{display:flex;margin-left:auto}
}
</style>
<script>
function toggleNavMenu(){document.getElementById('menuMobile').classList.toggle('buka')}
</script>
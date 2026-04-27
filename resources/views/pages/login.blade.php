@extends('layouts.app')
@section('judul', 'Masuk')
@section('gaya')

<style>
/* Halaman login */
body { background: var(--gradasi-hero) !important; }

.login-wrap {
    min-height: calc(100vh - 56px);
    display: flex; align-items: center; justify-content: center;
    padding: 2rem 0;
}

.login-kartu {
    background: var(--putih);
    border: 1px solid var(--pasir);
    border-radius: var(--radius-besar);
    padding: 2.75rem 2.75rem 2.25rem;
    width: 100%; max-width: 430px;
    box-shadow: var(--bayangan-besar);
    position: relative;
    overflow: hidden;
}

/* Dekorasi sudut atas */
.login-kartu::before {
    content: '';
    position: absolute; top: 0; left: 0; right: 0; height: 4px;
    background: var(--gradasi-coklat);
    border-radius: var(--radius-besar) var(--radius-besar) 0 0;
}

.login-header { text-align: center; margin-bottom: 2rem; }

.login-logo {
    font-size: 3rem; margin-bottom: .75rem;
    display: inline-block;
    animation: goyang 3s ease-in-out infinite;
}
@keyframes goyang {
    0%,100% { transform: rotate(-5deg); }
    50%      { transform: rotate(5deg); }
}

.login-judul {
    font-family: var(--font-display);
    font-size: 1.8rem; font-weight: 600;
    color: var(--gelap); margin-bottom: .25rem;
}
.login-judul em { font-style: italic; color: var(--coklat); }

.login-sub { font-size: .875rem; color: var(--redup); }

/* Form */
.grup-form { margin-bottom: 1.25rem; }

.label-form {
    display: block;
    font-size: .78rem; font-weight: 700;
    text-transform: uppercase; letter-spacing: .08em;
    color: var(--coklat); margin-bottom: .45rem;
}

.input-form {
    width: 100%; padding: .78rem 1rem;
    border: 1.5px solid var(--pasir);
    border-radius: var(--radius-kecil);
    background: var(--krem);
    font-family: var(--font-tubuh); font-size: .95rem;
    color: var(--gelap); outline: none;
    transition: border-color .2s, box-shadow .2s, background .2s;
}
.input-form::placeholder { color: var(--tan); }
.input-form:focus {
    border-color: var(--coklat);
    box-shadow: 0 0 0 3px rgba(140,106,63,.12);
    background: var(--putih);
}

.pesan-error {
    font-size: .8rem; color: var(--merah);
    margin-top: .35rem; display: flex; align-items: center; gap: .3rem;
}

.tombol-masuk {
    display: block; width: 100%;
    padding: .9rem;
    background: var(--gradasi-coklat);
    color: #fff; border: none;
    border-radius: var(--radius-kecil);
    font-family: var(--font-tubuh);
    font-size: 1rem; font-weight: 700;
    cursor: pointer; letter-spacing: .02em;
    transition: opacity .2s, transform .1s;
    margin-top: 1.5rem;
    box-shadow: 0 4px 14px rgba(140,106,63,.35);
}
.tombol-masuk:hover  { opacity: .88; }
.tombol-masuk:active { transform: scale(.98); }

.login-deko {
    text-align: center; margin-top: 1.5rem;
    font-size: .78rem; color: var(--tan);
    letter-spacing: .06em;
}
</style>
@endsection

@section('konten')
<div class="login-wrap">
    <div class="login-kartu">

        <div class="login-header">
            <div class="login-logo">🧶</div>
            <h1 class="login-judul">Oaeari <em>Rajut</em></h1>
            <p class="login-sub">Masuk untuk mengelola produk rajutmu</p>
        </div>

        <form action="{{ route('login.proses') }}" method="POST">
            @csrf

            <div class="grup-form">
                <label class="label-form" for="username">Username</label>
                <input
                    type="text"
                    id="username"
                    name="username"
                    class="input-form"
                    placeholder="Masukkan username kamu..."
                    value="{{ old('username') }}"
                    autocomplete="username"
                    autofocus
                >
                @error('username')
                    <p class="pesan-error">⚠ {{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="tombol-masuk">
                Masuk ke Dasbor →
            </button>
        </form>

        <p class="login-deko">✦ &nbsp; HANDMADE WITH LOVE &nbsp; ✦</p>

    </div>
</div>
@endsection
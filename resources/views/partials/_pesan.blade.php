{{-- Pesan sukses (contoh: setelah logout berhasil) --}}
@if(session('pesan_sukses'))
    <div class="notif notif-sukses" role="alert">
        <span class="notif-ikon">✓</span>
        <span>{{ session('pesan_sukses') }}</span>
        <button class="notif-tutup" onclick="this.parentElement.remove()" aria-label="Tutup">×</button>
    </div>
@endif

{{-- Pesan error (contoh: belum login) --}}
@if(session('pesan_error'))
    <div class="notif notif-error" role="alert">
        <span class="notif-ikon">!</span>
        <span>{{ session('pesan_error') }}</span>
        <button class="notif-tutup" onclick="this.parentElement.remove()" aria-label="Tutup">×</button>
    </div>
@endif

{{-- Pesan peringatan (contoh: validasi) --}}
@if($errors->any())
    <div class="notif notif-error" role="alert">
        <span class="notif-ikon">!</span>
        <span>
            @foreach($errors->all() as $pesan)
                {{ $pesan }}<br>
            @endforeach
        </span>
        <button class="notif-tutup" onclick="this.parentElement.remove()" aria-label="Tutup">×</button>
    </div>
@endif

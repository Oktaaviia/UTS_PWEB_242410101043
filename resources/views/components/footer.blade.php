<footer class="footer">
    <div class="footer-dalam">
        <div class="footer-brand">
            <span style="font-size:1.5rem">🧶</span>
            <span class="footer-nama">Oaeari Rajut</span>
        </div>
        <p class="footer-tagline">Handmade dengan cinta, dirajut dengan sabar.</p>
        <p class="footer-copy">&copy; {{ date('Y') }} Oaeari Rajut &mdash; Tugas UTS Pemrograman Web</p>
    </div>
</footer>

<style>
.footer {
    background: linear-gradient(135deg, #9f712c 0%, #653f05 50%, #2A1F0F 100%);
    color: rgba(255,255,255,.5);
    padding: 2rem 1.5rem;
    margin-top: auto;
}
.footer-dalam {
    max-width: 1080px; margin: 0 auto;
    text-align: center;
    display: flex; flex-direction: column; align-items: center; gap: .4rem;
}
.footer-brand {
    display:flex; align-items:center; gap:.4rem;
    font-family:var(--font-display); font-size:1.1rem; font-weight:600;
    color:rgba(255,255,255,.85);
}
.footer-nama { font-style:italic; }
.footer-tagline { font-style:italic; font-size:.83rem; color:rgba(255,255,255,.4); }
.footer-copy { font-size:.78rem; color:rgba(255,255,255,.28); }
</style>

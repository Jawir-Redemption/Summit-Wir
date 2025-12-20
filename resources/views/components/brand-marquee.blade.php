{{-- =======================================================================
    Brand Marquee Component
    Menampilkan logo brand partner dengan animasi horizontal infinite scroll
============================================================================ --}}

<section class="brand-section">
    <div class="brand-container">
        
        {{-- Header Section --}}
        <div class="brand-header">
            <h2 class="brand-title scroll-animate">Pilihan Brand</h2>
            <p class="brand-subtitle scroll-animate delay-2">Dipilih dari merek terbaik untuk pengalaman terbaik.</p>
        </div>

        {{-- Marquee Container --}}
        <div class="brand-marquee scroll-animate delay-4">
            
            {{-- Track: Element yang bergerak dengan CSS animation --}}
            <div class="brand-track">
                
                {{-- Set Pertama: Logo brand asli --}}
                <div class="brand-item">
                    <div class="brand-card">
                        <img src="{{ asset('assets/img/brands/EIGER.png') }}" alt="EIGER">
                    </div>
                </div>

                <div class="brand-item">
                    <div class="brand-card">
                        <img src="{{ asset('assets/img/brands/REI.png') }}" alt="REI">
                    </div>
                </div>

                <div class="brand-item">
                    <div class="brand-card">
                        <img src="{{ asset('assets/img/brands/TENDAKI.png') }}" alt="Tendaki">
                    </div>
                </div>

                <div class="brand-item">
                    <div class="brand-card">
                        <img src="{{ asset('assets/img/brands/CONSINA.png') }}" alt="Consina">
                    </div>
                </div>

                <div class="brand-item">
                    <div class="brand-card">
                        <img src="{{ asset('assets/img/brands/ANTARESTAR.png') }}" alt="Antarestar">
                    </div>
                </div>

                <div class="brand-item">
                    <div class="brand-card">
                        <img src="{{ asset('assets/img/brands/TNF.png') }}" alt="The North Face">
                    </div>
                </div>

                {{-- Set Kedua: Duplikat untuk seamless infinite loop --}}
                <div class="brand-item">
                    <div class="brand-card">
                        <img src="{{ asset('assets/img/brands/EIGER.png') }}" alt="EIGER">
                    </div>
                </div>

                <div class="brand-item">
                    <div class="brand-card">
                        <img src="{{ asset('assets/img/brands/REI.png') }}" alt="REI">
                    </div>
                </div>

                <div class="brand-item">
                    <div class="brand-card">
                        <img src="{{ asset('assets/img/brands/TENDAKI.png') }}" alt="Tendaki">
                    </div>
                </div>

                <div class="brand-item">
                    <div class="brand-card">
                        <img src="{{ asset('assets/img/brands/CONSINA.png') }}" alt="Consina">
                    </div>
                </div>

                <div class="brand-item">
                    <div class="brand-card">
                        <img src="{{ asset('assets/img/brands/ANTARESTAR.png') }}" alt="Antarestar">
                    </div>
                </div>

                <div class="brand-item">
                    <div class="brand-card">
                        <img src="{{ asset('assets/img/brands/TNF.png') }}" alt="The North Face">
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
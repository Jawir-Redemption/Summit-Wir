<footer class="bg-gray-100 text-gray-700 pt-12 pb-6 mt-16 border-t border-gray-200">
    <div class="max-w-7xl mx-auto px-6 flex justify-between">
        {{-- Kolom 2: Navigasi --}}

        {{-- Kolom 1: Brand & Deskripsi --}}
        <div class="w-1/4">
            <div class="flex items-center space-x-2 mb-4">
                <img src="{{ asset('assets/img/logo-s.png') }}" alt="SummitWirr Logo" class="h-10 w-auto">
                <h5 class="text-xl font-bold text-gray-800">SummitWirr</h5>
            </div>
            <p class="text-sm leading-relaxed text-gray-600">
                Perlengkapan outdoor terbaik untuk setiap petualangan.
                Sewa atau beli alat pendakian dan camping berkualitas tinggi di SummitWirr.
            </p>
            <div class="flex space-x-4 mt-4 text-gray-500">
                <a href="#" class="hover:text-blue-600 transition"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="hover:text-blue-600 transition"><i class="fab fa-instagram"></i></a>
                <a href="#" class="hover:text-blue-600 transition"><i class="fab fa-twitter"></i></a>
                <a href="#" class="hover:text-blue-600 transition"><i class="fab fa-youtube"></i></a>
            </div>
        </div>

        {{-- Kolom 3: Bantuan --}}
        <div class="w-1/4">
            <h6 class="text-gray-900 font-semibold mb-4">Bantuan</h6>
            <ul class="space-y-2">
                <li><a href="#" class="hover:text-blue-600 transition">Cara Belanja</a></li>
                <li><a href="#" class="hover:text-blue-600 transition">Pengembalian Barang</a></li>
                <li><a href="#" class="hover:text-blue-600 transition">Kebijakan Privasi</a></li>
                <li><a href="#" class="hover:text-blue-600 transition">Syarat & Ketentuan</a></li>
            </ul>
        </div>

        {{-- Kolom 4: Kontak --}}
        <div class="w-1/4">
            <h6 class="text-gray-900 font-semibold mb-4">Hubungi Kami</h6>
            <ul class="space-y-2 text-sm">
                <li><i class="fas fa-map-marker-alt mr-2 text-blue-500"></i>Kantor Summit Wir, Telkom University
                    Purwokerto</li>
                <li><i class="fas fa-phone mr-2 text-blue-500"></i>(021) 555-1234</li>
                <li><i class="fas fa-envelope mr-2 text-blue-500"></i>summitwir@example.com</li>
            </ul>


        </div>
    </div>

    <hr class="border-gray-300 my-8">

    {{-- Footer bawah --}}
    <div class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row justify-between items-center text-sm text-gray-500">
        <p class="mb-2 md:mb-0">&copy; 2025 <span class="text-gray-800 font-semibold">SummitWirr</span>. All rights
            reserved.</p>
        <p>Dibuat dengan <span class="text-red-500">❤️</span> oleh SummitWirr Team</p>
    </div>
</footer>

{{-- Pastikan font awesome dimuat di layout --}}
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

@extends('layouts.customer')

@section('title', 'Cara Sewa | SummitWirr')

@section('content')
    <!-- Hero Section --> 
    <div class="bg-gray-50 py-8 md:py-12 lg:py-16"> 
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Hero Box with Background Image -->
            <div class="relative h-64 md:h-80 lg:h-96 rounded-xl md:rounded-2xl overflow-hidden shadow-xl">
                <!-- Background Image with Overlay -->
                <div class="absolute inset-0">
                    <img src="{{ asset('assets/img/bg-2.jpg') }}" 
                         alt="Hero Background" 
                         class="w-full h-full object-cover">
                </div>
                
                <!-- Hero Content -->
                <div class="relative h-full flex flex-col justify-center px-6 md:px-12 lg:px-16">
                    
                    <h1 class="text-2xl md:text-4xl lg:text-5xl font-bold text-white mb-3 md:mb-4">
                        Cara Pemesanan di SummitWirr
                    </h1>
                    
                    <div class="flex flex-wrap items-center text-white text-xs md:text-sm gap-3 md:gap-4">
                        <span class="flex items-center">
                            <svg class="w-4 h-4 md:w-5 md:h-5 mr-1.5 md:mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            Dari Hanif Ganteng
                        </span>
                        <span class="flex items-center">
                            <svg class="w-4 h-4 md:w-5 md:h-5 mr-1.5 md:mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            Update {{ date('d M Y') }}
                        </span>
                        <span class="flex items-center">
                            <svg class="w-4 h-4 md:w-5 md:h-5 mr-1.5 md:mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            2 menit dibaca
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 md:py-12 lg:py-16">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 md:gap-8 lg:gap-12">
            
            <!-- Left Content -->
            <div class="lg:col-span-2">
                
                <!-- Intro Section -->
                <div class="mb-8 md:mb-12">
                    <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-3 md:mb-4">
                        CARA SEWA
                    </h2>
                    <h3 class="text-lg md:text-xl font-semibold text-gray-700 mb-4 md:mb-6">
                        Panduan Penyewaan Peralatan di SummitWirr
                    </h3>
                    <p class="text-sm md:text-base text-gray-600 leading-relaxed">
                        Sebagai penyedia layanan penyewaan peralatan pendakian dan kegiatan outdoor, SummitWirr berkomitmen memberikan 
                        kemudahan dan kenyamanan dalam setiap proses pemesanan. Berikut langkah-langkah yang perlu Anda ikuti:
                    </p>
                </div>

                <!-- Step by Step Guide -->
                <div class="space-y-6 md:space-y-8 scroll-animate delay-1">
                    
                    <!-- Step 1 -->
                    <div class="bg-white rounded-lg md:rounded-xl shadow-sm border border-gray-200 p-4 md:p-6 lg:p-8 hover:shadow-md transition-shadow">
                        <div class="flex flex-col sm:flex-row items-start gap-4">
                            <div class="flex-shrink-0 w-10 h-10 md:w-12 md:h-12 bg-gradient-to-br from-emerald-600 to-teal-600 text-white rounded-full flex items-center justify-center font-bold text-base md:text-lg shadow-lg">
                                1
                            </div>
                            
                            <div class="flex-1 w-full">
                                <h4 class="text-lg md:text-xl font-bold text-gray-900 mb-2 md:mb-3">
                                    Periksa Ketersediaan Peralatan
                                </h4>
                                <p class="text-sm md:text-base text-gray-600 mb-3 md:mb-4">
                                    Silakan kunjungi halaman katalog produk SummitWirr untuk melihat daftar peralatan yang tersedia untuk disewa. 
                                    Informasi tersebut diperbarui secara berkala agar Anda dapat merencanakan kegiatan dengan lebih tepat.
                                </p>
                                
                                <div class="bg-emerald-50 border-l-4 border-emerald-600 p-3 md:p-4 rounded">
                                    <p class="text-xs md:text-sm text-emerald-900">
                                        <strong>Tips:</strong> Pastikan Anda mengecek ketersediaan jauh-jauh hari, terutama pada musim liburan atau akhir pekan.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Step 2 -->
                    <div class="bg-white rounded-lg md:rounded-xl shadow-sm border border-gray-200 p-4 md:p-6 lg:p-8 hover:shadow-md transition-shadow">
                        <div class="flex flex-col sm:flex-row items-start gap-4">
                            <div class="flex-shrink-0 w-10 h-10 md:w-12 md:h-12 bg-gradient-to-br from-emerald-600 to-teal-600 text-white rounded-full flex items-center justify-center font-bold text-base md:text-lg shadow-lg">
                                2
                            </div>
                            
                            <div class="flex-1 w-full">
                                <h4 class="text-lg md:text-xl font-bold text-gray-900 mb-2 md:mb-3">
                                    Pastikan Anda Telah Terdaftar sebagai Anggota
                                </h4>
                                <p class="text-sm md:text-base text-gray-600 mb-3 md:mb-4">
                                    Layanan penyewaan hanya tersedia bagi pengguna yang telah menjadi anggota resmi SummitWirr.
                                </p>
                                
                                <ul class="space-y-2 md:space-y-3 mb-3 md:mb-4">
                                    <li class="flex items-start text-sm md:text-base text-gray-700">
                                        <svg class="w-5 h-5 md:w-6 md:h-6 text-emerald-600 mr-2 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <span>Jika Anda belum memiliki akun, silakan lakukan pendaftaran terlebih dahulu melalui website kami.</span>
                                    </li>
                                    <li class="flex items-start text-sm md:text-base text-gray-700">
                                        <svg class="w-5 h-5 md:w-6 md:h-6 text-emerald-600 mr-2 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <span>Panduan lengkap mengenai proses registrasi tersedia di laman keanggotaan.</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Step 3 -->
                    <div class="bg-white rounded-lg md:rounded-xl shadow-sm border border-gray-200 p-4 md:p-6 lg:p-8 hover:shadow-md transition-shadow">
                        <div class="flex flex-col sm:flex-row items-start gap-4">
                            <div class="flex-shrink-0 w-10 h-10 md:w-12 md:h-12 bg-gradient-to-br from-emerald-600 to-teal-600 text-white rounded-full flex items-center justify-center font-bold text-base md:text-lg shadow-lg">
                                3
                            </div>
                            
                            <div class="flex-1 w-full">
                                <h4 class="text-lg md:text-xl font-bold text-gray-900 mb-2 md:mb-3">
                                    Pilih Barang dan Lakukan Transaksi melalui Website
                                </h4>
                                <p class="text-sm md:text-base text-gray-600 mb-3 md:mb-4">
                                    Setelah memastikan Anda tex`lah menjadi anggota, silakan pilih peralatan yang diinginkan melalui website SummitWirr:
                                </p>
                                
                                <ul class="space-y-2 md:space-y-3">
                                    <li class="flex items-start text-sm md:text-base text-gray-700">
                                        <svg class="w-5 h-5 md:w-6 md:h-6 text-emerald-600 mr-2 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                        </svg>
                                        <span>Pilih produk yang ingin disewa dari katalog</span>
                                    </li>
                                    <li class="flex items-start text-sm md:text-base text-gray-700">
                                        <svg class="w-5 h-5 md:w-6 md:h-6 text-emerald-600 mr-2 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        <span>Tentukan tanggal mulai dan durasi sewa yang diinginkan</span>
                                    </li>
                                    <li class="flex items-start text-sm md:text-base text-gray-700">
                                        <svg class="w-5 h-5 md:w-6 md:h-6 text-emerald-600 mr-2 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                        </svg>
                                        <span>Masukkan produk ke keranjang dan lanjutkan ke checkout</span>
                                    </li>
                                    <li class="flex items-start text-sm md:text-base text-gray-700">
                                        <svg class="w-5 h-5 md:w-6 md:h-6 text-emerald-600 mr-2 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                        <span>Isi data pemesanan dengan lengkap dan benar</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Step 4 -->
                    <div class="bg-white rounded-lg md:rounded-xl shadow-sm border border-gray-200 p-4 md:p-6 lg:p-8 hover:shadow-md transition-shadow">
                        <div class="flex flex-col sm:flex-row items-start gap-4">
                            <div class="flex-shrink-0 w-10 h-10 md:w-12 md:h-12 bg-gradient-to-br from-emerald-600 to-teal-600 text-white rounded-full flex items-center justify-center font-bold text-base md:text-lg shadow-lg">
                                4
                            </div>
                            
                            <div class="flex-1 w-full">
                                <h4 class="text-lg md:text-xl font-bold text-gray-900 mb-2 md:mb-3">
                                    Transfer DP 50% untuk Konfirmasi Booking
                                </h4>
                                <p class="text-sm md:text-base text-gray-600 mb-3 md:mb-4">
                                    Setelah melakukan pemesanan, Anda perlu membayar Down Payment (DP) sebesar 50% dari total biaya sewa 
                                    untuk mengkonfirmasi booking Anda.
                                </p>
                                
                                <div class="bg-amber-50 border-l-4 border-amber-500 p-3 md:p-4 rounded mb-3 md:mb-4">
                                    <p class="text-xs md:text-sm text-amber-900">
                                        <strong>Penting:</strong> Booking akan dikonfirmasi setelah pembayaran DP diterima. Sisanya 50% dibayar saat pengambilan barang.
                                    </p>
                                </div>
                                
                                <ul class="space-y-2 md:space-y-3">
                                    <li class="flex items-start text-sm md:text-base text-gray-700">
                                        <svg class="w-5 h-5 md:w-6 md:h-6 text-emerald-600 mr-2 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                                        </svg>
                                        <span>Lakukan transfer ke rekening yang tertera pada halaman checkout</span>
                                    </li>
                                    <li class="flex items-start text-sm md:text-base text-gray-700">
                                        <svg class="w-5 h-5 md:w-6 md:h-6 text-emerald-600 mr-2 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                        <span>Upload bukti pembayaran melalui sistem kami</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Step 5 -->
                    <div class="bg-white rounded-lg md:rounded-xl shadow-sm border border-gray-200 p-4 md:p-6 lg:p-8 hover:shadow-md transition-shadow">
                        <div class="flex flex-col sm:flex-row items-start gap-4">
                            <div class="flex-shrink-0 w-10 h-10 md:w-12 md:h-12 bg-gradient-to-br from-emerald-600 to-teal-600 text-white rounded-full flex items-center justify-center font-bold text-base md:text-lg shadow-lg">
                                5
                            </div>
                            
                            <div class="flex-1 w-full">
                                <h4 class="text-lg md:text-xl font-bold text-gray-900 mb-2 md:mb-3">
                                    Ambil Produk yang Dipesan
                                </h4>
                                <p class="text-sm md:text-base text-gray-600 mb-3 md:mb-4">
                                    Setelah pembayaran dikonfirmasi, Anda dapat mengambil peralatan yang telah dipesan pada tanggal yang telah ditentukan.
                                </p>
                                
                                <div class="bg-gray-50 rounded-lg p-3 md:p-4 mb-3 md:mb-4">
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 md:w-6 md:h-6 text-emerald-600 mr-2 md:mr-3 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                        <div>
                                            <p class="font-semibold text-gray-900 mb-1 text-sm md:text-base">Lokasi Pengambilan:</p>
                                            <p class="text-gray-700 text-sm md:text-base">Kantor SummitWirr</p>
                                            <p class="text-gray-700 text-sm md:text-base">Telkom University Purwokerto</p>
                                        </div>
                                    </div>
                                </div>
                                
                                <ul class="space-y-2 md:space-y-3">
                                    <li class="flex items-start text-sm md:text-base text-gray-700">
                                        <svg class="w-5 h-5 md:w-6 md:h-6 text-emerald-600 mr-2 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2" />
                                        </svg>
                                        <span>Bawa kartu identitas dan bukti pemesanan</span>
                                    </li>
                                    <li class="flex items-start text-sm md:text-base text-gray-700">
                                        <svg class="w-5 h-5 md:w-6 md:h-6 text-emerald-600 mr-2 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                                        </svg>
                                        <span>Periksa kondisi barang bersama petugas sebelum dibawa</span>
                                    </li>
                                    <li class="flex items-start text-sm md:text-base text-gray-700">
                                        <svg class="w-5 h-5 md:w-6 md:h-6 text-emerald-600 mr-2 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                                        </svg>
                                        <span>Selesaikan pelunasan 50% sisanya</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Additional Info -->
                <div class="mt-8 md:mt-12 bg-gradient-to-br from-emerald-50 to-teal-50 rounded-lg md:rounded-xl p-4 md:p-6 lg:p-8 border border-emerald-100 scroll-animate delay-2 ">
                    <h4 class="text-lg md:text-xl font-bold text-gray-900 mb-3 md:mb-4 flex items-center">
                        <svg class="w-5 h-5 md:w-6 md:h-6 mr-2 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Informasi Penting
                    </h4>
                    <ul class="space-y-2 md:space-y-3 text-sm md:text-base text-gray-700">
                        <li class="flex items-start">
                            <svg class="w-4 h-4 md:w-5 md:h-5 text-emerald-600 mr-2 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            <span>Pastikan mengembalikan peralatan tepat waktu untuk menghindari biaya keterlambatan</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-4 h-4 md:w-5 md:h-5 text-emerald-600 mr-2 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            <span>Jaga kondisi peralatan dengan baik selama masa sewa</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-4 h-4 md:w-5 md:h-5 text-emerald-600 mr-2 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            <span>Hubungi kami jika terjadi kerusakan atau kendala selama pemakaian</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Right Sidebar -->
            <div class="lg:col-span-1">
                <div class="lg:sticky lg:top-6 space-y-4 md:space-y-6">

                    <!-- Contact Card -->
                    <div class="bg-gradient-to-br from-emerald-600 to-teal-600 rounded-lg md:rounded-xl p-4 md:p-6 text-white shadow-lg scroll-animate delay-3">
                        <h3 class="text-base md:text-lg font-bold mb-2">
                            Butuh Bantuan?
                        </h3>
                        <p class="text-emerald-100 text-xs md:text-sm mb-3 md:mb-4">
                            Tim kami siap membantu Anda
                        </p>
                        <a href="mailto:summitwir@gmail.com" class="inline-flex items-center justify-center w-full bg-white text-emerald-600 font-semibold py-2 md:py-2.5 px-4 rounded-lg hover:bg-emerald-50 transition-colors text-sm md:text-base shadow-md">
                            <svg class="w-4 h-4 md:w-5 md:h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            Hubungi Kami
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
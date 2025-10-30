@extends('layouts.app')
@section('title', 'Dashboard - Summit Wir')
@section('content')
    <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Produk
        </h2>
        <!-- New Table -->
        <div class="w-full overflow-hidden rounded-lg shadow-xs mb-8">
            <div class="w-full overflow-x-auto">
                <a href="{{ route('admin.products.create') }}"
                    class="inline-block px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    Tambah Produk
                </a><br><br>
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">No</th>
                            <th class="px-4 py-3">Nama Produk</th>
                            <th class="px-4 py-3">Deskripsi</th>
                            <th class="px-4 py-3">Harga</th>
                            <th class="px-4 py-3">Stok</th>
                            <th class="px-4 py-3">Gambar</th>
                            <th class="px-4 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @foreach ($products as $product)
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td class="px-4 py-3 text-sm">
                                    {{ $loop->iteration }}
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ $product->name }}
                                </td>
                                <td class="px-4 py-3 text-xs">
                                    {{ $product->description }}
                                </td>
                                <td class="px-4 py-3 text-xs">
                                    {{ $product->price }}
                                </td>
                                <td class="px-4 py-3 text-xs">
                                    {{ $product->stock }}
                                </td>
                                <td class="px-4 py-3 text-xs">
                                    {{ $product->image }}
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    <div class="flex items-center space-x-2">
                                        {{-- Tombol Lihat --}}
                                        <a href="{{ route('admin.products.show', $product->id) }}"
                                            class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-1 px-3 rounded-md transition-colors duration-200">
                                            Lihat
                                        </a>

                                        {{-- Tombol Edit --}}
                                        <a href="{{ route('admin.products.edit', $product->id) }}"
                                            class="bg-amber-400 hover:bg-amber-500 text-white font-semibold py-1 px-3 rounded-md transition-colors duration-200">
                                            Edit
                                        </a>

                                        {{-- Tombol Hapus --}}
                                        <form id="delete-form-{{ $product->id }}"
                                            action="{{ route('admin.products.destroy', $product->id) }}" method="POST"
                                            class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" onclick="confirmDelete('{{ $product->id }}')"
                                                class="bg-red-600 hover:bg-red-700 text-white font-semibold py-1 px-3 rounded-md transition-colors duration-200">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $products->links('vendor.pagination.table') }}
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script>
                    function confirmDelete(productId) {
                        Swal.fire({
                            title: 'Yakin ingin menghapus produk ini?',
                            text: "Data yang dihapus tidak bisa dikembalikan!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#e3342f',
                            cancelButtonColor: '#6b7280',
                            confirmButtonText: 'Ya, hapus!',
                            cancelButtonText: 'Batal',
                            background: '#1f2937',
                            color: '#fff'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                document.getElementById('delete-form-' + productId).submit();
                            }
                        });
                    }
                </script>
            </div>
        </div>
    </div>
@endsection

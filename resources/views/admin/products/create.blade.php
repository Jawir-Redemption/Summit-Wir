@extends('layouts.app')
@section('title', 'Summit Wir')
@section('content')
    <div class="container px-6 mx-auto grid">
        <section class="section">
            <div class="section-body">
                @if (session('error'))
                    <div class="mt-3 p-3 text-sm text-red-700 bg-red-100 rounded-lg">
                        {{ session('error') }}
                    </div>
                @endif

                @error('name')
                    <p>{{ $message }}</p>
                @enderror
                @error('description')
                    <p>{{ $message }}</p>
                @enderror
                @error('price')
                    <p>{{ $message }}</p>
                @enderror
                @error('stock')
                    <p>{{ $message }}</p>
                @enderror
                @error('category_id')
                    <p>{{ $message }}</p>
                @enderror
                @error('image')
                    <p>{{ $message }}</p>
                @enderror
                <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                    Tambah Produk
                </h2>
                <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Nama Produk</span>
                            <input name="name" value="{{ old('name') }}"
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700
                                       focus:border-purple-400 focus:outline-none focus:shadow-outline-purple
                                       dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                placeholder="masukkan nama produk" />
                            @error('name')
                                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </label>

                        <label class="block mt-4 text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Kategori</span>
                            <select name="category_id"
                                class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700
                                       form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple
                                       dark:focus:shadow-outline-gray">
                                <option value="">--- Pilih Kategori ---</option>
                                <option value="1">Tents</option>
                                <option value="2">Backpack</option>
                                <option value="3">Cooking gear</option>
                                <option value="4">Clothing</option>
                                <option value="5">Lighting</option>
                            </select>
                            @error('category_id')
                                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </label>

                        <label class="block mt-4 text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Deskripsi</span>
                            <textarea name="description" rows="3"
                                class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700
                                       form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple
                                       dark:focus:shadow-outline-gray"
                                placeholder="masukkan deskripsi">{{ old('description') }}</textarea>
                        </label>

                        <label class="block mt-4 text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Harga</span>
                            <input name="price" value="{{ old('price') }}"
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700
                                       focus:border-purple-400 focus:outline-none focus:shadow-outline-purple
                                       dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                placeholder="masukkan harga" />
                            @error('price')
                                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </label>

                        <label class="block mt-4 text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Stok</span>
                            <input name="stock" value="{{ old('stock') }}"
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700
                                       focus:border-purple-400 focus:outline-none focus:shadow-outline-purple
                                       dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                placeholder="masukkan stok" />
                            @error('stock')
                                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </label>

                        <label class="block mt-4 text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Gambar Produk</span>
                            <input type="file" name="image" accept="image/*"
                                class="block w-full mt-1 text-sm text-gray-700 dark:text-gray-300
                                       border border-gray-300 dark:border-gray-600 rounded-lg cursor-pointer
                                       bg-white dark:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-purple-400 focus:border-purple-400" />
                            @error('image')
                                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </label>

                        <button type="submit"
                            class="px-4 py-2 mt-6 font-medium leading-5 text-white transition-colors duration-150
                                   bg-purple-600 border border-transparent rounded-lg active:bg-purple-600
                                   hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                            Submit
                        </button>

                        @if (session('error'))
                            <div class="mt-4 p-3 text-sm text-red-700 bg-red-100 rounded-lg">
                                {{ session('error') }}
                            </div>
                        @endif
                        @if (session('success'))
                            <div class="mt-4 p-3 text-sm text-green-700 bg-green-100 rounded-lg">
                                {{ session('success') }}
                            </div>
                        @endif
                    </form>
                </div>

        </section>
    </div>
@endsection

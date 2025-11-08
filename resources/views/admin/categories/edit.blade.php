@extends('layouts.app')
@section('title', 'Summit Wir')
@section('content')
    <div class="container px-6 mx-auto grid">
        <section class="section">
            <div class="section-body">
                <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                    Edit Kategori
                </h2>
                <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                    <form action="{{ route('admin.categories.update', $category->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Nama Kategori</span>
                            <input name="category" value="{{ old('category', $category->category) }}"
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700
                                       focus:border-purple-400 focus:outline-none focus:shadow-outline-purple
                                       dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                placeholder="masukkan nama kategori" />
                        </label>
                        <button type="submit"
                            class="px-4 py-2 mt-6 font-medium leading-5 text-white transition-colors duration-150
                                   bg-purple-600 border border-transparent rounded-lg active:bg-purple-600
                                   hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                            Submit
                        </button>
                    </form>
                </div>
        </section>
    </div>
@endsection

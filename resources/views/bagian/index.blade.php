@extends('components.layouts.main')

@section('title', 'Bagian')

@section('content')
    <div class="bg-slate-800/90 p-4 rounded-xl shadow w-full">
        <h1 class="text-2xl font-bold mb-4 text-white">Data Bagian</h1>

        {{-- Tombol Tambah & Pencarian --}}
        <div class="flex justify-between mb-4">
            <input 
                type="text" 
                id="search" 
                placeholder="Cari ID atau Nama..." 
                class="bg-slate-700/70 text-gray-200 placeholder-gray-400 border border-slate-600 p-2 rounded-lg w-64 focus:ring-2 focus:ring-blue-500 focus:outline-none" 
                oninput="searchBagian()">

            <button onclick="openAddModal()"
                class="bg-blue-500 text-white px-4 py-2 rounded">
                Tambah Data
            </button>
        </div>

        {{-- Tabel Data --}}
        <table class="w-full border border-slate-700 rounded-lg overflow-hidden">
            <thead class="bg-slate-700 text-gray-300 uppercase text-xs">
                <tr>
                    <th class="border border-slate-600 p-2 text-center">ID</th>
                    <th class="border border-slate-600 p-2">Nama</th>
                    <th class="border border-slate-600 p-2 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody id="dataBagian">
                <tr>
                        <td colspan="3" class="text-center p-4 text-gray-500">
                            <div class="flex flex-col items-center">
                                <svg class="w-12 h-12 text-gray-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                <p>Loading data...</p>
                                <p class="text-sm">If this message persists, check your connection or try refreshing the page.</p>
                            </div>
                        </td>
                    </tr>   
            </tbody>
        </table>
    </div>

    {{-- Include Modal Tambah --}}
    @include('components.bagian.modal-add')

    {{-- Include Modal Edit --}}
    @include('components.bagian.modal-edit')

    {{-- Script --}}
    <script src="{{ asset('js/bagian/bagian.js') }}"></script>
    <script src="{{ asset('js/bagian/bagian.create.js') }}"></script>
    <script src="{{ asset('js/bagian/bagian.edit.js') }}"></script>
@endsection
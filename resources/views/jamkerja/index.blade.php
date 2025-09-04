@extends('components.layouts.main')

@section('title', 'JamKerja')

@section('content')
    <div class="bg-slate-800/90 p-4 rounded-xl shadow w-full">
        <h1 class="text-2xl font-bold mb-4 text-white">Data Jam Kerja</h1>

        {{-- Tombol Tambah & Pencarian --}}
        <div class="flex justify-between mb-4">
            <input
                type="text"
                id="search"
                placeholder="Cari Nama atau Keterangan..."
                class="bg-slate-700/70 text-gray-200 placeholder-gray-400 border border-slate-600 p-2 rounded-lg w-64 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                oninput="searchJamKerja()">

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
                    <th class="border border-slate-600 p-2">Jam Mulai</th>
                    <th class="border border-slate-600 p-2">Jam Selesai</th>
                    <th class="border border-slate-600 p-2">Keterangan</th>
                    <th class="border border-slate-600 p-2 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody id="dataJamKerja" class="divide-y divide-slate-700 text-gray-200"></tbody>
        </table>
    </div>

    {{-- Include Modal Tambah --}}
    @include('components.jamkerja.modal-add')

    {{-- Include Modal Edit --}}
    @include('components.jamkerja.modal-edit')

    {{-- Script --}}
    <script src="{{ asset('js/jamkerja/jamkerja.js') }}"></script>
    <script src="{{ asset('js/jamkerja/jamkerja-create.js') }}"></script>
    <script src="{{ asset('js/jamkerja/jamkerja-edit.js') }}"></script>
@endsection

@extends('components.layouts.main')

@section('title', 'UserProfile')

@section('content')
    <div class="bg-slate-800/90 p-4 rounded-xl shadow w-full">
        <h1 class="text-2xl font-bold mb-4 text-white">Data User Profile</h1>

        {{-- Tombol Tambah & Pencarian --}}
        <div class="flex justify-between mb-4">
            <input
                type="text"
                id="search"
                placeholder="Cari Nama Lengkap atau NRP..."
                class="bg-slate-700/70 text-gray-200 placeholder-gray-400 border border-slate-600 p-2 rounded-lg w-64 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                oninput="searchUserProfile()">

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
                    <th class="border border-slate-600 p-2">Nama Lengkap</th>
                    <th class="border border-slate-600 p-2">NRP</th>
                    <th class="border border-slate-600 p-2">Alamat</th>
                    <th class="border border-slate-600 p-2">Bagian</th>
                    <th class="border border-slate-600 p-2">Level</th>
                    <th class="border border-slate-600 p-2">Status</th>
                    <th class="border border-slate-600 p-2 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody id="dataUserProfile" class="divide-y divide-slate-700 text-gray-200"></tbody>
        </table>
    </div>

    {{-- Include Modal Tambah --}}
    @include('components.userprofile.modal-add')

    {{-- Include Modal Edit --}}
    @include('components.userprofile.modal-edit')

    {{-- Script --}}
    <script src="{{ asset('js/userprofile/userprofile.js') }}"></script>
    <script src="{{ asset('js/userprofile/userprofile-create.js') }}"></script>
    <script src="{{ asset('js/userprofile/userprofile-edit.js') }}"></script>
@endsection

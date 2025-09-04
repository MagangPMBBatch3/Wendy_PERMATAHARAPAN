@extends('components.layouts.main')

@section('title', 'Status Jam Kerja')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6">Status Jam Kerja</h1>

    <!-- Search Bar -->
    <div class="mb-4">
        <input type="text" id="searchStatusJamKerja" placeholder="Cari berdasarkan ID atau Nama..." class="border p-2 rounded w-full" onkeyup="searchStatusJamKerja()">
    </div>

    <!-- Tabs for Active and Archive -->
    <div class="mb-4">
        <button onclick="showTab('active')" class="px-4 py-2 bg-blue-500 text-white rounded mr-2" id="tabActive">Aktif</button>
        <button onclick="showTab('archive')" class="px-4 py-2 bg-gray-500 text-white rounded" id="tabArchive">Arsip</button>
    </div>

    <!-- Add Button -->
    <div class="mb-4">
        <button onclick="openAddStatusJamKerjaModal()" class="px-4 py-2 bg-green-500 text-white rounded">Tambah Status Jam Kerja</button>
    </div>

    <!-- Active Data Table -->
    <div id="activeContent">
        <h2 class="text-xl font-semibold mb-4">Data Aktif</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="border p-2">ID</th>
                        <th class="border p-2">Nama</th>
                        <th class="border p-2">Aksi</th>
                    </tr>
                </thead>
                <tbody id="statusJamKerjaTableBody">
                    <tr>
                        <td colspan="3" class="text-center p-4 text-gray-500">
                            <div class="flex flex-col items-center">
                                <svg class="w-12 h-12 text-gray-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
+                                </svg>
+                                <p>Loading data...</p>
+                                <p class="text-sm">If this message persists, check your connection or try refreshing the page.</p>
+                            </div>
+                        </td>
+                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Archive Data Table -->
    <div id="archiveContent" class="hidden">
        <h2 class="text-xl font-semibold mb-4">Data Arsip</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="border p-2">ID</th>
                        <th class="border p-2">Nama</th>
                        <th class="border p-2">Deleted At</th>
                        <th class="border p-2">Aksi</th>
                    </tr>
                </thead>
                <tbody id="statusJamKerjaArsipTableBody">
                    <!-- Data will be loaded here -->
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Include Modals -->
@include('components.statusjamkerja.modal-add')
@include('components.statusjamkerja.modal-edit')

<!-- Include JavaScript -->
<script src="{{ asset('js/statusjamkerja/statusjamkerja.js') }}"></script>
<script src="{{ asset('js/statusjamkerja/statusjamkerja-create.js') }}"></script>
<script src="{{ asset('js/statusjamkerja/statusjamkerja-edit.js') }}"></script>
@endsection

@extends('components.layouts.main')

@section('title', 'Jam Per Tanggal')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6">Jam Per Tanggal</h1>

    <!-- Search Bar -->
    <div class="mb-4">
        <input type="text" id="searchJamPerTanggal" placeholder="Cari berdasarkan ID atau No WBS..." class="border p-2 rounded w-full" onkeyup="searchJamPerTanggal()">
    </div>

    <!-- Tabs for Active and Archive -->
    <div class="mb-4">
        <button onclick="showTab('active')" class="px-4 py-2 bg-blue-500 text-white rounded mr-2" id="activeTab">Aktif</button>
        <button onclick="showTab('archive')" class="px-4 py-2 bg-gray-500 text-white rounded" id="archiveTab">Arsip</button>
    </div>

    <!-- Add Button -->
    <div class="mb-4">
        <button onclick="openAddJamPerTanggalModal()" class="px-4 py-2 bg-green-500 text-white rounded">Tambah Jam Per Tanggal</button>
    </div>

    <!-- Active Data Table -->
    <div id="activeContent">
        <h2 class="text-xl font-semibold mb-4">Data Aktif</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="border p-2">ID</th>
                        <th class="border p-2">Bagian ID</th>
                        <th class="border p-2">No WBS</th>
                        <th class="border p-2">Proyek ID</th>
                        <th class="border p-2">Tanggal</th>
                        <th class="border p-2">Jam</th>
                        <th class="border p-2">Aksi</th>
                    </tr>
                </thead>
                <tbody id="jamPerTanggalTableBody">
                    <tr>
                        <td colspan="7" class="text-center p-4 text-gray-500">
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
    </div>

    <!-- Archive Data Table -->
    <div id="archiveContent" class="hidden">
        <h2 class="text-xl font-semibold mb-4">Data Arsip</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="border p-2">ID</th>
                        <th class="border p-2">Bagian ID</th>
                        <th class="border p-2">No WBS</th>
                        <th class="border p-2">Proyek ID</th>
                        <th class="border p-2">Tanggal</th>
                        <th class="border p-2">Jam</th>
                        <th class="border p-2">Deleted At</th>
                        <th class="border p-2">Aksi</th>
                    </tr>
                </thead>
                <tbody id="jamPerTanggalArsipTableBody">
                    <!-- Data will be loaded here -->
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Include Modals -->
@include('components.jampertanggal.modal-add')
@include('components.jampertanggal.modal-edit')

<!-- Include JavaScript -->
<script src="{{ asset('js/jampertanggal/jampertanggal.js') }}"></script>
<script src="{{ asset('js/jampertanggal/jampertanggal-create.js') }}"></script>
<script src="{{ asset('js/jampertanggal/jampertanggal-edit.js') }}"></script>


@endsection

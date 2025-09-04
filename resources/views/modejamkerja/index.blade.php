@extends('components.layouts.main')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-4">Mode Jam Kerja</h1>

    <div class="mb-4">
        <button onclick="openAddModeJamKerjaModal()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Tambah Mode Jam Kerja
        </button>
    </div>

    <input type="text" id="searchModeJamKerja" placeholder="Cari Mode Jam Kerja..." class="border p-2 mb-4 w-full" oninput="searchModeJamKerja()">

    <table class="table-auto w-full border-collapse border border-gray-300">
        <thead>
            <tr>
                <th class="border border-gray-300 px-4 py-2">ID</th>
                <th class="border border-gray-300 px-4 py-2">Nama</th>
                <th class="border border-gray-300 px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody id="modeJamKerjaTableBody">
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

@include('components.modejamkerja.modal-add')
@include('components.modejamkerja.modal-edit')

<script src="{{ asset('js/modejamkerja/modejamkerja.js') }}"></script>
<script src="{{ asset('js/modejamkerja/modejamkerja-create.js') }}"></script>
<script src="{{ asset('js/modejamkerja/modejamkerja-edit.js') }}"></script>
@endsection

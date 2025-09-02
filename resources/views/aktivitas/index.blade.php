<x-layouts.main title="Data Aktivitas">
  <div class="bg-white p-6 rounded-lg shadow-lg w-full space-y-6">
    <h1 class="text-3xl font-bold text-gray-800">📊 Data Aktivitas</h1>

    {{-- Tombol Tambah & Pencarian --}}
    <div class="flex flex-col md:flex-row md:justify-between items-start md:items-center gap-4">
      <input type="text" id="searchAktivitas" placeholder="Cari ID, No WBS, Nama atau Deskripsi..."
        class="border border-gray-300 p-2 rounded-md w-full md:w-72 focus:outline-none focus:ring-2 focus:ring-blue-400"
        oninput="searchAktivitas()">
      <button onclick="openAddAktivitasModal()"
        class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-md transition duration-200">
        ➕ Tambah Data
      </button>
    </div>

    {{-- Tabs Aktif / Arsip --}}
    <div class="flex space-x-2 border-b pb-2">
      <button onclick="showTab('aktif')" id="tabAktif"
        class="px-4 py-2 font-semibold rounded-t bg-blue-600 text-white transition duration-200">
        Data Aktif
      </button>
      <button onclick="showTab('arsip')" id="tabArsip"
        class="px-4 py-2 font-semibold rounded-t bg-gray-200 text-gray-700 hover:bg-gray-300 transition duration-200">
        Data Arsip
      </button>
    </div>

    {{-- Tabel Data Aktif --}}
    <div id="tableAktif">
      <table class="w-full border border-gray-300 rounded-md overflow-hidden">
        <thead class="bg-gray-100 text-left">
          <tr>
            <th class="p-3 border-b">ID</th>
            <th class="p-3 border-b">No WBS</th>
            <th class="p-3 border-b">Nama</th>
            <th class="p-3 border-b">Deskripsi</th>
            <th class="p-3 border-b">Aksi</th>
          </tr>
        </thead>
        <tbody id="dataAktivitas" class="divide-y divide-gray-200">
          {{-- Data akan dimasukkan di sini --}}
        </tbody>
      </table>
    </div>

    {{-- Tabel Data Arsip --}}
    <div id="tableArsip" class="hidden">
      <table class="w-full border border-gray-300 rounded-md overflow-hidden">
        <thead class="bg-gray-100 text-left">
          <tr>
            <th class="p-3 border-b">ID</th>
            <th class="p-3 border-b">No WBS</th>
            <th class="p-3 border-b">Nama</th>
            <th class="p-3 border-b">Deskripsi</th>
            <th class="p-3 border-b">Aksi</th>
          </tr>
        </thead>
        <tbody id="dataAktivitasArsip" class="divide-y divide-gray-200">
          {{-- Data arsip akan dimasukkan di sini --}}
        </tbody>
      </table>
    </div>
  </div>

  {{-- Include Modal Tambah --}}
  @include('components.aktivitas.modal-add')

  {{-- Include Modal Edit --}}
  @include('components.aktivitas.modal-edit')

  {{-- Script --}}
  <script src="{{ asset('js/aktivitas/aktivitas.js') }}"></script>
  <script src="{{ asset('js/aktivitas/aktivitas-create.js') }}"></script>
  <script src="{{ asset('js/aktivitas/aktivitas-edit.js') }}"></script>

  <script>
    function showTab(tab) {
      const tabAktif = document.getElementById('tabAktif');
      const tabArsip = document.getElementById('tabArsip');
      const tableAktif = document.getElementById('tableAktif');
      const tableArsip = document.getElementById('tableArsip');

      if (tab === 'aktif') {
        tabAktif.classList.add('bg-blue-600', 'text-white');
        tabAktif.classList.remove('bg-gray-200', 'text-gray-700');
        tabArsip.classList.remove('bg-blue-600', 'text-white');
        tabArsip.classList.add('bg-gray-200', 'text-gray-700');
        tableAktif.classList.remove('hidden');
        tableArsip.classList.add('hidden');
      } else {
        tabArsip.classList.add('bg-blue-600', 'text-white');
        tabArsip.classList.remove('bg-gray-200', 'text-gray-700');
        tabAktif.classList.remove('bg-blue-600', 'text-white');
        tabAktif.classList.add('bg-gray-200', 'text-gray-700');
        tableArsip.classList.remove('hidden');
        tableAktif.classList.add('hidden');
      }
    }
  </script>
</x-layouts.main>

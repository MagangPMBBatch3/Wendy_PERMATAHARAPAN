<!-- Modal Add Proyek -->
<div id="modalAddProyek" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white p-6 rounded shadow w-96">
        <h2 class="text-xl font-bold mb-4">Tambah Proyek</h2>
        <form id="formAddProyek" onsubmit="event.preventDefault(); createProyek();">
            @csrf
            <div class="mb-4">
                <label for="addKode" class="block mb-2">Kode</label>
                <input type="text" id="addProyekKode" name="kode" class="border p-2 rounded w-full" maxlength="50">
            </div>
            <div class="mb-4">
                <label for="addNama" class="block mb-2">Nama</label>
                <input type="text" id="addProyekNama" name="nama" class="border p-2 rounded w-full" maxlength="150" required>
            </div>
            <div class="mb-4">
                <label for="addTanggal" class="block mb-2">Tanggal</label>
                <input type="date" id="addProyekTanggal" name="tanggal" class="border p-2 rounded w-full">
            </div>
            <div class="mb-4">
                <label for="addNamaSekolah" class="block mb-2">Nama Sekolah</label>
                <input type="text" id="addProyekNamaSekolah" name="nama_sekolah" class="border p-2 rounded w-full" maxlength="150">
            </div>
            <div class="flex justify-end">
                <button type="button" onclick="closeAddProyekModal()" class="mr-2 px-4 py-2 bg-gray-300 rounded">Batal</button>
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Tambah</button>
            </div>
        </form>
    </div>
</div>

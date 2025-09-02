<!-- Modal Tambah Aktivitas -->
<div id="modalAddAktivitas" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white p-6 rounded shadow w-96">
        <h2 class="text-xl font-bold mb-4">Tambah Aktivitas</h2>
        <form id="formAddAktivitas" onsubmit="event.preventDefault(); createAktivitas();">
            @csrf
            <div class="mb-4">
                <label for="addBagianId" class="block mb-2">Bagian ID</label>
                <input type="number" id="addAktivitasBagianId" name="bagian_id" class="border p-2 rounded w-full">
            </div>
            <div class="mb-4">
                <label for="addNoWbs" class="block mb-2">No WBS</label>
                <input type="text" id="addAktivitasNoWbs" name="no_wbs" class="border p-2 rounded w-full" required>
            </div>
            <div class="mb-4">
                <label for="addNama" class="block mb-2">Nama</label>
                <input type="text" id="addAktivitasNama" name="nama" class="border p-2 rounded w-full" required>
            </div>
            <div class="mb-4">
                <label for="addDeskripsi" class="block mb-2">Deskripsi</label>
                <textarea id="addAktivitasDeskripsi" name="deskripsi" class="border p-2 rounded w-full" rows="3"></textarea>
            </div>
            <div class="flex justify-end">
                <button type="button" onclick="closeAddAktivitasModal()" class="mr-2 px-4 py-2 bg-gray-300 rounded">Batal</button>
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Simpan</button>
            </div>
        </form>
    </div>
</div>

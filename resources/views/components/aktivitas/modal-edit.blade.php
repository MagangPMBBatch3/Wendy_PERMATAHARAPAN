<!-- Modal Edit Aktivitas -->
<div id="modalEditAktivitas" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white p-6 rounded shadow w-96">
        <h2 class="text-xl font-bold mb-4">Edit Aktivitas</h2>
        <form id="formEditAktivitas" onsubmit="event.preventDefault(); updateAktivitas();">
            @csrf
            <input type="hidden" id="editAktivitasId" name="id">
            <div class="mb-4">
                <label for="editBagianId" class="block mb-2">Bagian ID</label>
                <input type="number" id="editAktivitasBagianId" name="bagian_id" class="border p-2 rounded w-full">
            </div>
            <div class="mb-4">
                <label for="editNoWbs" class="block mb-2">No WBS</label>
                <input type="text" id="editAktivitasNoWbs" name="no_wbs" class="border p-2 rounded w-full" required>
            </div>
            <div class="mb-4">
                <label for="editNama" class="block mb-2">Nama</label>
                <input type="text" id="editAktivitasNama" name="nama" class="border p-2 rounded w-full" required>
            </div>
            <div class="mb-4">
                <label for="editDeskripsi" class="block mb-2">Deskripsi</label>
                <textarea id="editAktivitasDeskripsi" name="deskripsi" class="border p-2 rounded w-full" rows="3"></textarea>
            </div>
            <div class="flex justify-end">
                <button type="button" onclick="closeEditAktivitasModal()" class="mr-2 px-4 py-2 bg-gray-300 rounded">Batal</button>
                <button type="submit" class="px-4 py-2 bg-yellow-500 text-white rounded">Update</button>
            </div>
        </form>
    </div>
</div>

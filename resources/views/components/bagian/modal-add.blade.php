<!-- Modal Tambah Bagian -->
<div id="modalAdd" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white p-6 rounded shadow w-96">
        <h2 class="text-xl font-bold mb-4">Tambah Bagian</h2>
        <form id="formAddBagian" onsubmit="event.preventDefault(); createBagian();">
            @csrf
            <div class="mb-4">
                <label for="addNama" class="block mb-2">Nama Bagian</label>
                <input type="text" id="addNama" name="nama" class="border p-2 rounded w-full" required>
            </div>
            <div class="flex justify-end">
                <button type="button" onclick="closeAddModal()" class="mr-2 px-4 py-2 bg-gray-300 rounded">Batal</button>
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Simpan</button>
            </div>
        </form>
    </div>
</div>

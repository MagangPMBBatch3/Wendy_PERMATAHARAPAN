<!-- Modal Edit Bagian -->
<div id="modalEditLevel" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white p-6 rounded shadow w-96">
        <h2 class="text-xl font-bold mb-4">Edit Level</h2>
        <form id="formEditBagian" onsubmit="event.preventDefault(); updateLevel();">
            @csrf
            <input type="hidden" id="editLevelId" name="id">
            <div class="mb-4">
                <label for="namaBagian" class="block mb-2">Nama Level</label>
                <input type="text" id="editLevelNama" name="nama" class="border p-2 rounded w-full" required>
            </div>
            <div class="flex justify-end">
                <button type="button" onclick="closeEditModal()" class="mr-2 px-4 py-2 bg-gray-300 rounded">Batal</button>
                <button type="submit" class="px-4 py-2 bg-yellow-500 text-white rounded">Update</button>
            </div>
        </form>
    </div>
</div>

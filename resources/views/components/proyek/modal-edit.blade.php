<!-- Modal Edit Proyek -->
<div id="modalEditProyek" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white p-6 rounded shadow w-96">
        <h2 class="text-xl font-bold mb-4">Edit Proyek</h2>
        <form id="formEditProyek" onsubmit="event.preventDefault(); updateProyek();">
            @csrf
            <input type="hidden" id="editProyekId" name="id">
            <div class="mb-4">
                <label for="editKode" class="block mb-2">Kode</label>
                <input type="text" id="editProyekKode" name="kode" class="border p-2 rounded w-full" maxlength="50">
            </div>
            <div class="mb-4">
                <label for="editNama" class="block mb-2">Nama</label>
                <input type="text" id="editProyekNama" name="nama" class="border p-2 rounded w-full" maxlength="150" required>
            </div>
            <div class="mb-4">
                <label for="editTanggal" class="block mb-2">Tanggal</label>
                <input type="date" id="editProyekTanggal" name="tanggal" class="border p-2 rounded w-full">
            </div>
            <div class="mb-4">
                <label for="editNamaSekolah" class="block mb-2">Nama Sekolah</label>
                <input type="text" id="editProyekNamaSekolah" name="nama_sekolah" class="border p-2 rounded w-full" maxlength="150">
            </div>
            <div class="flex justify-end">
                <button type="button" onclick="closeEditProyekModal()" class="mr-2 px-4 py-2 bg-gray-300 rounded">Batal</button>
                <button type="submit" class="px-4 py-2 bg-yellow-500 text-white rounded">Update</button>
            </div>
        </form>
    </div>
</div>

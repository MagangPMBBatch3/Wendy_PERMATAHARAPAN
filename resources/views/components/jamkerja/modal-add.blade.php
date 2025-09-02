<!-- Modal Add Jam Kerja -->
<div id="modalAddJamKerja" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white p-6 rounded shadow w-96">
        <h2 class="text-xl font-bold mb-4">Tambah Jam Kerja</h2>
        <form id="formAddJamKerja" onsubmit="event.preventDefault(); createJamKerja();">
            @csrf
            <div class="mb-4">
                <label for="addUsersProfileId" class="block mb-2">Users Profile ID</label>
                <input type="number" id="addJamKerjaUsersProfileId" name="users_profile_id" class="border p-2 rounded w-full">
            </div>
            <div class="mb-4">
                <label for="addNoWbs" class="block mb-2">No WBS</label>
                <input type="text" id="addJamKerjaNoWbs" name="no_wbs" class="border p-2 rounded w-full" maxlength="50" required>
            </div>
            <div class="mb-4">
                <label for="addKodeProyek" class="block mb-2">Kode Proyek</label>
                <input type="text" id="addJamKerjaKodeProyek" name="kode_proyek" class="border p-2 rounded w-full" maxlength="5" required>
            </div>
            <div class="mb-4">
                <label for="addProyekId" class="block mb-2">Proyek ID</label>
                <input type="number" id="addJamKerjaProyekId" name="proyek_id" class="border p-2 rounded w-full">
            </div>
            <div class="mb-4">
                <label for="addAktivitasId" class="block mb-2">Aktivitas ID</label>
                <input type="number" id="addJamKerjaAktivitasId" name="aktivitas_id" class="border p-2 rounded w-full">
            </div>
            <div class="mb-4">
                <label for="addTanggal" class="block mb-2">Tanggal</label>
                <input type="date" id="addJamKerjaTanggal" name="tanggal" class="border p-2 rounded w-full" required>
            </div>
            <div class="mb-4">
                <label for="addJumlahJam" class="block mb-2">Jumlah Jam</label>
                <input type="number" step="0.01" id="addJamKerjaJumlahJam" name="jumlah_jam" class="border p-2 rounded w-full" required>
            </div>
            <div class="mb-4">
                <label for="addKeterangan" class="block mb-2">Keterangan</label>
                <textarea id="addJamKerjaKeterangan" name="keterangan" class="border p-2 rounded w-full" rows="3"></textarea>
            </div>
            <div class="mb-4">
                <label for="addStatusId" class="block mb-2">Status ID</label>
                <input type="number" id="addJamKerjaStatusId" name="status_id" class="border p-2 rounded w-full">
            </div>
            <div class="mb-4">
                <label for="addModeId" class="block mb-2">Mode ID</label>
                <input type="number" id="addJamKerjaModeId" name="mode_id" class="border p-2 rounded w-full">
            </div>
            <div class="flex justify-end">
                <button type="button" onclick="closeAddJamKerjaModal()" class="mr-2 px-4 py-2 bg-gray-300 rounded">Batal</button>
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Tambah</button>
            </div>
        </form>
    </div>
</div>

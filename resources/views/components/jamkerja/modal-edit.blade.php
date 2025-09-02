<!-- Modal Edit Jam Kerja -->
<div id="modalEditJamKerja" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white p-6 rounded shadow w-96">
        <h2 class="text-xl font-bold mb-4">Edit Jam Kerja</h2>
        <form id="formEditJamKerja" onsubmit="event.preventDefault(); updateJamKerja();">
            @csrf
            <input type="hidden" id="editJamKerjaId" name="id">
            <div class="mb-4">
                <label for="editUsersProfileId" class="block mb-2">Users Profile ID</label>
                <input type="number" id="editJamKerjaUsersProfileId" name="users_profile_id" class="border p-2 rounded w-full">
            </div>
            <div class="mb-4">
                <label for="editNoWbs" class="block mb-2">No WBS</label>
                <input type="text" id="editJamKerjaNoWbs" name="no_wbs" class="border p-2 rounded w-full" maxlength="50" required>
            </div>
            <div class="mb-4">
                <label for="editKodeProyek" class="block mb-2">Kode Proyek</label>
                <input type="text" id="editJamKerjaKodeProyek" name="kode_proyek" class="border p-2 rounded w-full" maxlength="5" required>
            </div>
            <div class="mb-4">
                <label for="editProyekId" class="block mb-2">Proyek ID</label>
                <input type="number" id="editJamKerjaProyekId" name="proyek_id" class="border p-2 rounded w-full">
            </div>
            <div class="mb-4">
                <label for="editAktivitasId" class="block mb-2">Aktivitas ID</label>
                <input type="number" id="editJamKerjaAktivitasId" name="aktivitas_id" class="border p-2 rounded w-full">
            </div>
            <div class="mb-4">
                <label for="editTanggal" class="block mb-2">Tanggal</label>
                <input type="date" id="editJamKerjaTanggal" name="tanggal" class="border p-2 rounded w-full" required>
            </div>
            <div class="mb-4">
                <label for="editJumlahJam" class="block mb-2">Jumlah Jam</label>
                <input type="number" step="0.01" id="editJamKerjaJumlahJam" name="jumlah_jam" class="border p-2 rounded w-full" required>
            </div>
            <div class="mb-4">
                <label for="editKeterangan" class="block mb-2">Keterangan</label>
                <textarea id="editJamKerjaKeterangan" name="keterangan" class="border p-2 rounded w-full" rows="3"></textarea>
            </div>
            <div class="mb-4">
                <label for="editStatusId" class="block mb-2">Status ID</label>
                <input type="number" id="editJamKerjaStatusId" name="status_id" class="border p-2 rounded w-full">
            </div>
            <div class="mb-4">
                <label for="editModeId" class="block mb-2">Mode ID</label>
                <input type="number" id="editJamKerjaModeId" name="mode_id" class="border p-2 rounded w-full">
            </div>
            <div class="flex justify-end">
                <button type="button" onclick="closeEditJamKerjaModal()" class="mr-2 px-4 py-2 bg-gray-300 rounded">Batal</button>
                <button type="submit" class="px-4 py-2 bg-yellow-500 text-white rounded">Update</button>
            </div>
        </form>
    </div>
</div>

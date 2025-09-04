<!-- Modal Edit User Profile -->
<div id="modalEditUserProfile" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white p-6 rounded shadow w-96">
        <h2 class="text-xl font-bold mb-4">Edit User Profile</h2>
        <form id="formEditUserProfile" onsubmit="event.preventDefault(); updateUserProfile();">
            @csrf
            <input type="hidden" id="editUserProfileId" name="id">
            <div class="mb-4">
                <label for="editUserId" class="block mb-2">User ID</label>
                <input type="number" id="editUserProfileUserId" name="user_id" class="border p-2 rounded w-full" required>
            </div>
            <div class="mb-4">
                <label for="editNamaLengkap" class="block mb-2">Nama Lengkap</label>
                <input type="text" id="editUserProfileNamaLengkap" name="nama_lengkap" class="border p-2 rounded w-full" maxlength="255" required>
            </div>
            <div class="mb-4">
                <label for="editNrp" class="block mb-2">NRP</label>
                <input type="text" id="editUserProfileNrp" name="nrp" class="border p-2 rounded w-full" maxlength="50">
            </div>
            <div class="mb-4">
                <label for="editAlamat" class="block mb-2">Alamat</label>
                <textarea id="editUserProfileAlamat" name="alamat" class="border p-2 rounded w-full" rows="3"></textarea>
            </div>
            <div class="mb-4">
                <label for="editFoto" class="block mb-2">Foto</label>
                <input type="text" id="editUserProfileFoto" name="foto" class="border p-2 rounded w-full" maxlength="255">
            </div>
            <div class="mb-4">
                <label for="editBagianId" class="block mb-2">Bagian</label>
                <select id="editUserProfileBagianId" name="bagian_id" class="border p-2 rounded w-full" required>
                    <option value="">Pilih Bagian</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="editLevelId" class="block mb-2">Level</label>
                <select id="editUserProfileLevelId" name="level_id" class="border p-2 rounded w-full" required>
                    <option value="">Pilih Level</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="editStatusId" class="block mb-2">Status</label>
                <select id="editUserProfileStatusId" name="status_id" class="border p-2 rounded w-full" required>
                    <option value="">Pilih Status</option>
                </select>
            </div>
            <div class="flex justify-end">
                <button type="button" onclick="closeEditUserProfileModal()" class="mr-2 px-4 py-2 bg-gray-300 rounded">Batal</button>
                <button type="submit" class="px-4 py-2 bg-yellow-500 text-white rounded">Update</button>
            </div>
        </form>
    </div>
</div>

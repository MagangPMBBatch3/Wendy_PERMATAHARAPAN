<!-- Modal Add User Profile -->
<div id="modalAddUserProfile" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white p-6 rounded shadow w-96">
        <h2 class="text-xl font-bold mb-4">Tambah User Profile</h2>
        <form id="formAddUserProfile" onsubmit="event.preventDefault(); createUserProfile();">
            @csrf
            <div class="mb-4">
                <label for="addUserId" class="block mb-2">User ID</label>
                <input type="number" id="addUserProfileUserId" name="user_id" class="border p-2 rounded w-full" required>
            </div>
            <div class="mb-4">
                <label for="addNamaLengkap" class="block mb-2">Nama Lengkap</label>
                <input type="text" id="addUserProfileNamaLengkap" name="nama_lengkap" class="border p-2 rounded w-full" maxlength="255" required>
            </div>
            <div class="mb-4">
                <label for="addNrp" class="block mb-2">NRP</label>
                <input type="text" id="addUserProfileNrp" name="nrp" class="border p-2 rounded w-full" maxlength="50">
            </div>
            <div class="mb-4">
                <label for="addAlamat" class="block mb-2">Alamat</label>
                <textarea id="addUserProfileAlamat" name="alamat" class="border p-2 rounded w-full" rows="3"></textarea>
            </div>
            <div class="mb-4">
                <label for="addFoto" class="block mb-2">Foto</label>
                <input type="text" id="addUserProfileFoto" name="foto" class="border p-2 rounded w-full" maxlength="255">
            </div>
            <div class="mb-4">
                <label for="addBagianId" class="block mb-2">Bagian</label>
                <select id="addUserProfileBagianId" name="bagian_id" class="border p-2 rounded w-full" required>
                    <option value="">Pilih Bagian</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="addLevelId" class="block mb-2">Level</label>
                <select id="addUserProfileLevelId" name="level_id" class="border p-2 rounded w-full" required>
                    <option value="">Pilih Level</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="addStatusId" class="block mb-2">Status</label>
                <select id="addUserProfileStatusId" name="status_id" class="border p-2 rounded w-full" required>
                    <option value="">Pilih Status</option>
                </select>
            </div>
            <div class="flex justify-end">
                <button type="button" onclick="closeAddUserProfileModal()" class="mr-2 px-4 py-2 bg-gray-300 rounded">Batal</button>
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Tambah</button>
            </div>
        </form>
    </div>
</div>

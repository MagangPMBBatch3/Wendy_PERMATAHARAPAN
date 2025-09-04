<!-- Modal Add Mode Jam Kerja -->
<div id="addModeJamKerjaModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
        <div class="mt-3">
            <h3 class="text-lg font-medium text-gray-900 mb-4">Tambah Mode Jam Kerja</h3>
            <form id="addModeJamKerjaForm">
                <div class="mb-4">
                    <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
                    <input type="text" id="nama" name="nama" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
                </div>
                <div class="flex justify-end space-x-2">
                    <button type="button" onclick="closeAddModeJamKerjaModal()" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400">Batal</button>
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

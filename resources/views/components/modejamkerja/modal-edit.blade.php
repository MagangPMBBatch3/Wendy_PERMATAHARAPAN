<!-- Modal Edit Mode Jam Kerja -->
<div id="editModeJamKerjaModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
        <div class="mt-3">
            <h3 class="text-lg font-medium text-gray-900 mb-4">Edit Mode Jam Kerja</h3>
            <form id="editModeJamKerjaForm">
                <input type="hidden" id="editId" name="id">
                <div class="mb-4">
                    <label for="editNama" class="block text-sm font-medium text-gray-700">Nama</label>
                    <input type="text" id="editNama" name="nama" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
                </div>
                <div class="flex justify-end space-x-2">
                    <button type="button" onclick="closeEditModeJamKerjaModal()" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400">Batal</button>
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

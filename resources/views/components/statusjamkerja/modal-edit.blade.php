<!-- Edit Status Jam Kerja Modal -->
<div id="editStatusJamKerjaModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
        <div class="mt-3">
            <h3 class="text-lg font-medium text-gray-900 mb-4">Edit Status Jam Kerja</h3>
            <form id="editStatusJamKerjaForm">
                <input type="hidden" id="editId" name="id">
                <div class="mb-4">
                    <label for="editNama" class="block text-sm font-medium text-gray-700">Nama</label>
                    <input type="text" id="editNama" name="nama" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                </div>
                <div class="flex justify-end">
                    <button type="button" onclick="closeEditStatusJamKerjaModal()" class="mr-2 px-4 py-2 bg-gray-500 text-white rounded">Batal</button>
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

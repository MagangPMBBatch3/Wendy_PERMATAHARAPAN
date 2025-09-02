<!-- Modal Edit JamPerTanggal -->
<div id="editJamPerTanggalModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
        <div class="mt-3 text-center">
            <h3 class="text-lg font-medium text-gray-900">Edit Jam Per Tanggal</h3>
            <form id="editJamPerTanggalForm" class="mt-4">
                <input type="hidden" id="edit_id" name="id">
                <div class="mb-4">
                    <label for="edit_bagian_id" class="block text-sm font-medium text-gray-700">Bagian ID</label>
                    <input type="number" id="edit_bagian_id" name="bagian_id" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
                </div>
                <div class="mb-4">
                    <label for="edit_no_wbs" class="block text-sm font-medium text-gray-700">No WBS</label>
                    <input type="text" id="edit_no_wbs" name="no_wbs" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
                </div>
                <div class="mb-4">
                    <label for="edit_proyek_id" class="block text-sm font-medium text-gray-700">Proyek ID</label>
                    <input type="number" id="edit_proyek_id" name="proyek_id" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
                </div>
                <div class="mb-4">
                    <label for="edit_tanggal" class="block text-sm font-medium text-gray-700">Tanggal</label>
                    <input type="date" id="edit_tanggal" name="tanggal" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
                </div>
                <div class="mb-4">
                    <label for="edit_jam" class="block text-sm font-medium text-gray-700">Jam</label>
                    <input type="number" step="0.01" id="edit_jam" name="jam" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
                </div>
                <div class="flex items-center justify-between">
                    <button type="button" onclick="closeEditJamPerTanggalModal()" class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">Batal</button>
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

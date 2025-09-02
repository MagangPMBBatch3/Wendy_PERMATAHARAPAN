<!-- Modal Add JamPerTanggal -->
<div id="addJamPerTanggalModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
        <div class="mt-3 text-center">
            <h3 class="text-lg font-medium text-gray-900">Tambah Jam Per Tanggal</h3>
            <form id="addJamPerTanggalForm" class="mt-4">
                <div class="mb-4">
                    <label for="bagian_id" class="block text-sm font-medium text-gray-700">Bagian ID</label>
                    <input type="number" id="bagian_id" name="bagian_id" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
                </div>
                <div class="mb-4">
                    <label for="no_wbs" class="block text-sm font-medium text-gray-700">No WBS</label>
                    <input type="text" id="no_wbs" name="no_wbs" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
                </div>
                <div class="mb-4">
                    <label for="proyek_id" class="block text-sm font-medium text-gray-700">Proyek ID</label>
                    <input type="number" id="proyek_id" name="proyek_id" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
                </div>
                <div class="mb-4">
                    <label for="tanggal" class="block text-sm font-medium text-gray-700">Tanggal</label>
                    <input type="date" id="tanggal" name="tanggal" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
                </div>
                <div class="mb-4">
                    <label for="jam" class="block text-sm font-medium text-gray-700">Jam</label>
                    <input type="number" step="0.01" id="jam" name="jam" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
                </div>
                <div class="flex items-center justify-between">
                    <button type="button" onclick="closeAddJamPerTanggalModal()" class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">Batal</button>
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

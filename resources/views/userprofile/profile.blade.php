@extends('layouts.main')

@section('title', 'Edit Profile')

@section('content')
    <div class="bg-slate-800/90 p-4 rounded-xl shadow w-full max-w-lg mx-auto">
        <h1 class="text-2xl font-bold mb-4 text-white">Edit Profile</h1>

        <form id="formEditProfile" onsubmit="event.preventDefault(); updateProfile();" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="editNamaLengkap" class="block mb-2 text-white">Nama Lengkap</label>
                <input type="text" id="editNamaLengkap" name="nama_lengkap" class="border p-2 rounded w-full" maxlength="255" required>
            </div>
            <div class="mb-4">
                <label for="editNrp" class="block mb-2 text-white">NRP</label>
                <input type="text" id="editNrp" name="nrp" class="border p-2 rounded w-full" maxlength="50">
            </div>
            <div class="mb-4">
                <label for="editAlamat" class="block mb-2 text-white">Alamat</label>
                <textarea id="editAlamat" name="alamat" class="border p-2 rounded w-full" rows="3"></textarea>
            </div>
            <div class="mb-4">
                <label for="editFoto" class="block mb-2 text-white">Foto</label>
                <input type="file" id="editFoto" name="foto" class="border p-2 rounded w-full" accept="image/*">
                <div id="currentPhoto" class="mt-2"></div>
            </div>
            <div class="mb-4">
                <label for="editBagian" class="block mb-2 text-white">Bagian</label>
                <select id="editBagian" name="bagian_id" class="border p-2 rounded w-full" required>
                    <option value="">Pilih Bagian</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="editLevel" class="block mb-2 text-white">Level</label>
                <select id="editLevel" name="level_id" class="border p-2 rounded w-full" required>
                    <option value="">Pilih Level</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="editStatus" class="block mb-2 text-white">Status</label>
                <select id="editStatus" name="status_id" class="border p-2 rounded w-full" required>
                    <option value="">Pilih Status</option>
                </select>
            </div>
            <div class="flex justify-end">
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Simpan</button>
            </div>
        </form>
    </div>

    <script src="{{ asset('js/userprofile/userprofile-edit.js') }}"></script>
@endsection

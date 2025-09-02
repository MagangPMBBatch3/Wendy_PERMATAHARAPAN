function openEditProyekModal(id, kode, nama, tanggal, namaSekolah) {
    document.getElementById('editProyekId').value = id;
    document.getElementById('editProyekKode').value = kode || '';
    document.getElementById('editProyekNama').value = nama;
    document.getElementById('editProyekTanggal').value = tanggal || '';
    document.getElementById('editProyekNamaSekolah').value = namaSekolah || '';
    document.getElementById('modalEditProyek').classList.remove('hidden');
}

function closeEditProyekModal() {
    document.getElementById('modalEditProyek').classList.add('hidden');
}

async function updateProyek() {
    const id = document.getElementById('editProyekId').value;
    const kode = document.getElementById('editProyekKode').value.trim();
    const nama = document.getElementById('editProyekNama').value.trim();
    const tanggal = document.getElementById('editProyekTanggal').value;
    const namaSekolah = document.getElementById('editProyekNamaSekolah').value.trim();

    if (!nama) {
        alert('Nama proyek harus diisi');
        return;
    }

    const mutation = `
        mutation {
            updateProyek(id: ${id}, input: {
                kode: "${kode}"
                nama: "${nama}"
                tanggal: "${tanggal}"
                nama_sekolah: "${namaSekolah}"
            }) {
                id
                kode
                nama
                tanggal
                nama_sekolah
            }
        }
    `;

    await fetch('/graphql', {
        method: 'POST',
        headers: {'Content-Type': 'application/json'},
        body: JSON.stringify({ query: mutation })
    });

    closeEditProyekModal();
    loadProyekData();
}

function openEditAktivitasModal(id, bagianId, noWbs, nama, deskripsi) {
    document.getElementById('editAktivitasId').value = id;
    document.getElementById('editAktivitasBagianId').value = bagianId || '';
    document.getElementById('editAktivitasNoWbs').value = noWbs;
    document.getElementById('editAktivitasNama').value = nama;
    document.getElementById('editAktivitasDeskripsi').value = deskripsi || '';
    document.getElementById('modalEditAktivitas').classList.remove('hidden');
}

function closeEditAktivitasModal() {
    document.getElementById('modalEditAktivitas').classList.add('hidden');
}

async function updateAktivitas() {
    const id = document.getElementById('editAktivitasId').value;
    const bagianId = document.getElementById('editAktivitasBagianId').value.trim();
    const noWbs = document.getElementById('editAktivitasNoWbs').value.trim();
    const nama = document.getElementById('editAktivitasNama').value.trim();
    const deskripsi = document.getElementById('editAktivitasDeskripsi').value.trim();

    if (!noWbs || !nama) {
        alert('No WBS dan Nama harus diisi');
        return;
    }

    const mutation = `
        mutation {
            updateAktivitas(id: ${id}, input: {
                bagian_id: ${bagianId ? bagianId : null}
                no_wbs: "${noWbs}"
                nama: "${nama}"
                deskripsi: "${deskripsi}"
            }) {
                id
                bagian_id
                no_wbs
                nama
                deskripsi
            }
        }
    `;

    await fetch('/graphql', {
        method: 'POST',
        headers: {'Content-Type': 'application/json'},
        body: JSON.stringify({ query: mutation })
    });

    closeEditAktivitasModal();
    loadAktivitasData();
}

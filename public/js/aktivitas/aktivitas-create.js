function openAddAktivitasModal() {
    document.getElementById('modalAddAktivitas').classList.remove('hidden');
}

function closeAddAktivitasModal() {
    document.getElementById('modalAddAktivitas').classList.add('hidden');
}

async function createAktivitas() {
    const bagianId = document.getElementById('addAktivitasBagianId').value.trim();
    const noWbs = document.getElementById('addAktivitasNoWbs').value.trim();
    const nama = document.getElementById('addAktivitasNama').value.trim();
    const deskripsi = document.getElementById('addAktivitasDeskripsi').value.trim();

    if(!noWbs || !nama) {
        alert('No WBS dan Nama harus diisi');
        return;
    }

    const mutation = `
        mutation {
            createAktivitas(input: {
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

    closeAddAktivitasModal();
    loadAktivitasData();
}

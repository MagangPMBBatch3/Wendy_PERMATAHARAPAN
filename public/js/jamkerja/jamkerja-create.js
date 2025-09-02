function openAddJamKerjaModal() {
    document.getElementById('modalAddJamKerja').classList.remove('hidden');
}

function closeAddJamKerjaModal() {
    document.getElementById('modalAddJamKerja').classList.add('hidden');
}

async function createJamKerja() {
    const usersProfileId = document.getElementById('addJamKerjaUsersProfileId').value.trim();
    const noWbs = document.getElementById('addJamKerjaNoWbs').value.trim();
    const kodeProyek = document.getElementById('addJamKerjaKodeProyek').value.trim();
    const proyekId = document.getElementById('addJamKerjaProyekId').value.trim();
    const aktivitasId = document.getElementById('addJamKerjaAktivitasId').value.trim();
    const tanggal = document.getElementById('addJamKerjaTanggal').value;
    const jumlahJam = document.getElementById('addJamKerjaJumlahJam').value.trim();
    const keterangan = document.getElementById('addJamKerjaKeterangan').value.trim();
    const statusId = document.getElementById('addJamKerjaStatusId').value.trim();
    const modeId = document.getElementById('addJamKerjaModeId').value.trim();

    if(!noWbs || !kodeProyek || !tanggal || !jumlahJam) {
        alert('No WBS, Kode Proyek, Tanggal, dan Jumlah Jam harus diisi');
        return;
    }

    const mutation = `
        mutation {
            createJamKerja(input: {
                users_profile_id: ${usersProfileId ? parseInt(usersProfileId) : null}
                no_wbs: "${noWbs}"
                kode_proyek: "${kodeProyek}"
                proyek_id: ${proyekId ? parseInt(proyekId) : null}
                aktivitas_id: ${aktivitasId ? parseInt(aktivitasId) : null}
                tanggal: "${tanggal}"
                jumlah_jam: ${parseFloat(jumlahJam)}
                keterangan: "${keterangan}"
                status_id: ${statusId ? parseInt(statusId) : null}
                mode_id: ${modeId ? parseInt(modeId) : null}
            }) {
                id
                users_profile_id
                no_wbs
                kode_proyek
                proyek_id
                aktivitas_id
                tanggal
                jumlah_jam
                keterangan
                status_id
                mode_id
            }
        }
    `;

    await fetch('/graphql', {
        method: 'POST',
        headers: {'Content-Type': 'application/json'},
        body: JSON.stringify({ query: mutation })
    });

    closeAddJamKerjaModal();
    loadJamKerjaData();
}

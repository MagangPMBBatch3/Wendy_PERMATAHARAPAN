function openEditJamKerjaModal(id, usersProfileId, noWbs, kodeProyek, proyekId, aktivitasId, tanggal, jumlahJam, keterangan, statusId, modeId) {
    document.getElementById('editJamKerjaId').value = id;
    document.getElementById('editJamKerjaUsersProfileId').value = usersProfileId || '';
    document.getElementById('editJamKerjaNoWbs').value = noWbs;
    document.getElementById('editJamKerjaKodeProyek').value = kodeProyek;
    document.getElementById('editJamKerjaProyekId').value = proyekId || '';
    document.getElementById('editJamKerjaAktivitasId').value = aktivitasId || '';
    document.getElementById('editJamKerjaTanggal').value = tanggal || '';
    document.getElementById('editJamKerjaJumlahJam').value = jumlahJam || '';
    document.getElementById('editJamKerjaKeterangan').value = keterangan || '';
    document.getElementById('editJamKerjaStatusId').value = statusId || '';
    document.getElementById('editJamKerjaModeId').value = modeId || '';
    document.getElementById('modalEditJamKerja').classList.remove('hidden');
}

function closeEditJamKerjaModal() {
    document.getElementById('modalEditJamKerja').classList.add('hidden');
}

async function updateJamKerja() {
    const id = document.getElementById('editJamKerjaId').value;
    const usersProfileId = document.getElementById('editJamKerjaUsersProfileId').value.trim();
    const noWbs = document.getElementById('editJamKerjaNoWbs').value.trim();
    const kodeProyek = document.getElementById('editJamKerjaKodeProyek').value.trim();
    const proyekId = document.getElementById('editJamKerjaProyekId').value.trim();
    const aktivitasId = document.getElementById('editJamKerjaAktivitasId').value.trim();
    const tanggal = document.getElementById('editJamKerjaTanggal').value;
    const jumlahJam = document.getElementById('editJamKerjaJumlahJam').value.trim();
    const keterangan = document.getElementById('editJamKerjaKeterangan').value.trim();
    const statusId = document.getElementById('editJamKerjaStatusId').value.trim();
    const modeId = document.getElementById('editJamKerjaModeId').value.trim();

    if (!noWbs || !kodeProyek || !tanggal || !jumlahJam) {
        alert('No WBS, Kode Proyek, Tanggal, dan Jumlah Jam harus diisi');
        return;
    }

    const mutation = `
        mutation {
            updateJamKerja(id: ${id}, input: {
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

    closeEditJamKerjaModal();
    loadJamKerjaData();
}

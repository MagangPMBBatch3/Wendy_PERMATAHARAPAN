async function openEditUserProfileModal(id, userId, namaLengkap, nrp, alamat, foto, bagianId, levelId, statusId) {
    // Load options for bagian, level, status
    await loadBagianOptions('editUserProfileBagianId');
    await loadLevelOptions('editUserProfileLevelId');
    await loadStatusOptions('editUserProfileStatusId');

    document.getElementById('editUserProfileId').value = id;
    document.getElementById('editUserProfileUserId').value = userId || '';
    document.getElementById('editUserProfileNamaLengkap').value = namaLengkap;
    document.getElementById('editUserProfileNrp').value = nrp || '';
    document.getElementById('editUserProfileAlamat').value = alamat || '';
    document.getElementById('editUserProfileFoto').value = foto || '';
    document.getElementById('editUserProfileBagianId').value = bagianId || '';
    document.getElementById('editUserProfileLevelId').value = levelId || '';
    document.getElementById('editUserProfileStatusId').value = statusId || '';
    document.getElementById('modalEditUserProfile').classList.remove('hidden');
}

function closeEditUserProfileModal() {
    document.getElementById('modalEditUserProfile').classList.add('hidden');
}

async function updateUserProfile() {
    const id = document.getElementById('editUserProfileId').value;
    const userId = document.getElementById('editUserProfileUserId').value.trim();
    const namaLengkap = document.getElementById('editUserProfileNamaLengkap').value.trim();
    const nrp = document.getElementById('editUserProfileNrp').value.trim();
    const alamat = document.getElementById('editUserProfileAlamat').value.trim();
    const foto = document.getElementById('editUserProfileFoto').value.trim();
    const bagianId = document.getElementById('editUserProfileBagianId').value.trim();
    const levelId = document.getElementById('editUserProfileLevelId').value.trim();
    const statusId = document.getElementById('editUserProfileStatusId').value.trim();

    if (!userId || !namaLengkap || !bagianId || !levelId || !statusId) {
        alert('User ID, Nama Lengkap, Bagian, Level, dan Status harus diisi');
        return;
    }

    const mutation = `
        mutation {
            updateUserProfile(id: ${id}, input: {
                user_id: ${parseInt(userId)}
                nama_lengkap: "${namaLengkap}"
                nrp: "${nrp}"
                alamat: "${alamat}"
                foto: "${foto}"
                bagian_id: ${parseInt(bagianId)}
                level_id: ${parseInt(levelId)}
                status_id: ${parseInt(statusId)}
            }) {
                id
                user_id
                nama_lengkap
                nrp
                alamat
                foto
                bagian_id
                level_id
                status_id
            }
        }
    `;

    await fetch('/graphql', {
        method: 'POST',
        headers: {'Content-Type': 'application/json'},
        body: JSON.stringify({ query: mutation })
    });

    closeEditUserProfileModal();
    loadUserProfileData();
}

async function loadBagianOptions(selectId) {
    const query = `
        query {
            allBagian {
                id
                nama_bagian
            }
        }
    `;
    const res = await fetch('/graphql', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ query })
    });
    const data = await res.json();
    const select = document.getElementById(selectId);
    select.innerHTML = '<option value="">Pilih Bagian</option>';
    data.data.allBagian.forEach(bagian => {
        select.innerHTML += `<option value="${bagian.id}">${bagian.nama_bagian}</option>`;
    });
}

async function loadLevelOptions(selectId) {
    const query = `
        query {
            allLevel {
                id
                nama_level
            }
        }
    `;
    const res = await fetch('/graphql', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ query })
    });
    const data = await res.json();
    const select = document.getElementById(selectId);
    select.innerHTML = '<option value="">Pilih Level</option>';
    data.data.allLevel.forEach(level => {
        select.innerHTML += `<option value="${level.id}">${level.nama_level}</option>`;
    });
}

async function loadStatusOptions(selectId) {
    const query = `
        query {
            allStatus {
                id
                nama_status
            }
        }
    `;
    const res = await fetch('/graphql', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ query })
    });
    const data = await res.json();
    const select = document.getElementById(selectId);
    select.innerHTML = '<option value="">Pilih Status</option>';
    data.data.allStatus.forEach(status => {
        select.innerHTML += `<option value="${status.id}">${status.nama_status}</option>`;
    });
}

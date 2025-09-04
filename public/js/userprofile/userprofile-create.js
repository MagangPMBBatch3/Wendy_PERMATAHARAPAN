async function openAddModal() {
    // Load options for bagian, level, status
    await loadBagianOptions('addUserProfileBagianId');
    await loadLevelOptions('addUserProfileLevelId');
    await loadStatusOptions('addUserProfileStatusId');

    document.getElementById('modalAddUserProfile').classList.remove('hidden');
}

function closeAddUserProfileModal() {
    document.getElementById('modalAddUserProfile').classList.add('hidden');
}

async function createUserProfile() {
    const userId = document.getElementById('addUserProfileUserId').value.trim();
    const namaLengkap = document.getElementById('addUserProfileNamaLengkap').value.trim();
    const nrp = document.getElementById('addUserProfileNrp').value.trim();
    const alamat = document.getElementById('addUserProfileAlamat').value.trim();
    const foto = document.getElementById('addUserProfileFoto').value.trim();
    const bagianId = document.getElementById('addUserProfileBagianId').value.trim();
    const levelId = document.getElementById('addUserProfileLevelId').value.trim();
    const statusId = document.getElementById('addUserProfileStatusId').value.trim();

    if(!userId || !namaLengkap || !bagianId || !levelId || !statusId) {
        alert('User ID, Nama Lengkap, Bagian, Level, dan Status harus diisi');
        return;
    }

    const mutation = `
        mutation {
            createUserProfile(input: {
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

    closeAddUserProfileModal();
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

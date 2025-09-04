async function loadUserProfileData() {
    // Ambil data aktif
    const queryAktif = `
        query {
            allUserProfile {
                id
                user_id
                nama_lengkap
                nrp
                alamat
                foto
                bagian_id
                level_id
                status_id
                bagian {
                    nama_bagian
                }
                level {
                    nama_level
                }
                status {
                    nama_status
                }
            }
        }
    `;
    const resAktif = await fetch('/graphql', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ query: queryAktif })
    });
    const dataAktif = await resAktif.json();
    renderUserProfileTable(dataAktif?.data?.allUserProfile || [], 'dataUserProfile', true);

    // Ambil data arsip
    const queryArsip = `
        query {
            allUserProfileArsip {
                id
                user_id
                nama_lengkap
                nrp
                alamat
                foto
                bagian_id
                level_id
                status_id
                deleted_at
            }
        }
    `;
    const resArsip = await fetch('/graphql', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ query: queryArsip })
    });
    const dataArsip = await resArsip.json();
    renderUserProfileTable(dataArsip?.data?.allUserProfileArsip || [], 'dataUserProfileArsip', false);
}

function renderUserProfileTable(userprofiles, tableId, isActive) {
    const tbody = document.getElementById(tableId);
    tbody.innerHTML = '';

    if (!userprofiles.length) {
        tbody.innerHTML = `
            <tr>
                <td colspan="9" class="text-center text-gray-500 p-3">Tidak ada data</td>
            </tr>
        `;
        return;
    }

    userprofiles.forEach(item => {
        let actions = '';
        if (isActive) {
            actions = `
                <button onclick="openEditUserProfileModal(${item.id}, ${item.user_id}, '${item.nama_lengkap}', '${item.nrp}', '${item.alamat}', '${item.foto}', ${item.bagian_id}, ${item.level_id}, ${item.status_id})" class="bg-yellow-500 text-white px-2 py-1 rounded">Edit</button>
                <button onclick="archiveUserProfile(${item.id})" class="bg-red-500 text-white px-2 py-1 rounded">Arsipkan</button>
            `;
        } else {
            actions = `
                <button onclick="restoreUserProfile(${item.id})" class="bg-green-500 text-white px-2 py-1 rounded">Restore</button>
                <button onclick="forceDeleteUserProfile(${item.id})" class="bg-red-700 text-white px-2 py-1 rounded">Hapus Permanen</button>
            `;
        }

        tbody.innerHTML += `
            <tr>
                <td class="border p-2">${item.id}</td>
                <td class="border p-2">${item.nama_lengkap || '-'}</td>
                <td class="border p-2">${item.nrp || '-'}</td>
                <td class="border p-2">${item.alamat || '-'}</td>
                <td class="border p-2">${item.bagian?.nama_bagian || '-'}</td>
                <td class="border p-2">${item.level?.nama_level || '-'}</td>
                <td class="border p-2">${item.status?.nama_status || '-'}</td>
                <td class="border p-2">${actions}</td>
            </tr>
        `;
    });
}

async function archiveUserProfile(id) {
    if(!confirm("Pindahkan ke arsip?")) return;
    const mutation = `
    mutation {
        deleteUserProfile(id: ${id}) {id}
    }`;
    await fetch('/graphql', {
        method:'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ query: mutation })
    });
    loadUserProfileData();
}

async function restoreUserProfile(id) {
    if(!confirm("Kembalikan data ini?")) return;
    const mutation = `
    mutation {
        restoreUserProfile(id: ${id}) {id}
    }`;
    await fetch('/graphql', {
        method:'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ query: mutation })
    });
    loadUserProfileData();
}

async function forceDeleteUserProfile(id) {
    if(!confirm("Hapus data ini secara permanen?")) return;
    const mutation = `
    mutation {
        forceDeleteUserProfile(id: ${id}) {id}
    }`;
    await fetch('/graphql', {
        method:'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ query: mutation })
    });
    loadUserProfileData();
}

async function searchUserProfile() {
    const keyword = document.getElementById('search').value.trim();
    if (!keyword) {
        loadUserProfileData();
        return;
    }
    let query = '';
    if( !isNaN(keyword)) {
    query = `
    query {
        userProfile(id: "${keyword}") {
            id
            user_id
            nama_lengkap
            nrp
            alamat
            foto
            bagian_id
            level_id
            status_id
            bagian {
                nama_bagian
            }
            level {
                nama_level
            }
            status {
                nama_status
            }
        }
    }`;
    const res = await fetch('/graphql', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ query })
    });
    const data = await res.json();
    renderUserProfileTable(data?.data?.userProfile ? [data.data.userProfile] : [], 'dataUserProfile', true);
} else {
    query = `
    query {
        getUserProfiles(search: "${keyword}") {
            id
            user_id
            nama_lengkap
            nrp
            alamat
            foto
            bagian_id
            level_id
            status_id
            bagian {
                nama_bagian
            }
            level {
                nama_level
            }
            status {
                nama_status
            }
        }
    }`;
    const res = await fetch('/graphql', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ query })
    });
    const data = await res.json();
    renderUserProfileTable(data.data.getUserProfiles, 'dataUserProfile', true);
}
}

document.addEventListener('DOMContentLoaded', loadUserProfileData);

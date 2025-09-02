async function loadJamKerjaData() {
    // Ambil data aktif
    const queryAktif = `
        query {
            allJamKerja {
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
    const resAktif = await fetch('/graphql', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ query: queryAktif })
    });
    const dataAktif = await resAktif.json();
    renderJamKerjaTable(dataAktif?.data?.allJamKerja || [], 'dataJamKerja', true);

    // Ambil data arsip
    const queryArsip = `
        query {
            allJamKerjaArsip {
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
    renderJamKerjaTable(dataArsip?.data?.allJamKerjaArsip || [], 'dataJamKerjaArsip', false);
}

function renderJamKerjaTable(jamkerja, tableId, isActive) {
    const tbody = document.getElementById(tableId);
    tbody.innerHTML = '';

    if (!jamkerja.length) {
        tbody.innerHTML = `
            <tr>
                <td colspan="12" class="text-center text-gray-500 p-3">Tidak ada data</td>
            </tr>
        `;
        return;
    }

    jamkerja.forEach(item => {
        let actions = '';
        if (isActive) {
            actions = `
                <button onclick="openEditJamKerjaModal(${item.id}, ${item.users_profile_id}, '${item.no_wbs}', '${item.kode_proyek}', ${item.proyek_id}, ${item.aktivitas_id}, '${item.tanggal}', ${item.jumlah_jam}, '${item.keterangan}', ${item.status_id}, ${item.mode_id})" class="bg-yellow-500 text-white px-2 py-1 rounded">Edit</button>
                <button onclick="archiveJamKerja(${item.id})" class="bg-red-500 text-white px-2 py-1 rounded">Arsipkan</button>
            `;
        } else {
            actions = `
                <button onclick="restoreJamKerja(${item.id})" class="bg-green-500 text-white px-2 py-1 rounded">Restore</button>
                <button onclick="forceDeleteJamKerja(${item.id})" class="bg-red-700 text-white px-2 py-1 rounded">Hapus Permanen</button>
            `;
        }

        tbody.innerHTML += `
            <tr>
                <td class="border p-2">${item.id}</td>
                <td class="border p-2">${item.users_profile_id || '-'}</td>
                <td class="border p-2">${item.no_wbs || '-'}</td>
                <td class="border p-2">${item.kode_proyek || '-'}</td>
                <td class="border p-2">${item.proyek_id || '-'}</td>
                <td class="border p-2">${item.aktivitas_id || '-'}</td>
                <td class="border p-2">${item.tanggal || '-'}</td>
                <td class="border p-2">${item.jumlah_jam || '-'}</td>
                <td class="border p-2">${item.keterangan || '-'}</td>
                <td class="border p-2">${item.status_id || '-'}</td>
                <td class="border p-2">${item.mode_id || '-'}</td>
                <td class="border p-2">${actions}</td>
            </tr>
        `;
    });
}

async function archiveJamKerja(id) {
    if(!confirm("Pindahkan ke arsip?")) return;
    const mutation = `
    mutation {
        deleteJamKerja(id: ${id}) {id}
    }`;
    await fetch('/graphql', {
        method:'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ query: mutation })
    });
    loadJamKerjaData();
}

async function restoreJamKerja(id) {
    if(!confirm("Kembalikan data ini?")) return;
    const mutation = `
    mutation {
        restoreJamKerja(id: ${id}) {id}
    }`;
    await fetch('/graphql', {
        method:'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ query: mutation })
    });
    loadJamKerjaData();
}

async function forceDeleteJamKerja(id) {
    if(!confirm("Hapus data ini secara permanen?")) return;
    const mutation = `
    mutation {
        forceDeleteJamKerja(id: ${id}) {id}
    }`;
    await fetch('/graphql', {
        method:'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ query: mutation })
    });
    loadJamKerjaData();
}

async function searchJamKerja() {
    const keyword = document.getElementById('searchJamKerja').value.trim();
    if (!keyword) {
        loadJamKerjaData();
        return;
    }
    let query = '';
    if( !isNaN(keyword)) {
    query = `
    query {
        jamKerja(id: "${keyword}") {
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
    }`;
    const res = await fetch('/graphql', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ query })
    });
    const data = await res.json();
    renderJamKerjaTable(data?.data?.jamKerja ? [data.data.jamKerja] : [], 'dataJamKerja', true);
} else {
    query = `
    query {
        jamKerjaByNoWbs(no_wbs: "%${keyword}%") {
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
    }`;
    const res = await fetch('/graphql', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ query })
    });
    const data = await res.json();
    renderJamKerjaTable(data.data.jamKerjaByNoWbs, 'dataJamKerja', true);
}
}

document.addEventListener('DOMContentLoaded', loadJamKerjaData);

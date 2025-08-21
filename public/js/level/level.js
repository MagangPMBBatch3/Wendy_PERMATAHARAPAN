async function loadLevelData() {
    // Ambil data aktif
    const queryAktif = `
        query {
            allLevel {
                id
                nama
            }
        }
    `;
    const resAktif = await fetch('/graphql', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ query: queryAktif })
    });
    const dataAktif = await resAktif.json();
    renderLevelTable(dataAktif?.data?.allLevel || [], 'dataLevel', true);

    // Ambil data arsip
    const queryArsip = `
        query {
            allLevelArsip {
                id
                nama
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
    renderLevelTable(dataArsip?.data?.allLevelArsip || [], 'dataLevelArsip', false);
}

function renderLevelTable(levels, tableId, isActive) {
    const tbody = document.getElementById(tableId);
    if (levels.length === 0) {
        tbody.innerHTML = '<tr><td colspan="3">Tidak ada data</td></tr>';
        return;
    }

    tbody.innerHTML = '';
    levels.forEach(item => {
        let actions = '';
        if (isActive) {
            actions = `
                <button class="btn btn-sm btn-warning" onclick="editLevel(${item.id})">Edit</button>
                <button class="btn btn-sm btn-danger" onclick="arsipLevel(${item.id})">Arsipkan</button>
            `;
        } else {
            actions = `
                <button class="btn btn-sm btn-success" onclick="restoreLevel(${item.id})">Restore</button>
                <button class="btn btn-sm btn-danger" onclick="deleteLevel(${item.id})">Hapus Permanen</button>
            `;
        }

        tbody.innerHTML += `
            <tr>
                <td>${item.id}</td>
                <td>${item.nama}</td>
                <td>${actions}</td>
            </tr>
        `;
    });
}

async function archiveLevel(id) {
    if(!confirm("Pindahkan ke arsip>")) return;
    const mutation = `
    mutation {
        deleteLevel(id: ${id}) {id}
    }`;
    await fetch('/graphql', {
        method:'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ query: mutation })
    });
    loadLevelData();
}

async function restoreLevel(id) {
    if(!confirm("Kembalikan data ini?")) return;
    const mutation = `
    mutation {
        restoreLevel(id: ${id}) {id}
    }`;
    await fetch('/graphql', {
        method:'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ query: mutation })
    });
    loadLevelData();
}

async function forceDeleteLevel(id) {
    if(!confirm("Hapus data ini secara permanen?")) return;
    const mutation = `
    mutation {
        forceDeleteLevel(id: ${id}) {id}
    }`;
    await fetch('/graphql', {
        method:'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ query: mutation })
    });
    loadLevelData();
}

async function searchLevel() {
    const keyword = document.getElementById('searchLevel').value.trim();
    if (!keyword) {
        loadLevelData();
        return;
    }
    let query = '';
    if( !isNaN(keyword)) {
    query = `
    query {
        level(id: "${keyword}") {
            id
            nama
        }
    }`;
    const res = await fetch('/graphql', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ query })
    });
    const data = await res.json();
    renderLevelTable(data?.data?.level ? [data.data.level] : [], 'dataLevel', true);
} else {
    query = `
    query {
        levelByNama(nama: "%${keyword}%") {
            id
            nama
        }
    }`;
    const res = await fetch('/graphql', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ query })
    });
    const data = await res.json();
    renderLevelTable(data.data.levelByNama, 'dataLevel', true);
}
}

document.addEventListener('DOMContentLoaded', loadLevelData);
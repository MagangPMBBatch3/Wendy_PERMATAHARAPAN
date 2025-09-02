// Status Jam Kerja Main JavaScript
let currentTab = 'active';

document.addEventListener('DOMContentLoaded', function() {
    loadStatusJamKerjaData();
});

function showTab(tab) {
    currentTab = tab;
    const activeContent = document.getElementById('activeContent');
    const archiveContent = document.getElementById('archiveContent');
    const tabActive = document.getElementById('tabActive');
    const tabArchive = document.getElementById('tabArchive');

    if (tab === 'active') {
        activeContent.classList.remove('hidden');
        archiveContent.classList.add('hidden');
        tabActive.classList.add('bg-blue-500');
        tabActive.classList.remove('bg-gray-500');
        tabArchive.classList.add('bg-gray-500');
        tabArchive.classList.remove('bg-blue-500');
        loadStatusJamKerjaData();
    } else {
        activeContent.classList.add('hidden');
        archiveContent.classList.remove('hidden');
        tabArchive.classList.add('bg-blue-500');
        tabArchive.classList.remove('bg-gray-500');
        tabActive.classList.add('bg-gray-500');
        tabActive.classList.remove('bg-blue-500');
        loadStatusJamKerjaArsipData();
    }
}

function loadStatusJamKerjaData(search = '') {
    const query = `
        query GetStatusJamKerja($search: String) {
            getStatusJamKerja(search: $search) {
                id
                nama
            }
        }
    `;

    fetch('/graphql', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({
            query: query,
            variables: { search: search }
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.data && data.data.getStatusJamKerja) {
            displayStatusJamKerjaData(data.data.getStatusJamKerja);
        }
    })
    .catch(error => console.error('Error:', error));
}

function loadStatusJamKerjaArsipData() {
    const query = `
        query {
            allStatusJamKerja {
                id
                nama
                deleted_at
            }
        }
    `;

    fetch('/graphql', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({ query: query })
    })
    .then(response => response.json())
    .then(data => {
        if (data.data && data.data.allStatusJamKerja) {
            displayStatusJamKerjaArsipData(data.data.allStatusJamKerja);
        }
    })
    .catch(error => console.error('Error:', error));
}

function displayStatusJamKerjaData(data) {
    const tableBody = document.getElementById('statusJamKerjaTableBody');
    tableBody.innerHTML = '';

    data.forEach(item => {
        const row = `
            <tr>
                <td class="border p-2">${item.id}</td>
                <td class="border p-2">${item.nama}</td>
                <td class="border p-2">
                    <button onclick="editStatusJamKerja(${item.id}, '${item.nama}')" class="px-2 py-1 bg-yellow-500 text-white rounded mr-2">Edit</button>
                    <button onclick="deleteStatusJamKerja(${item.id})" class="px-2 py-1 bg-red-500 text-white rounded">Hapus</button>
                </td>
            </tr>
        `;
        tableBody.innerHTML += row;
    });
}

function displayStatusJamKerjaArsipData(data) {
    const tableBody = document.getElementById('statusJamKerjaArsipTableBody');
    tableBody.innerHTML = '';

    data.forEach(item => {
        const row = `
            <tr>
                <td class="border p-2">${item.id}</td>
                <td class="border p-2">${item.nama}</td>
                <td class="border p-2">${item.deleted_at}</td>
                <td class="border p-2">
                    <button onclick="restoreStatusJamKerja(${item.id})" class="px-2 py-1 bg-green-500 text-white rounded mr-2">Restore</button>
                    <button onclick="forceDeleteStatusJamKerja(${item.id})" class="px-2 py-1 bg-red-500 text-white rounded">Hapus Permanen</button>
                </td>
            </tr>
        `;
        tableBody.innerHTML += row;
    });
}

function searchStatusJamKerja() {
    const searchTerm = document.getElementById('searchStatusJamKerja').value;
    if (currentTab === 'active') {
        loadStatusJamKerjaData(searchTerm);
    }
}

function editStatusJamKerja(id, nama) {
    document.getElementById('editId').value = id;
    document.getElementById('editNama').value = nama;
    document.getElementById('editStatusJamKerjaModal').classList.remove('hidden');
}

function deleteStatusJamKerja(id) {
    if (confirm('Apakah Anda yakin ingin menghapus Status Jam Kerja ini?')) {
        const mutation = `
            mutation DeleteStatusJamKerja($id: ID!) {
                deleteStatusJamKerja(id: $id) {
                    id
                    nama
                }
            }
        `;

        fetch('/graphql', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({
                query: mutation,
                variables: { id: id }
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.data && data.data.deleteStatusJamKerja) {
                alert('Status Jam Kerja berhasil dihapus!');
                loadStatusJamKerjaData();
            }
        })
        .catch(error => console.error('Error:', error));
    }
}

function restoreStatusJamKerja(id) {
    const mutation = `
        mutation RestoreStatusJamKerja($id: ID!) {
            restoreStatusJamKerja(id: $id) {
                id
                nama
            }
        }
    `;

    fetch('/graphql', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({
            query: mutation,
            variables: { id: id }
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.data && data.data.restoreStatusJamKerja) {
            alert('Status Jam Kerja berhasil direstore!');
            loadStatusJamKerjaArsipData();
        }
    })
    .catch(error => console.error('Error:', error));
}

function forceDeleteStatusJamKerja(id) {
    if (confirm('Apakah Anda yakin ingin menghapus permanen Status Jam Kerja ini?')) {
        const mutation = `
            mutation ForceDeleteStatusJamKerja($id: ID!) {
                forceDeleteStatusJamKerja(id: $id) {
                    id
                    nama
                }
            }
        `;

        fetch('/graphql', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({
                query: mutation,
                variables: { id: id }
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.data && data.data.forceDeleteStatusJamKerja) {
                alert('Status Jam Kerja berhasil dihapus permanen!');
                loadStatusJamKerjaArsipData();
            }
        })
        .catch(error => console.error('Error:', error));
    }
}

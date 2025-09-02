document.addEventListener('DOMContentLoaded', function() {
    loadJamPerTanggal();
    loadJamPerTanggalArsip();

    // Search functionality
    document.getElementById('searchJamPerTanggal').addEventListener('input', function() {
        const searchTerm = this.value;
        if (searchTerm.length > 2) {
            searchJamPerTanggal(searchTerm);
        } else {
            loadJamPerTanggal();
        }
    });

    // Tab switching
    document.getElementById('activeTab').addEventListener('click', function() {
        showTab('active');
    });

    document.getElementById('archiveTab').addEventListener('click', function() {
        showTab('archive');
    });
});

function loadJamPerTanggal() {
    fetch('/graphql', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({
            query: `
                query {
                    allJamPerTanggal {
                        id
                        bagian_id
                        no_wbs
                        proyek_id
                        tanggal
                        jam
                        created_at
                        updated_at
                    }
                }
            `
        })
    })
    .then(response => response.json())
    .then(data => {
        displayJamPerTanggal(data.data.allJamPerTanggal);
    })
    .catch(error => console.error('Error:', error));
}

function loadJamPerTanggalArsip() {
    fetch('/graphql', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({
            query: `
                query {
                    allJamPerTanggalArsip {
                        id
                        bagian_id
                        no_wbs
                        proyek_id
                        tanggal
                        jam
                        created_at
                        updated_at
                        deleted_at
                    }
                }
            `
        })
    })
    .then(response => response.json())
    .then(data => {
        displayJamPerTanggalArsip(data.data.allJamPerTanggalArsip);
    })
    .catch(error => console.error('Error:', error));
}

function searchJamPerTanggal(searchTerm) {
    fetch('/graphql', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({
            query: `
                query($search: String) {
                    getJamPerTanggal(search: $search) {
                        id
                        bagian_id
                        no_wbs
                        proyek_id
                        tanggal
                        jam
                        created_at
                        updated_at
                    }
                }
            `,
            variables: { search: searchTerm }
        })
    })
    .then(response => response.json())
    .then(data => {
        displayJamPerTanggal(data.data.getJamPerTanggal);
    })
    .catch(error => console.error('Error:', error));
}

function displayJamPerTanggal(jamPerTanggalList) {
    const tbody = document.getElementById('jamPerTanggalTableBody');
    tbody.innerHTML = '';

    jamPerTanggalList.forEach(item => {
        const row = `
            <tr>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">${item.id}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${item.bagian_id}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${item.no_wbs}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${item.proyek_id}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${item.tanggal}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${item.jam}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                    <button onclick="editJamPerTanggal(${item.id})" class="text-indigo-600 hover:text-indigo-900 mr-2">Edit</button>
                    <button onclick="deleteJamPerTanggal(${item.id})" class="text-red-600 hover:text-red-900">Delete</button>
                </td>
            </tr>
        `;
        tbody.innerHTML += row;
    });
}

function displayJamPerTanggalArsip(jamPerTanggalList) {
    const tbody = document.getElementById('jamPerTanggalArsipTableBody');
    tbody.innerHTML = '';

    jamPerTanggalList.forEach(item => {
        const row = `
            <tr>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">${item.id}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${item.bagian_id}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${item.no_wbs}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${item.proyek_id}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${item.tanggal}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${item.jam}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${item.deleted_at}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                    <button onclick="restoreJamPerTanggal(${item.id})" class="text-green-600 hover:text-green-900 mr-2">Restore</button>
                    <button onclick="forceDeleteJamPerTanggal(${item.id})" class="text-red-600 hover:text-red-900">Force Delete</button>
                </td>
            </tr>
        `;
        tbody.innerHTML += row;
    });
}

function showTab(tab) {
    const activeTab = document.getElementById('activeTab');
    const archiveTab = document.getElementById('archiveTab');
    const activeContent = document.getElementById('activeContent');
    const archiveContent = document.getElementById('archiveContent');

    if (tab === 'active') {
        activeTab.classList.add('border-b-2', 'border-blue-500', 'text-blue-600');
        activeTab.classList.remove('text-gray-500');
        archiveTab.classList.remove('border-b-2', 'border-blue-500', 'text-blue-600');
        archiveTab.classList.add('text-gray-500');
        activeContent.classList.remove('hidden');
        archiveContent.classList.add('hidden');
    } else {
        archiveTab.classList.add('border-b-2', 'border-blue-500', 'text-blue-600');
        archiveTab.classList.remove('text-gray-500');
        activeTab.classList.remove('border-b-2', 'border-blue-500', 'text-blue-600');
        activeTab.classList.add('text-gray-500');
        archiveContent.classList.remove('hidden');
        activeContent.classList.add('hidden');
    }
}

function openAddJamPerTanggalModal() {
    document.getElementById('addJamPerTanggalModal').classList.remove('hidden');
}

function closeAddJamPerTanggalModal() {
    document.getElementById('addJamPerTanggalModal').classList.add('hidden');
    document.getElementById('addJamPerTanggalForm').reset();
}

function openEditJamPerTanggalModal() {
    document.getElementById('editJamPerTanggalModal').classList.remove('hidden');
}

function closeEditJamPerTanggalModal() {
    document.getElementById('editJamPerTanggalModal').classList.add('hidden');
    document.getElementById('editJamPerTanggalForm').reset();
}

function editJamPerTanggal(id) {
    fetch('/graphql', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({
            query: `
                query($id: ID) {
                    jamPerTanggal(id: $id) {
                        id
                        bagian_id
                        no_wbs
                        proyek_id
                        tanggal
                        jam
                    }
                }
            `,
            variables: { id: id }
        })
    })
    .then(response => response.json())
    .then(data => {
        const item = data.data.jamPerTanggal;
        document.getElementById('edit_id').value = item.id;
        document.getElementById('edit_bagian_id').value = item.bagian_id;
        document.getElementById('edit_no_wbs').value = item.no_wbs;
        document.getElementById('edit_proyek_id').value = item.proyek_id;
        document.getElementById('edit_tanggal').value = item.tanggal;
        document.getElementById('edit_jam').value = item.jam;
        openEditJamPerTanggalModal();
    })
    .catch(error => console.error('Error:', error));
}

function deleteJamPerTanggal(id) {
    if (confirm('Are you sure you want to delete this JamPerTanggal?')) {
        fetch('/graphql', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({
                query: `
                    mutation($id: ID!) {
                        deleteJamPerTanggal(id: $id) {
                            id
                        }
                    }
                `,
                variables: { id: id }
            })
        })
        .then(response => response.json())
        .then(data => {
            loadJamPerTanggal();
            loadJamPerTanggalArsip();
        })
        .catch(error => console.error('Error:', error));
    }
}

function restoreJamPerTanggal(id) {
    fetch('/graphql', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({
            query: `
                mutation($id: ID!) {
                    restoreJamPerTanggal(id: $id) {
                        id
                    }
                }
            `,
            variables: { id: id }
        })
    })
    .then(response => response.json())
    .then(data => {
        loadJamPerTanggal();
        loadJamPerTanggalArsip();
    })
    .catch(error => console.error('Error:', error));
}

function forceDeleteJamPerTanggal(id) {
    if (confirm('Are you sure you want to permanently delete this JamPerTanggal?')) {
        fetch('/graphql', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({
                query: `
                    mutation($id: ID!) {
                        forceDeleteJamPerTanggal(id: $id) {
                            id
                        }
                    }
                `,
                variables: { id: id }
            })
        })
        .then(response => response.json())
        .then(data => {
            loadJamPerTanggalArsip();
        })
        .catch(error => console.error('Error:', error));
    }
}

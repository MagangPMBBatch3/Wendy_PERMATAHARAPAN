// ModeJamKerja main JavaScript file
document.addEventListener('DOMContentLoaded', function() {
    loadModeJamKerjaData();
});

function loadModeJamKerjaData() {
    const query = `
        query {
            allModeJamKerja {
                id
                nama
                created_at
                updated_at
            }
        }
    `;

    fetch('/graphql', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
        },
        body: JSON.stringify({ query })
    })
    .then(response => response.json())
    .then(data => {
        if (data.data && data.data.allModeJamKerja) {
            displayModeJamKerjaData(data.data.allModeJamKerja);
        }
    })
    .catch(error => {
        console.error('Error loading ModeJamKerja data:', error);
    });
}

function displayModeJamKerjaData(modeJamKerjaList) {
    const tableBody = document.getElementById('modeJamKerjaTableBody');
    tableBody.innerHTML = '';

    modeJamKerjaList.forEach(modeJamKerja => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td class="border border-gray-300 px-4 py-2">${modeJamKerja.id}</td>
            <td class="border border-gray-300 px-4 py-2">${modeJamKerja.nama}</td>
            <td class="border border-gray-300 px-4 py-2">
                <button onclick="editModeJamKerja(${modeJamKerja.id}, '${modeJamKerja.nama}')" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-2 rounded mr-2">Edit</button>
                <button onclick="deleteModeJamKerja(${modeJamKerja.id})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">Delete</button>
            </td>
        `;
        tableBody.appendChild(row);
    });
}

function searchModeJamKerja() {
    const searchTerm = document.getElementById('searchModeJamKerja').value.toLowerCase();
    const rows = document.querySelectorAll('#modeJamKerjaTableBody tr');

    rows.forEach(row => {
        const nama = row.cells[1].textContent.toLowerCase();
        if (nama.includes(searchTerm)) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
}

function editModeJamKerja(id, nama) {
    document.getElementById('editId').value = id;
    document.getElementById('editNama').value = nama;
    document.getElementById('editModeJamKerjaModal').classList.remove('hidden');
}

function deleteModeJamKerja(id) {
    if (confirm('Are you sure you want to delete this Mode Jam Kerja?')) {
        const mutation = `
            mutation {
                deleteModeJamKerja(id: ${id}) {
                    id
                }
            }
        `;

        fetch('/graphql', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
            },
            body: JSON.stringify({ query: mutation })
        })
        .then(response => response.json())
        .then(data => {
            if (data.data && data.data.deleteModeJamKerja) {
                loadModeJamKerjaData(); // Reload data
            }
        })
        .catch(error => {
            console.error('Error deleting ModeJamKerja:', error);
        });
    }
}

function openAddModeJamKerjaModal() {
    document.getElementById('addModeJamKerjaModal').classList.remove('hidden');
}

function closeAddModeJamKerjaModal() {
    document.getElementById('addModeJamKerjaModal').classList.add('hidden');
    document.getElementById('addModeJamKerjaForm').reset();
}

function closeEditModeJamKerjaModal() {
    document.getElementById('editModeJamKerjaModal').classList.add('hidden');
    document.getElementById('editModeJamKerjaForm').reset();
}

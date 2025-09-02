// Status Jam Kerja Create JavaScript

function openAddStatusJamKerjaModal() {
    document.getElementById('addStatusJamKerjaModal').classList.remove('hidden');
    document.getElementById('nama').value = '';
}

function closeAddStatusJamKerjaModal() {
    document.getElementById('addStatusJamKerjaModal').classList.add('hidden');
}

document.getElementById('addStatusJamKerjaForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const nama = document.getElementById('nama').value;

    const mutation = `
        mutation CreateStatusJamKerja($input: CreateStatusJamKerjaInput!) {
            createStatusJamKerja(input: $input) {
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
            variables: {
                input: {
                    nama: nama
                }
            }
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.data && data.data.createStatusJamKerja) {
            alert('Status Jam Kerja berhasil ditambahkan!');
            closeAddStatusJamKerjaModal();
            loadStatusJamKerjaData();
        } else if (data.errors) {
            alert('Error: ' + data.errors[0].message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Terjadi kesalahan saat menambahkan Status Jam Kerja');
    });
});

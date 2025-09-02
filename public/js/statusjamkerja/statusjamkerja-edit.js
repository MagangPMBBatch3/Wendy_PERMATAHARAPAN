// Status Jam Kerja Edit JavaScript

function closeEditStatusJamKerjaModal() {
    document.getElementById('editStatusJamKerjaModal').classList.add('hidden');
}

document.getElementById('editStatusJamKerjaForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const id = document.getElementById('editId').value;
    const nama = document.getElementById('editNama').value;

    const mutation = `
        mutation UpdateStatusJamKerja($input: UpdateStatusJamKerjaInput!) {
            updateStatusJamKerja(input: $input) {
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
                    id: id,
                    nama: nama
                }
            }
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.data && data.data.updateStatusJamKerja) {
            alert('Status Jam Kerja berhasil diupdate!');
            closeEditStatusJamKerjaModal();
            loadStatusJamKerjaData();
        } else if (data.errors) {
            alert('Error: ' + data.errors[0].message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Terjadi kesalahan saat mengupdate Status Jam Kerja');
    });
});

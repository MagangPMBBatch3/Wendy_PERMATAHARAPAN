;;;// ModeJamKerja edit JavaScript file
document.getElementById('editModeJamKerjaForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const id = document.getElementById('editId').value;
    const nama = document.getElementById('editNama').value;

    const mutation = `
        mutation {
            updateModeJamKerja(id: ${id}, input: { nama: "${nama}" }) {
                id
                nama
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
        body: JSON.stringify({ query: mutation })
    })
    .then(response => response.json())
    .then(data => {
        if (data.data && data.data.updateModeJamKerja) {
            closeEditModeJamKerjaModal();
            loadModeJamKerjaData(); // Reload data
        } else {
            console.error('Error updating ModeJamKerja:', data.errors);
        }
    })
    .catch(error => {
        console.error('Error updating ModeJamKerja:', error);
    });
});

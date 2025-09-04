// ModeJamKerja create JavaScript file
document.getElementById('addModeJamKerjaForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const nama = document.getElementById('nama').value;

    const mutation = `
        mutation {
            createModeJamKerja(input: { nama: "${nama}" }) {
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
        body: JSON.stringify({ query: mutation })
    })
    .then(response => response.json())
    .then(data => {
        if (data.data && data.data.createModeJamKerja) {
            closeAddModeJamKerjaModal();
            loadModeJamKerjaData(); // Reload data
        } else {
            console.error('Error creating ModeJamKerja:', data.errors);
        }
    })
    .catch(error => {
        console.error('Error creating ModeJamKerja:', error);
    });
});

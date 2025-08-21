function openAddLevelModal() {
    document.getElemetnById('modalAddLevel')/classList.remove('hidden');
}

function closeADdLevelModal() {
    document.getElementById('modalAddLevel').classList.add('hidden');
}

async function createLevel() {
    const name = document.getElementById('addLevelNama').value.trim();
        if(!name) {
            alert('Nama level harus diisi');
            return;
        }
    const mutation = `
        mutation {
            createLevel(input: { nama: "${name}" }) {
                id
                nama
            }
        }
    `;

    await fetch('graphql', {
        method: 'POST',
        headers: {'Content-Type': 'application/json'},
        body: JSON.stringify({ query: mutation })
    });

    closeAddLevelModal();
    loadLevelData();
}
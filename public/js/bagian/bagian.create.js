function openAddModal() {
  document.getElementById('modalAdd').classList.remove('hidden');
}

function closeAddModal() {
  document.getElementById('modalAdd').classList.add('hidden');
  document.getElementById('addNama').value = '';
}

async function createBagian() {
  const nama = document.getElementById('addNama').value;
  if (!nama) return alert("Nama tidak boleh kosong");

  const mutation = `
  mutation {
    createBagian(input: { nama: "${nama}" }) {
      id
      nama
    }
  }
  `;
  await fetch('/graphql', {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify({ query: mutation })
  });
  closeAddModal();
  loadData();
}
document.getElementById('addJamPerTanggalForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const bagian_id = document.getElementById('bagian_id').value;
    const no_wbs = document.getElementById('no_wbs').value;
    const proyek_id = document.getElementById('proyek_id').value;
    const tanggal = document.getElementById('tanggal').value;
    const jam = document.getElementById('jam').value;

    fetch('/graphql', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({
            query: `
                mutation($input: CreateJamPerTanggalInput!) {
                    createJamPerTanggal(input: $input) {
                        id
                        bagian_id
                        no_wbs
                        proyek_id
                        tanggal
                        jam
                    }
                }
            `,
            variables: {
                input: {
                    bagian_id: parseInt(bagian_id),
                    no_wbs: no_wbs,
                    proyek_id: parseInt(proyek_id),
                    tanggal: tanggal,
                    jam: parseFloat(jam)
                }
            }
        })
    })
    .then(response => response.json())
    .then(data => {
        closeAddJamPerTanggalModal();
        loadJamPerTanggal();
    })
    .catch(error => console.error('Error:', error));
});

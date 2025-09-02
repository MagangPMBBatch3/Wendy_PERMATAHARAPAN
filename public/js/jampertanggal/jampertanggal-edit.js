document.getElementById('editJamPerTanggalForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const id = document.getElementById('edit_id').value;
    const bagian_id = document.getElementById('edit_bagian_id').value;
    const no_wbs = document.getElementById('edit_no_wbs').value;
    const proyek_id = document.getElementById('edit_proyek_id').value;
    const tanggal = document.getElementById('edit_tanggal').value;
    const jam = document.getElementById('edit_jam').value;

    fetch('/graphql', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({
            query: `
                mutation($input: UpdateJamPerTanggalInput!) {
                    updateJamPerTanggal(input: $input) {
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
                    id: parseInt(id),
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
        closeEditJamPerTanggalModal();
        loadJamPerTanggal();
    })
    .catch(error => console.error('Error:', error));
});

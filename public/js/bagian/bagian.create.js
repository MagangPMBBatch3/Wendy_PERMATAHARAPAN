function openAddModal() {
    document.getElementById("modalAdd").classList.remove("hidden");
}

function closeAddModal() {
    document.getElementById("modalAdd").classList.add("hidden");
    document.getElementById("namaBagian").value = "";
}

async function createBagian() {
    const nama = document.getElementById("namaBagian").value;
    if (!nama) {
        alert("Nama tidak boleh kosong");
        return;
    }

    const query = `
        mutation {
            createBagian(input: { nama: "${nama}" }) {
                id
                nama
            }
        }
    `;

    await fetch("/graphql", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({ query })
    });

    closeAddModal();
    loadData();
}

// Add form submission handler
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('formAddBagian');
    if (form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            createBagian();
        });
    }
});

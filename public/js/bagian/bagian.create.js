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

    // Use JSON.stringify to properly escape the input
    const variables = { input: { nama: nama } };
    
    const query = `
        mutation CreateBagian($input: CreateBagianInput!) {
            createBagian(input: $input) {
                id
                nama
            }
        }
    `;

    try {
        const response = await fetch("/graphql", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json"
            },
            body: JSON.stringify({ query, variables })
        });

        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }

        const result = await response.json();
        
        if (result.errors) {
            console.error("GraphQL errors:", result.errors);
            alert("Error: " + (result.errors[0]?.message || "Unknown error"));
            return;
        }

        alert("Data berhasil ditambahkan!");
        closeAddModal();
        if (typeof loadData === 'function') {
            loadData(); // Refresh the table
        }
    } catch (error) {
        console.error("Error:", error);
        alert("Terjadi kesalahan: " + error.message);
    }
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

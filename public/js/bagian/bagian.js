async function loadData(queryType = "all") {
    const searchValue = document.getElementById('search').value.trim();
    let query;

    if (queryType === "search" && searchValue) {
        if (!isNaN(searchValue)) {
            query = {
                query: `
                    query Bagian($id: ID!) {
                        bagian(id: $id) {
                            id
                            nama
                        }
                    }
                `,
                variables: { id: searchValue }
            };
        } else {
            query = {
                query: `
                    query BagianByNama($nama: String!) {
                        bagianByNama(nama: $nama) {
                            id
                            nama
                        }
                    }
                `,
                variables: { nama: `%${searchValue}%` }
            };
        }
    } else {
        query = {
            query: `
                query AllBagian {
                    allBagian {
                        id
                        nama
                    }
                }
            `
        };
    }

    try {
        const res = await fetch('/graphql', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            },
            body: JSON.stringify(query)
        });

        if (!res.ok) {
            throw new Error(`HTTP error! status: ${res.status}`);
        }

        const data = await res.json();
        const tbody = document.getElementById("dataBagian");
        tbody.innerHTML = '';

        let items = [];
        if (data.data?.allBagian) items = data.data.allBagian;
        if (data.data?.bagianByNama) items = data.data.bagianByNama;
        if (data.data?.bagian) items = [data.data.bagian];

        if (items.length === 0) {
            tbody.innerHTML = `<tr><td colspan="3" class="text-center p-2">Data Tidak ditemukan</td></tr>`;
            return;
        }

        items.forEach(item => {
            if(!item) return;
            const row = document.createElement('tr');
            row.innerHTML = `
                <td class="border p-2">${item.id}</td>
                <td class="border p-2">${item.nama}</td>
                <td class="border p-2">
                    <button class="bg-yellow-500 text-white px-2 py-1 rounded mr-1" onclick="editBagian(${item.id})">Edit</button>
                    <button class="bg-red-500 text-white px-2 py-1 rounded" onclick="hapusBagian(${item.id})">Hapus</button>
                </td>
            `;
            tbody.appendChild(row);
        });
    } catch (error) {
        console.error("Error loading data:", error);
        const tbody = document.getElementById("dataBagian");
        tbody.innerHTML = `<tr><td colspan="3" class="text-center p-2">Error loading data</td></tr>`;
    }
}

function searchBagian() {
    loadData("search");
}

async function editBagian(id) {
    const nama = prompt("Masukkan nama baru:", "");
    if (!nama) return;

    const query = {
        query: `
            mutation UpdateBagian($id: ID!, $nama: String!) {
                updateBagian(input: { id: $id, nama: $nama }) {
                    id
                    nama
                }
            }
        `,
        variables: { id: id, nama: nama }
    };

    try {
        const response = await fetch("/graphql", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json"
            },
            body: JSON.stringify(query)
        });

        const result = await response.json();
        
        if (result.errors) {
            alert("Error: " + result.errors[0].message);
            return;
        }

        alert("Data berhasil diperbarui!");
        loadData();
    } catch (error) {
        alert("Terjadi kesalahan: " + error.message);
    }
}

async function hapusBagian(id) {
    if (!confirm("Yakin ingin menghapus bagian ini?")) return;

    const query = {
        query: `
            mutation DeleteBagian($id: ID!) {
                deleteBagian(id: $id) {
                    id
                }
            }
        `,
        variables: { id: id }
    };

    try {
        const response = await fetch("/graphql", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json"
            },
            body: JSON.stringify(query)
        });

        const result = await response.json();
        
        if (result.errors) {
            alert("Error: " + result.errors[0].message);
            return;
        }

        alert("Data berhasil dihapus!");
        loadData();
    } catch (error) {
        alert("Terjadi kesalahan: " + error.message);
        return;
        alert("Terjadi kesalahan: " + error.message);
    }
}

// Load data when page loads
document.addEventListener('DOMContentLoaded', () => loadData());

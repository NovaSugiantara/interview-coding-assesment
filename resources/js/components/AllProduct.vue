<template>
    <div>
        <h3 class="text-center">Semua Produk</h3>
        <br />

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Barang</th>
                    <th>Keterangan</th>
                    <th>Harga</th>
                    <th>Persediaan</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(product, index) in products" :key="index">
                    <td>{{ index + 1 }}</td>
                    <td>{{ product.nama }}</td>
                    <td>{{ product.keterangan }}</td>
                    <td>{{ product.harga }}</td>
                    <td>{{ product.persediaan }}</td>
                    <td>{{ new Date(product.created_at).toDateString() }}</td>
                    <td>{{ new Date(product.updated_at).toDateString() }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <router-link
                                :to="{
                                    name: 'edit',
                                    params: { id: product.id }
                                }"
                                class="btn btn-primary"
                                >Edit
                            </router-link>
                            <button
                                class="btn btn-danger"
                                @click="deleteProduct(product.id)"
                            >
                                Delete
                            </button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    data() {
        return {
            products: []
        };
    },
    mounted() {
        this.getAllProduct();
    },
    methods: {
        getAllProduct() {
            axios.get("http://localhost:8000/api/produk/all").then(response => {
                this.products = response.data.data;
            });
        },
        deleteProduct(id) {
            axios
                .delete(`http://localhost:8000/api/produk/delete/${id}`)
                .then(response => {
                    let i = this.products.map(item => item.id).indexOf(id); // find index of your object
                    this.products.splice(i, 1);
                });
        }
    }
};
</script>

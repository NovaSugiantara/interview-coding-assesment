<template>
    <div>
        <h3 class="text-center">Tambah Product</h3>
        <div class="row">
            <div class="col-md-12">
                <form @submit.prevent="addProducts">
                    <div class="form-group">
                        <label>Nama</label>
                        <input
                            type="text"
                            class="form-control"
                            v-model="product.nama"
                        />
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <input
                            type="text"
                            class="form-control"
                            v-model="product.keterangan"
                        />
                    </div>
                    <div class="form-group">
                        <label>Harga</label>
                        <input
                            type="text"
                            class="form-control"
                            v-model="product.harga"
                        />
                    </div>
                    <div class="form-group">
                        <label>Persediaan</label>
                        <input
                            type="text"
                            class="form-control"
                            v-model="product.persediaan"
                        />
                    </div>
                    <button type="submit" class="btn btn-primary">
                        Tambah Produk
                    </button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            product: {}
        };
    },
    methods: {
        addProducts() {
            axios
                .post("http://localhost:8000/api/produk/add", this.product)
                .then(
                    response => this.$router.push({ name: "home" })
                    //console.log(response.data)
                )
                .catch(error => console.log(error))
                .finally(() => (this.loading = false));
        }
    }
};
</script>

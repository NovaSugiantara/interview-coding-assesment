<template>
    <div>
        <h3 class="text-center">Edit Post</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="updateProducts">
                    <div class="form-group">
                        <label>Nama</label>
                        <input
                            type="text"
                            class="form-control"
                            v-model="produk.nama"
                        />
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <input
                            type="text"
                            class="form-control"
                            v-model="produk.keterangan"
                        />
                    </div>
                    <div class="form-group">
                        <label>Harga</label>
                        <input
                            type="text"
                            class="form-control"
                            v-model="produk.harga"
                        />
                    </div>
                    <div class="form-group">
                        <label>Persediaan</label>
                        <input
                            type="text"
                            class="form-control"
                            v-model="produk.persediaan"
                        />
                    </div>
                    <button type="submit" class="btn btn-primary">
                        Update Produk
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
            produk: {}
        };
    },
    created() {
        axios
            .get(`http://localhost:8000/api/produk/${this.$route.params.id}`)
            .then(response => {
                this.produk = response.data.data;
                // console.log(response.data.data);
            });
    },
    methods: {
        updateProducts() {
            axios
                .post(
                    `http://localhost:8000/api/produk/update/${this.$route.params.id}`,
                    this.produk
                )
                .then(response => {
                    this.$router.push({ name: "home" });
                });
        }
    }
};
</script>

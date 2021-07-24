<template>
    <div>
        <div class="col-lg-12">
            <div class="row">
                <div class="col-md-3">
                    <h2>Left sidebar</h2>
                </div>
                <div class="col-md-9">
                    <div class="card-header nav_bg_color">
                        <span class="web_font">All category products</span>
                    </div>
                    <div class="row">
                        <div class="col-md-3" v-for="product in categoryProducts" :key="product.id">
                            <div class="card" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);">
                                <div class="card-body">
                                    <img :src="product.image" class="image"/>
                                    <hr/>
                                    <h5 class="card-title">{{ product.name }}</h5>
                                    <span class="card-title" v-if="product.brand !== undefined">{{ product.brand.name }}</span>
                                    <span class="badge badge-warning float-right" style="margin-top: 5px;">{{ product.price }} BDT</span>

                                    <div class="row" style="margin-top: 10px;">
                                        <div class="col-md-6">
                                            <button class="btn btn-primary btn-sm" title="Add to card">
                                                <i class="fas fa-cart-plus"></i>
                                            </button>
                                        </div>
                                        <div class="col-md-6">
                                            <button class="btn btn-danger btn-sm float-right" title="Add Wishlist">
                                                <i class="far fa-heart"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                categoryProducts: []
            }
        },
        created() {
            let id = this.$route.params.id;
            axios.get('/api/category/products/list/'+id)
                .then(response => {
                    this.categoryProducts = response.data
                }).catch(error => {
                console.log(error)
            })
        },
        methods: {

        }
    }
</script>
<style scoped>
.image{
    height: 150px;
    width: 150px;
    object-fit: cover;
}
.nav_bg_color {
    background-color: deepskyblue!important;
}
.web_font{
    font-size: 22px;
    color: white;
}
.btn-paid { background: #1408af }
.btn-due { background: red }
</style>

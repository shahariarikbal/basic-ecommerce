<template>
    <div>
        <div class="col-lg-12" style="margin-bottom: 50px;">
            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header nav_bg_color">
                            <span class="web_font">All Categories</span>
                        </div>
                        <div class="card-body">
                            <h5>Category List</h5>
                            <div class="form-check" v-for="(category, index) in categories">
                                <input class="form-check-input" type="checkbox" :id="category.id" @change="getFilterCategoryProduct()" :value="category.id" v-model="categoryIds">
                                <label class="form-check-label" :for="category.id">
                                    {{ category.name }}
                                </label>
                            </div>
                            <br/>
                            <h5>Brand List</h5>
                            <div class="form-check" v-for="(brand, index) in brands">
                                <input class="form-check-input" type="checkbox" :id="'brand'+brand.id" @change="getFilterCategoryProduct()" :value="brand.id" v-model="brandIds">
                                <label class="form-check-label" :for="'brand'+brand.id">
                                    {{ brand.name }}
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-9">
                    <div class="card-header nav_bg_color">
                        <span class="web_font">All Products</span>
                    </div>
                    <div class="row">
                        <div class="col-md-3" v-for="product in products.data" :key="product.id">
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
                    <pagination :data="products" @pagination-change-page="getProduct"></pagination>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                categories: [],
                brands: [],
                products: {},
                brandIds: [],
                categoryIds: [],
                query: '',
            }
        },
        mounted() {
            //console.log(this.pagination.last_page)
            this.getCategory();
            this.getProduct();
            this.getBrands();
        },

        methods: {
            getFilterCategoryProduct(){
                axios.post('/getCategoryFilterProduct', {category_ids:this.categoryIds, brand_ids: this.brandIds} )
                    .then(response => {
                        if(this.categoryIds.length > 0 || this.brandIds.length > 0){
                            this.products = response.data
                        }else{
                            this.getProduct()
                        }

                    }).catch(error => {
                        console.log(error)
                    })
            },
            getCategory(){
                axios.get('/get/category')
                    .then(response => {
                        this.categories = response.data
                    })
                    .catch(error => {
                        console.log(error)
                    })
            },

            getBrands(){
                axios.get('/get/brand')
                    .then(response => {
                        this.brands = response.data
                    })
                    .catch(error => {
                        console.log(error)
                    })
            },

            getProduct(page = 1){
                axios.get('/get/product?page=' + page)
                    .then(response => {
                        this.products = response.data
                    })
                    .catch(error => {
                        console.log(error)
                    })
            },
        },
    }
</script>
<style scoped>
    .image{
        height: 190px;
        width: 180px;
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

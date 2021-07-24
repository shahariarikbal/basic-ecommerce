<template>
    <div>
        <div class="col-lg-12">
            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header nav_bg_color">
                            <span class="web_font">Filter</span>
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
                        <div class="col-md-3 mt-1" v-for="(product, index) in products" :key="index">
                            <div class="card" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);">
                                <div class="card-body">
                                    <img :src="product.image" class="image"/>
                                    <hr/>
                                    <h5 class="card-title">{{ product.name.substr(0, 20) }}</h5>
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
                    <div class="col-md-12" style="height: 100px;">
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
<!--                                <pagination :data="products" @pagination-change-page="getProduct" style="margin-top: 30px; margin-left: 60px;"></pagination>-->
                                <button class="btn btn-primary btn-lg" :disabled="!next_page_url" @click.prevent="loadMore(next_page_url)" style="margin-top: 30px; margin-left: 100px;">Load more</button>
                            </div>
                            <div class="col-md-4"></div>
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
                products: [],
                categories: [],
                brands: [],
                brandIds: [],
                categoryIds: [],
                query: '',
                next_page_url: null
            }
        },
        mounted() {
            //console.log(this.pagination.last_page)
            this.getCategory();
            this.getProduct();
            this.getBrands();
        },

        methods: {
            getProduct(){
                axios.get('api/get/product')
                    .then(response => {
                        //console.log(response)
                        this.products = response.data.data
                        this.next_page_url = response.data.next_page_url
                    })
                    .catch(error => {
                        console.log(error)
                    })
            },
            loadMore(url){
                //console.log(url)
                axios.get(url)
                    .then(response => {
                        //console.log(response.data.next_page_url)
                        let products = response.data.data
                        products.map(p => {
                            this.products.push(p)
                        })
                        this.next_page_url = response.data.next_page_url
                    })
                    .catch(error => {
                        console.log(error)
                    })
            },
            getFilterCategoryProduct(){
                axios.post('api/getCategoryFilterProduct', {category_ids:this.categoryIds, brand_ids: this.brandIds} )
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
                axios.get('api/categories')
                    .then(response => {
                        //console.log(response)
                        this.categories = response.data
                    })
                    .catch(error => {
                        console.log(error)
                    })
            },

            getBrands(){
                axios.get('api/get/brand')
                    .then(response => {
                        this.brands = response.data
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
        height: 150px;
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

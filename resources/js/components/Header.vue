<template>
    <div>
        <header class="header">
            <!-- Top Bar -->
            <div class="top_bar">
                <div class="container">
                    <div class="row">
                        <div class="col d-flex flex-row">
                            <div class="top_bar_contact_item">
                                <div class="top_bar_icon"><img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1560918577/phone.png" alt=""></div>+91 9823 132 111
                            </div>
                            <div class="top_bar_contact_item">
                                <div class="top_bar_icon"><img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1560918597/mail.png" alt=""></div><a href="mailto:fastsales@gmail.com">contact@test.com</a>
                            </div>
                            <div class="top_bar_content ml-auto">
                                <div class="top_bar_menu">
                                    <ul class="standard_dropdown top_bar_dropdown">
                                        <li> <a href="#">English<i class="fas fa-chevron-down"></i></a>
                                            <ul>
                                                <li><a href="#">Italian</a></li>
                                                <li><a href="#">Spanish</a></li>
                                                <li><a href="#">Japanese</a></li>
                                            </ul>
                                        </li>
                                        <li> <a href="#">Currency<i class="fas fa-chevron-down"></i></a>
                                            <ul>
                                                <li><a href="#">EUR Euro</a></li>
                                                <li><a href="#">GBP British Pound</a></li>
                                                <li><a href="#">JPY Japanese Yen</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                <div class="top_bar_user">
                                    <div class="user_icon"><img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1560918647/user.svg" alt=""></div>
                                    <div><a href="#">Register</a></div>
                                    <div><a href="#">Sign in</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- Header Main -->
            <div class="header_main">
                <div class="container">
                    <div class="row">
                        <!-- Logo -->
                        <div class="col-lg-2 col-sm-3 col-3 order-1">
                            <div class="logo_container">
                                <div class="logo"><a href="#">BBB</a></div>
                            </div>
                        </div> <!-- Search -->
                        <div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
                            <div class="header_search">
                                <div class="header_search_content">
                                    <div class="header_search_form_container">
                                        <form action="#" class="header_search_form clearfix">
                                            <div class="autocomplete">
                                                <input type="search" v-model="search" name="search" class="page_menu_search_input" placeholder="Search for products...">
                                                <ul
                                                    v-show="isOpen"
                                                    class="autocomplete-results"
                                                >
                                                    <li
                                                        v-for="(result, i) in items"
                                                        :key="result.id"
                                                        class="autocomplete-result"
                                                    >
                                                        <div class="col-md-12">
                                                            <div class="row">
                                                                <div class="col-md-2">
                                                                    <img :src="result.image" height="50" width="50" style="object-fit: cover">
                                                                </div>
                                                                <div class="col-md-8">{{ result.name }}</div>
                                                                <div class="col-md-2"> {{ result.price }} BDT</div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <button type="button" class="header_search_button trans_300" value="Submit"><img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1560918770/search.png" alt=""></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- Wishlist -->
                        <div class="col-lg-4 col-9 order-lg-3 order-2 text-lg-left text-right">
                            <div class="wishlist_cart d-flex flex-row align-items-center justify-content-end">
                                <div class="wishlist d-flex flex-row align-items-center justify-content-end">
                                    <div class="wishlist_icon"><img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1560918681/heart.png" alt=""></div>
                                    <div class="wishlist_content">
                                        <div class="wishlist_text"><a href="#">Wishlist</a></div>
                                        <div class="wishlist_count">10</div>
                                    </div>
                                </div> <!-- Cart -->
                                <div class="cart">
                                    <div class="cart_container d-flex flex-row align-items-center justify-content-end">
                                        <div class="cart_icon"> <img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1560918704/cart.png" alt="">
                                            <div class="cart_count"><span>3</span></div>
                                        </div>
                                        <div class="cart_content">
                                            <div class="cart_text"><a href="#">Cart</a></div>
                                            <div class="cart_price">$185</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- Main Navigation -->
            <!--Slider-->
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="height: 400px;">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" :src="'/image/slider.jpeg'" style="height: 400px; width: 1500px; object-fit: cover" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" :src="'/image/slider-2.jpg'" style="height: 400px; width: 1500px; object-fit: cover" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" :src="'/image/slider-img.png'" style="height: 400px; width: 1500px; object-fit: cover" alt="Third slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            <!--Slider End-->
<!--            <nav class="main_nav">-->
<!--                <div class="container">-->
<!--                    <div class="col-md-12">-->
<!--                        <div class="row">-->
<!--                            <div class="col-md-4"></div>-->
<!--                            <div class="col-md-6">-->
<!--                                <div class="main_nav_content d-flex flex-row">-->
<!--                                    &lt;!&ndash; Main Nav Menu &ndash;&gt;-->
<!--                                    <div class="main_nav_menu">-->
<!--                                        <ul class="standard_dropdown main_nav_dropdown">-->
<!--                                            <li><router-link to="/"><span class="menu-font-style">Home</span></router-link></li>-->
<!--                                            <li class="hassubs"> <span class="menu-font-style">Categories<i class="fas fa-chevron-down"></i></span>-->
<!--                                                <ul>-->
<!--                                                    <li v-for="category in getAllCategories" :key="category.id">-->
<!--                                                        <router-link :to="{name:'getAllCategoryProducts', params: {id: category.id}}">{{ category.name }}<i class="fas fa-chevron-down"></i></router-link>-->
<!--                                                    </li>-->
<!--                                                </ul>-->
<!--                                            </li>-->
<!--                                            <li class="hassubs"> <span class="menu-font-style">Brands<i class="fas fa-chevron-down"></i></span>-->
<!--                                                <ul>-->
<!--                                                    <li><a href="shop.html">Shop<i class="fas fa-chevron-down"></i></a></li>-->
<!--                                                    <li><a href="product.html">Product<i class="fas fa-chevron-down"></i></a></li>-->
<!--                                                    <li><a href="blog.html">Blog<i class="fas fa-chevron-down"></i></a></li>-->
<!--                                                    <li><a href="blog_single.html">Blog Post<i class="fas fa-chevron-down"></i></a></li>-->
<!--                                                    <li><a href="regular.html">Regular Post<i class="fas fa-chevron-down"></i></a></li>-->
<!--                                                    <li><a href="cart.html">Cart<i class="fas fa-chevron-down"></i></a></li>-->
<!--                                                    <li><a href="contact.html">Contact<i class="fas fa-chevron-down"></i></a></li>-->
<!--                                                </ul>-->
<!--                                            </li>-->
<!--                                            <li><span class="menu-font-style">Contact</span></li>-->
<!--                                        </ul>-->
<!--                                    </div> &lt;!&ndash; Menu Trigger &ndash;&gt;-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="col-md-2"></div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </nav> &lt;!&ndash; Menu &ndash;&gt;-->
            <div class="page_menu">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="page_menu_content">
                                <div class="page_menu_search">
                                    <form action="#">

                                    </form>
                                </div>
                                <ul class="page_menu_nav">
                                    <li class="page_menu_item has-children"> <a href="#">Language<i class="fa fa-angle-down"></i></a>
                                        <ul class="page_menu_selection">
                                            <li><a href="#">English<i class="fa fa-angle-down"></i></a></li>
                                            <li><a href="#">Italian<i class="fa fa-angle-down"></i></a></li>
                                            <li><a href="#">Spanish<i class="fa fa-angle-down"></i></a></li>
                                            <li><a href="#">Japanese<i class="fa fa-angle-down"></i></a></li>
                                        </ul>
                                    </li>
                                    <li class="page_menu_item has-children"> <a href="#">Currency<i class="fa fa-angle-down"></i></a>
                                        <ul class="page_menu_selection">
                                            <li><a href="#">US Dollar<i class="fa fa-angle-down"></i></a></li>
                                            <li><a href="#">EUR Euro<i class="fa fa-angle-down"></i></a></li>
                                            <li><a href="#">GBP British Pound<i class="fa fa-angle-down"></i></a></li>
                                            <li><a href="#">JPY Japanese Yen<i class="fa fa-angle-down"></i></a></li>
                                        </ul>
                                    </li>
                                    <li class="page_menu_item"> <a href="#">Home<i class="fa fa-angle-down"></i></a> </li>
                                    <li class="page_menu_item has-children"> <a href="#">Super Deals<i class="fa fa-angle-down"></i></a>
                                        <ul class="page_menu_selection">
                                            <li><a href="#">Super Deals<i class="fa fa-angle-down"></i></a></li>
                                            <li class="page_menu_item has-children"> <a href="#">Menu Item<i class="fa fa-angle-down"></i></a>
                                                <ul class="page_menu_selection">
                                                    <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                                    <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                                    <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                                    <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                            <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                            <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                        </ul>
                                    </li>
                                    <li class="page_menu_item has-children"> <a href="#">Featured Brands<i class="fa fa-angle-down"></i></a>
                                        <ul class="page_menu_selection">
                                            <li><a href="#">Featured Brands<i class="fa fa-angle-down"></i></a></li>
                                            <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                            <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                            <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                        </ul>
                                    </li>
                                    <li class="page_menu_item has-children"> <a href="#">Trending Styles<i class="fa fa-angle-down"></i></a>
                                        <ul class="page_menu_selection">
                                            <li><a href="#">Trending Styles<i class="fa fa-angle-down"></i></a></li>
                                            <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                            <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                            <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                        </ul>
                                    </li>
                                    <li class="page_menu_item"><a href="blog.html">blog<i class="fa fa-angle-down"></i></a></li>
                                    <li class="page_menu_item"><a href="contact.html">contact<i class="fa fa-angle-down"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <router-view></router-view>
    </div>
</template>

<script>
export default {
    name: "Header",
    data(){
        return {
            search: '',
            items: [],
            isOpen: false,
        }
    },
    watch: {
        search(after, before) {
            //console.log(after)
            axios.get('api/get/search/product/', { params: { search: this.search } })
                .then(response => {
                    if(this.search.length > 0){
                        this.isOpen = true
                        this.items = response.data.search_products
                    }else {
                        this.isOpen = false
                    }
                })
                .catch(error => {
                    console.log(error)
                });
        }
    },
    mounted() {
        // this.$store.dispatch("getCategoriesFormDatabase")
        // this.$store.dispatch("getBrandsFormDatabase")
    },
    computed: {
        // getAllCategories(){ //final output from here
        //     return this.$store.getters.getCategoriesFormGetters
        // },
        // getAllBrands(){ //final output from here
        //     return this.$store.getters.getBrandsFormGetters
        // }
    },
    methods : {

    }
}
</script>

<style scoped>
.autocomplete {
    position: relative;
}

.autocomplete-results {
    min-height: 1em;
    max-height: 200px;
    overflow: auto;
    background-color: white;
    margin-top: 10px;
}

.autocomplete-result {
    list-style: none;
    text-align: left;
    padding: 4px 2px;
    cursor: pointer;
}

.autocomplete-result:hover {
    background-color: deepskyblue;
    color: black;
}
.menu-font-style{
    cursor: pointer; font-size: 18px; color: deepskyblue; font-weight: normal;
}
</style>

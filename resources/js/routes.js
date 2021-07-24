import home from './components/Index'
import categoryProducts from './components/CategoryProductsComponent.vue'

//vue route
export const routes = [
    {
        path:'/', component: home, name: 'home'
    },
    {
        path:'/api/category/wish/products/show/:id', component: categoryProducts, name: 'getAllCategoryProducts'
    }
];

import {error} from "vue-infinite-loading/src/utils";

export default {
    state: {
        category: [],
        brand: [],
    },

    getters: {
        getCategoriesFormGetters(state){ //take parameter state
            return state.category
        },
        getBrandsFormGetters(state){ //take parameter state
            return state.brand
        }
    },

    actions: {
        getCategoriesFormDatabase(context){
            axios.get('/api/categories')
                .then((response)=>{
                    console.log(response.data.categories)
                    context.commit("categories",response.data.categories) //categories will be run from mutation
                })
                .catch(()=>{
                    console.log("Error........")
                })
        },
        getBrandsFormDatabase(context){
            axios.get("/api/get/brand")
                .then(response => {
                    console.log(response.data.brands)
                    context.commit("brands",response.data.brands) //brands will be run from mutation
                })
        }
    },

    mutations: {
        categories(state,data) {
            return state.category = data
        },
        brands(state,data) {
            return state.brand = data
        }
    }
}

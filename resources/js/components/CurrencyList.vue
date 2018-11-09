<template>
    <div class="card">
        <div class="card-header">Purchase Currency</div>

        <div class="card-body">

            <div class="row">
                <app-currency v-for="currency in currencies" :currency="currency"   v-bind:key="currency.id" ></app-currency>
            </div>

        </div>
    </div>

</template>

<script>
    import Currency from '../components/Currency.vue'
    export default {
        name: "currency-list",
        components:{appCurrency:Currency},
        data(){return{
            currencies:{}
        }},
        methods:{
            loadCurrencies(){
                axios.get('api/Currency')
                    .then((response)=>{
                    this.currencies = response.data
            })
            .catch((error)=>{
                    console.log(error)
            })
            }
        },
        created(){
            this.loadCurrencies()
        }
    }
</script>

<style scoped>

</style>
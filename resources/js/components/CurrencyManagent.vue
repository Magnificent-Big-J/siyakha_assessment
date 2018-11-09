<template>

        <div class="card">
            <div class="card-header">Currency Management
                <button class="btn btn-primary btn-sm float-right" @click="updateRate">Update Currency Exchange Rate</button>
            </div>

            <div class="card-body">
                <i class="fa fa-spinner fa-pulse fa-3x fa-fw" v-if="isLoading"></i>
                <table class="table table-hover table-stripped table-bordered">
                    <thead>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Exchange Rate</th>
                        <th>Surcharge</th>
                    </thead>
                    <tbody>
                    <tr v-for="currency in currencies">
                        <td>{{currency.name}}</td>
                        <td>{{currency.description}}</td>
                        <td>{{currency.exchange_rate}}</td>
                        <td>{{currency.surcharge}}</td>
                    </tr>
                    </tbody>
                </table>

            </div>
        </div>

</template>

<script>
    export default {
        name: "currency-managent",
        data(){return{
            currencies:{},
            isLoading:false,
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
            },
            updateRate(){
                this.isLoading = true

                axios.get('api/update')
                    .then((response)=>{

                        this.isLoading = false
                        swal(
                            'Updated',
                            response.message.data,
                            'success'
                        )
                        this.loadCurrencies()

                    })
                    .catch((error)=>{

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
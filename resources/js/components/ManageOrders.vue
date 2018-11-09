<template>
    <div class="card">
        <div class="card-header">Currency Order Management
            <button class="btn btn-primary btn-sm float-right" @click="sendOrders">Send Orders</button>
        </div>

        <div class="card-body">
            <i class="fa fa-spinner fa-pulse fa-3x fa-fw" v-if="isLoading"></i>
            <table class="table table-hover table-stripped table-bordered">
                <thead>
                <th>Description</th>
                <th>Foreign Paid Amount</th>
                <th>ZAR Paid Amount</th>
                <th>Surcharge Amount</th>
                </thead>
                <tbody>
                <tr v-for="order in orders">
                    <td>{{order.currency.description}}</td>
                    <td>{{order.foreign_amt}} {{order.currency.name}}</td>
                    <td>{{order.zar_amt}} ZAR</td>
                    <td>{{order.surcharge_amt}} ZAR</td>
                </tr>
                </tbody>
            </table>

        </div>
    </div>
</template>

<script>
    export default {
        name: "manage-orders",
        data(){return{
            orders:{},
            isLoading:false
        }},
        methods:{
            sendOrders(){
                this.isLoading = true

                axios.get('api/sendOrders')
                    .then((response)=>{

                    this.isLoading = false
                swal(
                    'Sending Orders...',
                    response.message.data,
                    'success'
                )
                this.loadCurrencies()

            })
            .catch((error)=>{

                })
            },
            getOrders(){
                this.isLoading = true
                axios.get('api/orders')
                    .then((response)=>{
                        this.orders = response.data
                        this.isLoading = false
                    })
                    .catch((error)=>{
                        console.log(error)
                    })
            }
        },
        created(){
            this.getOrders()
        }
    }
</script>

<style scoped>

</style>
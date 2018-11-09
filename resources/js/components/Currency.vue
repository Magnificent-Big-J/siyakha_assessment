<template>

    <div class="col-md-6">
        <div class="card mt-2 mb-2"  >
            <div class="card-header">{{currency.name}}</div>
            <div class="card-body">
                <p class="lead">Description: {{currency.description}}</p>
                <p class="lead">Exchange Rate: {{currency.exchange_rate}}</p>

                <label for="zar"> Pay With ZAR?
                    <input type="checkbox" aria-label="Checkbox for following text input" v-model="isZar">
                </label>

                <div class="pull-left">
                    <input type="number" class="form-control" placeholder="Amount" v-model="amount" >
                </div>
                <div class="pull-right mt-2">
                    <button class="btn btn-success" @click="purchase(currency.id)" :disabled="amount <= 0 ">Purchase</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "currency",
        props:['currency'],
        data(){return{

            amount:0,
            isZar:false
        }},
        methods:{
            purchase(id){

                axios.post('purchase',{amount:this.amount,flag:this.isZar,id:id})
                    .then((response)=>{
                                swal(
                                'Order',
                                    response.message.data,
                                'success'
                                )
                        this.amount = 0
                        this.isZar = false

                    })
                    .catch((error)=>{

                    })
            }

        }

    }
</script>

<style scoped>

</style>
<template>
    <div class="main-div">
        <h2 class="text-center text-white">VENTAS</h2>
        <div class="card sales-card" v-for="(product,index) in products" v-bind:key="product.id">
            <div class="card-body d-flex">
                <div class="d-flex">
                    <img id="productImage" class="align-self-stretch" src="" alt="productImage">
                </div>
                <div class="d-flex flex-column p-4 right-side-card">
                    <h2 id="description">
                        {{product.description}}
                    </h2>
                    <span>
                        Precio Unit.: $ {{product.price}}
                    </span>
                    <div class="d-flex mt-4">                        
                        <span>Cant. Vendida: {{getAmount(product.id)}}</span>
                        <span class="ml-auto">Total: $ {{getTotal(product.id)}}</span>
                    </div>
                </div>
                <div class="d-flex flex-column card-buttons">
                    <button type="button" class="button btn btn-primary mb-2" v-on:click="sellProduct(index)">+</button>
                    <button type="button" class="button btn btn-danger" v-on:click="cancelSell(index)">-</button>
                </div>
            </div>
        </div>
    </div>    
</template>

<script>

export default {
    methods: {
        sellProduct(index){
            //debugger
            console.log("Adding product to Line of Sale from index: "+index)
            var indexFind = this.findProductOnLineOfSale(this.products[index])
            console.log("IndexFind: "+indexFind)
            if(indexFind != -1){
                this.linesOfSale[indexFind].amount ++
                this.linesOfSale[indexFind].total = this.linesOfSale[indexFind].amount * this.linesOfSale[indexFind].product.price
                return
            }
            //if the line Of Sale don't exists, do the next tasks
            console.log('adding line of sale at first time...')
            var newLine = {product: this.products[index], amount: 1.0, total: 0.0}
            newLine.total = newLine.amount * newLine.product.price
            this.linesOfSale.push(newLine)
        },
        cancelSell(index){
            var indexFind = this.findProductOnLineOfSale(this.products[index])
            if(indexFind != -1){
                if(this.linesOfSale[indexFind].amount != 0){
                    this.linesOfSale[indexFind].amount --
                    this.linesOfSale[indexFind].total -= this.products[index].price
                }
                else{
                    swal.fire({
                        type: 'error',
                        title: 'Oops...',
                        text: 'Todavia no se vendio '+this.products[index].description,
                        footer: 'No hay ventas a cancelar para este producto'
                    })
                }
            }
            else{
                swal.fire({
                        type: 'error',
                        title: 'Oops...',
                        text: 'Todavia no se vendio '+this.products[index].description,
                        footer: 'No hay ventas a cancelar para este producto'
                    })
            }
        },

        findProductOnLineOfSale(product){
            //debugger
            var indexFind = -1
            this.linesOfSale.forEach(function(element,index){
                if(element.product.id === product.id){
                    console.log("index in findProductOnLineOfSale: "+index)
                    indexFind = index
                }
            })
            return indexFind
        },
        getAmount(productId){
            //debugger
            for(var i=0;i<this.linesOfSale.length;i++){
                if(this.linesOfSale[i].product.id == productId){
                    return this.linesOfSale[i].amount
                }
            }
            return 0
        },
        getTotal(productId){
            for(var i=0;i< this.linesOfSale.length; i++){
                if(this.linesOfSale[i].product.id == productId){
                    return this.linesOfSale[i].total
                }
            }
            return 0
        }
    },
    data(){
        return{
            products: [{id: 2, description: 'Agua destilada x 1lts', price: 40.0},{id: 3, description: 'Agua destilada x 5lts',price: 85.0},
            {id: 4, description: 'Refrigerante x 1lts',price: 45.0},{id: 5, description: 'Refrigerante x 5lts',price: 100.0},{id: 6, description: 'Liquido de Frenos',price: 60.0},
            {id: 7, description: 'Hielo x 5kg',price: 80.0}, {id: 8, description: 'Hielo x 15kg',price: 140.0}],
            ls: {product: {id: 0, description: '', price: 0.0}, amount: 0.0, total: 0.0},
            linesOfSale: []
        }
    },
}
</script>

<style>
    #productImage{
        width: 150px;
        height: 150px;
        background-color: hsl(0,0%,50%);
    }
    #description{
        font-size: 1.8em;
    }
    .sales-card{
        margin: 50px;
    }

    .right-side-card{
        width: 100%;
        font-size: 1.2em;
    }

    span.ml-auto{
            font-weight: bold;
    }

    @media (max-width: 770px){
        #description{
            font-size: 1.5em;
        }
    }

    @media (max-width: 500px){
        #productImage{
            width: 50px;
            height: 50px;
        }
    }
</style>

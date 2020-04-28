<template>
    <div class="main-div">
         <h2 class="text-center text-white">ABM DE PRODUCTOS</h2>
         <div class="card sales-card" >
            <div class="card-body d-flex">
                <div class="d-flex">
                    <img id="img-product-0" class="align-self-stretch image-product" src="/img/products/no_image.jpg" alt="productImage">
                    <input type="file" name="image" class="form-control hidden-element" id="input-image-0" ref='file' @change="handleImageFile(false,0)">
                </div>
                <div class="d-flex flex-column p-4 right-side-card">
                    <h2 id="label-description-0">
                        Descripcion ------
                    </h2>
                    <input type="text" placeholder="Descripcion..." id="input-description-0" class="form-control hidden-element">
                    <span id="label-price-0">
                        Precio Unit.: $ 00.0
                    </span>
                    <input type="number" step="0.01" placeholder="Precio..." id="input-price-0" class="form-control hidden-element">
                    <span id="label-discount-0">
                        Descuento: 00.0% 
                    </span>
                    <input type="number" step="0.01" placeholder="Descuento..." id="input-discount-0" class="form-control hidden-element">
                </div>
                <div class="d-flex flex-column card-buttons">
                   <button id="btn-edit-0" class="btn btn-success btn-lg mt-3" @click="toggleNewProduct(0)">
                       +
                    </button>
                    <button id="btn-save-0" class="btn btn-success btn-lg mt-3 hidden-element" @click="createOrUpdateProduct(0,'NEW')">
                       Guardar
                    </button>
                    <button id="btn-cancel-0" class="btn btn-danger btn-lg mt-3 hidden-element" @click="toggleNewProduct(0)">
                       Cancelar
                    </button>
                </div>
            </div>
        </div>
        <div class="card sales-card" v-for="(product,index) in products" v-bind:key="product.id">
            <div class="card-body d-flex">
                <div class="d-flex">
                    <img :id="'img-product-'+(index+1)" class="align-self-stretch image-product" :src="product.url_image" alt="productImage">
                    <input type="file" name="image" class="form-control hidden-element" :id="'input-image-'+(index+1)" ref="editFile" @change="handleImageFile(true,index)">
                </div>
                <input type="hidden" :value="product.id" :id="'input-id-'+(index+1)">
                <div class="d-flex flex-column p-4 right-side-card">
                    <h2 :id="'label-description-'+(index+1)">
                        {{ product.description }}
                    </h2>
                    <input type="text" :value="product.description" placeholder="Descripcion..." :id="'input-description-'+(index+1)" class="form-control hidden-element">
                    <span :id="'label-price-'+(index+1)">
                        Precio Unit.: $ {{ product.price }}
                    </span>
                    <input type="number" step="0.01" :value="product.price" placeholder="Price..." :id="'input-price-'+(index+1)" class="form-control hidden-element">
                    <span :id="'label-discount-'+(index+1)">
                        Descuento: {{ product.discount }}% 
                    </span>
                    <input type="number" step="0.01" :value="product.discount" placeholder="Descuento..." :id="'input-discount-'+(index+1)" class="form-control hidden-element">
                </div>
                <div class="d-flex flex-column card-buttons">
                    <div :id="'btn-edit-'+(index+1)">
                        <button class="btn btn-success btn-sm mb-1" @click="toggleNewProduct(index+1)">
                            <i class="material-icons md-18">
                                edit
                            </i>
                        </button>
                        <button class="btn btn-danger btn-sm" @click="deleteProduct(index)" v-if="product.id != 1 && product.id != 2">
                            <i class="material-icons md-18">
                                delete
                            </i>
                        </button>
                    </div> 
                    <button :id="'btn-save-'+(index+1)" class="btn btn-success btn-lg mt-3 hidden-element" @click="createOrUpdateProduct((index+1),'EDIT')">
                       Guardar
                    </button>
                    <button :id="'btn-cancel-'+(index+1)" class="btn btn-danger btn-lg mt-3 hidden-element" @click="toggleNewProduct(index+1)">
                       Cancelar
                    </button>
                </div>
            </div>
        </div>
    </div>    
</template>

<script>
export default {
    mounted(){
        console.log(this.file)
        var imageNew = document.getElementById("productImageNew")
        console.log(imageNew)
        this.getProducts()
    },
    data(){
        return{
            products: [],
            imageFile: '',
            imageUpdated: false,
        }
    },
    methods:{
        getProducts(){
            axios.get('/api/products')
                .then(result =>
                {
                    result.data.forEach(element => {
                        this.products.push(element);
                    });
                });
        },
        toggleNewProduct(index){

            var descriptionLabel = document.getElementById("label-description-"+index)
            var descriptionInput = document.getElementById("input-description-"+index)
            var priceLabel = document.getElementById("label-price-"+index)
            var priceInput = document.getElementById("input-price-"+index)
            var discountLabel = document.getElementById("label-discount-"+index)
            var discountInput = document.getElementById("input-discount-"+index)
            var editBtn = document.getElementById("btn-edit-"+index)
            var saveBtn = document.getElementById("btn-save-"+index)
            var cancelBtn = document.getElementById("btn-cancel-"+index)
            var imgProduct = document.getElementById("img-product-"+index)
            var imageInput = document.getElementById("input-image-"+index)

            if(descriptionLabel.style.display !== "none"){
                //None elements
                descriptionLabel.style.display = "none"
                priceLabel.style.display = "none"
                discountLabel.style.display = "none"
                editBtn.style.display = "none"
                imgProduct.style.display = "none"

                //Display elements
                descriptionInput.style.display = "block"
                priceInput.style.display = "block"
                discountInput.style.display = "block"
                saveBtn.style.display = "inline"
                cancelBtn.style.display = "inline"
                imageInput.style.display = "inline"
            }
            else{
                //Display elements
                descriptionLabel.style.display = "inline"
                priceLabel.style.display = "inline"
                discountLabel.style.display = "inline"
                editBtn.style.display = "inline"
                imgProduct.style.display = "block"

                //None elements
                descriptionInput.style.display = "none"
                priceInput.style.display = "none"
                discountInput.style.display = "none"
                saveBtn.style.display = "none"
                cancelBtn.style.display = "none"
                imageInput.style.display = "none"
            }


        },
        handleImageFile(isEdited,index){
            if(isEdited){
                console.log(this.$refs.editFile[index])
                this.imageFile = this.$refs.editFile[index].files[0]
            }
            else{
                this.imageFile = this.$refs.file.files[0]
            }

            console.log('handleImageFile')
            console.log(this.imageFile)
        },
        clearImageFile(){
            this.imageFile = ''
        },
        isImageChanged(){
            this.imageUpdated = true
        },
        createOrUpdateProduct(index,mode){
            var descriptionInput = document.getElementById("input-description-"+index)
            var priceInput = document.getElementById("input-price-"+index)
            var discountInput = document.getElementById("input-discount-"+index)
            var imageProduct = document.getElementById("input-image-"+index)
            
            if(mode === "NEW"){
                var data = new FormData()
                data.append("description",descriptionInput.value)
                data.append("price",priceInput.value)
                data.append("discount",discountInput.value)
                data.append("image",this.imageFile)

                axios.post('/api/new_product/',data).then(
                     response =>{
                        this.products.push(response.data)
                        descriptionInput.value = ''
                        priceInput.value = ''
                        discountInput.value = ''
                        this.clearImageFile()
                        this.toggleNewProduct(0)
                        swal.fire({
                                    type: 'success',
                                    title: 'Producto creado',
                                    text: 'El producto fue creado exitosamente',
                                })
                    }
                )    
            }
            else if(mode === "EDIT"){

                var idInput = document.getElementById("input-id-"+index)            
                var data = new FormData()
                data.append('id',idInput.value)
                data.append('description',descriptionInput.value)
                data.append('price',priceInput.value)
                data.append('discount',discountInput.value)
                data.append('image',this.imageFile)

                axios.post('api/update_product/',data).then(response => {

                    this.products[index-1].description = response.data.description
                    this.products[index-1].price = response.data.price
                    this.products[index-1].discount = response.data.discount
                    this.products[index-1].url_image = response.data.url_image
                    this.clearImageFile()
                    this.toggleNewProduct(index)
                    swal.fire({
                                type: 'success',
                                title: 'Producto editado',
                                text: 'El producto fue editado exitosamente!',
                            })
                })

            }
        },
        deleteProduct(index){
             swal.fire({
                title: "Esta seguro de eliminar el producto "+ this.products[index].description+"?",
                text: "No se podrá recuperar el producto una vez borrado!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Sí, Borrar",
                cancelButtonText: "Cancelar",
                closeOnConfirm: false,
                closeOnCancel: false 
            }).then((result) => {
                if(result.value){
                        var data = new FormData()
                        data.append('id',this.products[index].id)
                        data.append('url_image',this.products[index].url_image)
                        axios.post('/api/delete_product/',data).then( result => {
                             this.products.splice(index,1)
                             swal.fire({
                                    type: 'success',
                                    title: 'Producto eliminado',
                                    text: 'El producto fue eliminado exitosamente',
                                })
                        })
                    }
                }
            )
        }
    },
}
</script>

<style>
    .hidden-element{
        display: none;
    }
    .image-product{
        width: 150px;
        height: 150px;
        background-color: hsl(0,0%,100%);
        object-fit: contain;
    }
    @media (max-width: 500px){
        .image-product{
            width: 50px;
            height: 50px;
        }
    }
</style>
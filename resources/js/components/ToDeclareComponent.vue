<template>
    <div class="main-to-declare">
        <h2 class="text-center text-white">A DECLARAR</h2>
        <form class="form-card" action="#">
            <div class="form-group">
                <input class="form-control" type="hidden" name="id" id="id" v-model="elementId">
            </div>
            <div class="form-group">
                <select name="a-declarar" id="a-declarar" class="form-control" v-model="selected">
                   <option disabled selected>--- SELECCIONE EL ELEMENTO A DECLARAR ---</option>
                   <option v-for="option in options" v-bind:key="option.id" >{{ option.name }}</option>
                </select>
            </div>
            <div class="form-group">
                <label for="ammount">MONTO: </label>
                <input class="form-control" type="number" name="ammount" id="ammount" placeholder="Ingrese el monto..." v-model="ammount">
            </div>
            <div class="form-group">
                <label for="description">DESCRIPCIÓN: </label>
                <input class="form-control" type="text" name="description" placeholder="Descripción (opcional)..." v-model="description">
            </div>
            <div class="form-group">
                <button id="btn-add" class="btn btn-primary form-control" type="button" v-on:click="addElementToDeclare">Agregar</button>
            </div>
        </form>
        <div class="card mt-4" v-for="(element,index) in elementsToDeclare" v-bind:key="element.id">
            <div class="card-body d-flex">
                <div class="d-flex flex-column flex-fill">
                    <div class="d-flex">
                        <span>TIPO: </span>
                        <span class="ml-auto">{{element.type}}</span>
                    </div>
                    <div class="d-flex mt-1">
                        <span>DESCRIPCIÓN: </span>
                        <span class="ml-auto">{{element.description}}</span>
                    </div>
                    <div class="d-flex mt-1">
                        <span>MONTO: </span>
                        <span class="ml-auto">{{element.ammount}}</span>
                    </div>
                </div>
                <div class="d-flex flex-column ml-5">
                    <button class="btn btn-success btn-sm mb-1" v-on:click="editElementToDeclare(index)">
                        <i class="material-icons md-18">
                            edit
                        </i>
                    </button>
                    <button class="btn btn-danger btn-sm" v-on:click="deleteElementToDeclare(index)">
                        <i class="material-icons md-18">
                            delete
                        </i>
                    </button>
                </div>
            </div>
        </div>
    </div>    
</template>

<script>
export default {
    data(){
        return{
            options: [
                {id: 1, name: 'BUZON'},
                {id: 2, name: 'VALE'},
                {id: 3, name: 'CUENTA CORRIENTE'}
                ],
            elementsToDeclare: [],
            selected: '--- SELECCIONE EL ELEMENTO A DECLARAR ---',
            ammount: '',
            description: '',
            elementId: 0,
        }
    },
    computed:{
        btnAdd(){
            return document.getElementById("btn-add")
        }
    },
    methods: {
        addElementToDeclare(){
            var elementToDeclare = {id: 0, type: '', ammount: 0.0, description: ''}
            var isValid = this.validateFields()
            if(isValid == 1){
                elementToDeclare.type = this.selected
                elementToDeclare.ammount = this.ammount
                elementToDeclare.description = this.description != '' ? this.description : '(Sin descripcion)'
                if(this.elementId == 0){
                    //the id was equal at the last id + 1
                    elementToDeclare.id = (this.elementsToDeclare.length != 0) ? 
                                        this.elementsToDeclare[this.elementsToDeclare.length - 1].id + 1 : 1
                    this.elementsToDeclare.push(elementToDeclare)    
                }
                else{
                    elementToDeclare.id = this.elementId
                    var index = this.findElementToDeclare(elementToDeclare.id)
                    this.elementsToDeclare[index] = elementToDeclare
                    this.btnAdd.innerText = 'Agregar'
                }
                this.elementId = 0
                this.selected = '--- SELECCIONE EL ELEMENTO A DECLARAR ---'
                this.ammount = ''
                this.description = ''
            }
            else{
                swal.fire({
                        type: 'error',
                        title: 'Oops...',
                        text: isValid,
                        footer: 'Complete correctamente los campos para continuar'
                    })
            }
        },
        validateFields(){
            if(this.selected == '--- SELECCIONE EL ELEMENTO A DECLARAR ---'){
                return 'Debe seleccionar un tipo de elemento a declarar'
            }
            if(this.ammount <= 0){
                return 'El monto a ingresar no puede ser menor o igual a 0 (cero)'
            }
            return 1
        },
        editElementToDeclare(index){
            console.log('Index: '+index)
            this.elementId = this.elementsToDeclare[index].id
            this.selected = this.elementsToDeclare[index].type
            this.description = this.elementsToDeclare[index].description
            this.ammount = this.elementsToDeclare[index].ammount
            this.btnAdd.innerText = "Editar"
        },
        findElementToDeclare(id){
            var i = -1
            this.elementsToDeclare.forEach( 
                (element,index) => {
                    i = (element.id == id) ? index : -1
                }
            )
            return i
        },
        deleteElementToDeclare(index){
            swal.fire({
                title: "Esta seguro de eliminar "+ this.elementsToDeclare[index].type+" - "+this.elementsToDeclare[index].description +" por $"+this.elementsToDeclare[index].ammount+"?",
                text: "No se podrá recuperar el elemento una vez borrado!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Sí, Borrar",
                cancelButtonText: "Cancelar",
                closeOnConfirm: false,
                closeOnCancel: false 
            }).then((result) => {
                if(result.value){
                        swal.fire("Elemento eliminado!", "Se elimino el elemento", "success");
                        this.elementsToDeclare.splice(index,1)
                }
            })
        },
    },
}
</script>

<style>
    .main-to-declare{
        padding: 40px;
    }

    btn-modify-declare{
        font-size: 0.2em!important;
    }

</style>

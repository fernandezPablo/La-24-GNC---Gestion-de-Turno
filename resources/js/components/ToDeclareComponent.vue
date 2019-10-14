<template>
    <div class="main-div">
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
                <label for="amount">MONTO: </label>
                <input class="form-control" type="number" name="amount" id="amount" placeholder="Ingrese el monto..." v-model="amount">
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
                        <span class="ml-auto">{{element.amount}}</span>
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
    mounted(){
        console.log('ToDeclareComponent mounted...');
        this.getCurrentSale();
    },
     props: {
        userId: Number
    },
    data(){
        return{
            options: [
                {id: 1, name: 'EFECTIVO'},
                {id: 2, name: 'VALE'},
                {id: 3, name: 'CUENTA_CORRIENTE'}
                ],
            elementsToDeclare: [],
            selected: '--- SELECCIONE EL ELEMENTO A DECLARAR ---',
            amount: '',
            description: '',
            elementId: 0,
            editIndex: -1,
            sale: {}
        }
    },
    computed:{
        btnAdd(){
            return document.getElementById("btn-add")
        }
    },
    methods: {

        addElementToDeclare(){
            var isValid = this.validateFields()
            if(isValid == 1){
                if(this.editIndex == -1){
                    var elementToDeclare = {id: 0, type: this.selected, amount: this.amount, description: this.description != '' ? this.description : '(Sin descripcion)' }
                    this.newToDeclareElement(elementToDeclare)
                }
                else{
                    this.elementsToDeclare[this.editIndex].description = this.description
                    this.elementsToDeclare[this.editIndex].type = this.selected
                    this.elementsToDeclare[this.editIndex].amount = this.amount
                    this.editToDeclareElement(this.elementsToDeclare[this.editIndex])
                }
                this.selected = '--- SELECCIONE EL ELEMENTO A DECLARAR ---'
                this.amount = ''
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
        addElementToDeclare2(){
            var elementToDeclare = {id: 0, type: '', amount: 0.0, description: ''}
            var isValid = this.validateFields()
            if(isValid == 1){
                elementToDeclare.type = this.selected
                elementToDeclare.amount = this.amount
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
                this.amount = ''
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
            if(this.amount <= 0){
                return 'El monto a ingresar no puede ser menor o igual a 0 (cero)'
            }
            return 1
        },
        editElementToDeclare(index){
            //this.elementId = this.elementsToDeclare[index].id
            this.editIndex = index
            this.selected = this.elementsToDeclare[index].type
            this.description = this.elementsToDeclare[index].description
            this.amount = this.elementsToDeclare[index].amount
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
                title: "Esta seguro de eliminar "+ this.elementsToDeclare[index].type+" - "+this.elementsToDeclare[index].description +" por $"+this.elementsToDeclare[index].amount+"?",
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
                        this.deleteToDeclareElement(index)
                    }
                })
            },
        async isTurnOpen(){
            if(typeof this.$store.getters.getTurn === 'undefined'){
                let response = await axios.get('/open_turns/'+this.userId);
                if(response.data.length != 0){
                    var lastResult = response.data[response.data.length - 1];
                    this.$store.commit('setTurn',lastResult);
                    return true;
                }
                else{
                    return false;
                }
            }
            else {
                return true;
            }
        },
        getCurrentSale(){
            if(this.isTurnOpen()){
                var turnId = this.$store.getters.getTurn.id;
                axios.get('/api/find_sale/'+turnId).then( result => {
                    this.sale = result.data[0];
                    this.getToDeclareElements();
                });
            }
        },
        getToDeclareElements(){
            axios.get('/api/get_to_declare_elements/'+this.sale.id).then(
                result => {
                    this.elementsToDeclare = result.data;
                }
            );
        },
        newToDeclareElement(element){
            var data = {
                description: element.description,
                amount: element.amount,
                type: element.type,
                saleId: this.sale.id
            }
            axios.post('/api/new_element_to_declare',data).then(
                result => {
                    this.elementsToDeclare.push(result.data)
                    swal.fire({
                        type: 'success',
                        title: 'Agregado',
                        text: this.toString(element) +' agregado correctamente!',
                    })
                }
            )
        },
        editToDeclareElement(element){
            var data = {
                id: element.id,
                description: element.description,
                type: element.type,
                amount: element.amount
            }
            axios.post('/api/update_element_to_declare',data).then(
                result => {
                    swal.fire({
                        type: 'success',
                        title: 'Editado',
                        text: this.toString(element) +' editado correctamente!',
                    })
                }
            )
        },
        deleteToDeclareElement(index){
            var data = {
                id: this.elementsToDeclare[index].id
            }
            console.log(data.id)
            axios.delete('/api/delete_element_to_declare',{data}).then(
                result => {
                    this.elementsToDeclare.splice(index,1)
                    swal.fire("Elemento eliminado!", "Se elimino el elemento", "success");
                }
            )            
        },
        toString(element){
            return '{'+element.type+' - '+element.description+' - '+element.amount+'}'
        }
    }
}
</script>

<style>

</style>

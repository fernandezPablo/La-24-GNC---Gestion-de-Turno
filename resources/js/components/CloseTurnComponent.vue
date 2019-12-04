<template>
    <div class="main-div">
        <h2 class="text-center text-white">CERRAR TURNO</h2>
        <form class="form" action="#" v-on:submit.prevent="closeTurn" method="post">
            <div class="form-card mt-1">
                <h2 class="text-center">GNC</h2>
                <div class="form-group">
                    <label for="aforador1">AFORADOR 1</label>
                    <input class="form-control" placeholder="VALOR DE SALIDA DEL AFORADOR 1" type="number" step="0.01" name="aforador1" id="aforador1" v-model="afGnc[0]">
                </div>
                <div class="form-group">
                    <label for="aforador2">AFORADOR 2</label>
                    <input class="form-control" placeholder="VALOR DE SALIDA DEL AFORADOR 2" type="number" step="0.01" name="aforador2" id="aforador2" v-model="afGnc[1]">
                </div>
                <div class="form-group">
                    <label for="aforador3">AFORADOR 3</label>
                    <input class="form-control" placeholder="VALOR DE SALIDA DEL AFORADOR 3"  type="number" step="0.01" name="aforador3" id="aforador3" v-model="afGnc[2]">
                </div>
                <div class="form-group">
                    <label for="aforador4">AFORADOR 4</label>
                    <input class="form-control" placeholder="VALOR DE SALIDA DEL AFORADOR 4" type="number" step="0.01" name="aforador4" id="aforador4" v-model="afGnc[3]">
                </div>
                <div class="form-group">
                    <label for="aforador5">AFORADOR 5</label>
                    <input class="form-control" placeholder="VALOR DE SALIDA DEL AFORADOR 5" type="number" step="0.01" name="aforador5" id="aforador5" v-model="afGnc[4]">
                </div>
                <div class="form-group">
                    <label for="aforador6">AFORADOR 6</label>
                    <input class="form-control" placeholder="VALOR DE SALIDA DEL AFORADOR 6" type="number" step="0.01" name="aforador6" id="aforador6" v-model="afGnc[5]">
                </div>
                <div class="form-group">
                    <label for="pmz">PMZ</label>
                    <input class="form-control" placeholder="VALOR DE SALIDA DEL PMZ" type="number" step="0.01" name="pmz" id="pmz" v-model="pmz">
                </div>
            </div>
            <div class="form-card mt-1 mb-1">
                <h2 class="text-center">ACEITE</h2>
                <div class="form-group">
                    <label for="pmz">ACEITE SALIDA</label>
                    <input class="form-control" placeholder="VALOR DE SALIDA DE ACEITE" type="number" step="0.01" name="aceite_salida" id="aceite_salida" v-model="afOil[0]">
                </div>
            </div>
            <button class="btn btn-primary form-control" type="submit">GUARDAR</button>
        </form>
    </div>
</template>

<script>
export default {
    props: {
        userId: Number
    },
    data() {
        return{
            afGnc: [0.0,0.0,0.0,0.0,0.0,0.0],
            pmz: 0.0,
            afOil: [0.0],
        }   
    },
    mounted(){
        console.log('CloseTurnComponent mounted...');
        if(!this.isTurnOpenOnStore()){
            this.isTurnOpenOnDataBase();
        }
    },
    methods:{
        isTurnOpenOnStore(){
            return (this.$store.getters.getTurn.id == 0) ? false : true
        },
        isTurnOpenOnDataBase(){
            this.overlay = true
            console.log('UserId: '+this.userId);
            axios.get('api/open_turns/'+this.userId).then(
                    response => 
                    {
                        if(response.data.length != 0){
                            var lastResult = response.data[response.data.length - 1];
                            this.$store.commit('setTurn',lastResult);
                            this.overlay = false;
                        }
                        else{
                            this.overlay = false;
                            swal.fire({
                                type: 'warning',
                                title: 'Sin Turno Abierto',
                                text: 'Debe abrir el turno primero para realizar el cierre del mismo',
                            }).then(result => {
                                this.$router.push("/");
                            })
                        }
                    }
            ).catch( error => {
                this.overlay = false
                console.log(error)
            })   
        },
        closeTurn(){
            swal.fire({
                title: 'Cerrando el turno',
                text: 'Esta seguro que desea cerrar el turno actual?',
                type: 'warning',
                showCancelButton: true,
                cancelButtonText: 'Cancelar',
                confirmButtonText: 'Confirmar',
            }).then( result => {
                    if(result.value){
                        var data = {
                            turnId: this.$store.getters.getTurn.id,
                            pmz: this.pmz,
                            aforadorsGnc: this.afGnc,
                            aforadorOil: this.afOil,
                        }
                        axios.post('/api/close_turn',data).then(
                            result => {
                                swal.fire({
                                    type: 'success',
                                    title: 'Turno Cerrado',
                                    text: 'Turno Cerrado Correctamente',
                                })
                                this.$router.push({name: 'resultTurn', params: {turnId: this.$store.getters.getTurn.id}})
                                //this.$store.commit('setTurn',{});
                            }
                        )                        
                    }
                });
        },
    }
}
</script>

<style>
    
</style>


<template>
    <div class="main-div">
        <h2 class="text-center text-white">ABRIR TURNO</h2>
        <form class="form" action="#" v-on:submit.prevent="saveTurn" method="post">
            <div class="form-card mt-1">
                <h2 class="text-center">GNC</h2>
                <div class="form-group">
                    <input class="form-control" type="hidden" name="user_id" id="user_id" v-model="userId">
                </div>
                <div class="form-group">
                    <label for="aforador1">AFORADOR 1</label>
                    <input class="form-control" placeholder="VALOR DE ENTRADA DEL AFORADOR 1" type="number" step="0.01" name="aforador1" id="aforador1" v-model="gncAforadors[0]">
                </div>
                <div class="form-group">
                    <label for="aforador2">AFORADOR 2</label>
                    <input class="form-control" placeholder="VALOR DE ENTRADA DEL AFORADOR 2" type="number" step="0.01" name="aforador2" id="aforador2" v-model="afGnc[1]">
                </div>
                <div class="form-group">
                    <label for="aforador3">AFORADOR 3</label>
                    <input class="form-control" placeholder="VALOR DE ENTRADA DEL AFORADOR 3"  type="number" step="0.01" name="aforador3" id="aforador3" v-model="afGnc[2]">
                </div>
                <div class="form-group">
                    <label for="aforador4">AFORADOR 4</label>
                    <input class="form-control" placeholder="VALOR DE ENTRADA DEL AFORADOR 4" type="number" step="0.01" name="aforador4" id="aforador4" v-model="afGnc[3]">
                </div>
                <div class="form-group">
                    <label for="aforador5">AFORADOR 5</label>
                    <input class="form-control" placeholder="VALOR DE ENTRADA DEL AFORADOR 5" type="number" step="0.01" name="aforador5" id="aforador5" v-model="afGnc[4]">
                </div>
                <div class="form-group">
                    <label for="aforador6">AFORADOR 6</label>
                    <input class="form-control" placeholder="VALOR DE ENTRADA DEL AFORADOR 6" type="number" step="0.01" name="aforador6" id="aforador6" v-model="afGnc[5]">
                </div>
                <div class="form-group">
                    <label for="pmz">PMZ</label>
                    <input class="form-control" placeholder="VALOR DE ENTRADA DEL PMZ" type="number" name="pmz" id="pmz" v-model="pmz">
                </div>
            </div>
            <div class="form-card mt-1 mb-1">
                <h2 class="text-center">ACEITE</h2>
                <div class="form-group">
                    <label for="pmz">ACEITE ENTRADA</label>
                    <input class="form-control" placeholder="VALOR DE ENTRADA DE ACEITE" type="number" step="0.01" name="aceite_entrada" id="aceite_entrada" v-model="afOil[0]">
                </div>
            </div>
            <button class="btn btn-primary form-control" type="submit">GUARDAR</button>
        </form>
    </div>
</template>

<script>
export default {
    mounted(){
        console.log('Mounted OpenTurnComponent...');
         if(this.isTurnOpen()){
                swal.fire({
                    title: 'Ya existe un turno abierto',
                    text: 'Desea editar el turno actual?',
                    type: 'info',
                    showCancelButton: true,
                    cancelButtonText: 'Regresar',
                    confirmButtonText: 'Editar',
                }).then( result => {
                    if(result.value){
                        this.isEdit = true;
                        this.getAforadorsValues();
                    }
            });
        }
    },
    data(){
        return {
            afGnc: [0.0,0.0,0.0,0.0,0.0,0.0],
            pmz: 0.0,
            afOil: [0.0],
            isEdit: false
        }
    },
    props:{
        userId: Number
    },
    computed:{
        gncAforadors(){
            return this.afGnc;
        }
    },
    methods:{
        async saveTurn(){
            var data = {
                user_id: this.userId,
                aforadorsGnc: this.afGnc,
                aforadorOil: this.afOil,
                pmz: this.pmz
            };
            if(!this.isEdit){
                let response = await axios.post('/api/open_turn',data);
                this.$store.commit('setTurnId',response.data);
                swal.fire({
                    type: 'success',
                    title: 'Turno Abierto',
                    text: 'Turno Abierto Correctamente',
                });
            }
            else{
                console.log('Editing...');
            }
            
            this.$router.push("/");
        },
         setTurnOnState(turn){
            this.$store.commit('setTurn',turn);
        },
        async isTurnOpen(){
            if(typeof this.$store.getters.getTurn === 'undefined'){
                let response = await axios.get('/open_turns/'+this.userId);
                if(response.data.length != 0){
                    var lastResult = response.data[response.data.length - 1];
                    this.setTurnOnState(lastResult);
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
        async getAforadorsValues(){
            let response = await axios.get('/api/aforadors_values/'+this.$store.getters.getTurn.id);
            console.log(response.data);
            for(var i=0;i<response.data.length;i++){
                if(i < 6){
                    Vue.set(this.afGnc,i,response.data[i]);
                    //this.afGnc[i] = response.data[i];
                }
                else if(i == 6){
                    this.pmz = response.data[i];
                }
                else{
                    Vue.set(this.afOil,0,response.data[i]);
                    //this.afOil[0] = response.data[i];
                }
            }
            console.log(this.afGnc);
        },
    },
}
</script>


<style>

</style>

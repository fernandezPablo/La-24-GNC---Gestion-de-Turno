<template>
    <div class="main-div">
        <h2 class="text-center text-white">ABRIR TURNO</h2>
        <form class="form" action="#" v-on:submit.prevent="saveTurn" method="post">
            <div class="form-card mt-1">
                <h2 class="text-center">GNC</h2>
                <div class="form-group">
                    <input class="form-control" type="hidden" name="user_id" id="user_id" v-model="userId">
                </div>
                <div class="form-group" v-for="(aforador,index) in afGnc" v-bind:key="index">
                    <label :for="'aforador'+(index+1)">AFORADOR {{index+1}}</label>
                    <input class="form-control" :placeholder="'VALOR DE ENTRADA DEL AFORADOR '+(index+1)" type="number" step="0.01" :name="'aforador'+(index+1)" :id="'aforador'+(index+1)" v-model="afGnc[index]">
                </div>
                <div class="form-group">
                    <label for="pmz">PMZ</label>
                    <input class="form-control" placeholder="VALOR DE ENTRADA DEL PMZ" type="number" step="0.01" name="pmz" id="pmz" v-model="pmz">
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

        <v-overlay :value="overlay">
            <v-progress-circular
                class="progress"
                indeterminate
                :size="64"
                :width="5"
            ></v-progress-circular>
        </v-overlay>

    </div>
</template>

<script>

export default {

    mounted(){
        console.log('Mounted OpenTurnComponent...');

         if(this.isTurnOpenOnStore()){
            this.callToEdit()
        }
        else{
            this.isTurnOpenOnDataBase()
        }
    },
    data(){
        return {
            afGnc: [0.0,0.0,0.0,0.0,0.0,0.0],
            pmz: 0.0,
            afOil: [0.0],
            isEdit: false,
            overlay: false
        }
    },
    props:{
        userId: Number
    },
    computed:{
        gncAforadors(){
            return this.afGnc;
        },
        
    },
    methods:{
        async saveTurn(){
            var data = {
                user_id: this.userId,
                aforadorsGnc: this.afGnc,
                aforadorOil: this.afOil,
                pmz: this.pmz,
                turnId: 0
            };
            if(!this.isEdit){
                let response = await axios.post('/api/open_turn',data);
                var dateFormat = require('dateformat')
                var turnDate = new Date(response.data.date)   
                response.data.date = dateFormat(turnDate,'dd/mm/yyyy HH:MM')
                this.$store.commit('setTurn',response.data);
                swal.fire({
                    type: 'success',
                    title: 'Turno Abierto',
                    text: 'Turno Abierto Correctamente',
                });
            }
            else{
                data.turnId = this.$store.getters.getTurn.id;
                console.log('Editing...');
                console.log(data.turn);
                await axios.post('/api/edit_open_turn',data);
                swal.fire({
                    type: 'success',
                    title: 'Turno Editado',
                    text: 'Turno Editado Correctamente',
                });
            }
            
            this.$router.push("/");
        },
         setTurnOnState(turn){
            this.$store.commit('setTurn',turn);
        },
        isTurnOpenOnStore(){
            return (this.$store.getters.getTurn.id == 0) ? false : true
        },
        isTurnOpenOnDataBase(){
            this.overlay = true
            console.log('UserId: '+this.userId);
            axios.get('api/open_turns/'+this.userId).then(
                    response => 
                    //CHECK THIS METHOD
                    {
                        if(response.data.length != 0){
                            var lastResult = response.data[response.data.length - 1];
                            this.setTurnOnState(lastResult);
                            this.overlay = false;
                            this.callToEdit();
                        }
                        else{
                            this.overlay = false;
                        }
                }
            ).catch( error => {
                this.overlay = false
                console.log(error)
            })
                
        },
        callToEdit(){
            swal.fire({
                        title: 'Ya existe un turno abierto',
                        text: 'Desea editar el turno actual?',
                        type: 'info',
                        showCancelButton: true,
                        cancelButtonText: 'Regresar',
                        confirmButtonText: 'Editar',
                        }).then( result => {
                                if(result.value){
                                    this.overlay = true;
                                    this.isEdit = true;
                                    this.getAforadorsValues();
                                }
                                else if (result.dismiss === swal.DismissReason.cancel) {
                                    this.$router.push("/");
                                }
                        });
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
            this.overlay = false;
        },
    },
}
</script>


<style>

</style>

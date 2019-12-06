<template>
    <div class="main-div">
        <h2 class="text-center text-white">CERRAR TURNO</h2>
        <form class="form" action="#" v-on:submit.prevent="closeTurn" method="post">
            <div class="form-card mt-1">
                <h2 class="text-center">GNC</h2>
                <div class="form-group" v-for="(aforador,index) in afGnc" v-bind:key="index">
                    <label :for="'aforador'+(index+1)">AFORADOR {{ index + 1}}</label>
                    <input class="form-control" :placeholder="'VALOR DE SALIDA DEL AFORADOR '+ (index + 1)" type="number" step="0.01" :name="'aforador' + (index +1)" :id="'aforador' + (index +1)" v-model="afGnc[index]" @change="verifyValue(afGncIni[index],afGnc[index])">
                    <small v-if="afGncIni.lenght != 0">valor inicial del aforador: {{afGncIni[index]}}</small>
                </div>
                <div class="form-group">
                    <label for="pmz">PMZ</label>
                    <input class="form-control" placeholder="VALOR DE SALIDA DEL PMZ" type="number" step="0.01" name="pmz" id="pmz" v-model="pmz" @change="verifyValue(pmzIni,pmz)">
                    <small v-if="afGncIni.lenght != 0">valor inicial del pmz: {{pmzIni}}</small>
                </div>
            </div>
            <div class="form-card mt-1 mb-1">
                <h2 class="text-center">ACEITE</h2>
                <div class="form-group">
                    <label for="pmz">ACEITE SALIDA</label>
                    <input class="form-control" placeholder="VALOR DE SALIDA DE ACEITE" type="number" step="0.01" name="aceite_salida" id="aceite_salida" v-model="afOil[0]" @change="verifyValue(afOilIni,afOil[0])">
                    <small v-if="afGncIni.lenght != 0">valor inicial del aforador: {{afOilIni[0]}}</small>
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
            afGncIni: [],
            afOilIni:[],
            pmzIni: 0.0,
        }   
    },
    mounted(){
        console.log('CloseTurnComponent mounted...');
        if(!this.isTurnOpenOnStore()){
            this.isTurnOpenOnDataBase();
        }
        else{
            this.getAforadorsIniAndPmz();
        }
    },
    watch:{
        afGnc: function (){

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
                            this.getAforadorsIniAndPmz();
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
                            }
                        )                        
                    }
                });
        },
        getAforadorsIniAndPmz(){
            var aforadors = []
            axios.get('/api/aforadors_values/'+this.$store.getters.getTurn.id).then(
                response => {
                    for(var i = 0; i< response.data.length; i++){
                        if(i < 6){
                            this.afGncIni.push(response.data[i])
                        }
                        else if(i == 6){
                            this.pmzIni = response.data[i]
                        }
                        else{
                            this.afOilIni.push(response.data[i])
                        }
                    }
                }
            )
        },
        verifyValue(valueIn,valueOut){
            if(valueOut < valueIn){
                console.log('El valor final no puede ser mayor que el valor inicial...');
                 swal.fire({
                        type: 'error',
                        title: 'Oops...',
                        text: 'El valor final no puede ser menor que el valor inicial',
                        footer: 'Modifique el valor de salida, o edite el valor de entrada en la opcion abrir turno'
                    })
            }
        }
    }
}
</script>

<style>
    
</style>


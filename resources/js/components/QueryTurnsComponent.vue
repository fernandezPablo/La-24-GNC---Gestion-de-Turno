<template>
    <div class="main-div">
        <h2 class="text-center text-white">CONSULTA DE TURNOS</h2>
        <div class="card card-search">
            <div class="card-body">
                <form action="#" class="form" v-on:submit.prevent="searchTurn">
                    <div class="form-row">
                        <div class="form-group col-md-10">
                            <label for="date">Fecha del turno</label>
                            <input id="date" type="date" class="form-control">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="" style="color: white">xxx</label>
                            <button class="form-control btn-primary">
                                <span class="material-icons">
                                    search
                                </span>
                            </button>
                        </div>
                    </div> 
                </form>
            </div>
        </div>
        <div class="card card-search mt-2">
            <div class="card-header">
                <h2 class="card-title text-center">Resultados de la busqueda</h2>
            </div>
            <div class="card-body bg-danger" v-if="withoutTurn">
                <h4 class="text-center">No hay turnos para la fecha seleccionada</h4>
            </div>
            <div class="card-body" v-else>
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>
                                Nro. de Turno
                            </th>
                            <th>
                                Fecha del turno
                            </th>
                            <th>
                                Usuario
                            </th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="turn in turns" v-bind:key="turn.id">
                            <td>{{turn.number}}</td>
                            <td>{{turn.date}}</td>
                            <td>{{turn.user.name}}</td>
                            <td>
                                <router-link :to="{name: 'resultTurn', params: {turnId: turn.id} }">
                                    <button>
                                        <span class="material-icons">
                                             visibility
                                         </span>
                                    </button>
                                </router-link>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
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
    data(){
        return {
            turns: [],
            overlay: false,
            withoutTurn: false
        }
    },
    methods:{
        searchTurn(){
            this.overlay = true
            const dateInput = document.getElementById("date")
            var date = dateInput.value
            this.turns = [] 
            axios.get('api/get_turns/'+date).then(
                response => {
                    this.withoutTurn = false
                    console.log(response.data)
                    if(response.data.length > 0){
                        response.data.forEach(
                            element => {
                                this.turns.push(element)
                            }
                        )
                    }
                    else{
                        this.withoutTurn = true
                    }
                    this.overlay = false
                }
            )
        }
    }
}
</script>

<style>
.card-search{
    margin-left: 20%;
    margin-right: 20%;
}
label{
    color: black;
}
</style>
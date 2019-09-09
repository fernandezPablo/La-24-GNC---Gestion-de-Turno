<template>
    <nav class="navbar navbar-expand-md navbar-la24gnc navbar-dark bg-inverse">
        <div class="container-fluid">
            <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <!-- Right Side Of Navbar -->
                    <!-- Authentication Links -->
                    <div class="ml-auto">
                        <div v-if="this.isGuest">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" :href="this.routeLogin">Login</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" :href="this.routeRegister">Register</a>
                                </li>
                            </ul>
                        </div>
                        <div v-else>
                            <ul class="navbar-nav">
                                <li class="nav-link" v-if="!this.withoutTurn">
                                    Turno: {{this.turnNumber}} - {{this.date}}  
                                </li>
                                <li class="nav-link" v-else> 
                                    NINGUN TURNO ABIERTO
                                </li>
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{this.userName}}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" :href="this.routeLogout"
                                            onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                            Salir
                                        </a>
                                        <form id="logout-form" :action="this.routeLogout" method="POST" style="display: none;">
                                            <slot>
                                                <!-- CSRF Token-->
                                            </slot>
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
            </div>
        </div>
    </nav>    
</template>

<script>
export default {
    mounted(){
        console.log('Component navbar mounted...');
        var  divLoad = document.getElementById('load');
        divLoad.classList.add('loading')
        axios
        .get('/open_turns/'+this.userId)
        .then( response => {
            if(response.data.length != 0){
                this.turnId = response.data[0].id
                this.setTurnIdOnState()
                var dateFormat = require('dateformat')
                var turnDate = new Date(response.data[0].date)   
                this.date = dateFormat(turnDate,'dd/mm/yyyy')
                this.turnNumber = response.data[0].number
                divLoad.classList.remove('loading')
            }
            else{
                this.withoutTurn = true
            }

        })
        .catch( error => (console.log(error)));
        this.setUserIdOnState();
        console.log(this.turnId);
    },
    data(){
        return {
            turnId : 0,
            date: '',
            turnNumber: 0,
            withoutTurn: false
        }
    },
    methods:{
        setUserIdOnState(){
            this.$store.commit('setUserId',this.userId);
            },
        setTurnIdOnState(){
            this.$store.commit('setTurnId',this.turnId);
        }
    },
    computed: {
        getUserId(){
            return this.$store.getters.getUserId;
        }
    },
    props: {
        appName: String,
        url: String,    
        routeLogin: String,
        routeRegister: String,
        routeLogout: String,
        asset: String,
        isGuest: Boolean,
        hasRegister: Boolean,
        userName: String,
        userId: Number,
    }
}
</script>

<style>

</style>

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
                                <li class="nav-link">
                                    Turno: {{turn.number}} - {{turn.date}}      
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
import { async } from 'q';
import { mapState, mapGetters } from 'vuex'
export default {
    mounted(){
        console.log('Component navbar mounted...');
        console.log('Turn on navbar: ' + this.turn.user_id);
        if(this.$store.getters.getUserId == 0){
            this.setUserIdOnState();
        }
        if(typeof this.$store.getters.turn === 'undefined'){
            console.log('the turn obj is not defined on store...');
            this.getTurnData();
        }
        else{
            var dateFormat = require('dateformat')
            var turnDate = new Date(this.turn.date)   
            this.date = dateFormat(turnDate,'dd/mm/yyyy HH:MM:ss')
            this.turnNumber = this.turn.number
        }

    },
    data(){
        return {
            date: '',
            turnNumber: 0,
            withoutTurn: false,
        }
    },
    methods:{
        setUserIdOnState(){
            this.$store.commit('setUserId',this.userId);
            },
        setTurnOnState(turn){
            this.$store.commit('setTurn',turn);
        },
        async getTurnData(){
        console.log('getting data from api...')
            let response = await axios.get('/api/open_turns/'+this.userId)
            if(response.data.length != 0){
                var lastResult = response.data[response.data.length - 1];
                var dateFormat = require('dateformat')
                var turnDate = new Date(lastResult.date)   
                this.date = dateFormat(turnDate,'dd/mm/yyyy HH:MM')
                this.turnNumber = lastResult.number
                this.setTurnOnState(lastResult);
            }
            else{
                this.withoutTurn = true
            }
        }
    },
    computed: {
        getUserId(){
            return this.$store.getters.getUserId;
        },
        ...mapState(['turn']),
    },
    watch:{
        turn(oldValue,newValue){
            this.turnNumber = newValue.number
            this.date = newValue.date
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

<template>
    <nav class="navbar navbar-expand-md navbar-la24gnc navbar-dark bg-inverse">
        <div class="container-fluid">
            <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                   <div v-if="this.isGuest">
                        <li class="nav-item">
                            <a class="nav-link" :href="this.routeLogin">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" :href="this.routeRegister">Register</a>
                        </li>
                    </div>
                    <div v-else>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{this.userName}}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" :href="this.routeLogout"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" :action="this.routeLogout" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </div>
                </ul>
            </div>
        </div>
    </nav>    
</template>

<script>
export default {
    mounted(){
        console.log('Component navbar mounted...');
        console.log('routeLogin: '+this.routeLogin);
    },
    methods:{
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
        userName: String
    }
}
</script>

<style>
    

</style>

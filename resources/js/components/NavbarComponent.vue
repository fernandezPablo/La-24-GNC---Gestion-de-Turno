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
        console.log('routeLogin: '+this.routeLogin);
        console.log('routeLogout: '+this.routeLogout);
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

<template>
    <div>
        <nav>
            <div>
                <h3 id="sidebar-header">
                   <img id="img-header" src="img/icon-brand.png" v-on:click="expandSidebar"> <span v-if="expanded">LA 24 GNC</span>
                </h3>
            </div>
            <ul class="list-unstyled">
                <router-link :to="{path: routes[index], params: {userId: userId}}" v-for="(item,index) in items" v-bind:key="item.id">
                    <li class="sidebar-item">
                        <i id="img-header" class="material-icons icon">{{icons[index]}}</i> <span v-if="expanded">{{item.name}}</span>
                    </li>
                </router-link>
            </ul>
        </nav>
    </div>
    
</template>

<script>
export default {
    mounted(){
        console.log('Sidebar Mounted...')
        window.addEventListener('resize',this.onResize)
    },
    methods:{
        onResize(event){
            let sidebar = document.getElementById("sidebar")
            if(window.innerWidth < 770){
                sidebar.classList.remove("sidebar-expanded")
                sidebar.classList.add("sidebar-minimized")
                this.expanded = false
            }
            else{
                sidebar.classList.remove("sidebar-minimized")
                sidebar.classList.add("sidebar-expanded")
                this.expanded = true
            }
        },
        expandSidebar(){
            if(!this.expanded){
                console.log('expand sidebar')
                sidebar.classList.remove("sidebar-minimized")
                sidebar.classList.add("sidebar-expanded")
                this.expanded = true
            }
            else{
                if(window.innerWidth < 770){
                    console.log('expand sidebar')
                    sidebar.classList.remove("sidebar-expanded")
                    sidebar.classList.add("sidebar-minimized")
                    this.expanded = false
                }
            }
        }
    },
    data(){
        return{
            items: [{id: 1, name: 'ABRIR TURNO'},{id: 2, name: 'VENTA'},{id: 3, name: 'A DECLARAR'},{id: 4, name: 'CERRAR TURNO'},{id: 5, name: 'ABM PRODUCTOS'},{id: 1, name: 'CONSULTAR TURNO'}],
            icons: ['open_in_new','credit_card','local_atm','exit_to_app','assignment','search'],
            routes: ['/abrirTurno','/venta','/a_declarar','/cerrarTurno','/abmProductos','/consultarTurno'],
            expanded: true,
        }
    },
    props:{
        userId: Number,
    }
}
</script>

<style>
 
</style>

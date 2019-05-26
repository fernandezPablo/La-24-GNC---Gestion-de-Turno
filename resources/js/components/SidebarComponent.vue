<template>
    <div>
        <nav>
            <div>
                <h3 id="sidebar-header">
                   <img id="img-header" src="img/icon-brand.png" v-on:click="expandSidebar"> <span v-if="expanded">LA 24 GNC</span>
                </h3>
            </div>
            <ul class="list-unstyled">
                <li class="sidebar-item" v-for="(item,index) in items">
                    <i id="img-header" class="material-icons icon">{{icons[index]}}</i> <span v-if="expanded">{{item}}</span>
                </li>
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
            items: ['ABRIR TURNO','VENTA','DESCUENTOS','CERRAR TURNO','ABM PRODUCTOS','CONSULTAR TURNO'],
            icons: ['open_in_new','credit_card','local_atm','exit_to_app','assignment','search'],
            expanded: true,
        }
    },
}
</script>

<style>
 
</style>

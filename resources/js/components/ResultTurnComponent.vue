<template>
    <div class="main-div">
       
       <!-- Tab Links -->
       <div class="tab">
           <button class="tablinks" v-on:click="openTabContent('gnc')">
               GNC
           </button>
           <button class="tablinks" v-on:click="openTabContent('oil')">
               ACEITE
           </button>
           <button class="tablinks" v-on:click="openTabContent('various')">
               VARIOS
           </button>
           <button class="tablinks" v-on:click="openTabContent('totals')">
               TOTALES
           </button>
           <button class="tablinks" v-on:click="openTabContent('to-declare')">
               A DECLARAR
           </button>
       </div>

        <!-- tab content -->
        <div class="tabcontent" id="gnc">
            <gnc-table-component :result-gnc="result.gnc"></gnc-table-component>            
        </div>

        <div class="tabcontent" id="oil">
            <oil-table-component :result-oil="result.oil"></oil-table-component>
        </div>

        <div class="tabcontent" id="various">
            <various-table-component :result-various="result.various"></various-table-component>
        </div>

        <div class="tabcontent" id="totals">
           <totals-table-component :totals="result.totals"></totals-table-component>
        </div>
        
        <div class="tabcontent" id="to-declare">
            <to-declare-table-component :result-to-declares="result.toDeclares"></to-declare-table-component>
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
    mounted(){
        this.overlay = true;
        document.getElementById('gnc').style.display = "block";
        document.getElementsByClassName('tablinks')[0].className += " active";
        axios.get('/api/get_result_closed_turn/'+this.turnId).then(
            response => {
                console.log('Initials aforadors: '+ response.data);
                this.result = response.data;
                this.overlay = false;
            }
        );
    },
    methods: {
            openTabContent(tabName) {
                // Declare all variables
                var i, tabcontent, tablinks;

                // Get all elements with class="tabcontent" and hide them
                tabcontent = document.getElementsByClassName("tabcontent");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
                }

                // Get all elements with class="tablinks" and remove the class "active"
                tablinks = document.getElementsByClassName("tablinks");
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace(" active", "");
                }

                // Show the current tab, and add an "active" class to the button that opened the tab
                document.getElementById(tabName).style.display = "block";
                event.target.className += " active";
            },
    },
    data(){
        return {
            tabs: ['GNC','ACEITE','VARIOS','TOTALES','A DECLARAR'],
            result: {},
            overlay: false,
        }
    },
    props: {
        turnId: Number
    },
}
</script>

<style>

</style>
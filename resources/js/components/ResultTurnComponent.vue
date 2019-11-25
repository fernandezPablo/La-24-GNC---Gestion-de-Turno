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
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col" v-for="headerGnc in headersGnc" v-bind:key="headerGnc">
                            {{ headerGnc }}
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>123</td>
                        <td>456</td>
                        <td>333</td>
                    </tr>
                    <tr>
                        <td>123</td>
                        <td>456</td>
                        <td>333</td>
                    </tr>
                    <tr>
                        <td>123</td>
                        <td>456</td>
                        <td>333</td>
                    </tr>
                    <tr class="table-active">
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="table-active"></td>
                        <th>m3</th>
                        <td>789</td>
                    </tr>
                    <tr>
                        <td class="table-active"></td>
                        <th class="table-success">$ GNC</th>
                        <td class="table-success">15369</td>
                    </tr>
                    <tr>
                        <td class="table-active"></td>
                        <th>$ GNC s c/c</th>
                        <td>13253</td>
                    </tr>
                    <tr>
                        <td class="table-active"></td>
                        <th>descuento</th>
                        <td>1325.3</td>
                    </tr>
                    <tr>
                        <td class="table-active"></td>
                        <th>$ GNC c/descuento</th>
                        <td>11265</td>
                    </tr>
                </tbody>
            </table>
            
        </div>

        <div class="tabcontent" id="oil">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col" v-for="headerOil in headersOil" v-bind:key="headerOil">
                            {{ headerOil }}
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>123.4</td>
                        <td>124.4</td>
                        <td>1</td>
                    </tr>
                    <tr class="table-active">
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="table-active"></td>
                        <th>lts</th>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td class="table-active"></td>
                        <th class="table-success">Total ($)</th>
                        <td class="table-success">160</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="tabcontent" id="various">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col" v-for="headerVarious in headersVarious" v-bind:key="headerVarious">
                            {{ headerVarious }}
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td> Hielo x 5kg </td>
                        <td> 3 </td>
                        <td> 240 </td>
                    </tr>
                    <tr>
                        <td> Hielo x 15kg </td>
                        <td> 1 </td>
                        <td> 140 </td>
                    </tr>
                    <tr class="table-active">
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="table-active"></td>
                        <th class="table-success">TOTAL $</th>
                        <td class="table-success">380</td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <div class="tabcontent" id="totals">
           <table class="table">
               <tbody>
                   <tr>
                        <th>
                            TOTAL GNC ($)
                        </th>
                        <td>
                            15235
                        </td>
                   </tr>
                   <tr>
                       <th>
                           TOTAL ACEITE ($)
                       </th>
                       <td>
                           265
                       </td>
                   </tr>
                   <tr>
                       <th>
                           TOTAL VARIOS ($)
                       </th>
                       <td>
                           123
                       </td>
                   </tr>
                   <tr class="table-active">
                       <td></td>
                       <td></td>
                   </tr>
                   <tr>
                       <th class="table-success">
                           TOTAL ($)
                       </th>
                       <td class="table-success">
                           17659
                       </td>
                   </tr>
               </tbody>
           </table>
        </div>

        <div class="tabcontent" id="to-declare">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col" v-for="headerToDeclare in headersToDeclare" v-bind:key="headerToDeclare">
                            {{ headerToDeclare }}
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>BUZON</td>
                        <td>Cambio</td>
                        <td>1000</td>
                    </tr>
                    <tr>
                        <td>BUZON</td>
                        <td>Sin Descripcion</td>
                        <td>6000</td>
                    </tr>
                    <tr>
                        <td>CUENTA CORRIENTE</td>
                        <td>Elias</td>
                        <td>3256.2</td>
                    </tr>
                    <tr>
                        <td>VALE</td>
                        <td>Castillo</td>
                        <td>1500</td>
                    </tr>
                    <tr>
                        <td>VALE</td>
                        <td>Descuento</td>
                        <td>1236</td>
                    </tr>
                    <tr class="table-active">
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="table-active"></td>
                        <th class="table-success">TOTAL $</th>
                        <td class="table-success">17659</td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</template>

<script>
export default {
    mounted(){
        console.log(this.$vuetify.breakpoint)
        document.getElementById('gnc').style.display = "block";
        document.getElementsByClassName('tablinks')[0].className += " active";

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
            headersGnc: ['Valor inicial aforador', 'Valor final aforador', 'diferencia'],
            headersOil: ['Valor inicial aceite', 'Valor final aceite', 'diferencia'],
            headersVarious: ['Descripcion','Cantidad','Subtotal'],
            headersToDeclare: ['Tipo','Descripcion','Monto'],
            afGncIni: [],
            afGncFin: [],
            difAfGnc: []
        }
    }
}
</script>

<style>

</style>
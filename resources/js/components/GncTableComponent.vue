<template>
    <table class="table">
                <thead>
                    <tr>
                        <th scope="col" v-for="headerGnc in headersGnc" v-bind:key="headerGnc">
                            {{ headerGnc }}
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(element,index) in resultGnc.aforadorsIn" v-bind:key="index">
                        <td>{{ index + 1}}</td>
                        <td>{{ resultGnc.aforadorsIn[index] }} </td>
                        <td>{{ resultGnc.aforadorsOut[index] }}</td>
                        <td>{{ parseFloat(resultGnc.difference[index].toFixed(2)) }}</td>
                    </tr>
                    <tr class="table-active">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <th>PMZ </th>
                        <td>{{ resultGnc.pmzIn }}</td>
                        <td>{{ resultGnc.pmzOut }}</td>
                        <td>{{ parseFloat(resultGnc.pmzDifference).toFixed(2) }}</td>
                    </tr>
                    <tr class="table-active">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="table-active"></td>
                        <td class="table-active"></td>
                        <th>m3</th>
                        <td>{{ parseFloat(resultGnc.m3.toFixed(2)) }}</td>
                    </tr>
                    <tr>
                        <td class="table-active"></td>
                        <td class="table-active"></td>
                        <th class="table-success">$ GNC</th>
                        <td class="table-success">{{ parseFloat(resultGnc.totalGnc).toFixed(2) }}</td>
                    </tr>
                    <tr>
                        <td class="table-active"></td>
                        <td class="table-active"></td>
                        <th>$ GNC s c/c</th>
                        <td>{{ parseFloat(resultGnc.totalGncWCA).toFixed(2) }}</td>
                    </tr>
                    <tr>
                        <td class="table-active"></td>
                        <td class="table-active"></td>
                        <th>descuento</th>
                        <td>{{ parseFloat(resultGnc.discount).toFixed(2) }}</td>
                    </tr>
                    <tr>
                        <td class="table-active"></td>
                        <td class="table-active"></td>
                        <th>$ GNC c/descuento</th>
                        <td>{{ parseFloat(resultGnc.totalGncWithDiscount).toFixed(2) }}</td>
                    </tr>
                </tbody>
            </table>    
</template>

<script>
export default {
    mounted(){
        console.log(this.resultGnc);
    },
    data(){
        return{
            headersGnc: ['Número surtidor', 'Valor inicial aforador', 'Valor final aforador', 'diferencia'],
        }
    },
    props: {
        resultGnc: Object
    }
}
</script>

<style>

</style>
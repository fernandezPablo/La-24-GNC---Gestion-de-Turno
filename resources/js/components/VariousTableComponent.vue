<template>
    <table class="table">
        <thead>
             <tr>
                <th scope="col" v-for="headerVarious in headersVarious" v-bind:key="headerVarious">
                    {{ headerVarious }}
                 </th>
             </tr>
        </thead>
        <tbody>
            <tr v-for="(element,index) in resultVarious.descriptions" v-bind:key="element">
                <td> {{ resultVarious.descriptions[index] }} </td>
                <td> {{ parseFloat(resultVarious.amounts[index].toFixed(2)) }} </td>
                <td> {{ parseFloat(resultVarious.totals[index]).toFixed(2) }}</td>
            </tr>
            <tr class="table-active">
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td class="table-active"></td>
                <th class="table-success">TOTAL $</th>
                <td class="table-success">{{ parseFloat(resultVarious.total).toFixed(2) }}</td>
            </tr>
        </tbody>
    </table>
</template>

<script>
export default {
    data(){
        return {
            headersVarious: ['Descripcion','Cantidad','Subtotal'],
        }
    },
    methods:{
        round(number){
            return number.toFixed(2)
        }
    },
    props:{
        resultVarious: Object
    }
}
</script>

<style>

</style>
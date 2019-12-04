<template>
    <table class="table">
        <thead>
            <tr>
                <th scope="col" v-for="headerOil in headersOil" v-bind:key="headerOil">
                    {{ headerOil }}
                </th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="(element,index) in resultOil.aforadorsIn" v-bind:key="index">
                        <td>{{ resultOil.aforadorsIn[index] }} </td>
                        <td>{{ resultOil.aforadorsOut[index] }}</td>
                        <td>{{ resultOil.difference[index].toFixed(2) }}</td>
                    </tr>
            <tr class="table-active">
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td class="table-active"></td>
                <th>lts</th>
                <td>{{ parseFloat(resultOil.totalLts).toFixed(2) }}</td>
            </tr>
            <tr>
                <td class="table-active"></td>
                <th class="table-success">Total ($)</th>
                <td class="table-success">{{ parseFloat(resultOil.totalOil).toFixed(2) }}</td>
            </tr>
        </tbody>
    </table>
</template>

<script>
export default {
    data(){
        return {
             headersOil: ['Valor inicial aceite', 'Valor final aceite', 'diferencia'],
        }
    },
    props:{
        resultOil: Object
    }
}
</script>

<style>

</style>
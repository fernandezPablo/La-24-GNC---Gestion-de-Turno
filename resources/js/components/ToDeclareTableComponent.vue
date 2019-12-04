<template>
    <table class="table">
        <thead>
                    <tr>
                  <th scope="col" v-for="headerToDeclare in headersToDeclare" v-bind:key="headerToDeclare">
                      {{ headerToDeclare }}
                 </th>
             </tr>
        </thead>
        <tbody>
            <tr v-for="(element,index) in resultToDeclares.types" v-bind:key="element">
                <td> {{ resultToDeclares.types[index] }} </td>
                <td>{{ resultToDeclares.descriptions[index] }}</td>
                <td>{{ parseFloat(resultToDeclares.amounts[index]).toFixed(2) }}</td>
            </tr>
            
            <tr class="table-active">
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td class="table-active"></td>
                <th class="table-success">TOTAL $</th>
                <td class="table-success">{{ parseFloat(resultToDeclares.total).toFixed(2) }}</td>
            </tr>
        </tbody>
    </table>
</template>

<script>
export default {
    data(){
        return {
            headersToDeclare: ['Tipo','Descripcion','Monto'],
        }
    },
    props:{
        resultToDeclares: Object
    }
}
</script>

<style>

</style>
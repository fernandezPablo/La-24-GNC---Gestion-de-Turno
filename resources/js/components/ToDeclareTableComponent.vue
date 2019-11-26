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
</template>

<script>
export default {
    data(){
        return {
            headersToDeclare: ['Tipo','Descripcion','Monto'],
        }
    }
}
</script>

<style>

</style>
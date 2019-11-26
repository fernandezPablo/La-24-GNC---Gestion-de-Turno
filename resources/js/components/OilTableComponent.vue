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
</template>

<script>
export default {
    data(){
        return {
             headersOil: ['Valor inicial aceite', 'Valor final aceite', 'diferencia'],
        }
    },
}
</script>

<style>

</style>
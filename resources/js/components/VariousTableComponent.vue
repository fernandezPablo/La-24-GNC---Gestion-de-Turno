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
</template>

<script>
export default {
    data(){
        return {
            headersVarious: ['Descripcion','Cantidad','Subtotal'],
        }
    },
}
</script>

<style>

</style>
<template>
    <table class="table">
        <tbody>
            <tr>
                 <th>
                     TOTAL GNC ($)
                 </th>
                 <td>
                     {{ parseFloat(totals.gnc).toFixed(2) }}
                 </td>
            </tr>
            <tr>
                <th>
                    TOTAL ACEITE ($)
                </th>
                <td>
                    {{ parseFloat(totals.oil).toFixed(2) }}
                </td>
            </tr>
            <tr>
                <th>
                    TOTAL VARIOS ($)
                </th>
                <td>
                    {{ parseFloat(totals.various).toFixed(2) }}
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
                    {{ parseFloat(totals.total).toFixed(2) }}
                </td>
            </tr>
        </tbody>
    </table>
    
</template>

<script>
export default {
 props:{
     totals: Object
 }   
}
</script>

<style>

</style>
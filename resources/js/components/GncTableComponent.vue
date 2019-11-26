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
</template>

<script>
export default {
    data(){
        return{
            headersGnc: ['Valor inicial aforador', 'Valor final aforador', 'diferencia'],
        }
    },
}
</script>

<style>

</style>
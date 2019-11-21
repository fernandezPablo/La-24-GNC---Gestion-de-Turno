<template>
    <div class="main-div">
        <v-tabs
            centered
            dark
        >
            <v-tab v-for="tab in tabs" v-bind:key="tab">
                {{ tab }}
            </v-tab>
        </v-tabs>
    </div>
</template>

<script>
export default {
    data(){
        return {
            tabs: ['GNC','ACEITE','VARIOS','TOTALES','A DECLARAR'],
        }
    }
}
</script>

<style>

</style>
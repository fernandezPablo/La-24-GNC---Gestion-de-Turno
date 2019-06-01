<template>
    <div class="animation">
        <h2 class="text-center text-white">ABRIR TURNO</h2>
        <form class="form" action="">
            <div class="form-group">
                <label for="aforador1">AFORADOR 1</label>
                <input class="form-control" placeholder="VALOR DE ENTRADA DEL AFORADOR 1" type="number" name="aforador1" id="aforador1">
            </div>
            <div class="form-group">
                <label for="aforador2">AFORADOR 2</label>
                <input class="form-control" placeholder="VALOR DE ENTRADA DEL AFORADOR 2" type="number" name="aforador1" id="aforador2">
            </div>
            <div class="form-group">
                <label for="aforador3">AFORADOR 3</label>
                <input class="form-control" placeholder="VALOR DE ENTRADA DEL AFORADOR 3"  type="number" name="aforador3" id="aforador3">
            </div>
            <div class="form-group">
                <label for="aforador4">AFORADOR 4</label>
                <input class="form-control" placeholder="VALOR DE ENTRADA DEL AFORADOR 4" type="number" name="aforador4" id="aforador4">
            </div>
            <div class="form-group">
                <label for="aforador5">AFORADOR 5</label>
                <input class="form-control" placeholder="VALOR DE ENTRADA DEL AFORADOR 5" type="number" name="aforador5" id="aforador5">
            </div>
            <div class="form-group">
                <label for="aforador6">AFORADOR 6</label>
                <input class="form-control" placeholder="VALOR DE ENTRADA DEL AFORADOR 6" type="number" name="aforador6" id="aforador6">
            </div>
            <div class="form-group">
                <label for="aforador6">PMZ</label>
                <input class="form-control" placeholder="VALOR DE ENTRADA DEL PMZ" type="number" name="aforador6" id="aforador6">
            </div>
            <button class="btn btn-primary form-control" type="submit">GUARDAR</button>
        </form>
    </div>
</template>

<script>
export default {
    
}
</script>


<style>
    .animation{
        margin-top: 40px;
        animation-name: rotate;
        animation-duration: 1s;
    }

    @keyframes rotate{
        from {
            transform: rotate(0deg);
            opacity: 0;
        }
        to{
            transform: rotate(360deg);
            opacity: 1;
        }
    }

</style>

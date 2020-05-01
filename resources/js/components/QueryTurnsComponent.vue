<template>
    <div class="main-div">
        <h2 class="text-center text-white">CONSULTA DE TURNOS</h2>
        <div class="card card-search">
            <div class="card-body">
                <form action="" class="form">
                    <div class="form-row">
                        <div class="form-group col-md-10">
                            <label for="date">Fecha del turno</label>
                            <input id="date" type="date" class="form-control">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="" style="color: white">xxx</label>
                            <button class="form-control btn-primary">
                                <span class="material-icons">
                                    search
                                </span>
                            </button>
                        </div>
                    </div> 
                </form>
            </div>
        </div>
        <div class="card card-search mt-2">
            <div class="card-header">
                <h2 class="card-title text-center">Resultados de la busqueda</h2>
            </div>
            <div class="card-body bg-danger">
                <h4 class="text-center">No hay turnos para la fecha seleccionada</h4>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>
                                Nro. de Turno
                            </th>
                            <th>
                                Fecha del turno
                            </th>
                            <th>
                                Usuario
                            </th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>12/04/2020</td>
                            <td>Pablo</td>
                            <td>
                                <button>
                                    <span class="material-icons">
                                        visibility
                                    </span>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
       
    </div>
</template>

<script>
export default {
    
}
</script>

<style>
.card-search{
    margin-left: 20%;
    margin-right: 20%;
}
label{
    color: black;
}
</style>
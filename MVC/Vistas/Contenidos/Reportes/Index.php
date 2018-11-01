<div id="contenido-principal">
    <div class="container-fluid">
        <center><h1>Reportes</h1></center>
        <hr class="bg-danger">
    </div>
    <form action="#">
        <div class="row">
            <label for="#" class="col-form-label col-2">Seleccione Reporte de:</label>
            <div class="col-2">
                <select class="form-control">
                    <option value="">Ordenes Abiertas</option>
                    <option value="">Ordenes Activas</option>
                    <option value="">Ordenes Anuladas</option>
                    <option value="">Ordenes Cerradas</option>
                </select>
            </div>
            <label for="#" class="col-form-label col-1">Desde:</label>
            <div class="col-3">
                <input type="date" class="form-control">
            </div>
            <label for="" class="col-form-label col-1">Hasta:</label>
            <div class="col-3">
                <input type="date" class="form-control">
            </div>
        </div>
        <hr class="bg-dark">
        <div class="row justify-content-md-center">
            <button type="submit" class="btn btn-danger m-2">Generar Reporte</button>
            <button type="reset" class="btn btn-secondary m-2">Limpiar</button>
        </div>
    </form>
</div>
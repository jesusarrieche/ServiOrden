<div id="contenido-principal">
    <div class="container-fluid">
        <center><h1>Reportes</h1></center>
        <hr class="bg-danger">
    </div>
    <form action="?controlador=Reporte&accion=GenerarReporte" method="POST">
        <div class="row">
            <label for="#" class="col-form-label col-2">Seleccione Reporte de:</label>
            <div class="col-2">
                <select class="form-control" name="reporte" required>
                    <option value="" selected>-</option>
                    <option value="ABIERTAS">Ordenes Abiertas</option>
                    <option value="ANULADAS">Ordenes Anuladas</option>
                    <option value="CERRADAS">Ordenes Cerradas</option>
                </select>
            </div>
            <label for="#" class="col-form-label col-1">Desde:</label>
            <div class="col-3">
                <input type="date" class="form-control" name="fechaInicial" max="<?= date("d-m-Y")?>" required>
            </div>
            <label for="" class="col-form-label col-1">Hasta:</label>
            <div class="col-3">
                <input type="date" class="form-control" name="fechaFinal" required>
            </div>
        </div>
        <hr class="bg-dark">
        <div class="row justify-content-md-center">
            <button type="submit" class="btn btn-danger m-2">Generar Reporte</button>
            <button type="reset" class="btn btn-secondary m-2">Limpiar</button>
        </div>
    </form>
</div>
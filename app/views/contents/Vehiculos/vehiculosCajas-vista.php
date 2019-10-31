<div id="contenido-principal">
    <div class="container-fluid">
        <center><h1>Gestion de Vehiculos</h1></center>
        <hr class="bg-danger">
        <div class="row justify-content-center">
            <a href="<?php echo SERVERURL; ?>registroVehiculo" class="btn btn-success btn-lg m-3">Registrar <i class="fas fa-user-plus"></i></a>
            <button class="btn btn-secondary btn-lg m-3">Modificar <i class="fas fa-user-cog"></i></button>
            <button class="btn btn-danger btn-lg m-3">Habilitar/Inhabilitar <i class="fas fa-user-slash"></i></button>
        </div>
        <hr class="bg-danger">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Fecha Registro</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>S/M</th>
                    <th>Propietario</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>CL01</td>
                    <td>09/06/2018</td>
                    <td>Ford</td>
                    <td>Mustang</td>
                    <td>3595225526</td>
                    <td><a href="#">Jesus Arrieche</a></td> 
                    <td><input type="checkbox" name="seleccion"></td>
                </tr>
                <tr>
                    <td>CL02</td>
                    <td>09/06/2018</td>
                    <td>Toyota</td>
                    <td>Corolla</td>
                    <td><a href="#">Josnery Diaz</a></td>
                    <td>Rodamiento 30-36</td>
                </tr>
                <tr>
                    <td>CL01</td>
                    <td>09/06/2018</td>
                    <td>Chevrolet</td>
                    <td>Mantenimiento Caja Cj/354</td>
                    <td><a href="#">Maria Betancourt</a></td>
                    <td>Rodamiento 30-36</td>
                </tr>
                <tr>
                    <td>CL01</td>
                    <td>09/06/2018</td>
                    <td>Kia</td>
                    <td>Mantenimiento Caja Cj/354</td>
                    <td><a href="#">Jerson Pacheco</a></td>
                    <td>Rodamiento 30-36</td>
                </tr>    
                <tr>
                    <td>CL01</td>
                    <td>09/06/2018</td>
                    <td>Renault</td>
                    <td>Mantenimiento Caja Cj/354</td>
                    <td><a href="#">Jessica Perez</a></td>
                    <td>Rodamiento 30-36</td>
                </tr>

            </tbody>
        </table>
    </div>
    <div class="container-fluid">
        <center><h1>Gestion de Cajas</h1></center>
        <hr class="bg-danger">
        <div class="row justify-content-center">
            <a href="registro_orden.html" class="btn btn-success btn-lg m-3">Registrar <i class="fas fa-user-plus"></i></a>
            <button class="btn btn-secondary btn-lg m-3">Modificar <i class="fas fa-user-cog"></i></button>
            <button class="btn btn-danger btn-lg m-3">Habilitar/Inhabilitar <i class="fas fa-user-slash"></i></button>
        </div>
        <hr class="bg-danger">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>Nro Orden</th>
                    <th>Fecha Emision</th>
                    <th>Fecha Cierre</th>
                    <th>Descripcion</th>
                    <th>Mecanico Asignado</th>
                    <th>Repuestos Asignados</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>CL01</td>
                    <td>09/06/2018</td>
                    <td>15/06/2018</td>
                    <td>Mantenimiento Caja Cj/354</td>
                    <td><a href="#">Jesus Arrieche</a></td>
                    <td>Rodamiento 30-36</td> 
                    <td><input type="checkbox" name="seleccion" id=""></td>
                </tr>
                <tr>
                    <td>CL02</td>
                    <td>09/06/2018</td>
                    <td>15/06/2018</td>
                    <td>Mantenimiento Caja Cj/354</td>
                    <td><a href="#">Josnery Diaz</a></td>
                    <td>Rodamiento 30-36</td>
                </tr>
                <tr>
                    <td>CL01</td>
                    <td>09/06/2018</td>
                    <td>15/06/2018</td>
                    <td>Mantenimiento Caja Cj/354</td>
                    <td><a href="#">Maria Betancourt</a></td>
                    <td>Rodamiento 30-36</td>
                </tr>
                <tr>
                    <td>CL01</td>
                    <td>09/06/2018</td>
                    <td>15/06/2018</td>
                    <td>Mantenimiento Caja Cj/354</td>
                    <td><a href="#">Jerson Pacheco</a></td>
                    <td>Rodamiento 30-36</td>
                </tr>    
                <tr>
                    <td>CL01</td>
                    <td>09/06/2018</td>
                    <td>15/06/2018</td>
                    <td>Mantenimiento Caja Cj/354</td>
                    <td><a href="#">Jessica Perez</a></td>
                    <td>Rodamiento 30-36</td>
                </tr>

            </tbody>
        </table>
    </div>
</div>
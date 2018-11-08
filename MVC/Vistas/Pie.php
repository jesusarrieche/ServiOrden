    <!-- Fin Contenido Principal -->
     
</div>
    <!-- Fin Contenedor  -->

 
    <!-- Bootstrap core JavaScript -->
    <script src="Assets/js/bootstrap/bootstrap.js"></script>
    <script src="Assets/js/menu_lateral.js"></script>
    <script src="Assets/js/validacion.js" type="text/javascript"></script>
    <script src="Assets/js/select2.js"></script>
    <script src="Assets/js/sweetalert2.all.js"></script>

    <script src="lib/DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="lib/DataTables/DataTables-1.10.18/js/dataTables.bootstrap4.min.js" type="text/javascript"></script>
    
   
</body>

</html>

<script>
$(document).ready(function() {
    $('#datatable').DataTable({
        language: {
            "decimal": "",
            "emptyTable": "No hay información",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
            "infoEmpty": "Mostrando 0 a 0 de 0 Entradas",
            "infoFiltered": "(Filtrado de _MAX_ total entradas)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Mostrar _MENU_ Entradas",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "search": "Buscar:",
            "zeroRecords": "Sin resultados encontrados",
            "paginate": {
                "first": "Primero",
                "last": "Ultimo",
                "next": "Siguiente",
                "previous": "Anterior"
            }
        }
    });
} );

</script>

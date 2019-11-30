$(document).ready(function () {
    /**
     * DataTable
    */
    let table = $('#datatable').DataTable({
        serverSide: false,
        ordering: false,
        searching: true,
        ajax: {
            method: 'POST',
            url: '/FrameworkJD/compra/listar'
        },
        columns: [
            { data: 'num_compra' },
            { data: "fecha" },
            { data: 'proveedor' },
            { data: 'button' },
            { data: 'estado' }
        ],

        language: { 
                    "decimal":        "",
                    "emptyTable":     "No hay Registros Disponibles",
                    "info":           "Mostrando _START_ de _END_ para _TOTAL_ Entradas",
                    "infoEmpty":      "Mostrando 0 de 0 para 0 Entradas",
                    "infoFiltered":   "(Filtrado de _MAX_ Entradas en Total)",
                    "infoPostFix":    "",
                    "thousands":      ",",
                    "lengthMenu":     "Mostrar _MENU_ Entradas",
                    "loadingRecords": "Cargando...",
                    "processing":     "Procesando...",
                    "search":         "Buscar:",
                    "zeroRecords":    "No se encontraron coincidencias",
                    "paginate": {
                        "first":      "Primero",
                        "last":       "Ultimo",
                        "next":       "Siguiente",
                        "previous":   "Atras"
                    },
                    "aria": {
                        "sortAscending":  ": activate to sort column ascending",
                        "sortDescending": ": activate to sort column descending"
                    }
        }
    });


    /**
     * FUNCIONES
     */

    const buscarCompra = (url) => {
        $.ajax({
            type: "POST",
            url: url,        
            success: function (response) {
                json = JSON.parse(response);
                console.log(JSON.parse(response));

                $('#numero_compra').val(json.compra.num_compra);
                $('#documento_referencia').val(json.compra.referencia);
                $('#nombre_proveedor').val(json.compra.proveedor);
                $('#rif_proveedor').val(json.compra.rif_proveedor);
                $('#direccion_proveedor').val(json.compra.direccion);
                $('#total').val(json.compra.total);


                $('#cuerpo').empty();
                

                json.productos.forEach( element => {
                    
                    let row = `
                        <tr>
                            <td>${element.cantidad}</td>
                            <td>${element.codigo}</td>
                            <td>${element.nombre}</td>
                            <td>${element.precio}</td>
                            <td>${element.precio * element.cantidad}</td>
                        </tr>
                    `;


                    $('#cuerpo').append(row);
                    
                });
                
                
                $('#modalDetalleCompra').modal('show');

            },
            error: function (response) {
                console.log(response);
            }
        });
    }

    const cambiarEstatus = (id) => {
        $.ajax({
            type: "POST",
            url: "/FrameworkJD/compra/cambiarEstatus/" + id,
            success: function (response) {
                json = JSON.parse(response);

                Swal.fire(
                    json.titulo,
                    json.mensaje,
                    json.tipo
                );

                table.ajax.reload();
            },
            error: function (response) {
                console.log(JSON.parse(response));
            }
        });
    }


    /**
     * EVENTOS
     */
    
    $('body').on('click', '.mostrar', function (e) {
        e.preventDefault();

        $url = $(this).attr('href');

        buscarCompra($url);
    });

    $('body').on('click', '.estatus', function (e) {
        e.preventDefault();

        $url = $(this).attr('href');

        Swal.fire({
            title: 'Esta Seguro?',
            text: "Cambiara el estatus de la compra seleccionada y el stock de productos sera afectado",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancelar',
            confirmButtonText: 'Si, Cambiar!'
            }).then((result) => {
                if (result.value) {
                    cambiarEstatus($url);
                    
                }
            })

    });
});
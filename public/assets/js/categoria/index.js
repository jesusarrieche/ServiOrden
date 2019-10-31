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
        url: '/FrameworkJD/categoria/listar'
    },
    columns: [
        { data: 'nombre' },
        { data: "descripcion" },
        { data: 'estatus' },
        { data: 'button' }
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

const mostrarCategoria = (href, formulario, modal) => {

    $.ajax({
        type: "POST",
        url: href,
        success: function (response) {
            let json = JSON.parse(response);

            console.log(json);

            $(formulario).find('input#id').val(json.data.id);
            $(formulario).find('input#nombre').val(json.data.nombre);
            $(formulario).find('textarea#descripcion').val(json.data.descripcion);

 

            $(modal).modal('show');
            

        },
        error: (response) => {
            console.log(response);
        }
    });
}

const registrarCategoria = (datos) => {

    $.ajax({
        type: "POST",
        url: "/FrameworkJD/categoria/guardar",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function (response) {
            let json = JSON.parse(response);
            
            if( json.tipo == 'success'){

                Swal.fire(
                    json.titulo,
                    json.mensaje,
                    json.tipo
                );
    
                table.ajax.reload();
    
                $('#modalRegistroCategoria').modal('hide');
                $('#formularioRegistrarCategoria').trigger('reset');
            }else{
                Swal.fire(
                    json.titulo,
                    json.mensaje,
                    json.tipo
                );
            }

        },
        error: (response) => {
            console.log(response);
            
        }
    });



    // fetch('/FrameworkJD/categoria/guardar', { method: 'POST', body: datos })
    // .then((response) => {
    //     console.log(response);
    //     return response.json();
    // })
    // .then((json) => {
    //     Swal.fire(
    //         json.titulo,
    //         json.mensaje,
    //         json.tipo
    //     )

    //     table.ajax.reload();
    //     
    // })
    // .catch( (response) => {
    //     console.log(response);
    // });
}

const actualizarCategoria = (datos) => {
    $.ajax({
        type: "POST",
        url: "/FrameworkJD/categoria/actualizar",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function (response) {
            let json = JSON.parse(response);
            
            if( json.tipo == 'success'){

                Swal.fire(
                    json.titulo,
                    json.mensaje,
                    json.tipo
                );
    
                table.ajax.reload();
    
                $('#modalActualizarCategoria').modal('hide');
            }else{
                Swal.fire(
                    json.titulo,
                    json.mensaje,
                    json.tipo
                );
            }
        },
        error(response){
            console.log(response);
        }
    });
}

const eliminarCategoria = (id) => {
    $.ajax({
        type: "DELETE",
        url: "/FrameworkJD/categoria/eliminar/" + id,
        success: function (response) {
            const json = JSON.parse(response);
            if(json.tipo == 'success'){
                Swal.fire(
                    'Eliminado!',
                    'El registro ha sido eliminado!',
                    'success'
                    )

                table.ajax.reload();
            }
        },
        error: function (response) {
            console.log(response);
        }
    });
}

/**
 * Eventos
 */

$('#formularioRegistrarCategoria').submit(function (e) { 
        e.preventDefault();

        let datos = new FormData(document.querySelector('#formularioRegistrarCategoria'));
    //  console.log(datos.get('documento'));

        registrarCategoria(datos);   
});

// Mostrar Categoria
$('body').on('click', '.mostrar', function (e) { 
    e.preventDefault();

    mostrarCategoria($(this).attr('href'),'form#formularioMostrarCategoria','#modalMostrarCategoria');
});

// Editar Categoria

$('body').on('click', '.editar', function (e) {
    e.preventDefault();
    console.log($(this).attr('href'));

    mostrarCategoria($(this).attr('href'), 'form#formularioActualizarCategoria', '#modalActualizarCategoria');
});

$('#formularioActualizarCategoria').submit(function (e) {
    e.preventDefault();

    const datos = new FormData(document.querySelector('#formularioActualizarCategoria'));

    // console.log(datos.get('id'));
    actualizarCategoria(datos);
});


// Eliminar Categoria
$('body').on('click', '.eliminar', function (e) {
    e.preventDefault();

    Swal.fire({
        title: 'Esta Seguro?',
        text: "El categoria sera eliminado del sistema!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, eliminar!'
        }).then((result) => {
        if (result.value) {

            eliminarCategoria($(this).attr('href'));
            
        }
        })
    console.log($(this).attr('href'));
});

});

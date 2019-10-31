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
        url: '/FrameworkJD/cliente/listar'
    },
    columns: [
        { data: 'documento' },
        { data: "nombre" },
        { data: 'telefono' },
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

const mostrarCliente = (href, formulario, modal) => {

    $.ajax({
        type: "POST",
        url: href,
        success: function (response) {
            let json = JSON.parse(response);

            if(modal == '#modalActualizarCliente'){
                let doc = json.data.documento.split('-');
                let inicial = doc[0];
                let documento = doc[1];

                console.log(doc);
                $(formulario).find('input#documento').val(documento);
                $(formulario).find('select#inicial_documento').val(inicial);

            }else{
                $(formulario).find('input#documento').val(json.data.documento);

            }


            $(formulario).find('input#id').val(json.data.id);
            $(formulario).find('input#nombre').val(json.data.nombre);
            $(formulario).find('input#apellido').val(json.data.apellido);
            $(formulario).find('input#telefono').val(json.data.telefono);
            $(formulario).find('input#correo').val(json.data.email);
            $(formulario).find('input#direccion').val(json.data.direccion);

            $(modal).modal('show');
            

        },
        error: (response) => {
            console.log(response);
        }
    });
}

const registrarCliente = (datos) => {

    $.ajax({
        type: "POST",
        url: "/FrameworkJD/cliente/guardar",
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
    
                $('#modalRegistroCliente').modal('hide');
                $('#formularioRegistrarCliente').trigger('reset');
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



    // fetch('/FrameworkJD/cliente/guardar', { method: 'POST', body: datos })
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

const actualizarCliente = (datos) => {
    $.ajax({
        type: "POST",
        url: "/FrameworkJD/cliente/actualizar",
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
    
                $('#modalActualizarCliente').modal('hide');
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

const eliminarCliente = (id) => {
    $.ajax({
        type: "DELETE",
        url: "/FrameworkJD/cliente/eliminar/" + id,
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

$('#formularioRegistrarCliente').submit(function (e) { 
     e.preventDefault();

     let datos = new FormData(document.querySelector('#formularioRegistrarCliente'));

    //  console.log(datos.get('documento'));

     registrarCliente(datos);   
});

// Mostrar Cliente
$('body').on('click', '.mostrar', function (e) { 
    e.preventDefault();

    mostrarCliente($(this).attr('href'),'form#formularioMostrarCliente','#modalMostrarCliente');
});

// Editar Cliente

$('body').on('click', '.editar', function (e) {
    e.preventDefault();
    console.log($(this).attr('href'));

    mostrarCliente($(this).attr('href'), 'form#formularioActualizarCliente', '#modalActualizarCliente');
});

$('#formularioActualizarCliente').submit(function (e) {
    e.preventDefault();

    const datos = new FormData(document.querySelector('#formularioActualizarCliente'));

    console.log(datos.get('id'));

    actualizarCliente(datos);
});


// Eliminar Cliente
$('body').on('click', '.eliminar', function (e) {
    e.preventDefault();

    Swal.fire({
        title: 'Esta Seguro?',
        text: "El cliente sera eliminado del sistema!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, eliminar!'
      }).then((result) => {
        if (result.value) {

            eliminarCliente($(this).attr('href'));
          
        }
      })
    console.log($(this).attr('href'));
});

});

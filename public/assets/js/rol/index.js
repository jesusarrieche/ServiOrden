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
            url: '/FrameworkJD/rol/listar'
        },
        columns: [
            { data: 'numero' },
            { data: 'nombre' },
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

    const cargarPermisos = () => {
        $.ajax({
            type: "POST",
            url: href,
            success: function (response) {
                let json = JSON.parse(response);
    
                if(modal == '#modalActualizarRol'){
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
    
    const mostrarRol = (href, formulario, modal) => {
    
        $.ajax({
            type: "POST",
            url: href,
            success: function (response) {
                let json = JSON.parse(response);
    
                if(modal == '#modalActualizarRol'){
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
    
    const registrarRol = (datos) => {
    
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
        
                    $('#modalRegistroRol').modal('hide');
                    $('#formularioRegistrarRol').trigger('reset');
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
    
    const actualizarRol = (datos) => {
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
        
                    $('#modalActualizarRol').modal('hide');
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
    
    const eliminarRol = (id) => {
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
    
    $('#formularioRegistrarRol').submit(function (e) { 
         e.preventDefault();
    
         let datos = new FormData(document.querySelector('#formularioRegistrarRol'));
    
        //  console.log(datos.get('documento'));
    
         registrarRol(datos);   
    });
    
    // Mostrar Rol
    $('body').on('click', '.mostrar', function (e) { 
        e.preventDefault();
    
        mostrarRol($(this).attr('href'),'form#formularioMostrarRol','#modalMostrarRol');
    });
    
    // Editar Rol
    
    $('body').on('click', '.editar', function (e) {
        e.preventDefault();
        console.log($(this).attr('href'));
    
        mostrarRol($(this).attr('href'), 'form#formularioActualizarRol', '#modalActualizarRol');
    });
    
    $('#formularioActualizarRol').submit(function (e) {
        e.preventDefault();
    
        const datos = new FormData(document.querySelector('#formularioActualizarRol'));
    
        console.log(datos.get('id'));
    
        actualizarRol(datos);
    });
    
    
    // Eliminar Rol
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
    
                eliminarRol($(this).attr('href'));
              
            }
          })
        console.log($(this).attr('href'));
    });
    
    });
    
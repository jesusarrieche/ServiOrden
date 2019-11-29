$(document).ready(function () {
    
    /**
     * FUNCIONES
     */
    
    const buscarProducto = (codigo) => {

        let producto = productos.find( element => element.codigo === codigo);

        return producto;
    }

    const buscarProveedor = (documento) => {

        let proveedor = proveedores.find( element => element.documento === documento);

        return proveedor;
    }
    /**
     * FIN
     */

    /**
     * Eventos
     */

    $('#listadoProductos').change(function (e) { 
        e.preventDefault();
        
        let producto = buscarProducto($(this).val());

        $('#nombreProducto').val(producto.nombre);
        $('#stockProducto').val(producto.stock);
    });



    $('#agregarProducto').click(function (e) { 
        e.preventDefault();

        
        let producto = buscarProducto($('#listadoProductos').val());
        
        Swal.fire(
            producto.nombre + ' Agregado',
            'Producto Agregado correctamente',
            'success'   
        )

        let fila = `
            <tr>
                <td>
                    <input type="text" name="productos[]" class="form-control-plaintext" value="${producto.id}" hidden>
                    <input type="text" name="" class="form-control-plaintext" value="${producto.codigo}" disabled>
                </td>
                <td>
                    <input type="text" class="form-control-plaintext" value="${producto.nombre}" disabled>
                </td>
                <td>
                    <input type="number" name="cantidades[]" class="form-control cantidad" value="1" min="1"" required>
                </td>
                <td>
                    <input type="text" class="form-control-plaintext" value="${producto.stock}" disabled>
                </td>
                <td>
                    <input type="number" name="precios[]" class="form-control precio" value="0" min="1" required>
                </td>
                <td>
                    <input type="number" class="form-control-plaintext total" value="0" disabled>
                </td>
                <td>
                    <button class="btn btn-danger eliminar"><i class="fas fa-trash-alt text-white"></i></button>
                </td>
            </tr>`;

        $('#cuerpo').append(fila);
        $('#listadoProductos').val('');

    });


    // Cambio en input de labla de productos
    $('#tproductos').on('change', 'input', function(e){
    e.preventDefault();
    // alert('funciona');

    let row = $(this).closest('tr');
    let total = row.find('.cantidad').val() * row.find('.precio').val();

    row.find('.total').val(total);

    let elementos = document.querySelectorAll('.total');

    total = 0;

    elementos.forEach(element => {
        total = parseFloat(total) + parseFloat(element.value);
    })

    $('#totalVenta').val(total);    
    
    });

    // Eliminar Articulo de la Lista
    $('tbody').on('click', '.eliminar',function (e) { 
        e.preventDefault();
        
        $(this).parents('tr').remove();

    });

    //Agregar Proveedor
    $('#agregarProveedor').click(function (e) { 
        e.preventDefault();

        Swal.fire(
            'Proveedor agregado!',
            'Se ha seleccionado un proveedor correctamente',
            'success'
        )

        let proveedor = buscarProveedor($('#listadoProveedores').val());

        $('#proveedor').val(proveedor.id);
        $('#documentoProveedor').val(proveedor.documento);
        $('#nombreProveedor').val(proveedor.razon_social);

        console.log(proveedor);
        
    });

    $('#formularioCompra').submit(function (e){
        e.preventDefault();
    
        /**
         * Proveedor
         */
    
        if($('#proveedor').val() == '' || $('#proveedor').val() == null){
            Swal.fire(
                'Seleccione un Proveedor',
                'Debe incluir un proveedor en la compra',
                'warning'
            )
    
            return false;
        }
    
        /**
         * Total Venta
         */
    
        let form = $(this)
    
        let totalfilas = document.querySelectorAll('.total');
        let total = 0;
    
        totalfilas.forEach(element => {
                // console.log(element);
                total += parseFloat(element.value);
        });
    
        if(total == 0){
            Swal.fire(
                'Compra Vacia',
                'Debe selecciona al menos un articulo',
                'warning'
            )
    
            return false;
        }
    
        $('#total').val(total);
    
        console.log(total)
    
    
        
        $.ajax({
            type: "POST",
            url: form.attr('action'),
            data: form.serialize(),
            success: function (response) {
                debugger
               json = JSON.parse(response);
                console.log(json);

                
                Swal.fire(
                    json.titulo,
                    json.mensaje,
                    json.tipo
                );

                setTimeout(function(){
                    location.reload();
                },2000);
            },
            error: function (response) {
                console.log(response);
            }
        });
    })

});
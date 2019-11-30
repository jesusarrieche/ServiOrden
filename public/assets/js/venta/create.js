$(document).ready(function () {
    
    /**
     * FUNCIONES
     */
    
    const buscarProducto = (codigo) => {

        let producto = productos.find( element => element.codigo === codigo);

        return producto;
    }

    const buscarCliente = (documento) => {

        let cliente = clientes.find( element => element.documento === documento);

        return cliente;
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
                    <input type="number" name="cantidades[]" class="form-control cantidad" value="1" min="1" max="${producto.stock}" required>
                </td>
                <td>
                    <input type="text" class="form-control-plaintext" value="${producto.stock}" disabled>
                </td>
                <td>
                    <input type="number" class="form-control-plaintext" value="${producto.precio_venta}" disabled>
                    <input type="number" name="precios[]" class="form-control precio" value="${producto.precio_venta}" hidden required>

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

        row.find('.total').val(total.toFixed(2));

        let elementos = document.querySelectorAll('.total');

        total = 0;

        elementos.forEach(element => {
            total = parseFloat(total) + parseFloat(element.value);
        })

        
        let impuestos = total * (iva/100);
        

        $('#impuesto').val(impuestos.toFixed(2));
        $('#subtotal').val(total.toFixed(2));
        $('#totalVenta').val((total + impuestos).toFixed(2));    
    
    });

    // Eliminar Articulo de la Lista
    $('tbody').on('click', '.eliminar',function (e) { 
        e.preventDefault();
        
        $(this).parents('tr').remove();

    });

    //Agregar Cliente
    $('#agregarCliente').click(function (e) { 
        e.preventDefault();

        Swal.fire(
            'Cliente agregado!',
            'Se ha seleccionado un cliente correctamente',
            'success'
        )

        let cliente = buscarCliente($('#listadoClientes').val());

        $('#cliente').val(cliente.id);
        $('#documentoCliente').val(cliente.documento);
        $('#nombreCliente').val(cliente.nombre);

        console.log(cliente);
        
    });

    $('#formularioCompra').submit(function (e){
        e.preventDefault();
    
        /**
         * Cliente
         */
    
        if($('#cliente').val() == '' || $('#cliente').val() == null){
            Swal.fire(
                'Seleccione un Cliente',
                'Debe incluir un cliente en la Venta',
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
                'Venta Vacia',
                'Debe seleccionar al menos un articulo',
                'warning'
            )
    
            return false;
        }

        let impuestos = total * (iva/100);

        total = total + impuestos;
    
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
$(document).ready(function(){
	$("#enviar").on("click",function(){
		
		var inicial_identificacion_ajax = $("#inicial_identificacion").val();
		var identificacion_ajax         = $("#identificacion").val();
		var nombre_ajax                 = $("#nombre").val();
		var apellido_ajax               = $("#apellido").val();
		var direccion_ajax              = $("#direccion").val();
		var telefono_ajax               = $("#telefono").val();
		var correo_ajax                 = $("#correo").val();
                
                 
                swal({
                  title: 'Esta Seguro?',
                  text: "Los datos seran almacenados permanentemente",
                  type: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Aceptar',
                  cancelButtonText: 'Cancelar'
                }).then((result) => {
                  if (result.value) {
                      $.ajax({
                          url:"Ajax/ClienteAjax.php",
                          data:{inicial_identificacion:inicial_identificacion_ajax, identificacion:identificacion_ajax, nombre:nombre_ajax,
                                apellido:apellido_ajax, direccion:direccion_ajax, telefono:telefono_ajax, correo:correo_ajax},
                          type:"POST",
                          success:function(dat){
                            
                              $(".formulario")[0].reset();
                          }
                      });
                  }
                });
                
	});
        
//        function cargar_clientes(clientes){
//            var tabla = $("#cuerpo");
//            
//            for (var i=0; i < clientes.length; i++){
//                var tr = $("<tr></tr>");
//                var col_identificacion = $("<td>" + clientes[i].identificacion + "</td>");
//                var col_nombre = $("<td>" + clientes[i].nombre + "</td>");
//                var col_telefono = $("<td>" + clientes[i].telefono + "</td>");
//              
//                
//                tr.append(col_identificacion);
//                tr.append(col_nombre);
//                tr.append(col_telefono);
//                
//                tabla.append(tr);
//            }
//            
//        }
//        
        $("#listar").on("click", function (e){
            e.preventDefault();
            
            $.ajax({
                    url:"Ajax/ClienteAjax.php",
                    data:{},
                    type:"POST",
                    success:function(respuesta){
                        var clientes = JSON.parse(respuesta);
                        var tabla;
                        for (var i=0; i < clientes.length; i++){
                            tabla += "<tr><td>" + clientes[i].identificacion + "</td><td>" + clientes[i].nombre + "</td><td>"+ clientes[i].telefono + "</td>";
                        }
                        
                        $("#cuerpo").html(tabla);
                    }
                    
                });
        })
        
        
});
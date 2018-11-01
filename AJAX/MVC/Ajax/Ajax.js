$(document).ready(function(){
	$("#enviar").click(function(){
		
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
                          success:function(datos){
                              $("#resultado").html(datos);
                              $(".formulario")[0].reset();
                          }
                      });
                  }
                });
                
	});
});
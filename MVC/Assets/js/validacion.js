$(document).ready(function(){
    
    // BLOQUE DE ALERTAS
	
	//alerta de envio de formularios 
   $("#enviar").on("click",function(e){
       e.preventDefault();

       var password1 = $("#password1").val();
       var password2 = $("#password2").val();

       if(password1 != password2){

          swal(
            'Las Contraseñas no coinciden',
            'Por favor verifique e intente de nuevo',
            'error'
          );
          
       }else {
         
         swal({
          title: 'Esta Seguro?',
          text: "Los datos seran almacenados en el sistema",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Aceptar',
          cancelButtonText: 'Cancelar'
        }).then((result) => {
          if (result.value) {
              $(".formulario").submit();
          }
        });

       }       

   });

   //alerta de eliminacion logica de registros
   $(".eliminar").on("click",function(e){
       e.preventDefault();

       swal({
          title: 'Esta Seguro?',
          text: "El Registro sera eliminado del sistema",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Aceptar',
          cancelButtonText: 'Cancelar'
        }).then((result) => {
          if (result.value) {
              var ruta = $(this).attr('href');
              $(location).attr('href',ruta);
          }
        });

   });

   //BLOUE DE VALIDACIONES

   //Registro de Usuarios


});
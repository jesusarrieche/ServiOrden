$(document).ready(function(){

    // Menu Lateral mostrar
    $("#menu-mostrar").click(function(e) {
        e.preventDefault();
        $("#contenedor-principal").toggleClass("mostrar");
    });

    $(".selectorBusqueda").select2();

  
});
   
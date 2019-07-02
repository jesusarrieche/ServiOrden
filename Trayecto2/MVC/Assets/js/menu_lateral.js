$(document).ready(function(){

    // Menu Lateral mostrar
    $("#menu-mostrar").click(function(e) {
        e.preventDefault();
        $("#contenedor-principal").toggleClass("mostrar");
    });

    // Select2
    $(".selectorBusqueda").select2();

  
});
   
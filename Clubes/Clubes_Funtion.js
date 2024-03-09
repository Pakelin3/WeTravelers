$(document).ready(function () {
    // Función para ajustar la altura de la lista
    function adjustListHeight() {
        var sidebarHeight = $("#panel-lateral").height();
        var adjustedHeight = sidebarHeight - 350; // Ajusta este valor según tus necesidades

        // Establecer la altura de la lista
        $("#chatList").css("max-height", adjustedHeight + "px");
    }

    // Ajustar la altura de la lista cuando se carga la página
    adjustListHeight();

    // Ajustar la altura de la lista cuando cambia el tamaño de la ventana
    $(window).resize(function () {
        adjustListHeight();
    });

    // se puede ajustar la altura de la lista cuando cambie el contenido del sidebar
    // en dado caso que se agregen o eliminen elementos del sidebar
    // $("#sidebar").on("change", function() {
    //     adjustListHeight();
    // });
});

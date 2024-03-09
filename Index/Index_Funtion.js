document.addEventListener('DOMContentLoaded', function () {
    var botonInicio = document.getElementById('botonInicio');

    botonInicio.addEventListener('click', function (event) {
        event.preventDefault();
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
});

var btn_upload = $("#upload_file"),
    button_outer = $(".button_outer"),
    barra_progreso = $(".barra_progreso");
btn_upload.on("change", function (e) {
    var ext = btn_upload.val().split('.').pop().toLowerCase();
    if ($.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
        $(".error_msg").text("Not an Image...");
    } else {
        $(".error_msg").text("");
        barra_progreso.addClass("file_uploading");
        setTimeout(function () {
            // barra_progreso.addClass("file_uploaded");
        }, 3000);
        var uploadedFile = URL.createObjectURL(e.target.files[0]);
        setTimeout(function () {
            $("#uploaded_view").append('<img src="' + uploadedFile + '" />').addClass("show");
        }, 3500);
    }
});
$(".file_remove").on("click", function (e) {
    $("#uploaded_view").removeClass("show");
    $("#uploaded_view").find("img").remove();
    barra_progreso.removeClass("file_uploading");
    barra_progreso.removeClass("file_uploaded");
});

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

    // También puedes ajustar la altura de la lista cuando cambie el contenido del sidebar
    // Por ejemplo, si se agregan o eliminan elementos del sidebar
    // $("#sidebar").on("change", function() {
    //     adjustListHeight();
    // });
});

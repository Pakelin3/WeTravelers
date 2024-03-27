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

$(document).ready(function () {
    var button_outer = $(".button_outer"),
        barra_progreso = $(".barra_progreso"),
        upload_file = $(".upload_file");

    upload_file.on("change", function (e) {
        var ext = $(this).val().split('.').pop().toLowerCase();
        if ($.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
            $(this).siblings(".error_msg").text("Not an Image...");
        } else {
            $(this).siblings(".error_msg").text("");
            barra_progreso.addClass("file_uploading");
            setTimeout(function () {
                // barra_progreso.addClass("file_uploaded");
            }, 3000);
            var uploadedFile = URL.createObjectURL(e.target.files[0]);
            setTimeout(function () {
                $(this).closest(".modal-content").find(".uploaded_file_view").append('<img src="' + uploadedFile + '" />').addClass("show");
            }.bind(this), 3500);
        }
    });

    $(".file_remove").on("click", function (e) {
        $(this).closest(".modal-content").find(".uploaded_file_view").removeClass("show").find("img").remove();
        barra_progreso.removeClass("file_uploading");
        barra_progreso.removeClass("file_uploaded");
    });
});



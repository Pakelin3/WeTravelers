async function iniciarMap() {
    var latitude, longitude;

    if ("geolocation" in navigator) {
        navigator.geolocation.getCurrentPosition(function (position) {
            latitude = position.coords.latitude;
            longitude = position.coords.longitude;
            console.log("Latitud:", latitude);
            console.log("Longitud:", longitude);

            // Crear el objeto de coordenadas
            var coord = { lat: latitude, lng: longitude };

            // Crear el mapa
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 10,
                center: coord
            });
        });
    } else {
        console.log("Geolocalización no soportada");
    }
};


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

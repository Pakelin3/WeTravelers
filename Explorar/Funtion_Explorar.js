function iniciarMap() {
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
}

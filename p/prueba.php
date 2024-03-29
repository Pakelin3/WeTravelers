<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Website</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../Home/Home_Style.css">
</head>

<body>
    <div class="card">
        <div class="card-header">
            <div><img src="${publicacion.imagenUsuario}" alt="" width="50" height="50" class="rounded-circle me-2">
                <strong>${publicacion.nombreUsuario}</strong>
            </div>
            <button type="button" class="btn btn-link">en tu corazon</button>
        </div>
        <img src="${publicacion.imagenPublicacion}" class="feed-img-top" alt="...">
        <div class="card-body">
            <div class=" d-flex justify-content-between ">
                <h3 class="titulo">${publicacion.titulo}</h3>
                <h5 class="publicacion-likes me-2"> 152 Likes</h5>
            </div>

            <div class="d-flex align-items-center justify-content-center">

                <!-- Contenedor del corazón (like) -->
                <div class="heart-container" data-publicacion-id="${publicacion.id_publicacion}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-heart" width="30" height="30" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                    </svg>
                </div>
            </div>
            <p class="publicacion-descripcion">${publicacion.descripcion}</p>
            <input type="text" class="form-control comentario" placeholder="Escriba un comentario...">
        </div>
    </div>

</body>

</html>
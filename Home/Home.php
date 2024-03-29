<?php
session_start(); // Iniciar la sesión

// Verificar si no hay una sesión activa
if (!isset($_SESSION['id_usuario'])) {
    // Redirigir al usuario al index.php
    header("Location: ../index.php");
    exit(); // Terminar el script para evitar que se ejecute más código
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>We Travelers</title>
    <link rel="stylesheet" href="../Bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="Home_Style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body id="Cuerpito">
    <!-- Cabecera de la página -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top" data-bs-theme="dark" style="height: 75px;">
        <div class="container-fluid">
            <a class="navbar-brand" href="Home.php">We Travelers</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div id="navbarSupportedContent" class="collapse navbar-collapse">
                <form class="d-flex ms-auto" role="search">
                    <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
                    <button class="btn btn-outline-success me-2" type="submit">Buscar</button>
                </form>
                <script>
                (function($) {
                    $(document).ready(function() {
                        cargarDatosAdmin
                            (); // Llamada para cargar los datos del administrador al cargar la página

                        function cargarDatosAdmin() {
                            $.ajax({
                                url: '../BDD_Conexion/cargar_datos_admin.php',
                                type: 'GET',
                                success: function(response) {
                                    $('#boton_admin').html(response);
                                }
                            });
                        }
                    });
                })(jQuery);
                </script>

                <!-- Botones de barra de navegación -->
                <div id="boton_admin"></div>
                <div id="user_info" class="d-flex align-items-center justify-content-center"></div>
                <!-- Aquí se mostrará la imagen y el nombre del usuario -->
            </div>
        </div>
    </nav>
    <script>
    // Utiliza una función autoinvocada para asegurar que el código se ejecute cuando jQuery esté disponible
    (function($) {
        // Tu código jQuery va aquí dentro
        $(document).ready(function() {
            cargarDatosUsuario(); // Llamada inicial para cargar los datos del usuario al cargar la página

            function cargarDatosUsuario() {
                $.ajax({
                    url: '../BDD_Conexion/cargar_datos_usuario.php',
                    type: 'GET',
                    success: function(response) {
                        $('#user_info').html(response);
                    }
                });
            }
        });
    })(jQuery); // Pasa jQuery como argumento para asegurar que $ sea una referencia a jQuery dentro de la función
    </script>


    <!--Panel lateral-->
    <div id="panel-lateral" class=" flex-column flex-shrink-0 p-3 text-bg-dark fixed-top z-1"
        style="height: calc(100vh - 75px ); width: 280px; top:75px; display: flex; justify-content: space-between;">
        <style>
        @media (max-width: 800px) {

            #panel-lateral,
            .nav-link {
                width: 4.5rem !important;
                justify-content: center;
                align-items: center;
                display: flex;
            }

            #map-container {
                left: 72px !important;
                width: 100%;
            }

            .icon {
                margin-right: 0 !important;
                margin-bottom: 5px;
                height: 50px;
                width: 40px;
            }

            #panel-lateral ul,
            li,
            span.fs-4,
            #nombre-usuario-sidebar {
                font-size: 0;
            }

            #panel-lateral span,
            .people-list,
            #separador {
                display: none;
            }

            .dropdown-item {
                font-size: 1rem;
            }

            #Usuario {
                margin-right: 0 !important;
            }

            #botonInicio {
                justify-content: center;
                margin-bottom: 10px !important;
            }
        }
        </style>
        <div class="menus_botones">
            <a href="" id="botonInicio"
                class="d-flex align-items-center mb-md-0 me-md-auto text-white text-decoration-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-home" width="40" height="40"
                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round"
                    stroke-linejoin="round" style="margin-right: 15px;">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M5 12l-2 0l9 -9l9 9l-2 0" />
                    <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                    <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                </svg>
                <span class="fs-4">Inicio</span>
            </a>
            <hr id="separador">
            <ul class="nav nav-pills flex-column mb-auto">
                <li>
                    <a href="../Explorar/Explorar.php" class="nav-link text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-map-pin" width="25"
                            height="25" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M9 11a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
                            <path
                                d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z" />
                        </svg>
                        Explorar
                    </a>
                </li>
                <li>
                    <a href="../Rutas/Rutas.php" class="nav-link text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-route" width="25"
                            height="25" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M3 19a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                            <path d="M19 7a2 2 0 1 0 0 -4a2 2 0 0 0 0 4z" />
                            <path d="M11 19h5.5a3.5 3.5 0 0 0 0 -7h-8a3.5 3.5 0 0 1 0 -7h4.5" />
                        </svg>
                        Rutas
                    </a>
                </li>
                <li>
                    <a href="../Clubes/Clubes.php" class="nav-link text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users-group"
                            width="25" height="25" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M10 13a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                            <path d="M8 21v-1a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v1" />
                            <path d="M15 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                            <path d="M17 10h2a2 2 0 0 1 2 2v1" />
                            <path d="M5 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                            <path d="M3 13v-1a2 2 0 0 1 2 -2h2" />
                        </svg>
                        Clubes
                    </a>
                </li>
            </ul>
            <hr>
            <div id="plist" class="people-list">
                <ul id="chatList" class="list-unstyled chat-list mt-2 mb-0">
                    <li class="clearfix">
                        <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="avatar">
                        <div class="about">
                            <div class="name">Luis Rodriguez</div>
                            <div class="status"> <i class="fa fa-circle offline"></i> Ultima vez hace 7 min </div>
                        </div>
                    </li>
                    <li class="clearfix">
                        <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="avatar">
                        <div class="about">
                            <div class="name">Moises Gómez</div>
                            <div class="status"> <i class="fa fa-circle online"></i> En linea </div>
                        </div>
                    </li>
                    <li class="clearfix">
                        <img src="https://bootdey.com/img/Content/avatar/avatar3.png" alt="avatar">
                        <div class="about">
                            <div class="name">Maria Becerra</div>
                            <div class="status"> <i class="fa fa-circle online"></i> En linea </div>
                        </div>
                    </li>
                    <li class="clearfix">
                        <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="avatar">
                        <div class="about">
                            <div class="name">Cesar Requena</div>
                            <div class="status"> <i class="fa fa-circle offline"></i> Ultima vez hace 10 horas </div>
                        </div>
                    </li>
                    <li class="clearfix">
                        <img src="https://bootdey.com/img/Content/avatar/avatar8.png" alt="avatar">
                        <div class="about">
                            <div class="name">Tumadre Lagorda</div>
                            <div class="status"> <i class="fa fa-circle online"></i> En linea </div>
                        </div>
                    </li>
                    <li class="clearfix">
                        <img src="https://bootdey.com/img/Content/avatar/avatar5.png" alt="avatar">
                        <div class="about">
                            <div class="name">Daniel Alarcon</div>
                            <div class="status"> <i class="fa fa-circle offline"></i> Ultima conexion: 28 oct </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <style>
        @media (max-width: 800px) {
            .cerrar_sesion::after {
                content: "";
                height: 20px;
            }

            .cerrar_sesion svg {
                margin-right: 0;
                /* Opcional: Ajusta el margen de la imagen si es necesario */
            }
        }
        </style>

        <a href="../BDD_Conexion/Cerrar_sesion.php" class="cerrar_sesion order-1 btn btn-danger">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="icon icon-tabler icons-tabler-outline icon-tabler-logout-2">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M10 8v-2a2 2 0 0 1 2 -2h7a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-7a2 2 0 0 1 -2 -2v-2" />
                <path d="M15 12h-12l3 -3" />
                <path d="M6 15l-3 -3" />
            </svg>
            <span class="texto-boton">Cerrar sesión</span>
        </a>

    </div>

    <div id="feed-container" class="d-flex flex-wrap justify-content-around">
        <!-- Aquí se cargarán las publicaciones -->
    </div>
    <button id="load-more-btn">Cargar más</button>

    <script>
    $(document).ready(function() {
        // Función para cargar las publicaciones
        function cargarPublicaciones() {
            // Hacer una solicitud AJAX para obtener las publicaciones del servidor
            $.ajax({
                url: '../BDD_Conexion/cargar_feed.php', // Ruta al script PHP para obtener las publicaciones
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    // Iterar sobre las publicaciones obtenidas
                    $.each(response, function(index, publicacion) {
                        // Crear el HTML para una publicación
                        var html = `
                    <div class="card">
                        <div class="card-header">
                            <div><img src="${publicacion.imagenUsuario}" alt="" width="50" height="50" class="rounded-circle me-2">
                                <strong>${publicacion.nombreUsuario}</strong>
                            </div>
                            <button type="button" class="btn btn-link">en tu corazon</button>
                        </div>
                        <img src="${publicacion.imagenPublicacion}" class="feed-img-top" alt="...">
                        <div class="card-body position-relative">
                            <div id="titulo_likes" class="d-flex align-items-center justify-content-between w-100">
                                <h3 class="titulo">${publicacion.titulo}</h3>
                                <div class="d-flex align-items-center justify-content-between">
                                    <h5 class="publicacion-likes me-2">${publicacion.likes} Likes</h5>
                                    <!-- Contenedor del corazón (like) -->
                                    <div class="heart-container ${publicacion.usuario_dio_like ? 'liked' : ''}" data-publicacion-id="${publicacion.id_publicacion}">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-heart" width="30" height="30" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <p class="publicacion-descripcion">${publicacion.descripcion}</p>
                            <input type="text" class="form-control comentario" placeholder="Escriba un comentario...">
                        </div>
                    </div>`;
                        // Agregar la publicación al contenedor de alimentación
                        $('#feed-container').append(html);
                    });
                    // Manejar el evento clic en el contenedor del corazón después de agregar todas las publicaciones
                    $('.heart-container').click(function() {
                        // Obtener el ID de la publicación asociada
                        var publicacionId = $(this).data('publicacion-id');
                        // Almacenar una referencia al contenedor del corazón
                        var heartContainer = $(this);
                        // Realizar una solicitud AJAX para registrar el like
                        $.ajax({
                            url: '../BDD_Conexion/guardar_like.php',
                            type: 'POST',
                            data: {
                                publicacionId: publicacionId
                            },
                            success: function(response) {
                                // Si se guardó el like correctamente, actualizar el contador de likes
                                if (response.success) {
                                    var likesContainer = heartContainer
                                        .siblings('.publicacion-likes');
                                    var currentLikes = parseInt(likesContainer
                                        .text().trim());
                                    likesContainer.text((currentLikes + 1) +
                                        ' Likes');
                                }
                            },
                            error: function(xhr, status, error) {
                                console.error('Error al guardar el like:',
                                    error);
                            }
                        });

                        // Alternar la clase 'liked' para cambiar el color del corazón
                        heartContainer.toggleClass('liked');
                    });
                },
                error: function(xhr, status, error) {
                    // Manejar errores si la solicitud AJAX falla
                    console.error('Error al cargar las publicaciones:', error);
                }
            });
        }
        // Llamar a la función para cargar las publicaciones cuando el documento esté listo
        cargarPublicaciones();
    });
    </script>



    <!--Modal crear publicacion-->
    <div class="modal fade" id="Crear_publicacion" tabHome="0" role="dialog"
        aria-labelledby="Crear_publicacionCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <form action="">
                        <input type="text" class="form-control" id="titulo" placeholder="Ponle un titulo"
                            style="margin-bottom: 15px;">
                        <textarea class="form-control" id="descripcion" placeholder="Añade una descripcion"
                            style="resize: none;"></textarea>
                        <div class="button_outer btn btn-light btn-sm" style="margin-top: 10px;">
                            <div class="btn_upload subir_foto">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-photo"
                                    width="25" height="25" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M15 8h.01" />
                                    <path
                                        d="M3 6a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v12a3 3 0 0 1 -3 3h-12a3 3 0 0 1 -3 -3v-12z" />
                                    <path d="M3 16l5 -5c.928 -.893 2.072 -.893 3 0l5 5" />
                                    <path d="M14 14l1 -1c.928 -.893 2.072 -.893 3 0l3 3" />
                                </svg>
                                <input type="file" class="upload_file" name="">
                            </div>
                        </div>
                        <div class="uploaded_file_view"></div>
                    </form>
                    <div id="mensaje_publicacion"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-success">Publicar</button>
                </div>
            </div>
        </div>
    </div>
    <script>
    $(document).ready(function() {
        // Cuando se haga clic en el botón Publicar dentro del modal de Crear publicación
        $("#Crear_publicacion .btn-success").click(function() {
            // Obtener los valores del formulario
            var titulo = $("#titulo").val();
            var descripcion = $("#descripcion").val();
            var imagen = $(".upload_file").prop('files')[0];

            // Verificar que el título, la descripción y la imagen tengan contenido
            if (titulo.trim() !== "" && descripcion.trim() !== "" && imagen) {
                // Crear un objeto FormData para enviar los datos del formulario
                var formData = new FormData();
                formData.append('titulo', titulo);
                formData.append('descripcion', descripcion);
                formData.append('image', imagen);

                // Enviar los datos al archivo PHP para subir la imagen
                $.ajax({
                    url: '../BDD_Conexion/subir_imagen.php',
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        // Limpiar mensajes anteriores
                        $("#mensaje_publicacion").html('');
                        // Imprimir mensaje de éxito
                        $("#mensaje_publicacion").html(
                            '<div class="alert alert-success" role="alert" style="margin-top: 15px;">Publicación creada exitosamente.</div>'
                        );
                        // Si el mensaje es "Publicación creada exitosamente", cerrar el modal después de 2 segundos
                        if (response.trim() === "Publicación creada exitosamente.") {
                            setTimeout(function() {
                                $("#Crear_publicacion .btn-secondary").click();
                                $("#Crear_publicacion").modal("hide");
                                $("#titulo").val('');
                                $("#descripcion").val('');
                                $(".upload_file").val(
                                    ''); // Limpiar el campo de carga de archivos
                                $("#mensaje_publicacion").html('');
                                $(".uploaded_view").removeClass("show").find("img")
                                    .remove(); // Eliminar la imagen de la vista previa
                                $(".barra_progreso").removeClass("file_uploading");
                                $(".barra_progreso").removeClass("file_uploaded");

                            }, 2000);
                        }
                        // Eliminar el mensaje después de 5 segundos
                        setTimeout(function() {
                            $("#mensaje_publicacion").html('');
                        }, 5000);
                    },
                    error: function(xhr, status, error) {
                        // Imprimir error en consola
                        console.error(error);
                    }
                });
            } else {
                // Limpiar mensajes anteriores
                $("#mensaje_publicacion").html('');
                // Mostrar una alerta si alguno de los campos está vacío
                $("#mensaje_publicacion").html(
                    '<div class="alert alert-danger" role="alert" style="margin-top: 15px;">Por favor, complete todos los campos.</div>'
                );
                // Eliminar el mensaje después de 5 segundos
                setTimeout(function() {
                    $("#mensaje_publicacion").html('');
                }, 5000);
            }
        });
    });
    </script>

    <!-- Modal ver perfil -->
    <div class="modal fade" id="Ver_perfil" tabHome="-1" role="dialog" aria-labelledby="Ver_perfilLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="Ver_perfilLabel">Perfil de Usuario</h5>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <p id="nombre"></p>
                    </div>
                    <div class="form-group">
                        <label for="correo">Correo Electrónico:</label>
                        <p id="correo"></p>
                    </div>
                    <div class="form-group">
                        <label for="continente">Continente:</label>
                        <p id="continente"></p>
                    </div>
                    <div class="form-group">
                        <label for="pais">País:</label>
                        <p id="pais"></p>
                    </div>
                    <div class="form-group">
                        <label for="estado">Estado:</label>
                        <p id="estado"></p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#Ver_perfil').on('shown.bs.modal', function() {
            $.ajax({
                url: '../BDD_Conexion/obtener_usuario.php',
                type: 'GET',
                dataType: 'json', // Especifica que se espera un JSON como respuesta
                success: function(data) {
                    $('#nombre').text(data.nombre);
                    $('#correo').text(data.correo);
                    $('#continente').text(data.continente);
                    $('#pais').text(data.pais);
                    $('#estado').text(data.estado);
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });
    });
    </script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

    <script src="Home_Funtion.js"></script>
    <script src="../Bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
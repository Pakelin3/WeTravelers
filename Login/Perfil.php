<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Perfil_Style.css">
    <title>We Travelers</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>
    <div class="main">
        <div class="contenedor">
            <h2 class="title">Terminemos de configurar tu perfil</h2>
            <!-- Upload  -->
            <div id="Mensaje"></div>
            <form id="file-upload-form" class="uploader">
                <input id="file-upload" type="file" name="fileUpload" accept="image/*" />
                <label for="file-upload" id="file-drag">
                    <img id="file-image" src="#" alt="Preview" class="hidden">
                    <div id="start">
                        <i class="fa fa-download" aria-hidden="true"></i>
                        <div>Selecciona o arrastra la imagen</div>
                        <div id="notimage" class="hidden">Por favor selecciona una imagen</div>
                        <span id="file-upload-btn" class="btn btn-primary">Selecciona la imagen</span>
                    </div>
                    <div id="response" class="hidden">
                        <div id="messages"></div>
                        <progress class="progress" id="file-progress" value="0">
                            <span>0</span>%
                        </progress>
                    </div>
                </label>
                <!-- Agrega el combobox para mostrar los tipos de viajeros -->
                <label for="tipo_usuario">Tipo de usuario:
                    <select class="form-control" id="tipo_viajero" name="tipo_viajero">
                        <?php
                        // Conectar a la base de datos
                        include('../BDD_Conexion/Conexion.php');

                        // Consultar los tipos de viajeros
                        $query = "SELECT * FROM tipo_viajeros";
                        $result = mysqli_query($conn, $query);

                        // Mostrar opciones en el combobox
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<option value="' . $row['id_tipo_viajero'] . '">' . $row['tipo_viajero'] . '</option>';
                        }

                        // Cerrar la conexión
                        mysqli_close($conn);
                        ?>
                    </select>
                </label>
            </form>
            <input class="boton" name="fotoPerfil" type="button" value="Registrarse">
        </div>
    </div>
    <script src="Perfil_Funtion.js"></script>
    <script>
        $(document).ready(function() {
            $(".boton").on("click", function() {
                var fileInput = $("#file-upload")[0].files[0];
                var formData = new FormData();
                formData.append('image', fileInput);
                var tipoViajero = $("#tipo_viajero").val();

                formData.append('tipo_viajero', tipoViajero); // Agregar el tipo de viajero al FormData

                $.ajax({
                    url: '../BDD_Conexion/perfil_imagen_usuario.php',
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        $("#Mensaje").html(response);
                        setTimeout(function() {
                            window.location.href = '../Home/Home.php';
                        }, 2500); // Imprime el mensaje en el div con id "Mensaje"
                    },
                    error: function(xhr, status, error) {
                        console.error(error); // Muestra el error en la consola
                    }
                });
            });
        });
    </script>
</body>

</html>
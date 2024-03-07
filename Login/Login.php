<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="Login_Style.css">
    <title>WAYN Login</title>

    <script>
    function contarCaracteresEspeciales(valor) {
        var caracteresEspeciales = "!@#$%^&*()_+\\-=\\[\\]{};':\"\\\\|,.<>\\/?";
        var contador = 0;
        for (var i = 0; i < valor.length; i++) {
            if (caracteresEspeciales.indexOf(valor[i]) !== -1) {
                contador++;
            }
        }
        return contador;
    }

    function validarFormulario(formulario) {
        var inputPassword = formulario.querySelector('input[name="password"]');
        var valorPassword = inputPassword.value;

        console.log('Valor de la contraseña:', valorPassword);

        // Contar el número de caracteres especiales en el valor del input de contraseña
        var contador = contarCaracteresEspeciales(valorPassword);
        console.log('Número de caracteres especiales:', contador);

        // Comprobar si el contador es menor que 2
        if (contador < 2) {
            // Mostrar alerta solo si el input de contraseña no está vacío
            if (valorPassword.trim() !== '') {
                alert("El campo de contraseña debe contener al menos dos caracteres especiales.");
            }
            inputPassword.value = ''; // Limpiar el valor del campo de contraseña
            inputPassword.focus(); // Devolver el foco al campo de contraseña
            return false; // Impedir el envío del formulario
        }

        return true; // Permitir el envío del formulario si pasa la validación
    }
    </script>
    !
</head>


<body>

    <?php  session_start(); ?>

    <div class="main">
        <div class="contenedor a-contenedor" id="a-contenedor">
            <form class="form" id="a-form" method="post" action="../Login/Iniciar_registrar/Registrar.php"
                onsubmit="return validarFormulario(this);">
                <!-- ../Conexion/db.php -->
                <h2 class="title">Crear cuenta</h2>


                <?php      
                
                if(isset($_SESSION['mensaje2']) && !empty($_SESSION['mensaje2'])) 
                
                {                                          
                    echo '<div>' . $_SESSION['mensaje2'] . '</div>'; unset($_SESSION['mensaje2']);               
                } 
                
                ?>


                <span class="form__span">Use su email para registrarse</span>
                <input class="form__input" type="text" placeholder="Nombre" name="name" id="name" />
                <input class="form__input" type="text" placeholder="Email" name="email" id="email" required
                    pattern=".*@.*" />
                <input class="form__input" type="password" placeholder="Contraseña" name="password" id="password"
                    required minlength="7" oninput="validarInput(this)" />
                <button class="boton subir" name="Reg_Bot">Registrarse</button>
            </form>
        </div>




        <div class="contenedor b-contenedor" id="b-contenedor">
            <form class="form" id="b-form" method="post" action="../Login/Iniciar_registrar/Iniciar_sesion.php">

                <h2 class="title">Acceder al sitio web</h2>


                <?php      
                
                if(isset($_SESSION['mensaje']) && !empty($_SESSION['mensaje'])) 
                
                {                                          
                    echo '<div>' . $_SESSION['mensaje'] . '</div>'; unset($_SESSION['mensaje']);               
                } 
                
                ?>

                <span class="form__span">Utilice su correo electrónico</span>
                <input class="form__input" type="text" placeholder="Email" name="email" id="email" required
                    pattern=".*@.*" />
                <input class="form__input" type="password" placeholder="Contraseña" name="password" id="password"
                    required minlength="2" />

                <a class="form__link">¿Ha olvidado su contraseña?</a>
                <button class="boton subir">Iniciar sesión</button>
            </form>
        </div>

        <div class="switch" id="switch-cnt">
            <div class="switch__contenedor" id="switch-c1">
                <h2 class="title">Iniciar sesión</h2>
                <p class="descripcion">Para mantenerse conectado con nosotros, inicie sesión con su información personal
                </p>
                <button class="switch__boton boton switch-btn">Inicia sesión</button>
            </div>

            <div class="switch__contenedor is-hidden" id="switch-c2">
                <h2 class="switch__title title">Registrarse</h2>
                <p class="descripcion">Introduzca sus datos personales y conozca el mundo con nosotros</p>
                <button class="switch__boton boton switch-btn">Regístrate</button>
            </div>
        </div>
    </div>
    <script src="Login_Funtion.js"></script>
</body>

</html>
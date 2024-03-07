function validarInput(idInput) {
    var input = document.getElementById(idInput); // Obtener el input por su ID
    var valor = input.value;
    var caracteresEspeciales = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/;

    // Contar el número de caracteres especiales en el valor del input
    var contador = (valor.match(caracteresEspeciales) || []).length;

    // Comprobar si el contador es menor que 2
    if (contador < 2) {
        alert("El campo debe contener al menos dos caracteres especiales.");
        input.value = ''; // Limpiar el valor del campo
        input.focus(); // Devolver el foco al campo
    }
}
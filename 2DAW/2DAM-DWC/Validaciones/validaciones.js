function validarForm(event) {

    event.preventDefault(); //Cancela el comportamiento por defecto de un formulario

    const inputNombre = document.querySelector("#inputNombre");
    const inputTelefono = document.querySelector("#inputTelefono");
    const inputEdad = document.querySelector("#inputEdad");
    const errores = document.querySelector("#errores");
    const anyErrors = false;

    errores.textContent = "";

    if (inputNombre.value.length < 3) {
        errores.textContent += "El nombre no es válido.";
        anyErrors = true;
    }

    if ((!inputTelefono.value.startsWith("6") && !inputTelefono.value.startsWith("7"))|| !inputTelefono.length === 9) {
        errores.textContent += "El teléfono no es válido.";
        anyErrors = true;
    }

    if (parseInt(inputEdad.value) < 18 || parseInt(inputEdad.value) > 120) {
        errores.textContent += "La edad no es válida.";
        anyErrors = true;
    }

    if (!anyErrors) {
        document.querySelector('form').submit();
    }
}


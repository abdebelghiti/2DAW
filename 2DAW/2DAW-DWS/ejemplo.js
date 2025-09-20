//Crear una función que reciba un número y calcule su factorial
//Utiliza un bucle (NO RECURSIVIDAD)
//5! = 5 * 4 * 3 * 2 * 1
//factorial(5) = 120

function calcularFactorial (numero) {
    let resultado = 1;
    for (let i = numero; i > 1; i--) {
        resultado *= i;
    }
    return resultado;
}

console.log("Factorial: " + calcularFactorial(5));

//Función que un enlace de búsqueda de Google
//Devuelve un string de lo que se ha buscado
//https://www.google.com/search?q=semaforo+agua&oq=semaforo+agua&gs_lcrp=EgZjaHJvbWUyBggAEEUYOdIBCDUzNzlqMGo3qAIAsAIA&sourceid=chrome&ie=UTF-8
//terminos(enlace); -> "semaforo agua"

let enlace = "https://www.google.com/search?q=semaforo+agua&oq=semaforo+agua&gs_lcrp=EgZjaHJvbWUyBggAEEUYOdIBCDUzNzlqMGo3qAIAsAIA&sourceid=chrome&ie=UTF-8";

function terminos(enlace) {

    const aPosition = enlace.indexOf("q=");
    const endPosition = enlace.indexOf("&oq");
    const text = enlace.substring(aPosition + 2, endPosition);
    const replaceText = text.replaceAll("+", " ");
    return replaceText;
}

console.log(terminos(enlace));

//Con Split

function terminosReplace(enlace) {
    return enlace.split("q=")[1].split("&")[0].split("+").join(" ");
}

console.log(terminosReplace(enlace));
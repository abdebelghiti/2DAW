const containerHead = document.querySelector("#containerHead");
const containerBody = document.querySelector("#containerBody");
const containerBottom = document.querySelector("#containerBottom");
const containerResultado = document.querySelector("#resultado");

function clickCara(cara) { 
    containerResultado.textContent = cara;   
}

function clickRopa(ropa) {
    containerResultado.textContent = ropa;
}

function clickZapato(zapato) {
    containerResultado.textContent = zapato;
}

//tabla DWS 
// - id autoincrement pk
// -email
// -nombre

//Insert, Update -> email, Select -> mostrar usuarios, -> Delete
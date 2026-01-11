const boton = document.querySelector("#button");
const respuesta = document.querySelector("respuesta");

async function obtenerRespuesta() {
    const apiUrl = encodeURIComponent('https://eightballapi.com/api?locale=en');
    const proxyUrl = `api.allorigins.win/get?url=${apiUrl}`;

    const response = await fetch(proxyUrl);
        const data = await response.json();
        respuesta.innerText(data);
}
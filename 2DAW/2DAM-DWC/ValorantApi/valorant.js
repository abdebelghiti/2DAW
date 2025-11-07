const contenedorPersonajes = document.querySelector("#contenedorPersonajes");
const contenedorArmas = document.querySelector("#contenedorArmas");


const imagenesPersonajes = fetch('https://valorant-api.com/v1/agents').then(
    response => response.json()).then(
        response => {
            const array = response.data;
            array.forEach(element => {
                const imagenPersonajes = document.createElement('img');
                imagenPersonajes.src = element.displayIcon;
                contenedorPersonajes.appendChild(imagenPersonajes);
            });
})

const imagenesArmas = fetch('https://valorant-api.com/v1/weapons').then(
    response => response.json()).then(
        response => {
            const array = response.data;
            array.forEach(element => {
                const imagenArmas = document.createElement('img');
                imagenArmas.src = element.displayIcon;
                contenedorArmas.appendChild(imagenArmas);
            });
})

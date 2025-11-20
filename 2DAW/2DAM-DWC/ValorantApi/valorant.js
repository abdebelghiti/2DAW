const contenedorPersonajes = document.querySelector("#contenedorPersonajes");
const contenedorArmas = document.querySelector("#contenedorArmas");

async function cargarPersonajes() {
  try {
    const response = await fetch('https://valorant-api.com/v1/agents');
    const data = await response.json();
    const array = data.data;

    array.forEach(element => {
      const imagenPersonaje = document.createElement('img');
      imagenPersonaje.src = element.displayIcon;
      contenedorPersonajes.appendChild(imagenPersonaje);
    });
  } catch (error) {
    console.error("Error al cargar personajes:", error);
  }
}

async function cargarArmas() {
  try {
    const response = await fetch('https://valorant-api.com/v1/weapons');
    const data = await response.json();
    const array = data.data;

    array.forEach(element => {
      const imagenArma = document.createElement('img');
      imagenArma.src = element.displayIcon;
      contenedorArmas.appendChild(imagenArma);
    });
  } catch (error) {
    console.error("Error al cargar armas:", error);
  }
}

cargarPersonajes();
cargarArmas();

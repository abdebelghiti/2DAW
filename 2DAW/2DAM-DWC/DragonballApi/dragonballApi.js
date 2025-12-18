const BASE_URL = "https://dragonball-api.com/api/characters";

const modal = document.querySelector("#modal");
const cerrarModalBtn = document.querySelector("#cerrarModal");

const modalImagen = document.querySelector("#modalImagen");
const modalNombre = document.querySelector("#modalNombre");
const modalRaza = document.querySelector("#modalRaza");
const modalPlaneta = document.querySelector("#modalPlaneta");
const modalKi = document.querySelector("#modalKi");

async function cargarPersonajes() {
    try {
        const contenedor = document.querySelector("#contenedorPersonajes");

        const response = await fetch(BASE_URL);
        const data = await response.json();
        const personajes = data.items;

        personajes.forEach(personaje => {
            const card = document.createElement("div");

            card.classList.add(
                "bg-white",
                "rounded-xl",
                "shadow-md",
                "cursor-pointer",
                "hover:-translate-y-1",
                "hover:shadow-xl",
                "transition-all",
                "duration-200"
            );

            const img = document.createElement("img");
            img.src = personaje.image;
            img.alt = personaje.name;
            img.classList.add(
                "h-40",
                "sm:h-48",
                "md:h-60",
                "lg:h-72",
                "w-full",
                "object-contain",
                "bg-white",
                "rounded-t-xl"
            );

            const body = document.createElement("div");
            body.classList.add(
                "p-2",
                "sm:p-3",
                "text-center"
            );

            const title = document.createElement("h3");
            title.classList.add(
                "font-semibold",
                "text-xs",
                "sm:text-sm",
                "md:text-base"
            );
            title.textContent = personaje.name;

            body.appendChild(title);
            card.appendChild(img);
            card.appendChild(body);

            card.addEventListener("click", () => cargarDetallePersonaje(personaje.id));

            contenedor.appendChild(card);
        });

    } catch (error) {
        console.error("Error al cargar personajes:", error);
    }
}

async function cargarDetallePersonaje(id) {
    try {
        modalNombre.textContent = "Cargando...";
        modalImagen.src = "";
        modalRaza.textContent = "";
        modalPlaneta.textContent = "";
        modalKi.textContent = "";

        modal.classList.remove("hidden");
        modal.classList.add("flex", "backdrop-blur-sm", "bg-black/60");

        const response = await fetch(BASE_URL + "/" + id);
        const personaje = await response.json();

        modalImagen.src = personaje.image;
        modalImagen.alt = personaje.name;
        modalNombre.textContent = personaje.name;
        modalRaza.textContent = personaje.race ?? "Desconocida";
        modalPlaneta.textContent = personaje.originPlanet?.name ?? "Desconocido";
        modalKi.textContent = personaje.ki ?? "N/A";

    } catch (error) {
        console.error("Error al cargar detalle del personaje:", error);
        modalNombre.textContent = "Error al cargar datos";
    }
}

function cerrarModal() {
    modal.classList.add("hidden");
    modal.classList.remove("flex", "backdrop-blur-sm", "bg-black/60");
}

cerrarModalBtn.addEventListener("click", cerrarModal);

modal.addEventListener("click", e => {
    if (e.target === modal) cerrarModal();
});

cargarPersonajes();
const contenedorPersonajes = document.getElementById("contenedorPersonajes");
const contenedorArmas = document.getElementById("contenedorArmas");
const modal = document.getElementById("modal");
const modalContent = document.getElementById("modalContent");
const closeModal = document.getElementById("closeModal");

async function cargarPersonajes() {
  if (!contenedorPersonajes) return;
  const res = await fetch("https://valorant-api.com/v1/agents?isPlayableCharacter=true");
  const data = await res.json();
  data.data.forEach(agent => {
    const card = document.createElement("div");
    card.className = "bg-white dark:bg-gray-800 rounded p-4 shadow border border-gray-200 dark:border-gray-700 text-center cursor-pointer hover:scale-105 transform transition w-full";
    card.innerHTML = `<img src="${agent.displayIcon}" class="w-32 h-32 mx-auto mb-2"><h3>${agent.displayName}</h3>`;
    card.addEventListener("click", () => abrirModal(`<img src="${agent.fullPortrait}" class="w-full h-96 object-contain mb-4"><h2 class="text-2xl font-bold mb-2">${agent.displayName}</h2><p>${agent.description}</p>`));
    contenedorPersonajes.appendChild(card);
  });
}

async function cargarArmas() {
  if (!contenedorArmas) return;
  const res = await fetch("https://valorant-api.com/v1/weapons");
  const data = await res.json();
  data.data.forEach(arma => {
    const card = document.createElement("div");
    card.className = "bg-white dark:bg-gray-800 rounded p-4 shadow border border-gray-200 dark:border-gray-700 text-center cursor-pointer hover:scale-105 transform transition w-full";
    card.innerHTML = `<img src="${arma.displayIcon}" class="w-full h-32 object-contain mb-2"><h3>${arma.displayName}</h3>`;
    card.addEventListener("click", () => abrirModal(`<img src="${arma.displayIcon}" class="w-full h-60 object-contain mb-4"><h2 class="text-2xl font-bold mb-2">${arma.displayName}</h2><p>Categoría: ${arma.shopData?.category || "N/A"}</p>`));
    contenedorArmas.appendChild(card);
  });
}

if (modal) {
  closeModal?.addEventListener("click", () => modal.classList.add("hidden"));
  modal.addEventListener("click", e => { if (!modalContent.contains(e.target)) modal.classList.add("hidden"); });
}

function abrirModal(html) {
  const modalBody = document.getElementById("modalBody");
  if (modalBody) {
    modalBody.innerHTML = html;
  }
  modal.classList.remove("hidden");
}

contenedorPersonajes ? cargarPersonajes() : null;
contenedorArmas ? cargarArmas() : null;

document.addEventListener("DOMContentLoaded", () => {
  const currentPage = window.location.pathname.split("/").pop();
  const navLinks = {
    "index.html": document.getElementById("navInicio"),
    "personajes.html": document.getElementById("navPersonajes"),
    "armas.html": document.getElementById("navArmas")
  };
  if (navLinks[currentPage]) navLinks[currentPage].classList.add("border-b-4","border-red-600","rounded-sm");
});

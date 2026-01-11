window.addEventListener("load", function () {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "nav.html", true);

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            document.body.insertAdjacentHTML("afterbegin", xhr.responseText);
            marcarRutaActiva();
        }
    };

    xhr.send();
});

function marcarRutaActiva() {
    const rutaActual = window.location.pathname.split("/").pop();
    const enlaces = document.querySelectorAll(".nav-item");

    enlaces.forEach(enlace => {
        if (enlace.dataset.route === rutaActual) {
            enlace.classList.add("bg-emerald-500");
        }
    });
}
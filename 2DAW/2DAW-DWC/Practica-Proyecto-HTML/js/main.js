const usuarios = [
    { nombre: "Abde", apellidos: "Belghiti", email: "abdessamad455@gmail.com", contraseña: "123456", telefono: "688704452", sexo: "Hombre" },
    { nombre: "Alexis", apellidos: "Trujillo", email: "alexistrujillo@gmail.com", contraseña: "123456", telefono: "688504452", sexo: "Hombre" },
    { nombre: "Rodolfo", apellidos: "Sánchez", email: "rodolfosanchez@gmail.com", contraseña: "123456", telefono: "688604452", sexo: "Hombre" },
    { nombre: "Javier", apellidos: "López", email: "javierlopez@gmail.com", contraseña: "123456", telefono: "644704452", sexo: "Hombre" }
];

function cargarTabla(lista) {
    const tbody = document.querySelector("#tablaUsuarios tbody");
    tbody.innerHTML = "";

    lista.forEach((usuario, index) => {
        const fila = document.createElement("tr");

        fila.innerHTML = `
            <td>${usuario.nombre}</td>
            <td>${usuario.apellidos}</td>
            <td>${usuario.email}</td>
            <td>${usuario.contraseña}</td>
            <td>${usuario.telefono}</td>
            <td>${usuario.sexo}</td>
            <td><a href="crud.html"><button>Modificar</button></a></td>
            <td><button id="eliminar" data-index="${index}">X</button></td>
        `;

        tbody.appendChild(fila);
    });

    
    document.querySelectorAll("#eliminar").forEach(btn => {
        btn.onclick = function() {
            this.closest("tr").remove();
        };
    });
}

function filtrarUsuarios(texto) {
    texto = texto.toLowerCase();
    const filtrados = usuarios.filter(usuario =>
        usuario.nombre.toLowerCase().includes(texto) ||
        usuario.email.toLowerCase().includes(texto)
    );
    cargarTabla(filtrados);
}

window.onload = function() {
    cargarTabla(usuarios);

    const buscador = document.getElementById("buscador");
    buscador.addEventListener("keyup", () => {
        const texto = buscador.value.trim();
        if (texto.length >= 3) {
            filtrarUsuarios(texto);
        } else if (texto.length === 0) {
            cargarTabla(usuarios);
        }
    });
};

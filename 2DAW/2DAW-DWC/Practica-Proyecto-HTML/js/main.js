const usuarios = [
    { nombre: "Abde", apellidos: "Belghiti", email: "abdessamad455@gmail.com", contraseña: "123456", telefono: "688704452", sexo: "Hombre" },
    { nombre: "Alexis", apellidos: "Trujillo", email: "alexistrujillo@gmail.com", contraseña: "123456", telefono: "688504452", sexo: "Hombre" },
    { nombre: "Rodolfo", apellidos: "Sánchez", email: "rodolfosanchez@gmail.com", contraseña: "123456", telefono: "688604452", sexo: "Hombre" },
    { nombre: "Javier", apellidos: "López", email: "javierlopez@gmail.com", contraseña: "123456", telefono: "644704452", sexo: "Hombre" }
];

let indiceEditar = null;

function cargarTabla(lista) {
    const tbody = document.querySelector("#tablaUsuarios tbody");
    tbody.innerHTML = "";

    lista.forEach((usuario, index) => {
        const fila = document.createElement("tr");
        fila.className = "border-t";

        fila.innerHTML = `
            <td class="p-2">${usuario.nombre}</td>
            <td class="p-2">${usuario.apellidos}</td>
            <td class="p-2">${usuario.email}</td>
            <td class="p-2">${usuario.contraseña}</td>
            <td class="p-2">${usuario.telefono}</td>
            <td class="p-2">${usuario.sexo}</td>
            <td class="p-2 space-x-2">
                <button class="bg-yellow-400 px-2 py-1 rounded"
                        onclick="editarUsuario(${index})">
                    Modificar
                </button>
                <button class="bg-red-600 text-white px-2 py-1 rounded"
                        onclick="eliminarUsuario(${index})">
                    X
                </button>
            </td>
        `;

        tbody.appendChild(fila);
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

window.addEventListener("load", function () {
    cargarTabla(usuarios);

    const buscador = document.getElementById("buscador");
    buscador.addEventListener("keyup", function () {
        const texto = buscador.value.trim();
        if (texto.length >= 3) {
            filtrarUsuarios(texto);
        } else if (texto.length === 0) {
            cargarTabla(usuarios);
        }
    });
});


document.getElementById("guardar").onclick = function () {
    usuarios[indiceEditar] = {
        nombre: nombre.value,
        apellidos: apellidos.value,
        email: email.value,
        contraseña: contraseña.value,
        telefono: telefono.value,
        sexo: sexo.value
    };

    document.getElementById("formEditar").classList.add("hidden");
    cargarTabla(usuarios);
};


function editarUsuario(index) {
    indiceEditar = index;
    const u = usuarios[index];

    document.getElementById("nombre").value = u.nombre;
    document.getElementById("apellidos").value = u.apellidos;
    document.getElementById("email").value = u.email;
    document.getElementById("contraseña").value = u.contraseña;
    document.getElementById("telefono").value = u.telefono;
    document.getElementById("sexo").value = u.sexo;

    document.getElementById("formEditar").classList.remove("hidden");
}


function eliminarUsuario(index) {
    usuarios.splice(index, 1);
    cargarTabla(usuarios);
}

// Cerrar modal con botón
document.getElementById("cerrarModal").addEventListener("click", cerrarModal);

// Cerrar modal al hacer clic fuera del contenido
document.getElementById("formEditar").addEventListener("click", function (e) {
    const modal = document.getElementById("modalContenido");

    if (!modal.contains(e.target)) {
        cerrarModal();
    }
});

function cerrarModal() {
    document.getElementById("formEditar").classList.add("hidden");
}

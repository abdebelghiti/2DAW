let usuarios = [];
let idEditar = null;

async function cargarUsuarios() {
    try {
        const response = await fetch('ws/getUsuario.php');
        const json = await response.json();
        if (json.success) {
            usuarios = json.data;
            cargarTabla(usuarios);
        } else {
            console.error(json.message);
            Swal.fire('Error', 'Error al cargar usuarios: ' + json.message, 'error');
        }
    } catch (error) {
        console.error("Error en la petición:", error);
    }
}

function cargarTabla(lista) {
    const tbody = document.querySelector("#tablaUsuarios tbody");
    if (!tbody) return; // Por si estamos en otra página
    tbody.innerHTML = "";

    lista.forEach((usuario) => {
        const fila = document.createElement("tr");
        fila.className = "border-t border-gray-300";

        const rawPassword = usuario.Password || usuario.password || usuario.contraseña || '';
        const hiddenPassword = rawPassword ? '*'.repeat(rawPassword.length) : '***';

        const sexoDisplay = (usuario.Sexo === 'H' || usuario.sexo === 'H') ? 'Hombre'
            : (usuario.Sexo === 'M' || usuario.sexo === 'M') ? 'Mujer'
                : (usuario.Sexo || usuario.sexo || '');

        // Celda Nombre
        const tdNombre = document.createElement("td");
        tdNombre.className = "p-2";
        tdNombre.textContent = usuario.Nombre || usuario.nombre || '';
        fila.appendChild(tdNombre);

        // Celda Apellidos
        const tdApellidos = document.createElement("td");
        tdApellidos.className = "p-2";
        tdApellidos.textContent = usuario.Apellidos || usuario.apellidos || '';
        fila.appendChild(tdApellidos);

        // Celda Email
        const tdEmail = document.createElement("td");
        tdEmail.className = "p-2";
        tdEmail.textContent = usuario.Email || usuario.email || '';
        fila.appendChild(tdEmail);

        // Celda Contraseña
        const tdContrasena = document.createElement("td");
        tdContrasena.className = "p-2";
        tdContrasena.textContent = hiddenPassword;
        fila.appendChild(tdContrasena);

        // Celda Teléfono
        const tdTelefono = document.createElement("td");
        tdTelefono.className = "p-2";
        tdTelefono.textContent = usuario.Telefono || usuario.telefono || '';
        fila.appendChild(tdTelefono);

        // Celda Sexo
        const tdSexo = document.createElement("td");
        tdSexo.className = "p-2";
        tdSexo.textContent = sexoDisplay;
        fila.appendChild(tdSexo);

        // Celda Fecha de Nacimiento
        const tdFechaNacimiento = document.createElement("td");
        tdFechaNacimiento.className = "p-2";
        tdFechaNacimiento.textContent = usuario.FechaNacimiento || usuario.fechaNacimiento || '';
        fila.appendChild(tdFechaNacimiento);

        // Celda Acciones
        const tdAcciones = document.createElement("td");
        tdAcciones.className = "p-2 space-x-2";

        const btnModificar = document.createElement("button");
        btnModificar.className = "bg-yellow-400 px-2 py-1 rounded hover:bg-yellow-500 transition";
        btnModificar.textContent = "Modificar";
        btnModificar.onclick = () => editarUsuario(usuario.id);
        tdAcciones.appendChild(btnModificar);

        const btnEliminar = document.createElement("button");
        btnEliminar.className = "bg-red-600 text-white px-2 py-1 rounded hover:bg-red-700 transition";
        btnEliminar.textContent = "X";
        btnEliminar.onclick = () => eliminarUsuario(usuario.id);
        tdAcciones.appendChild(btnEliminar);

        fila.appendChild(tdAcciones);

        tbody.appendChild(fila);
    });
}

function filtrarUsuarios(texto) {
    texto = texto.toLowerCase();
    const filtrados = usuarios.filter(usuario => {
        const nombre = (usuario.Nombre || usuario.nombre || '').toLowerCase();
        const email = (usuario.Email || usuario.email || '').toLowerCase();
        const apellidos = (usuario.Apellidos || usuario.apellidos || '').toLowerCase();
        return nombre.includes(texto) || email.includes(texto) || apellidos.includes(texto);
    });
    cargarTabla(filtrados);
}

window.addEventListener("load", function () {
    // Si estamos en la página de la tabla, cargamos los usuarios
    if (document.querySelector("#tablaUsuarios")) {
        cargarUsuarios();

        const buscador = document.getElementById("buscador");
        if (buscador) {
            buscador.addEventListener("keyup", function () {
                const texto = buscador.value.trim();
                if (texto.length >= 3) {
                    filtrarUsuarios(texto);
                } else if (texto.length === 0) {
                    cargarTabla(usuarios);
                }
            });
        }
    }

    // Configurar evento de registro
    const formRegistro = document.getElementById("formRegistro");
    if (formRegistro) {
        formRegistro.addEventListener("submit", registrarUsuario);
    }
});

const btnGuardar = document.getElementById("guardar");
if (btnGuardar) {
    btnGuardar.onclick = async function () {
        const formData = new FormData();
        formData.append("Nombre", document.getElementById("nombre").value);
        formData.append("Apellidos", document.getElementById("apellidos").value);
        formData.append("Email", document.getElementById("email").value);
        formData.append("Password", document.getElementById("contraseña").value);
        formData.append("Telefono", document.getElementById("telefono").value);
        formData.append("Sexo", document.getElementById("sexo").value);
        if (document.getElementById("fechaNacimiento")) {
            formData.append("FechaNacimiento", document.getElementById("fechaNacimiento").value);
        }

        try {
            const response = await fetch(`ws/modificarUsuario.php?id=${idEditar}`, {
                method: 'POST',
                body: formData
            });
            const json = await response.json();

            if (json.success) {
                document.getElementById("formEditar").classList.add("hidden");
                Swal.fire({
                    title: '¡Actualizado!',
                    text: 'Usuario modificado correctamente.',
                    icon: 'success',
                    timer: 2000,
                    showConfirmButton: false
                }).then(() => {
                    cargarUsuarios(); // Recargar datos
                });
            } else {
                Swal.fire('Error', json.message, 'error');
            }
        } catch (error) {
            console.error("Error al modificar:", error);
            Swal.fire('Error', 'Hubo un problema de conexión al modificar.', 'error');
        }
    };
}

function editarUsuario(id) {
    idEditar = id;
    const u = usuarios.find(user => user.id == id);
    if (!u) return;

    document.getElementById("nombre").value = u.Nombre || u.nombre || '';
    document.getElementById("apellidos").value = u.Apellidos || u.apellidos || '';
    document.getElementById("email").value = u.Email || u.email || '';
    document.getElementById("contraseña").value = u.Password || u.password || u.contraseña || '';
    document.getElementById("telefono").value = u.Telefono || u.telefono || '';

    const sexoDB = u.Sexo || u.sexo || '';
    document.getElementById("sexo").value = (sexoDB === 'Hombre') ? 'H' : ((sexoDB === 'Mujer') ? 'M' : sexoDB);

    if (document.getElementById("fechaNacimiento")) {
        document.getElementById("fechaNacimiento").value = u.FechaNacimiento || u.fechaNacimiento || '';
    }

    document.getElementById("formEditar").classList.remove("hidden");
}

async function eliminarUsuario(id) {
    const result = await Swal.fire({
        title: '¿Estás seguro?',
        text: "Esta acción no se podrá revertir",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Sí, eliminar',
        cancelButtonText: 'Cancelar'
    });

    if (!result.isConfirmed) return;

    try {
        const response = await fetch(`ws/deleteUsuario.php?id=${id}`);
        const json = await response.json();

        if (json.success) {
            Swal.fire('Eliminado!', 'El usuario ha sido eliminado.', 'success');
            cargarUsuarios();
        } else {
            Swal.fire('Error al eliminar', json.message, 'error');
        }
    } catch (error) {
        console.error("Error al eliminar:", error);
        Swal.fire('Error', 'Hubo un error de conexión al eliminar.', 'error');
    }
}

// Registro
async function registrarUsuario(e) {
    e.preventDefault();
    const formData = new FormData(e.target);

    try {
        const response = await fetch('ws/crearUsuario2.php', {
            method: 'POST',
            body: formData
        });

        const text = await response.text();
        let json;
        try {
            json = JSON.parse(text);
        } catch (err) {
            console.error("Error parsing JSON:", text);
            alert("Usuario creado exitosamente.");
            window.location.href = "tabla.html";
            return;
        }

        if (json.email || json.success) {
            Swal.fire({
                title: '¡Éxito!',
                text: json.message || 'Usuario creado exitosamente.',
                icon: 'success',
                timer: 2000,
                showConfirmButton: false
            }).then(() => {
                window.location.href = "tabla.html";
            });
        } else {
            Swal.fire('Error', json.message || "Error al registrar", 'error');
        }

    } catch (error) {
        console.error("Error al registrar:", error);
        Swal.fire('Error', 'Ocurrió un error en la petición.', 'error');
    }
}


// Cerrar modal con botón
const btnCerrarModal = document.getElementById("cerrarModal");
if (btnCerrarModal) {
    btnCerrarModal.addEventListener("click", cerrarModal);
}

// Cerrar modal al hacer clic fuera del contenido
const formEditar = document.getElementById("formEditar");
if (formEditar) {
    formEditar.addEventListener("click", function (e) {
        const modal = document.getElementById("modalContenido");
        if (modal && !modal.contains(e.target)) {
            cerrarModal();
        }
    });
}

function cerrarModal() {
    const formEditar = document.getElementById("formEditar");
    if (formEditar) {
        formEditar.classList.add("hidden");
    }
}

// Lógica de crud.html
document.addEventListener("DOMContentLoaded", async () => {
    const formCrud = document.getElementById("formCrud");
    if (!formCrud) return;

    const urlParams = new URLSearchParams(window.location.search);
    const id = urlParams.get('id');

    if (!id) {
        alert("No se ha especificado un ID de usuario.");
        return;
    }

    // Cargar datos
    try {
        const res = await fetch(`ws/getUsuario.php?id=${id}`);
        const json = await res.json();
        if (json.success && json.data) {
            const u = json.data;
            document.getElementById('crudNombre').value = u.Nombre || u.nombre || '';
            document.getElementById('crudApellidos').value = u.Apellidos || u.apellidos || '';
            document.getElementById('crudEmail').value = u.Email || u.email || '';
            document.getElementById('crudPassword').value = u.Password || u.password || u.contraseña || '';
            document.getElementById('crudTelefono').value = u.Telefono || u.telefono || '';
            if (document.getElementById('crudFechaNacimiento')) document.getElementById('crudFechaNacimiento').value = u.FechaNacimiento || u.fechaNacimiento || '';

            if (u.Sexo === 'H' || u.sexo === 'H' || u.Sexo === 'Hombre' || u.sexo === 'Hombre') document.getElementById('crudSexoH').checked = true;
            if (u.Sexo === 'M' || u.sexo === 'M' || u.Sexo === 'Mujer' || u.sexo === 'Mujer') document.getElementById('crudSexoM').checked = true;
        } else {
            Swal.fire('Error al cargar', json.message, 'error');
        }
    } catch (e) {
        console.error(e);
    }

    // Guardar cambios
    document.getElementById('formCrud').addEventListener('submit', async (e) => {
        e.preventDefault();
        const formData = new FormData(e.target);
        try {
            const res = await fetch(`ws/modificarUsuario.php?id=${id}`, {
                method: 'POST',
                body: formData
            });
            const json = await res.json();
            if (json.success) {
                Swal.fire({
                    title: '¡Modificado!',
                    text: 'Usuario modificado correctamente.',
                    icon: 'success',
                    timer: 2000,
                    showConfirmButton: false
                }).then(() => {
                    window.location.href = 'tabla.html';
                });
            } else {
                Swal.fire('Error', json.message, 'error');
            }
        } catch (e) {
            console.error(e);
            Swal.fire('Error', 'Hubo un error de conexión.', 'error');
        }
    });

    // Eliminar
    document.getElementById('btnEliminarCrud').addEventListener('click', async () => {
        const result = await Swal.fire({
            title: '¿Estás seguro?',
            text: "Esta acción no se podrá revertir",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar'
        });

        if (!result.isConfirmed) return;

        try {
            const res = await fetch(`ws/deleteUsuario.php?id=${id}`);
            const json = await res.json();
            if (json.success) {
                Swal.fire('Eliminado!', 'Usuario eliminado correctamente.', 'success').then(() => {
                    window.location.href = 'tabla.html';
                });
            } else {
                Swal.fire('Error', json.message, 'error');
            }
        } catch (e) {
            console.error(e);
            Swal.fire('Error', 'Hubo un error de conexión al eliminar.', 'error');
        }
    });
});

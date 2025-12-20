export class Item {
    
    constructor(texto, completada) {
        this.texto = texto;
        this.completada = false;
    }

    insertar() {
    const lista = document.querySelector("#lista");
    const itemNuevo = document.createElement("li");
    itemNuevo.textContent = this.texto;
    lista.appendChild(itemNuevo);
    }

}

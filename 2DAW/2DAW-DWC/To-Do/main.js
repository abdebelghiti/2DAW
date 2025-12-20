import {Item} from "./Item.js";

const boton = document.querySelector("#botonAdd");
boton.onclick = addItem;

function addItem() {
    const input = document.querySelector("#inputText");
    const texto = input.value;

    console.log(texto);
    
    const item = new Item(texto, true);
    item.insertar();

}

// Modificar este código para que
/**
 * 1. Exista una clase Item con propiedades: "texto" (string) y "completada" (boolean)
 *  métodos: insertar
 * 
 * item.insertar() añade el item al DOM
 * */ 



---
layout: ../../layouts/MarkdownPostLayout.astro
title: 'Clonando YouTube con Sass'
pubDate: 2026-03-12
description: 'Práctica intensiva de maquetación avanzada utilizando el preprocesador Sass para recrear la interfaz de YouTube.'
author: 'Abde'
image:
    url: 'https://images.unsplash.com/photo-1611162616475-46b635cb6868?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'
    alt: 'Logo YouTube en pantalla'
tags: ["CSS", "Sass","Maquetación"]
---

La maquetación web puede llegar a ser compleja cuando tienes interfaces gigantes y llenas de componentes como la de YouTube. Para esta práctica de clase, el reto era clonar la página de inicio utilizando HTML y **Sass**, el preprocesador CSS.

<br>

## **Las ventajas de usar Sass**

<br>

Escribir CSS puro para un proyecto tan grande habría resultado en un archivo interminable y difícil de mantener. Sass me permitió estructurar mis estilos de forma modular. 

Descubrí varias ventajas clave:

<br>

1. **Variables**: Definir la paleta de colores de YouTube (los distintos grises, el rojo de YouTube, los colores de fuentes) en variables globales. Si algún día decidía cambiar el tono de gris del fondo, solo tenía que cambiarlo en un sitio.
2. **Anidamiento (Nesting)**: Poder anidar selectores CSS dentro de otros me ahorró muchísimo código y me ayudó a replicar la estructura del HTML en mis hojas de estilos.
3. **Mixins**: Creé directivas reutilizables para elementos comunes, como los botones redondos, los hover states y contenedores flex especiales.

<br>

## **Estructura Flexible con Grid y Flexbox**

<br>

Para la disposición de los videos, utilicé `CSS Grid`. Me permitió crear el clásico layout responsivo donde el número de videos por fila se adapta automáticamente dependiendo del ancho de la pantalla:

<br>

```scss
.video-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 20px;
}
```

<br>

Para elementos como la barra de navegación superior (Header) o las etiquetas de categorías, `Flexbox` fue la herramienta perfecta.

<br>

## **Resultado final**

<br>

Lograr una interfaz casi idéntica a la original reforzó enormemente mis bases de HTML estructural y CSS avanzado. Es increíble lo que se puede lograr simplemente dominando estas dos capas antes de añadir cualquier lógica JavaScript.
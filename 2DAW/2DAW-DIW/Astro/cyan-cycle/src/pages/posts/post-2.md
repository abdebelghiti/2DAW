---
layout: ../../layouts/MarkdownPostLayout.astro
title: 'Desarrollando la App de Valorant'
pubDate: 2026-03-11
description: 'El proceso detrás de la creación de una aplicación web consumiendo la API no oficial de Valorant.'
author: 'Abde'
image:
    url: 'https://images.unsplash.com/photo-1542751371-adc38448a05e?q=80&w=1000&auto=format&fit=crop'
    alt: 'Setup gaming'
tags: ["JavaScript", "APIs","Fetch"]
---

Uno de los proyectos más entretenidos que hemos desarrollado este trimestre ha sido la **App de Valorant**. El objetivo principal era aprender a consumir APIs REST y manejar esos datos de forma asíncrona usando JavaScript de cliente (Vanilla JS).

<br>

## **Consumiendo la API**

<br>

Para obtener los datos de los agentes, mapas y armas, utilicé la [Valorant API](https://valorant-api.com/), una API pública y gratuita que proporciona una cantidad inmensa de información e imágenes del juego.

El reto principal fue manejar las peticiones asíncronas utilizando `fetch` y `async/await`. Aquí un pequeño ejemplo de cómo obtenía los agentes:

<br>

```javascript
async function fetchAgents() {
    try {
        const response = await fetch('https://valorant-api.com/v1/agents?isPlayableCharacter=true');
        const data = await response.json();
        renderAgents(data.data);
    } catch (error) {
        console.error("Error al cargar los agentes:", error);
    }
}
```

<br>

## **Renderizado en el DOM**

<br>

Una vez que tenía los datos, el siguiente paso era crear dinámicamente elementos en el HTML. Tuve que crear tarjetas para cada agente insertando su nombre, rol, descripción y, por supuesto, su imagen extraída directamente de la API.

Todo el diseño visual lo apoyé con **TailwindCSS**, creando un grid que se adaptara a dispositivos móviles (Responsive Web Design).

<br>

## **Conclusión**

<br>

Este proyecto me ha servido muchísimo para consolidar mis conocimientos en JavaScript moderno, la manipulación del DOM y el manejo de promesas. Enfrentarse a datos reales de una API externa cambia por completo la perspectiva sobre cómo se construyen las aplicaciones web reales.
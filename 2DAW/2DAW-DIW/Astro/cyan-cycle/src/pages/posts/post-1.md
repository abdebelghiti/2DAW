---
layout: ../../layouts/MarkdownPostLayout.astro
title: 'Mi experiencia aprendiendo Astro'
pubDate: 2026-03-10
description: 'Cómo construí este portafolio desde cero utilizando Astro y Tailwind CSS en el módulo de DIW.'
author: 'Abde'
image:
    url: 'https://images.unsplash.com/photo-1618477388954-7852f32655ec?q=80&w=1000&auto=format&fit=crop'
    alt: 'Código en pantalla'
tags: ["Astro", "TailwindCSS","Portafolio"]
---

¡Hola a todos! En este primer artículo del blog quiero compartir mi experiencia aprendiendo **Astro**, el framework web que he utilizado para construir este mismo portafolio como parte de las prácticas de 2DAW.

<br>

## **¿Por qué Astro?**

<br>

Al principio, cuando nos plantearon crear un portafolio en la asignatura de *Diseño de Interfaces Web (DIW)*, pensé en usar HTML y CSS puros o tal vez saltar directamente a un framework pesado como React o Angular. Sin embargo, descubrí Astro.

<br>

Lo que más me llamó la atención fue su enfoque en el contenido y la velocidad. Astro genera sitios estáticos de forma predeterminada (SSG), lo que significa que el rendimiento es increíble. Además, la curva de aprendizaje fue muy suave porque su sintaxis `.astro` es muy parecida al HTML estándar, pero con el superpoder de usar JavaScript directamente en la cabecera (frontmatter).

<br>

## **Integración con Tailwind CSS**

<br>

Una de las mejores decisiones fue integrar **Tailwind CSS**. Gracias a su integración oficial, pude maquetar todo el diseño oscuro (Dark Mode), las tarjetas de proyectos y el layout sin tener que salir del archivo HTML. 

<br>

```astro
<div class="p-6 border border-gray-800 bg-gray-900/40 rounded-xl">
    <!-- Contenido -->
</div>
```

<br>

Las clases de Tailwind me permitieron prototipar increíblemente rápido y lograr un diseño moderno y minimalista, que era exactamente lo que buscaba.

<br>

## **Siguientes pasos**

<br>

Este portafolio es solo el comienzo. Planeo seguir subiendo aquí mis futuros proyectos y aprendizajes durante el curso. ¡Nos vemos en el próximo post!
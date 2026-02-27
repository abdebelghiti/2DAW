# Importación de Librerías: Local vs. CDN

## Uso de CDN
Las CDN (*ej. unpkg, cdnjs, jsdelivr*) son servidores distribuidos geográficamente diseñados específicamente para entregar contenido estático (como scripts de JavaScript y hojas de estilo CSS) a los usuarios con la menor latencia posible.

### Ventajas:
1. **Mejor rendimiento por proximidad:** El archivo no se descarga desde tu servidor, sino desde el nodo de la CDN más cercano a la ubicación física de tu visitante (por ejemplo, si tu servidor está en España y tu usuario está en México, la CDN se lo envía desde un servidor en América).
2. **Caché compartida del navegador:** Millones de sitios usan las mismas CDNs para recursos populares como *React*, *TailwindCSS* o *SweetAlert2*. Existe una alta probabilidad de que tu usuario ya tenga guardado el archivo en la caché interna de su navegador web debido a una visita a otro sitio web, provocando que la carga sea **instantánea**.
3. **Descarga de tráfico (Ahorro de ancho de banda):** Almacenar y enviar estos grandes archivos no cuesta ancho de banda de tu propio alojamiento o servidor cloud, economizando en las facturas de tu infraestructura.
4. **Mejor paralelización de red:** Los navegadores tienen un límite de conexiones simultáneas por dominio. Al colocar los recursos pesados en un dominio externo distinto (el de la CDN), liberas los hilos primarios para que el navegador solo pida el código crítico o la API desde tu propio servidor.
5. **Siempre actualizados:** Puedes vincular la versión a `latest` para recibir parches de seguridad automáticamente (aunque también es un arma de doble filo).

### Desventajas:
1. **Puntos únicos de fallo (SPOF):** Aunque es sumamente inusual, si la empresa de la CDN se cae o cambia su dominio, los estilos y funcionalidades críticas de tu sitio dejarán de funcionar.
2. **Trabajo Offline:** Imposibilita a los desarrolladores o a los usuarios sin internet el cargar o trabajar en la web dado que las dependencias requieren siempre una salida a la red pública.
3. **Privacidad y Bloqueadores:** Algunos CDNs recolectan información o analytics ocultas a través del IP loggning. Por estas razones de privacidad, las intranets corporativas y algunos *AdBlockers* estrictos bloquean dominios conocidos de CDN completos. Todo recurso asociado con ellos no se descargará.
4. **Arma de doble filo sobre actualizaciones:** Dependencias puestas en `latest` pueden romper la aplicación de un día para otro si la librería sufre cambios perjudiciales.

---

## Uso Local
Importar librerías en local consiste en entrar al sitio oficial del autor, y descargar el código fuente y copiar en tus repositorios archivos como `script.js` y `styles.css`.

### Ventajas:
1. **Control total y absoluta estabilidad:** Los archivos no sufrirán cambios sin que tú lo dictamines intencionalmente. Tienes control de versión explícito.
2. **Alta disponibilidad (siempre que tu servidor funcione):** Si la web carga, la dependencia carga, eliminando los puntos de fallo de proveedores de red externos.
3. **Favorable para las Intranets (Offline):** Las oficinas con cortafuegos, el trabajo de desarrollo fuera de línea o entornos cerrados jamás tendrán problemas de conectividad con de cara a estas herramientas. 
4. **Mayor Privacidad:** Al no forzar al cliente a hacer una petición a un servidor externo (como Google o Facebook), garantizas la privacidad y reduces el cumplimiento estricto de auditorías externas.

### Desventajas:
1. **Sobrecarga del servidor:** Todos los bytes de tu librería (que pueden ascender a Megabytes significativos), deberán ser distribuidos utilizando la red y los procesadores limitados de tu servidor propio. Esto se hace fatal en picos de tráfico.
2. **Mantenimiento manual obligatorio:** No verás de manera transparente mejoras de optimización provistas por los autores sobre la marcha, ni parches de emergencia, hasta que no vuelvas a ir a su web para descargar e inyectar el código a nivel aplicación.
3. **Tiempo de carga incrementado:** La gente primeriza a tu sitio web tendrá que procesar el peso completo sin atajos de la caché distribuida de internet. Si vives lejos de tu proveedor de red, se percibirá retraso.

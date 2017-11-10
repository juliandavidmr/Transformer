# Transformer

Puente intercomunicador de servicios dinámicos alojados en múltiples servidores.
Creado para compartir servicios en ejecucion desde cualquier maquina dentro la de la red universitaria,
esto libera los puertos y direcciones url a la internet de manera segura.

## Caracteristicas

- [x] Acceso a contenido estatico:
	- Texto, html, json... en formato plano
- [x] Acceso a multiples puertos
- [x] Sin limite de url

## Instalar

```bash
git clone https://github.com/juliandavidmr/Transformer
cd Transformer

# Instalar paquetes
php composer.phar install
# ó 
composer install

# Iniciar servidor
php composer.phar start
# o
php -S localhost:8080 -t public public/index.php
```

### Configuración

Establecer rutas en el archivo _[settings.php](./src/settings.php)_


## Ejemplo

Arrancar este proyecto desde terminal _(O servidor apache)_, luego acceder a la ruta de publicacion de este servicio _(localhost)_:

Peticion inicial `http://localhost:8080/0/2/Moodle`

Donde:
- 8080/**0**/2/Moodle: identifica el puerto del anfitrión, cero para especificar puerto 8080 por defecto.
- 8080/0/**2**/Moodle: idenfiticador que referencia el host objetivo
- 8080/0/2/**Moodle**: Resto de ruta (recurso) a requerir

Finalmente esta ruta inicial se ve traducida en `http://192.168.42.250/Moodle` (Segunda petición), la petición inicial responde con la misma respuesta dada por la segunda peticion.

_Desarrollado por [Julian David](https://github.com/juliandavidmr)_
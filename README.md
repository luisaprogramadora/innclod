## PRUEBA TÉCNICA PRÁCTICA PHP INGENIERO DE DESARROLLO
Prueba para innclod desarrollada en laravel

## Características

-   Utiliza Laravel en su última versión 9.19 
-   php 8.0.2
-   Plantilla Bootstrap es usado para los estilos
-   Iconos de FontAwesome
-   Sistema totalmente responsivo, es decir, funciona en móviles, tabletas y computadoras
-   Lista de documentos, creacion de documentos, creacion de procesos, creacion de tipos de documentos

## Instalación 

-  Clonar desde github (usar github desktop)
  ```bash
  git clone https://github.com/luisaprogramadora/innclod.git
  ```
-  Vaya a la carpeta innclod
  ```bash
  cd innclod
  ```
-  Instalar dependencias con composer desde consola
  ```bash
  composer install
  ```
-  Instalar dependencias node (Se uso la version v18.14.2)
  ```bash
  npm install
  ```
  ## Variables de entorno

Para ejecutar este proyecto, Necesitarás añadir las siguientes variables de entorno en **.env**

`DB_DATABASE=your-database`

`DB_USERNAME=your-username`

`DB_PASSWORD=your-password`

`APP_KEY=base64:APP_KEY` (**)

** para generar el APP_KEY, se necesita ejecutar el siguiente comando:

```bash
  php artisan key:generate
```
## Ejecutar Localmente

Ejecutar las migraciones
```bash
  php artisan migrate
```
Iniciar node server
```bash
  npm run dev
```
Iniciar el server
```bash
  php artisan serve
```
Ingresar url
```bash
    Server running on [http://127.0.0.1:8000]. 
```







  


# profile
paquete para manejar perfiles en una aplicacion laravel

## 1. Para instalar el paquete
```
composer require fmelchor/perfiles
```
## 2. Agregar el service provider en config app.php providers
```
fmelchor\perfiles\CreatePerfilesProvider::class
```
## 3. Ejecuta el comando
```
php artisan vendor:publish --tag=migrations
```
## 4. Correr las migraciones 
```
php artisan migrate
```
## 5. Generar un modulo y sus operaciones en c_modulo tabla y c_operation tabla
 en tu ruta http://misite.com/profile se ejecutara el modulo


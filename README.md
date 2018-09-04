# profile
paquete para manejar perfiles en una aplicacion laravel

#1 para instalar el paquete
composer require fmelchor/perfiles

#2 agregar el service provider en config app.php providers

fmelchor\perfiles\CreatePerfilesProvider::class
#3 ejecuta el comando
php artisan vendor:publish --tag=migrations

#4 correr las migraciones 
generar un modulo y sus operaciones en c_modulo tabla y c_operation tabla
en tu ruta http://misite.com/profile se ejecutara el modulo


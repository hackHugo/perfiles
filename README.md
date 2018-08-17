# profile
paquete para manejar perfiles en una aplicacion laravel

para instalar el paquete
composer require fmelchor/perfiles

php artisan vendor:publish --tag=migrations


agregar el service provider en config app.php providers
fmelchor\perfiles\CreatePerfilesProvider::class

correr las migraciones 
generar un modulo y sus operaciones en c_modulo tabla y c_operation tabla
en tu ruta http://misite.com/profile se ejecutara el modulo


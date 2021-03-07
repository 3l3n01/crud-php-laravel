# Backend

Api para el registro del ejemplo de la agenda con vue, utilizando laravel

# Requisitos

Se requiere tener mysql por simplicidad utilizar una imagen de docker

```
docker run --name mysql --rm -p 3306:3306 \
        -e MYSQL_DATABASE=shuttle \
        -e MYSQL_ROOT_PASSWORD=password \
        mysql --default-authentication-plugin=mysql_native_password
```

# Configuracion

1.- Instalar dependencias
    composer install

2.- Iniciar migracion
    php artisan migrate

3.- Ejecutar el seeder
    php artisan db:seed --class=ContactsSeeder

# Ejecutar

1.- Iniciar el servidor
    php artisan serve

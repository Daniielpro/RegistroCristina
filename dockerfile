# Usa la imagen oficial de PHP con Apache
FROM php:8.1-apache

# Instala las extensiones necesarias para tu aplicación
RUN docker-php-ext-install pdo pdo_mysql

# Copia los archivos de la aplicación al directorio raíz de Apache
COPY . /var/www/html/

# Otorga permisos al directorio de la aplicación
RUN chown -R www-data:www-data /var/www/html

# Exponer el puerto 80 para que pueda ser accesible
EXPOSE 80

# Establece el directorio de trabajo
WORKDIR /var/www/html



# Comando por defecto para iniciar el servidor Apache
CMD ["apache2-foreground"]
